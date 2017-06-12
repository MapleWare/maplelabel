<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order_model extends CI_Model 
{
    var $table = 'sales_order ord';
    var $column_order = array(null, 'ord.sc_ordered_id','ord.ordered_date'); //set column field database for datatable orderable
    var $column_search = array('ord.sc_ordered_id','ord.ordered_date','channel.sc_market','ord.order_title','ord.order_user_name'); //set column field database for datatable searchable 
    var $order = array('ord.sc_ordered_id' => 'asc'); // default order 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_query()
    {
    	$this->db->select('ord.sc_ordered_id, 
	    				   ord.ordered_date, 
	    				   channel.sc_market,
	    				   ord.delivery_status,
	    				   ord.print_status,
	    				   ord.order_user_name,
	    				   ord.order_title,
	    				   ord.paid_item_cnt as cnt,
	    				   ord.paid_amount as amount, 
	    				   ord.feedback_point as feedback_score, 
	    				   shipto.address_owner,
	    				   shipto.city_name,
	    				   shipto.country_code,
	    				   shipto.country_name,
	    				   shipto.name,
	    				   shipto.postal_code,
	    				   shipto.stateorprovince,
	    				   shipto.street1,
	    				   shipto.street2,
	    				   shipfrom.seller_company_name,
	    				   shipfrom.seller_country,
	    				   shipfrom.seller_first_name,
	    				   shipfrom.seller_last_name,
	    				   shipfrom.seller_street1,
	    				   shipfrom.seller_street2,
	    				   shipfrom.seller_postal_code');
        $this->db->from($this->table);
        $this->db->join('sales_channel channel', 'ord.sales_channel_id = channel.id', 'inner');
        $this->db->join('sales_order_ship_from shipfrom', 'ord.id = shipfrom.sales_order_id', 'inner');
        $this->db->join('sales_order_ship_to shipto', 'ord.id = shipto.sales_order_id', 'left');
		$this->db->where('ord.ol_user_id', 1);
		$where = "ord.ordered_date between DATE_ADD(NOW(), interval -60 day ) and NOW()";
		$this->db->where($where);

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

    function get_orders()
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
		//print_r($_POST);die;
        $query = $this->db->get();
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
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }


    
}
