<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seller_msg_model extends CI_Model
{
	var $column_order = array(null, 'seller_msg_template.id'); 
    var $column_search = array('seller_msg_template.seller_msg'); 
    var $order = array('seller_msg_template.id' => 'asc'); 

	function __construct()
    {
        parent::__construct();
    }

    public function create($values) 
	{
		$this->db->set($values);
		$this->db->insert('seller_msg_template');

		$insert_id = $this->db->insert_id();
		if ($insert_id>0) 
			return $insert_id;
		return false;
	}

    public function edit($values,$id)
	{
		$this->db->set($values);
		$this->db->where('id', $id);
		$this->db->update('seller_msg_template');
		if ($this->db->affected_rows())
			return true;
		return false;
	}

	public function delete($id)
	{
		$this->db->delete('seller_msg_template', array('id' => $id));
		return $this->db->affected_rows();
	}
	
	private function _get_query()
    {
    	$this->db->select('seller_msg_template.id,
    					   seller_msg_template.seller_msg');
        $this->db->from('seller_msg_template');
        $this->db->join('ol_user', 'seller_msg_template.ol_user_id = ol_user.id', 'left');
		$this->db->where('seller_msg_template.ol_user_id', $this->session->userdata('uid'));

        $i = 0;
        foreach ($this->column_search as $emp) // loop column 
        {
			if (isset($_POST['search']['value']) && !empty($_POST['search']['value']))
			{
				$_POST['search']['value'] = $_POST['search']['value'];
			} 
			else
				$_POST['search']['value'] = '';
			
			if ($_POST['search']['value']) // if datatable send POST for search
			{
				if($i===0) // first loop
				{
					$this->db->group_start();
					$this->db->like($emp, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($emp, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
    }

    function get_msg()
    {
        $this->_get_query();
		if(isset($_POST['length']) && $_POST['length'] < 1) {
			$_POST['length']= '10';
		} else
		$_POST['length']= $_POST['length'];
		
		if(isset($_POST['start']) && $_POST['start'] > 1) {
			$_POST['start']= $_POST['start'];
		}
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->_get_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

}
