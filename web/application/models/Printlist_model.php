<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Printlist_model extends CI_Model
{
	var $column_order = array(null, 'pl.id','pl.created'); //set column field database for datatable orderable
    var $column_search = array('pl.ship_method'); //set column field database for datatable searchable 
    var $order = array('pl.id' => 'asc'); // default order 

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
			$this->deduct_subscript();
			// $this->db->set(array('print_list_id'=>$insert_id,
			// 					 'start_point'=>$values2['start_point'],));
			// $this->db->insert('print_log');
			// $this->db->insert_id();
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
		{
			$this->deduct_subscript();
			return true;
		}
		return false;
	}

	public function deduct_subscript()
	{
		$this->db->set('remaining_cnt', 'remaining_cnt-1', FALSE);
		$this->db->set('status', 'active');
		$this->db->where('ol_user_id', $this->session->userdata('uid'));
		$this->db->update('subscript_list');
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

	private function _get_query($custom_where = '', $dates = array())
    {
    	$this->db->select("pl.id,
    						pl.click_id, 
    						so.sc_ordered_id,
						    pl.created,
						    pl.pdf_file,
						    case when pl.ship_method = 'post_office' then '우체국'
							     when pl.ship_method = 'fedex' then 'Fedex'
							     when pl.ship_method = 'dhl' then 'DHL' 
							end as ship_method_name,
						    case when pl.delivery_type = 'document' then '서장'
							     when pl.delivery_type = 'cn22' then '소형포장(CN22)'
							     when pl.delivery_type = 'kpacket' then 'K-Packet'
							     when pl.delivery_type = 'ems' then 'EMS' 
							end as delivery_type_name,
							pl.is_ship_from, 
							pl.is_ship_to, 
							pl.is_cn22,
							pl.is_print_comment,
							pl.is_print_logo,
							lp.label_paper_name,
							count(*) as count");
        $this->db->from('print_list pl');
        $this->db->join('label_paper lp', 'pl.label_paper_id = lp.id', 'left');
        $this->db->join('sales_order so', 'pl.sales_order_id = so.id', 'left');

		$this->db->where('pl.ol_user_id', 1);

		$where = "pl.created between DATE_ADD(NOW(), interval -60 day ) and NOW()";
		if (count($dates)>0) $where = "pl.created between '".$dates['from_date']."' and DATE_ADD('".$dates['to_date']."', INTERVAL 1 DAY)";
		$this->db->where($where);

		if ($custom_where != '') $this->db->where($custom_where);

		$this->db->group_by(array("pl.click_id", 
								  "pl.ship_method", 
								  "pl.delivery_type", 
								  "pl.is_ship_from", 
								  "pl.is_ship_to",
								  "pl.is_cn22", 
								  "pl.is_print_comment", 
								  "pl.is_print_logo", 
								  "lp.label_paper_name"));

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

    function get_printlist($where = '', $dates = array())
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
        //echo $this->db->last_query();
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




    private function _get_query_epost($click_id)
    {
    	$this->db->select("pl.sales_order_id, 
    						sc.sc_name, 
    						so.order_title,
    						so.paid_item_cnt, 
    						so.paid_amount, 
    						so.paid_amount_currency");
        $this->db->from('print_list pl');
        $this->db->join('sales_order so', 'pl.sales_order_id = so.id', 'left');
        $this->db->join('sales_channel sc', 'so.sales_channel_id = sc.id', 'left');
		$this->db->where('pl.click_id', $click_id);

        $i = 0;
        foreach ($this->column_search as $emp) // loop column 
        {
			if (isset($_POST['search']['value']) && !empty($_POST['search']['value']))
				$_POST['search']['value'] = $_POST['search']['value'];
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
					$this->db->or_like($emp, $_POST['search']['value']);

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
    }

    function get_epost($click_id)
    {
        $this->_get_query_epost($click_id);
		if (isset($_POST['length']) && $_POST['length'] < 1)
			$_POST['length']= '10';
		else
			$_POST['length']= $_POST['length'];
		
		if (isset($_POST['start']) && $_POST['start'] > 1)
			$_POST['start']= $_POST['start'];
		
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_epost_filtered($click_id)
    {
        $this->_get_query_epost($click_id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_epost_all($click_id)
    {
        $this->_get_query_epost($click_id);
        $query = $this->db->get();
        return $query->num_rows();
    }
}