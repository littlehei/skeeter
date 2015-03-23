<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Site settings
|--------------------------------------------------------------------------
|
| Global site settings
|
*/

$config['site_name'] 	= 'Linkster';
$config['site_email'] 	= 'info@codeigniterdirectory.com'; // Global site email

$config['logout_confirmation']	= TRUE;

/*
|--------------------------------------------------------------------------
| Default Meta tags
|--------------------------------------------------------------------------
|
| Set the default meta tags site wide
|
*/

$config['default_title'] 		= "Default application title";
$config['default_description'] 	= "Default application description";
$config['default_keywords'] 	= "Default application keywords";


/*
|--------------------------------------------------------------------------
| Feed options
|--------------------------------------------------------------------------
|
| Define the RSS feed options
|
*/

// Common feed config
$config['feed_num'] 			= 10; // How many entries to get
$config['feed_language'] 		= 'en-us';
$config['feed_email'] 			= $config['site_email'];

// All listings feed
$config['all_feed_name'] 		= 'All Linkster links feed';
$config['all_feed_description'] = 'All listings of Linkster';

// Categories listings feed
$config['cat_feed_name'] 		= 'Linkster categories feed';


/*
|--------------------------------------------------------------------------
| Errors delimiters
|--------------------------------------------------------------------------
|
| Define the error delimiters
|
*/

$config['err_open'] = '<p class="error">';
$config['err_close'] = '</p>';

/*
|--------------------------------------------------------------------------
| Salt Key.
|--------------------------------------------------------------------------
|
| Generate a password from the following website: 
| https://www.grc.com/passwords.htm
|
*/

$config['auth']['salt']	= 'D9jWfyrnbRbOW7LhogYrD0oI8i4QpFGZcNKdkov58WZl0DK2CBFBb3MuHPRik8Y';

/*
|--------------------------------------------------------------------------
| Email Activation
|--------------------------------------------------------------------------
|
| When this is set to true, the user will be required to 
| activate their account before they are allowed to login.
|
*/

$config['auth']['email_activation'] = FALSE;

/*
|--------------------------------------------------------------------------
| Email Settings
|--------------------------------------------------------------------------
|
| 'mailtype' : text or html.
| 'protocol' : The mail sending protocol. (mail | sendmail | smtp)
| 'smtp_host' : SMTP Server Address.
| 'smtp_user' : SMTP Username.
| 'smtp_pass' : SMTP Password.
| 'smtp_port' : SMTP Port.
| 'mail_from_email' : Sets the email address of the person sending the email
| 'mail_from_namae' : Sets the name of the person sending the email
*/
$config['auth']['mail']['mailtype']		= 'html';
$config['auth']['mail']['protocol'] 	= 'sendmail';
$config['auth']['mail']['smtp_host'] 	= ''; 
$config['auth']['mail']['smtp_user'] 	= '';
$config['auth']['mail']['smtp_pass'] 	= ''; 
$config['auth']['mail']['smtp_port'] 	= '';
$config['auth']['mail_from_email'] 		= $config['site_email'];
$config['auth']['mail_from_name'] 		= $config['site_name'];

/*
|--------------------------------------------------------------------------
| Email Subjects
|--------------------------------------------------------------------------
|
*/
$config['auth']['email_activation_subject']	= 'Linkster Account Activation';
$config['auth']['new_password_subject']		= 'Your New Linkster Password';

/*
|--------------------------------------------------------------------------
| Default Group
|--------------------------------------------------------------------------
|
| The default group your users will acquire
|
*/
$config['auth']['default_group'] = '2';