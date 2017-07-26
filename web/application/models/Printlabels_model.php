<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Printlabels_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
	
	function get_print_labels()
	{
		$this->db->select('id, 
						  concat(cols, " x ", rows ) as cols_rows, 
						  manufacturer,
						  label_paper_name,
						  label_paper_code');
        $this->db->from('label_paper');
        $query = $this->db->get();
		return $query->result_array();
	}

	function get_info($id, $group = NULL)
	{
		$this->db->select('id as origin_label_paper_id, concat(cols, " x ", rows) as cols_rows, a.*');
		$this->db->from('label_paper a');
		$this->db->where('(ol_user_id = 0 and id not in (select parent_label_paper_id from label_paper child where ol_user_id = '.$id.')) or ol_user_id = '.$id);
		$this->db->order_by('parent_label_paper_id');
		if ($group != NULL) $this->db->group_by($group); 

        $query = $this->db->get();
        //echo $this->db->last_query();
		return $query->result_array();
	}

	function get($id)
	{
		$this->db->select('*, concat(cols, " x ", rows) as cols_rows');
		$this->db->where('id', $id);
		// $this->db->where('parent_label_paper_id', $id);
        $query = $this->db->get('label_paper');
        // echo $this->db->last_query();
		if ($query->num_rows()>0)
			return $query->row_array();
		return 0;
	}

	function detail($uid, $id)
	{
		$this->db->select('*, concat(cols, " x ", rows) as cols_rows');
		$this->db->where('ol_user_id', $uid);
		$this->db->where('parent_label_paper_id', $id);
        $query = $this->db->get('label_paper');
        
		if ($query->num_rows()>0)
			return $query->row_array();
		return 0;
	}

	function create($info)
    {
        $this->db->insert('label_paper', $info);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function edit($id, $info)
    {
		$this->db->where('id', $id);
        $this->db->update('label_paper', $info);
        
        return TRUE;
    }

	// function get_info($field, $group = true)
	// {
	// 	$this->db->select($field);
 //        $this->db->from('label_paper');
 //        if ($group) $this->db->group_by($field); 
 //        $query = $this->db->get();
	// 	return $query->result_array();
	// }
}