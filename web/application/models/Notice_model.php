<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notice_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
	
	public function create($values) 
	{
		$this->db->set($values);
		$this->db->insert('notice');

		$insert_id = $this->db->insert_id();
		if ($insert_id>0) 
			return $insert_id;
		return false;
	}

	public function edit($values, $id)
	{
		$this->db->set($values);
		$this->db->where('id', $id);
		$this->db->update('notice');
		if ($this->db->affected_rows())
			return true;
		return false;
	}

	public function get($type, $show = 'Y')
	{
		$this->db->select("id, subject, content, created, content_type, show_yn");
		$this->db->where("content_type", $type);
		$this->db->where("show_yn", $show);
		$res = $this->db->get('notice');

		if ($res->num_rows()>0)
			return $res->result_array();
		return 0;
	
	}

	public function getmaxid()
	{
		$this->db->select_max('id');
		return $this->db->get('sales_channel')->row_array()['id'];
	}
}