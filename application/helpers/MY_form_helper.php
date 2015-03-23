<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Form token base on Chris Shiflett's implementation
 * @see http://phpsecurity.org
*/

/**
 * Generate Form Token
 * 
 * @access	public
 * @return	string	unique form token
 * 
 */
function generate_token()
{
	$CI =& get_instance();
	
	$token = md5(uniqid(rand(), TRUE));
	$CI->session->set_userdata('token', $token);
	$CI->session->set_userdata('token_time', time());
	
	return $token;
}

// --------------------------------------------------------------------

/**
 * Check form token
 * 
 * @access	public
 * @param	string	submitted token
 * @param	integer	expiration time - default 5 minutes
 * @return	bool	token valid?
 * 
 */
function check_token($submitted_token, $expire = 300)
{
	$CI =& get_instance();
	
	$token_age = time() - $CI->session->userdata('token_time');
	$token = $CI->session->userdata('token');

	// 5 minutes to submit the form
	if ($token_age <= $expire)
	{
		if ($token === $submitted_token)
		{
			return TRUE;
		}		
	}
	
	// Expired or invalid
	$CI->session->unset_userdata('token');
	return FALSE;
}

/* End of file MY_form_helper.php */
/* Location: ./application/helpers/MY_form_helper.php */