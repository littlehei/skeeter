<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Authentication Class
 *
 * Built on Mathew Davies' ReduxAuth
 * @copyright	Copyright (c) 1 June 2008, Mathew Davies
 * @see			http://code.google.com/p/reduxauth/
 * @license		http://www.opensource.org/licenses/mit-license.php The MIT License
 */

class Access
{
	var $CI;
	
	/**
	 * Constructor
	 *
	 * Loads the configuration options and assigns them to
	 * class variables available throughout the library.
	 *
	 * @access	public
	 * @param	void
	 * @return	void
	 */
	function Access()
	{
		$this->CI =& get_instance();
		$auth = $this->CI->config->item('auth');
	//	$this->load->model('membermodel', 'users_model');
		/* Config Variables */
		foreach($auth as $key => $value)
		{
			$this->$key = $value;
		}
				
		$this->CI->load->model('membermodel', 'users_model');
		$this->users_model =& $this->CI->users_model;		
	}
	
	// --------------------------------------------------------------------

	/**
	 * Register
	 *
	 * Registers a user
	 *
	 * @access	public
	 * @param	mixed userdata
	 * @return	mixed
	 */
	function register ($userdata)
	{
		/* Hash Password */
		$hash = sha1(microtime());
		$userdata['hash'] = $hash;
		$userdata['password'] = sha1($this->salt . $hash . $userdata['password']);

		/* Assign to default group */
	//	$userdata['FK_group_id'] = $this->default_group;


		$this->users_model->add_user($userdata);
	//	$this->login($userdata['username'], $userdata['password']);
			
		return 'REGISTRATION_SUCCESS';
		
	}

	// --------------------------------------------------------------------

	/**
	 * Login
	 *
	 * Verifies a user based on username and password
	 *
	 * @access	public
	 * @param	string username, password
	 * @return	bool
	 */
	function login($username, $password)
	{
		$result = $this->users_model->get_login_info($username);
		if ($result) // Result Found
		{			
			if (empty($result->active))
			{
				return 'BANNED';
			}
			
		//	if (!empty($result->activation_code))
		//	{
		//		return 'NOT_ACTIVATED';
		//	}
			
		/*	if($result->failed_logins > 3)
			{				
				$now = time();
				$wait = $now - 20;
				
				if($result->last_failure > $wait)
				{
					return 'TIMEOUT';
				}
			}
			
			if($result->change_password != '0')
			{
				// Redirect to change password form
				$key = $this->CI->session->flashdata_key;
				$this->CI->session->set_flashdata('msg', 'Please change your password.');
				$this->CI->session->set_userdata($key.':old:referrer', 'member/profile/edit');				
			}
			*/
			$password = sha1($this->salt.$result->hash.$password); // Hash input password
						
			if ($password === $result->password) // Passwords match?
			{
				$this->CI->session->set_userdata(array('id'=> $result->id,'username'=> $result->username));

			//	$this->users_model->reset_failures($result->user_id);

				return TRUE;
			}
			else
			{
				//$this->users_model->increment_failures($result->id, $result->failed_logins);
			}
		}
		
		return FALSE;
	}

	// --------------------------------------------------------------------

	/**
	 * Logged In
	 *
	 * Checks to see if a visitor is logged into the site
	 *
	 * @access	public
	 * @param	void
	 * @return	bool
	 */
	function logged_in ()
	{
		return $var = ($this->CI->session->userdata('id')) ? TRUE : FALSE; 
	}

	// --------------------------------------------------------------------

	/**
	 * Logout
	 *
	 * Destroys the user's session
	 *
	 * @access	public
	 * @return	void
	 */
	function logout ()
	{
		$this->CI->session->unset_userdata('id');
		$this->CI->session->unset_userdata('username');
		$this->CI->session->sess_destroy();		
	}

	// --------------------------------------------------------------------

	/**
	 * Activate
	 *
	 * Finds matching activation code and activates user
	 *
	 * @access	public
	 * @param	string activation_code
	 * @return	bool
	 */
	function activate ($activation_code)
	{
		$activate = $this->users_model->activate($activation_code);
	
		return $var = ($activate) ? TRUE : FALSE;
	}

	// --------------------------------------------------------------------

	/**
	 * Forgotten Begin
	 *
	 * Starts the forgotten password procedure
	 *
	 * @access	public
	 * @param	string email
	 * @return	void
	 */
	function forgotten_password($email)
	{
		$CI =& get_instance();
		
		if($this->check_email($email))
		{
			$CI->load->library('email');
			$CI->email->initialize($this->mail);
			
			/* Generate new password. */
			$password = substr(sha1(microtime()), 0, 10);
			$this->users_model->update_password($password, $email, TRUE);

			$data['msg_view']	= 'forgot';
			$data['password']	= $password;
			
			$message = $CI->load->view('email/template', $data, TRUE);
			
			$CI->email->from($this->mail_from_email, $this->mail_from_name);
			$CI->email->to($email);
			$CI->email->subject($this->new_password_subject);	
			$CI->email->message($message);
			$CI->email->send();
			
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Get Group
	 *
	 * @access	public
	 * @return	mixed
	 */
	function get_group($id)
	{
		return $this->users_model->get_group($id);
	}

	// --------------------------------------------------------------------

	/**
	 * Check Username availability
	 *
	 * @access	public
	 * @param	string	username
	 * @return	bool
	 */
	function check_username($username)
	{
		return $this->users_model->check_unique('username', $username);
	}

	// --------------------------------------------------------------------
	
	/**
	 * Check Email availability
	 *
	 * @access	public
	 * @param	string	email
	 * @return	bool
	 */
	function check_email($email)
	{
		return $this->users_model->check_unique('email', $email);
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Returns User Object
	 *
	 * @access	public
	 * @return	object	user object
	 */
	function get_user()
	{		
		if ( ! $this->logged_in())
		{
			$user			= new stdClass;
			$user->id		= -1;
			$user->is_admin	= FALSE;
		}
		else
		{
			$user = $this->CI->users_model->get_user($this->CI->session->userdata('id'));
			
			$user->id = $user->user_id;
			$user->join_date = strtotime($user->join_date . " GMT");	// unix timestamp
			$user->is_admin = ($user->user_group === 'Administrators') ? TRUE : FALSE;
			$user->confirm_logout = $this->CI->config->item('logout_confirmation');
		}
		
		return $user;
	}

	// --------------------------------------------------------------------

	/**
	 * Protect a controller / function
	 *
	 * @access	public
	 * @param	string	user group
	 */
	function restrict($user_group = FALSE)
	{
		if($user_group == 'logged_out')
		{
			if ($this->logged_in())
			{
				redirect('/');
			}
		}
		else if( ! $this->logged_in())
		{
			$this->CI->session->set_flashdata('referrer', $this->CI->uri->uri_string());
			redirect('/user/login');
		}
		else if ($user_group AND $this->CI->user->user_group !== $user_group)
		{
			$this->CI->session->set_flashdata('referrer', $this->CI->uri->uri_string());
			redirect('/user/login');
		}
	}
	
}

/* End of file Access.php */
/* Location: ./application/libraries/Access.php */