<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

// @TODO: Get results only where they are set to active

class Membermodel extends CI_Model
{
	
	var $m_table = 'skeeter_member'; 	// Entries tabl

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
	function get_all_member()
	{
		$query = $this->db->get($this->m_table);
		return $query;
	}
	function get_member($id)
	{
	
		$query = $this->db->get_where($this->m_table, array('id' =>$id));
		
		return $query->row();	
	}
	
	function insert_member()
	{
	$fields = array(
						'username'	=> $this->input->post('username'),
						'password'	=>'zxc',
						'email'	=> $this->input->post('email'),
						'active'	=> 1,
						'qq'	=> $this->input->post('qq'),
						'birthday'	=> $this->input->post('birthday'),
						'score'	=> $this->input->post('score'),
						'status'	=> $this->input->post('status'),
						'sex'	=> $this->input->post('sex')
						);
		
		
		$this->db->set($fields);
		$this->db->insert($this->m_table);
		return $this->db->insert_id();
	}
	
		/**
	 * Add User
	 *
	 * Add user to the db
	 *
	 * @access	private
	 * @param	string	table, where
	 * @return	mixed
	 */
	function add_user($userdata)
	{		
		$this->db->set($userdata);
		$this->db->insert($this->m_table);
	}
	
	function update_member($id)
	{
	
		$fields = array(
						'username'	=> $this->input->post('username'),
						'email'	=> $this->input->post('email'),
						'qq'	=> $this->input->post('qq'),
						'birthday'	=> $this->input->post('birthday'),
						'score'	=> $this->input->post('score'),
						'status'	=> $this->input->post('status'),
						'sex'	=> $this->input->post('sex')
						);
		
		$this->db->set($fields);
		$this->db->where('id', $id);
		return $this->db->update($this->m_table);
	}
	function delete_mem($id)
	{
		return $this->db->delete( $this->m_table, array('id' => $id) );
	}
	/**
	 * Checks if $value for $field is already used
	 *
	 * @access	private
	 * @param	string	email
	 * @return	bool
	 */
	function check_unique($field, $value)
	{
		$this->db->select($field);
		$this->db->where($field, $value);
		$this->db->limit(1);
			
		return ($this->db->count_all_results($this->m_table) > 0) ? TRUE : FALSE;
	}
	
	/**
	 * Get Login Info
	 *
	 * Gets info needed for login
	 *
	 * @access	private
	 * @param	string	table, where
	 * @return	mixed
	 */
	function get_login_info($username)
	{
		
		$this->db->select('password, username,hash, email, id, status, active');
		$this->db->where('email', $username);
		$i = $this->db->get($this->m_table, 1, 0);

		return $var = ($i->num_rows() > 0) ? $i->row() : FALSE;
	}

	function get_loginuser($sch_id,$id)
	{
		$sql="select a.id,a.username, a.email, b.path, c.score, e.status from skeeter_member as a left join skeeter_avatar as b on a.id=b.uid 
		 left join skeeter_school_score as c on (c.sch_id=? and a.id=c.user_id) left join skeeter_focus as e on (e.sch_id=? and a.id=e.uid) where a.id=?";
		return $query = $this->db->query($sql,array($sch_id,$sch_id,$id))->row();
	}
		/**
	 * Increment failure count and set last login time
	 *
	 * @access	public
	 * @return	object	user object
	 */
	function increment_failures($id, $failed_so_far)
	{
		$now = time();
		$this->db->where('user_id', $id);
		
		if($failed_so_far < 4) // Not relevant beyond this point
		{
			$this->db->set('failed_logins', 'failed_logins + 1', FALSE);
		}
		
		$this->db->set('last_failure', $now);
		$this->db->update($this->m_table);
	}
	
	

}