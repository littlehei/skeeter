<?php

class Member extends CI_Controller {

	function Member()
	{
		parent::__construct();
		$this->load->helper('url');	
		//$this->load->model('schoolmodel', 'school_model');
		$this->load->model('membermodel', 'member_model');
	}

	// --------------------------------------------------------------------
    
	/**
	 * Default Controller Function
	 *
	 * @access	public
	 */
    function index()
    { 
    	$datas['mem_detail'] =$this->member_model->get_all_member();
    	$data['content'] =$this->load->view('admin/memberlist',$datas,TRUE);
    	$this->load->view('admin/adtemplate', $data,FALSE);
    }
	
	function addmember(){
		$datas['mem_info']="none";
		$data['content'] =$this->load->view('admin/memberadd',$datas,TRUE);
    	$this->load->view('admin/adtemplate', $data,FALSE);
	}
	function updatemember(){
		$datas['mem_info'] =$this->member_model->get_member($this->uri->segment(4));
		$data['content'] =$this->load->view('admin/memberadd',$datas,TRUE);
    	$this->load->view('admin/adtemplate', $data,FALSE);
	}
	
	function submit(){
		//$datas['sch_info'] =$this->school_model->get_school($this->uri->segment(4));
		//$data['content'] =$this->load->view('admin/schooladd',$datas,TRUE);
    	
    	$this->load->helper('form');
		$datas['item']="用户信息"; 
    	$datas['addurl']="admin/member/addmember";
		$datas['listurl']="admin/member";
		if($_POST["id"]>0)
		{
			$datas['operate']="修改"; 
			$re=$this->member_model->update_member($_POST["id"]);
		}
		else {
			$datas['operate']="添加"; 
			$re=$this->member_model->insert_member();
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
		$datas['item']="用户信息"; 
		$datas['operate']="删除"; 
    	$datas['addurl']="admin/member/addmember";
		$datas['listurl']="admin/member";
		if($this->member_model->delete_mem($this->uri->segment(4))){
    		$data['content']=$this->load->view('admin/success',$datas,TRUE);
		}
		else {
			$data['content']=$this->load->view('admin/fail',$datas,TRUE);
		}
    	$this->load->view('admin/adtemplate', $data,FALSE);
	}
	
}