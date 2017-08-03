<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order_model extends CI_Model 
{
    var $table = 'sales_order ord';
    var $column_order = array(null, 'ord.sc_ordered_id','ord.ordered_date'); //set column field database for datatable orderable
    var $column_search = array('ord.sc_ordered_id','ord.ordered_date','channel.sc_market','ord.order_title','ord.order_user_name'); //set column field database for datatable searchable 
    var $order = array('ord.created' => 'desc'); // default order 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }



    public function get_specific_order($id)
    {
    	$this->db->select('ord.id,
    					   ord.sc_ordered_id, 
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
	    				   shipto.phone_no as shipto_phone_no,
	    				   shipfrom.seller_company_name,
	    				   shipfrom.seller_country,
	    				   shipfrom.seller_first_name,
	    				   shipfrom.seller_last_name,
	    				   shipfrom.seller_street1,
	    				   shipfrom.seller_street2,
	    				   shipfrom.seller_postal_code,
	    				   shipfrom.city as seller_city,
	    				   shipfrom.stateorprovice as seller_stateorprovice,
	    				   shipfrom.phone_no as seller_phone_no,
	    				   shipitem.item_weight,
	    				   shipitem.item_weight_unit,
	    				   shipitem.item_depth,
	    				   shipitem.item_depth_unit,
	    				   shipitem.item_price,
	    				   shipitem.item_price_currency,
	    				   msg_template.seller_msg');
        $this->db->from($this->table);
        $this->db->join('sales_channel channel', 'ord.sales_channel_id = channel.id', 'left');
        $this->db->join('sales_order_ship_from shipfrom', 'ord.id = shipfrom.sales_order_id', 'left');
        $this->db->join('sales_order_ship_item shipitem', 'ord.id = shipitem.sales_order_id', 'left');
        $this->db->join('sales_order_ship_to shipto', 'ord.id = shipto.sales_order_id', 'left');

        $this->db->join('print_list printlist', 'ord.id = printlist.sales_order_id', 'left');
        $this->db->join('seller_msg_template msg_template', 'printlist.seller_msg_template_id = msg_template.id', 'left');

		$this->db->where('ord.sc_ordered_id', $id);
		$this->db->order_by('ord.id DESC');
		//$where = "ord.ordered_date between DATE_ADD(NOW(), interval -60 day ) and NOW()";
		//$this->db->where($where);

		$query = $this->db->get();
		// echo $this->db->last_query();
		return $query->row_array();
    }

	public function edit($values,$id)
	{
		$this->db->set($values);
		$this->db->where('sc_ordered_id', $id);
		$this->db->update('sales_order');
		if ($this->db->affected_rows())
			return true;
		return false;
	}

    private function _get_query($custom_where = '', $dates = array())
    {
    	$this->db->select('ord.id,
    					   ord.sc_ordered_id, 
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
	    				   shipto.phone_no as shipto_phone_no,
	    				   shipfrom.seller_company_name,
	    				   shipfrom.seller_country,
	    				   shipfrom.seller_first_name,
	    				   shipfrom.seller_last_name,
	    				   shipfrom.seller_street1,
	    				   shipfrom.seller_street2,
	    				   shipfrom.seller_postal_code,
	    				   shipfrom.city as seller_city,
	    				   shipfrom.stateorprovice as seller_stateorprovice,
	    				   shipfrom.phone_no as seller_phone_no,
	    				   shipitem.item_weight,
	    				   shipitem.item_weight_unit,
	    				   shipitem.item_depth,
	    				   shipitem.item_depth_unit,
	    				   shipitem.item_price,
	    				   shipitem.item_price_currency,

	    				   printlist.created as print_date,
	    				   printlist.pdf_down_cnt,
	    				   printlist.is_ship_from,
	    				   printlist.is_ship_to,
	    				   printlist.is_cn22,
	    				   printlist.pdf_file,
	    				   printlist.is_print_comment,
	    				   printlog.start_point');
        $this->db->from($this->table);
        $this->db->join('sales_channel channel', 'ord.sales_channel_id = channel.id', 'left');
        $this->db->join('sales_order_ship_from shipfrom', 'ord.id = shipfrom.sales_order_id', 'left');
        $this->db->join('sales_order_ship_item shipitem', 'ord.id = shipitem.sales_order_id', 'left');
        $this->db->join('sales_order_ship_to shipto', 'ord.id = shipto.sales_order_id', 'left');


        $this->db->join('print_list printlist', 'ord.id = printlist.sales_order_id', 'left');
        $this->db->join('print_log printlog', 'printlist.id = printlog.print_list_id', 'left');

		$this->db->where('ord.ol_user_id', $this->session->userdata('uid'));
		$where = "ord.ordered_date between DATE_ADD(NOW(), interval -180 day ) and NOW()";
		if (count($dates)>0) $where = "printlist.created between '".$dates['from_date']."' and DATE_ADD('".$dates['to_date']."', INTERVAL 1 DAY)";
		$this->db->where($where);

		if ($custom_where != '') $this->db->where($custom_where);

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

    function get_orders($where = '', $dates = array())
    {
        $this->_get_query($where, $dates);
		if(isset($_POST['length']) && $_POST['length'] < 1) {
			$_POST['length']= '10';
		} else
		$_POST['length']= $_POST['length'];
		
		if(isset($_POST['start']) && $_POST['start'] > 1) {
			$_POST['start']= $_POST['start'];
		}
        $this->db->limit($_POST['length'], $_POST['start']);
		// print_r($_POST);die;
        $query = $this->db->get();
        // echo $this->db->last_query();
        return $query->result();
    }

    function count_filtered($where = '', $dates = array())
    {
        $this->_get_query($where, $dates);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all($where = '', $dates = array())
    {
        //$this->db->from($this->table);
        $this->_get_query($where, $dates);
        $query = $this->db->get();
        return $query->num_rows();
        // return $this->db->count_all_results();
    }



}
