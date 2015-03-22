<?php

class Comment extends CI_Controller {

	function Comment()
	{
		parent::__construct();
		$this->load->helper('url');	
		$this->load->model('commentmodel', 'comment_model');
	}

	// --------------------------------------------------------------------
    
	/**
	 * Default Controller Function
	 *
	 * @access	public
	 */
    function index()
    { 
    	$datas['comm_detail'] =$this->comment_model->get_all_comment();
    	$data['content'] =$this->load->view('admin/commentlist',$datas,TRUE);
    	$this->load->view('admin/adtemplate', $data,FALSE);
    }
	function del(){
		$datas['item']="评论信息"; 
		$datas['operate']="删除"; 
    	$datas['addurl']="#";
		$datas['listurl']="admin/comment";
		if($this->comment_model->delete_comm($this->uri->segment(4))){
    		$data['content']=$this->load->view('admin/success',$datas,TRUE);
		}
		else {
			$data['content']=$this->load->view('admin/fail',$datas,TRUE);
		}
    	$this->load->view('admin/adtemplate', $data,FALSE);
	}
}