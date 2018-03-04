<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Notice_model extends CI_Model
{
    function listingCount($searchText = '')
    {
        $this->db->select('BaseTbl.id, BaseTbl.subject, BaseTbl.content, BaseTbl.hitcount, BaseTbl.content_type, BaseTbl.show_yn');
        $this->db->from('notice as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.subject  LIKE '%".$searchText."%'
                            OR  BaseTbl.content  LIKE '%".$searchText."%'
                            OR  BaseTbl.content_type  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        //$this->db->where('BaseTbl.isDeleted', 0);
        //$this->db->where('BaseTbl.roleId !=', 1);
        $query = $this->db->get();
        
        return count($query->result());
    }
    
    function listing($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.id, BaseTbl.subject, BaseTbl.content, BaseTbl.hitcount, BaseTbl.content_type, BaseTbl.show_yn');
        $this->db->from('notice as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.subject  LIKE '%".$searchText."%'
                            OR  BaseTbl.content  LIKE '%".$searchText."%'
                            OR  BaseTbl.content_type  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        //$this->db->where('BaseTbl.isDeleted', 0);
        //$this->db->where('BaseTbl.roleId !=', 1);
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    
    function addnewnotice($info)
    {
        $this->db->trans_start();
        $this->db->insert('notice', $info);

        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    function getinfo($id)
    {
        $this->db->select('BaseTbl.id, BaseTbl.subject, BaseTbl.content, BaseTbl.hitcount, BaseTbl.content_type, BaseTbl.show_yn');
        $this->db->from('notice as BaseTbl');
        // $this->db->where('isDeleted', 0);
		// $this->db->where('roleId !=', 1);
        $this->db->where('id', $id);
        $query = $this->db->get();
        
        return $query->result();
    }
    
    function editnotice($info, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('notice', $info);
        
        return TRUE;
    }
    
    function delete($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('notice', array('id' => $id));
        
        return $this->db->affected_rows();
    }

    function getmaxid()
    {
        $this->db->select_max('id');
        return $this->db->get('notice')->row_array()['id'];
    }
}

  