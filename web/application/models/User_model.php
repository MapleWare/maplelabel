<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
	
	function get_user($email, $pwd)
	{
		$this->db->where('email', $email);
		$this->db->where('pwd', md5($pwd));
        $query = $this->db->get('ol_user');
		return $query->result();
	}
	
	// get user
	function get_user_by_id($id)
	{
		$this->db->where('id', $id);
        $query = $this->db->get('ol_user');
		return $query->result();
	}
	
	// insert
	function insert_user($data)
    {
		if ($this->db->insert('ol_user', $data))
		{
			$record['id'] = $this->db->insert_id();
			$record['success'] = true;
		}
		else
			$record['success'] = false;

		return $record;
	}
}?>