<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

// @TODO: Get results only where they are set to active

class Schoolmodel extends CI_Model
{
	
	var $s_table = 'skeeter_school_detail'; 	// Entries tabl
	    
	/**
	 * Constructor
	 *
	 * @access	public
	 */
	function Schoolmodel()
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
	function get_all_school()
	{
		$query = $this->db->get($this->s_table);
		return $query;
	}
	
	// --------------------------------------------------------------------
	
	
	/**
	 * Get a single entry by its ID
	 *
	 * @access	public
	 * @param	integer	Entry ID
	 * @return 	object	Entry
	 */
	function get_school($id)
	{
		/*$data = array(
              
               'sch_name' => '华中科技大学',
               'type' => 2,
                 'city' => 4,
                'address' => '湖北省武汉市珞瑜路1027号',
                'status' => 2
            );

		$this->db->insert('skeeter_school_detail', $data); */
		
		$query = $this->db->get_where($this->s_table, array('sch_id' =>$id));
		
		return $query->row();	
	}
	function get_school_image($id)
	{
		/*$data = array(
              
               'sch_name' => '华中科技大学',
               'type' => 2,
                 'city' => 4,
                'address' => '湖北省武汉市珞瑜路1027号',
                'status' => 2
            );

		$this->db->insert('skeeter_school_detail', $data); */
		
		$query = $this->db->get_where('skeeter_school_image', array('sch_id' =>$id));
		
		return $query;	
	}
	function get_school_comment($id)
	{
		$selectsql="select a.comment_id,a.school_id,a.content,a.create_time,a.uid,a.update_time, 
		a.praise_num,b.path,c.score,d.username from skeeter_school_comment as a left join skeeter_avatar as b 
		 on a.uid=b.uid left join skeeter_school_score as c on (a.school_id=c.sch_id and a.uid=c.user_id) 
		  left join skeeter_member as d on a.uid=d.id where a.school_id=?";
//select a.comment_id,a.school_id,a.content,a.create_time,a.uid,a.update_time,a.praise_num,b.path,c.score from skeeter_school_comment as a,skeeter_avatar as b,skeeter_school_score as c where a.school_id=4 and a.school_id=c.sch_id and a.uid=c.user_id and a.uid=b.uid
		$query = $this->db->query($selectsql,$id);
		//('skeeter_school_comment', array('school_id' =>$id));
		return $query;	
	}
	function get_school_reply($com_id)
	{
/*	$this->db->select('*');
$this->db->from('skeeter_school_reply');

$this->db->join('comments', 'comments.id = blogs.id', 'left');
*/
//$query = $this->db->get();a.praise_num,s
		$selectsql="select a.id,a.comment_id,a.school_id,a.uid,a.replayto_uid,a.content,a.create_time,a.praise_num,  
		 a.status,b.username as fuser,c.username as touser from skeeter_school_reply as a left join skeeter_member as b on a.uid=b.id 
		 left join skeeter_member as c on a.replayto_uid=c.id where a.comment_id=?";
		$query = $this->db->query($selectsql,$com_id);
		
		return $query;	
	}
	
	function insert_school()
	{
	
		$fields = array(
						'sch_name'	=> $this->input->post('sch_name'),
						'band'	=> $this->input->post('band'),
						'city'	=> $this->input->post('city'),
						'site'	=> $this->input->post('site'),
						'build_time'	=> '1988',
						'address'	=> $this->input->post('address'),
						'type'	=> $this->input->post('type'),
						'introduce'	=> '1988',
						'status'	=> '1'						
						);
		
		$this->db->set($fields);
		$this->db->insert($this->s_table);
		return $this->db->insert_id();
	}
	function update_school($id)
	{
	
		
		$fields = array(
						'sch_name'	=> $this->input->post('sch_name'),
						'band'	=> $this->input->post('band'),
						'city'	=> $this->input->post('city'),
						'site'	=> $this->input->post('site'),
						'address'	=> $this->input->post('address'),
						'type'	=> $this->input->post('type'),
						'district'	=> 12,
					/*	'tel'	=> '027-99999999',
						'country'	=> '中国',
						'province'	=> '湖北',
						'city'	=> '武汉',
						'band'	=> '211 985',
						'com_score'	=> 8,
						'com_num'	=> 12213,
						'introduce'	=> '学校占地面积21403平方米，现有30个教学班，在校学生近1500人。学校教职工总人数119人，其中特级教师2人，全国优秀教师4人，市优秀教师2人，区、市兼职教研员3人。',
						*/'status'	=> '1'						
						);
		$this->db->set($fields);
		$this->db->where('sch_id', $id);
		return $this->db->update($this->s_table);
	}
	function delete_sch($id)
	{
		return $this->db->delete( $this->s_table, array('sch_id' => $id) );
	}
	
   
}