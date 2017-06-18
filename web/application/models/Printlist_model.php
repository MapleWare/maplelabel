<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Printlist_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
	
	public function create($values1, $values2) 
	{
		$this->db->set($values1);
		$this->db->insert('print_list');

		$insert_id = $this->db->insert_id();
		if ($insert_id>0) 
		{
			$this->db->set(array('print_list_id'=>$insert_id,
								 'start_point'=>$values2['start_point'],));
			$this->db->insert('print_log');
			$this->db->insert_id();
			return $insert_id;
		}
		return false;
	}

	public function edit($values,$id)
	{
		$this->db->set($values);
		$this->db->where('id', $id);
		$this->db->update('print_list');
		if ($this->db->affected_rows())
			return true;
		return false;
	}

	public function get_order($id)
	{
		$this->db->select("*");
		$this->db->where("sales_order_id", $id);
		$res = $this->db->get('print_list');

		if ($res->num_rows()>0)
			return $res->row_array();
		return 0;
	
	}

	public function getmaxid()
	{
		$this->db->select_max('id');
		return $this->db->get('print_list')->row_array()['id'];
	}
}