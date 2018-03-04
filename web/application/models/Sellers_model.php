<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sellers_model extends CI_Model
{
	var $column_order = array(null, 'sales_channel.id'); 
    var $column_search = array('sales_channel.sc_name'); 
    var $order = array('sales_channel.id' => 'asc'); 

	function __construct()
    {
        parent::__construct();
    }

    public function get($id)
	{
		$this->db->select("*");
		$this->db->where("ol_user_id", $id);
		$this->db->where("status", 'authorized');
		$this->db->order_by('id', 'desc');
		$res = $this->db->get('sales_channel');

		if ($res->num_rows()>0)
			return $res->result_array();
		return 0;
	
	}

    public function create($values) 
	{
		$this->db->set($values);
		$this->db->insert('sales_channel');

		$insert_id = $this->db->insert_id();
		if ($insert_id>0) 
			return $insert_id;
		return false;
	}

    public function edit($values,$id)
	{
		$this->db->set($values);
		$this->db->where('id', $id);
		$this->db->update('sales_channel');
		if ($this->db->affected_rows())
			return true;
		return false;
	}

	public function delete($id)
	{
		$this->db->delete('sales_channel', array('id' => $id));
		return $this->db->affected_rows();
	}
	
	private function _get_query()
    {
    	$this->db->select('sales_channel.id,
    					   sales_channel.sc_name');
        $this->db->from('sales_channel');
        $this->db->join('ol_user', 'sales_channel.ol_user_id = ol_user.id', 'left');
		$this->db->where('sales_channel.ol_user_id', 1);

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