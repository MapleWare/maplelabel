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
}