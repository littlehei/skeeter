<?php

class School extends MY_Controller {

	function School()
	{
		parent::MY_Controller();
		$this->load->helper('url');	
		// Load Necessary files
		$this->load->model('schoolmodel', 'school_model');
		$this->load->model('membermodel', 'user_model');
		//$this->load->library('pagination');
		//$this->load->helper('text');
		
		// Set meta tags for the whole controller (Left here as an example)
		// If you put this in a method, it will replace metas for that method only
		// If you remove this lines below, the script will fetch the default metas that are in /application/config/template.php
		// @TODO: Put this kind of explaination in the user guide
		$metas = array(
						'title' 			=> "Listings",
						'meta_description' 	=> "Linkster is a PHP script that let you manage a links directory. It is built on the CodeIgniter PHP framework and it's free and open source.",
						'meta_keywords' 	=> "PHP script, CodeIgniter, Open Source, Free Script, Link Directory"
						);
		
		$this->template->metas($metas);		
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
    	$data['sch_info'] ='s';
    	$this->template->display('school', $data);
        //$this->oneschool();
    }
	// --------------------------------------------------------------------
	
	/**
	 * Display all categories
	 *
	 * @access	public
	 */
	function oneschool()
	{
		
		$data['sch_info'] =$this->school_model->get_school($this->uri->segment(3));
		$data['sch_image']=$this->school_model->get_school_image($this->uri->segment(3));
		
		$comment_query=$this->school_model->get_school_comment($this->uri->segment(3));
		$data['sch_comm']=$comment_query;
		foreach($comment_query->result() as $comlist){
		//$com_id=$comlist->comment_id;
	
			$data["comm_$comlist->comment_id"]=$this->school_model->get_school_reply($comlist->comment_id);
		
		}
		//$dd='1';
		//$data["comm_$dd"]='dsfsd';
		if($this->session->userdata('id')){
			$data['login_info']=$this->user_model->get_loginuser($this->uri->segment(3),$this->session->userdata('id'));
		}
		$this->template->display('comment', $data);
	}
	
	// --------------------------------------------------------------------
    
	/**
	 * Display the requested category listings
	 *
	 * @access	public
	 * @param	string	category name
	 */
    function category($category = FALSE)
    {							
		// Get the entries for the requested category
		$data = $this->listings->get_category_listings(intval($category), $this->pagination->per_page, $this->uri->segment(4));
		
		if( count($data['entries']) == 0)
		{
			// Category doesn't exist
			$this->session->set_flashdata('msg', 'This category does not exist.');
			redirect();
		}
		else if($data['category']->entry_count == 0)
		{
			// Category is empty, we show a flash message
			$this->session->set_flashdata('msg', 'This category is empty.  Be the first to '.anchor('member/listings/add/'.$category, 'add an entry').'.');
			redirect();
		}
		else
		{
			// Set pagination
			$config['base_url'] 	= site_url('listings/category/'.$category);
			$config['total_rows'] 	= $data['category']->entry_count;
			$this->pagination->initialize($config);
						
			$data['pagination'] 	= $this->pagination->create_links();
		}

		$this->template->sidebar('listings', array('category_id' => $category));
		$this->template->display('listings/listings', $data);
    }
	
	
	// --------------------------------------------------------------------
    
	/**
	 * Display a listing details
	 *
	 * @access	public
	 * @param	int		listing ID (entry ID)
	 */
	function details($entry_id)
	{
		$this->load->model('users_model', 'users');
		
		$data['entry'] = $this->listings->get_entry( intval($entry_id) );
		
		if( count($data['entry']) == 0)
		{
			// Entry doesn't exist
			$this->session->set_flashdata('msg', 'This entry does not exist.');
			redirect();
		}
		
		$data['owner'] = $this->users->get_user($data['entry']->FK_user_id);
		
		$this->template->sidebar('listings', array('category_id' => $data['entry']->FK_category_id));
		$this->template->display('listings/details', $data);		
	}

function image(){
	$data['sch_info'] ='s';
    	$this->template->display('image', $data);
}
	
}
