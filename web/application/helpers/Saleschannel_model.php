<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Saleschannel_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
	
	public function create($values1, $values2) 
	{
		$this->db->set($values1);
		$this->db->insert('sales_channel');

		$insert_id = $this->db->insert_id();
		if ($insert_id>0) 
			return $insert_id;
		return false;
	}

	public function edit($values,$id)
	{
		$this->db->set($values);
		$this->db->where('ol_user_id', $id);
		$this->db->where('sc_market', 'ebay');
		$this->db->update('sales_channel');
		if ($this->db->affected_rows())
			return true;
		return false;
	}

	public function get_user_channel($id, $channel = 'ebay')
	{
		$this->db->select("*");
		$this->db->join('ol_user', 'ol_user.id = sales_channel.ol_user_id', 'left');
		$this->db->where("ol_user.id", $id);
		$this->db->where("sales_channel.sc_market", $channel);
		$res = $this->db->get('sales_channel');

		if ($res->num_rows()>0)
			return $res->row_array();
		return 0;
	
	}

	public function get_channel($id)
	{
		$this->db->select("*");
		$this->db->where("id", $id);
		$res = $this->db->get('sales_channel');

		if ($res->num_rows()>0)
			return $res->row_array();
		return 0;
	
	}

	public function getmaxid()
	{
		$this->db->select_max('id');
		return $this->db->get('sales_channel')->row_array()['id'];
	}
}