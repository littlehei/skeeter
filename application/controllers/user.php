<?php

class User extends MY_Controller {
var $CI;
	function User()
	{
		
		parent::MY_Controller();
		$this->load->helper('url');	
		// Load Necessary files
		$this->load->model('schoolmodel', 'school_model');
		$this->load->model('membermodel', 'user_model');
		$this->load->model('commentmodel', 'c_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
		//$this->load->library('pagination');
		//$this->load->helper('text');
$this->CI =& get_instance();
		$metas = array(
						'title' 			=> "Listings",
						'meta_description' 	=> "Linkster is a PHP script that let you manage a links directory. It is built on the CodeIgniter PHP framework and it's free and open source.",
						'meta_keywords' 	=> "PHP script, CodeIgniter, Open Source, Free Script, Link Directory"
						);
		
		$this->template->metas($metas);		
	}
	function goregisiter(){
		
		
		$this->load->view('register');
	}
	function gologin(){
		$referer = $_SERVER['HTTP_REFERER'];
		$data['refer']=$referer;
		$this->load->view('login',$data);
	}
	
	function register()
	{
	
		// Only logged out users
		$this->access->restrict('logged_out');

				
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|callback_check_email');
		$this->form_validation->set_rules('password','密码','trim|required');
		
		// The only isset rule we have is the terms - perfect
	//	$this->form_validation->set_message('isset', 'You must agree to the terms to use this service.');
		
		// Run the validation
		if ($this->form_validation->run() == FALSE)
		{
			$data['token'] = generate_token();
			
			$this->load->view('register', $data);
		}
		else
		{
			$userdata = array(
					'username'  => reset(explode('@',$this->input->post('email'))),
					'email'			=>	$this->input->post('email'),
					'password'		=>	$this->input->post('password'),
					'active'		=>	'1'
							);
						
			$register = $this->access->register($userdata);
			
			switch($register)
			{
				case 'REGISTRATION_SUCCESS':
					$this->session->set_flashdata('msg', 'Registration complete! You can now log in.');
					redirect('user/gologin');
				default:
					show_error('Registration failed');
			}
		}
	}
// --------------------------------------------------------------------
	
	/**
	 * Login Function
	 *
	 * @access	public
	 */
	function login()
	{
		// Only logged out users
		if($this->input->post('type')==1){
			$referer=$this->input->post('refer');
		}
		else{
			$referer = $_SERVER['HTTP_REFERER'];
		}
		
		//echo $referer;
		$this->access->restrict('logged_out');

		// Load required files
		
		$rules = array(
				'username'	=>	'trim|required|strip_tags|xss_clean',
				'password'	=>	'trim|required',
				'token'		=>	'check_login|required'
		);
		
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('password','密码','trim|required');
		$this->form_validation->set_rules('token','密码','callback_check_login');
		
		if ($this->form_validation->run() == FALSE)
		{
		//	$this->template->metas('title', 'Login');
			$data['token'] =generate_token();
			
		//	$this->session->keep_flashdata('referrer');
			$this->load->view('login', $data);
		
		}
		else
		{
			$uri = $referer ? $referer : '';
			redirect($uri);
		}
	}
	/**
	 * Logout Function
	 *
	 * @access	public
	 */
	function logout()
	{
				
		$this->access->logout();
		redirect('user/gologin');
	}
	/**
	 * Check Email availability
	 *
	 * @access	public
	 * @param	string	email
	 * @return	bool
	 */
	function check_email($email, $old = FALSE)
	{
		
		if ($email !== $old AND $this->access->check_email($email))
		{
			$this->form_validation->set_message('check_email','该邮箱地址已经被使用');		
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
		/**
	 * Check Login
	 *
	 * @access	public
	 * @param	string	password, email-field name
	 * @return	bool
	 */
	function check_login()
	{
		$this->form_validation->set_message('check_login','');
		
	/*	if(count($this->_error_array) > 0)
		{
			return FALSE;
		}
		*/
		$token		= $this->input->post('token');
		$username	= $this->input->post('email');
		$password	= $this->input->post('password');
				
	/*	if ( ! check_token($token, 120))
		{
			// Expired or incorrect token
			$this->_error_array[] = 'Security error - please try again.';					
			return FALSE;
		}
		*/
		// Try authenticating
		$login = $this->access->login($username, $password);

		if($login === 'BANNED')
		{
			$this->form_validation->set_message('check_login','Your account has been suspended');
		//	$this->_error_array[] = 'Your account has been suspended.';
			return FALSE;
		}
		else if($login === 'NOT_ACTIVATED')
		{
				$this->form_validation->set_message('check_login','Your account is not yet activated');
			//$this->_error_array[] = 'Your account is not yet activated.';
			return FALSE;
		}
		else if($login === 'TIMEOUT')
		{
			// Throttled authentication
		//	$this->_error_array[] = 'Too many attempts.  You can try again in 20 seconds.';
			return FALSE;
		}
		
		if($login)
		{
			// Authentication valid
			return TRUE;
		}
		else
		{
			// Wrong username/password combination
		//	$this->_error_array[] = 'Credentials do not match.';		
			return FALSE;
		}
	}
	
	function praise(){
		$this->c_model->praise();
		$cid=$this->input->post('toid');
		$ptype=$this->input->post('ptype');
		$ac=$this->input->post('action');
		if($ptype==1){
			$this->c_model->modifypraise($cid,$ac);
		}
		if($ptype==2){
			$this->c_model->modifyreplypraise($cid,$ac);
		}
		$arr = array ('cid'=>$cid,'ab'=>2);
		echo  json_encode($arr);
	}

	function focus(){
		$cid=$this->c_model->focus();
		$arr = array ('cid'=>$cid,'ab'=>2);
		echo  json_encode($arr);
	}
	
	function comment(){
		$ac=$this->input->post('action');
		if($ac==1)
		{
			$cid = $this->c_model->add_comment();
		//   echo "{\"cid\": true,\"msg\":\"操作成功！\"}";
			$row=$this->c_model->get_comment_uptime($cid);
			$t=$row->create_time;
			$arr = array ('cid'=>$cid,'t'=>$t);
			echo  json_encode($arr);
			//echo  "{\"cid\":"+$cid+",\"msg\":\"操作成功！\"}";
		}
		else if($ac==2){
			$updatetime = $this->c_model->update_comment();
		//   echo "{\"cid\": true,\"msg\":\"操作成功！\"}";
			$arr = array ('cid'=>'true','t'=>$updatetime);
			echo  json_encode($arr);
		}
		else{
			$cid=$this->input->post('cid');
			if($this->c_model->delete_comm($cid))
			{
				$arr = array ('res'=>1,'ab'=>2);
				echo  json_encode($arr);
			}
		}
		
	}	
	
	function reply(){
		$ac=$this->input->post('action');
		if($ac==1)
		{
			$rid = $this->c_model->add_reply();
		//   echo "{\"cid\": true,\"msg\":\"操作成功！\"}";
		$row=$this->c_model->get_reply_uptime($rid);
		$t=$row->create_time;
			$arr = array ('rid'=>$rid,'t'=>$t);
			echo  json_encode($arr);
			//echo  "{\"cid\":"+$cid+",\"msg\":\"操作成功！\"}";
		}
		else{
			$rid=$this->input->post('rid');
			if($this->c_model->delete_reply($rid))
			{
				$arr = array ('res'=>1,'ab'=>2);
				echo  json_encode($arr);
			}
		}
		
	}	
	
	function jubao(){
		
	}
	
	function commentstar(){
		$this->c_model->commentscore();
		$arr = array ('res'=>1,'ab'=>2);
		echo  json_encode($arr);
	}
}