<?php

class Main extends CI_Controller {

	function Main()
	{
		parent::__construct();
		$this->load->helper('url');	
	}

	// --------------------------------------------------------------------
    
	/**
	 * Default Controller Function
	 *
	 * @access	public
	 */
    function index()
    { 
    	//$this->CI =& get_instance();
    	//$this->CI->load->view('template');
    	$data1['content'] ='ss';
    	$data['content'] =$this->load->view('admin/school',$data1,TRUE);
    	$this->load->view('admin/adtemplate', $data,FALSE);
        //$this->oneschool();
    }
}