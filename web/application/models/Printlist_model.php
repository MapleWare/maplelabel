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

	public function getmaxid()
	{
		$this->db->select_max('id');
		return $this->db->get('print_list')->row_array()['id'];
	}
}