<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

// @TODO: Get results only where they are set to active

class Commentmodel extends CI_Model
{
	
	var $c_table = 'skeeter_school_comment'; 	// Entries tabl
	var $r_table = 'skeeter_school_reply';    
	var $p_table = 'skeeter_praise';    
	var $s_table = 'skeeter_school_score';  
	var $f_table = 'skeeter_focus';  
	/**
	 * Constructor
	 *
	 * @access	public
	 */
	function Commentmodel()
	{
		parent::__construct();
	}
	

	// --------------------------------------------------------------------
	
	/**
	 * Get all entries
	 *
	 * @access	public
	 * @return 	object	Entries
	 */
	function get_all_comment()
	{
		$query = $this->db->get($this->c_table);
		return $query;
	}
	function get_comment($id)
	{
	
		$query = $this->db->get_where($this->c_table, array('comment_id' =>$id));
		
		return $query->row();	
	}
	
	
	function delete_comm($id)
	{
		return $this->db->delete( $this->c_table, array('comment_id' => $id) );
	}
	
	function add_comment(){
		$fields = array(
							'school_id'	=> $this->input->post('sid'),
							'uid'	=>$this->input->post('uid'),
							'title'	=>'zxc',
							'content'	=>$this->input->post('content'),
							'praise_num' =>0,
							'status'	=>0
						);
		
		$this->db->set($fields);
		$this->db->insert($this->c_table);
		return $this->db->insert_id();
	}
	
	function update_comment(){
		$id=$this->input->post('cid');
		//$this->db->query('update '+$this->c_table+'+ 
		//set content='+$this->input->post("content")+',update_time=now()+
		// where comment_id='+$id+';');
		date_default_timezone_set("Asia/Shanghai");
		$fields = array(
							'content'	=>$this->input->post('content'),
							'update_time' => date('Y-m-d H:i:s')
						);
		$this->db->set($fields);
		$this->db->where('comment_id', $id);
		if($this->db->update($this->c_table)){
			return $this->get_comment($id)->update_time;
		}
		else {
			return FALSE;
		}
		
	}
	function get_comment_uptime($id){
		$sql="select create_time from skeeter_school_comment where comment_id=?";
		return $this->db->query($sql,$id)->row();
	}
	function add_reply(){
		$fields = array(
							'comment_id'	=> $this->input->post('cid'),
							'school_id'	=> $this->input->post('sid'),
							'uid'	=>$this->input->post('uid'),
							'replayto_uid'	=>$this->input->post('touid'),
							'content'	=>$this->input->post('content'),
							'status'	=>0
						);
		
		$this->db->set($fields);
		$this->db->insert($this->r_table);
		return $this->db->insert_id();
	}
	
	function get_reply_uptime($id){
		$sql="select create_time from skeeter_school_reply where id=?";
		return $this->db->query($sql,$id)->row();
	}
	function delete_reply($id)
	{
		return $this->db->delete( $this->r_table, array('id' => $id) );
	}
	
	function haspraise($uid,$toid){
		$this->db->where('praisetoid', $toid);
		$this->db->where('uid', $uid);
		$query = $this->db->get($this->p_table);
		if($query->num_rows()>0){
			$row = $query->row(); 
			return $row->id;
		}
		else {
			return 0;
		}
	}
	function praise(){
		$toid=$this->input->post('toid');
		$uid=$this->input->post('uid');
		$pid=$this->haspraise($uid,$toid);
		
		if($pid>0){
			$fields = array(
					'status'	=>$this->input->post('action')
			);
			$this->db->set($fields);
			$this->db->where('id', $pid);
			return $this->db->update($this->p_table);
		}
		else{
			$fields = array(
					'praisetoid'	=> $toid,
					'uid'	=>$uid,
					'praisetype'	=>$this->input->post('ptype'),
					'status'	=>$this->input->post('action')
			);
			$this->db->set($fields);
			$this->db->insert($this->p_table);
			return $this->db->insert_id();
		}
		
	}
	function modifypraise($cid,$ac){
		$this->db->where('comment_id', $cid);
		$query = $this->db->get($this->c_table);
		$row = $query->row();
		$pnum=$row->praise_num;
		if($ac==0){
			$mpnum=$pnum-1;
		}
		else{
			$mpnum=$pnum+1;
		}
		$fields = array(
							'praise_num'	=>$mpnum
						);
		$this->db->set($fields);
		$this->db->where('comment_id', $cid);
		return $this->db->update($this->c_table);
	}
	function modifyreplypraise($cid,$ac){
		$this->db->where('id', $cid);
		$query = $this->db->get($this->r_table);
		$row = $query->row();
		$pnum=$row->praise_num;
		$mpnum=$pnum+1;
		$fields = array(
							'praise_num'	=>$mpnum
						);
		$this->db->set($fields);
		$this->db->where('id', $cid);
		return $this->db->update($this->r_table);
	}
	function hascomment($sid,$uid){
		$this->db->where('sch_id', $sid);
		$this->db->where('user_id', $uid);
		$query = $this->db->get($this->s_table);
		if($query->num_rows()>0){
			$row = $query->row(); 
			return $row->id;
		}
		else {
			return 0;
		}
	}
	
	function commentscore(){
		$sid=$this->input->post('sid');
		$uid=$this->input->post('uid');
		$scoreid=$this->hascomment($sid,$uid);
		if($scoreid>0){
			$fields = array(
							'score'	=>$this->input->post('score')
						);
			$this->db->set($fields);
			$this->db->where('id', $scoreid);
			return $this->db->update($this->s_table);
		}
		else{
			$fields = array(
							'sch_id'	=> $sid,
							'user_id'	=>$uid,
							'score'	=>$this->input->post('score')
						);
			$this->db->set($fields);
			$this->db->insert($this->s_table);
			return $this->db->insert_id();
		
		}
	}
	
	function hasfocus($uid,$sid){
		$this->db->where('sch_id', $sid);
		$this->db->where('uid', $uid);
		
		$query = $this->db->get($this->f_table);
		if($query->num_rows()>0){
			$row = $query->row(); 
			return $row->id;
		}
		else {
			return 0;
		}
	}
	function focus(){
		$sid=$this->input->post('sid');
		$uid=$this->input->post('uid');
		$fid=$this->hasfocus($uid,$sid);
		if($fid>0){
			$fields = array(
							'status'	=>$this->input->post('status')
						);
			$this->db->set($fields);
			$this->db->where('id', $fid);
			return $this->db->update($this->f_table);
		}
		else{
			$fields = array(
							'sch_id'	=> $sid,
							'uid'	=>$uid,
							'status'	=>$this->input->post('status')
						);
			$this->db->set($fields);
			$this->db->insert($this->f_table);
			return $this->db->insert_id();
		
		}
	}
	
}