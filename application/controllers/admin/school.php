<?php

class School extends CI_Controller {

	function School()
	{
		parent::__construct();
		$this->load->helper('url');	
		$this->load->model('schoolmodel', 'school_model');
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
    	$datas['sch_detail'] =$this->school_model->get_all_school();
    	$data['content'] =$this->load->view('admin/schoollist',$datas,TRUE);
    	$this->load->view('admin/adtemplate', $data,FALSE);
        //$this->oneschool();
    }
	
	function addschool(){
		$datas['sch_info']="none";
		$data['content'] =$this->load->view('admin/schooladd',$datas,TRUE);
    	$this->load->view('admin/adtemplate', $data,FALSE);
	}
	function updateschool(){
		$datas['sch_info'] =$this->school_model->get_school($this->uri->segment(4));
		$data['content'] =$this->load->view('admin/schooladd',$datas,TRUE);
    	$this->load->view('admin/adtemplate', $data,FALSE);
	}
	
	function submit(){
		//$datas['sch_info'] =$this->school_model->get_school($this->uri->segment(4));
		//$data['content'] =$this->load->view('admin/schooladd',$datas,TRUE);
    	
    	$this->load->helper('form');
		$datas['item']="学校信息"; 
    	$datas['addurl']="admin/school/addschool";
		$datas['listurl']="admin/school/index";
		if($_POST["id"]>0)
		{
			$datas['operate']="修改"; 
			$re=$this->school_model->update_school($_POST["id"]);
		}
		else {
			$datas['operate']="添加"; 
			$re=$this->school_model->insert_school();
		}
    	
    			
    	if($re){
    		$data['content']=$this->load->view('admin/success',$datas,TRUE);
		}
		else {
			$data['content']=$this->load->view('admin/fail',$datas,TRUE);
		}
		$this->load->view('admin/adtemplate', $data,FALSE);
	}
	function del(){
		//$datas['sch_info'] =$this->school_model->get_school($this->uri->segment(4));
		$datas['item']="学校信息"; 
		$datas['operate']="删除"; 
    	$datas['addurl']="admin/school/addschool";
		$datas['listurl']="admin/school/index";
		if($this->school_model->delete_sch($this->uri->segment(4))){
    		$data['content']=$this->load->view('admin/success',$datas,TRUE);
		}
		else {
			$data['content']=$this->load->view('admin/fail',$datas,TRUE);
		}
    	$this->load->view('admin/adtemplate', $data,FALSE);
	}
	
	function listAll(){
		$data['sch_detail'] =$this->school_model->get_all_school();
	}
}