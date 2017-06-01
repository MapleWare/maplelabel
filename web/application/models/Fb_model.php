<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Fb_model extends CI_Model{
	function __construct() {
		$this->tableName = 'ol_social_network';
		$this->primaryKey = 'id';
	}
	public function checkUser($data = array()){
		$this->db->select('id,ol_user_id');
		$this->db->from($this->tableName);
		$this->db->where(array('sn_site'=>$data['sn_site'],'sn_id'=>$data['sn_id']));
		$prevQuery = $this->db->get();
		$prevCheck = $prevQuery->num_rows();

		$returnData = array();
		
		if($prevCheck > 0){
			$prevResult = $prevQuery->row_array();

			//$data['modified'] = date("Y-m-d H:i:s");
			//$update = $this->db->update($this->tableName,$data,array('id'=>$prevResult['id']));
			// $userID = $prevResult['id'];
			$returnData['exist'] = true;
			$returnData['sn_id'] = $data['sn_id'];
			$returnData['id'] = $prevResult['id'];
			$returnData['ol_user_id'] = $prevResult['ol_user_id'];
		}else{
			$data['created'] = date("Y-m-d H:i:s");
			//$data['modified'] = date("Y-m-d H:i:s");
			$insert = $this->db->insert($this->tableName,$data);
			// $userID = $this->db->insert_id();
			$returnData['exist'] = false;
			$returnData['sn_id'] = $data['sn_id'];
			$returnData['id'] = $this->db->insert_id();
		}

		// return $userID?$userID:FALSE;
		return $returnData;
    }

    public function update($data = array(), $id)
    {
    	$update = $this->db->update($this->tableName,$data,array('id'=>$id));
    }

  //   public function getLastID()
  //   {
  //   	$this->db->select_max($this->primaryKey);
		// $this->db->from($this->tableName);
		// $query=$this->db->get();
		// return $query->row_array();
  //   }
}
