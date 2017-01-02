<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subsector_model extends CI_Model {

    public function __construct(){
        // Call the Model constructor
        parent::__construct();
    }//

    public function addsubsector($insArr){
        $this->db->insert( TBL_SUBSECTOR , $insArr);
        return true;
    }//

    public function getAllSubSectors(){
        $this->db->select('*');
        $this->db->order_by("title", "ASC");
        $resultSet =  $this->db->get(TBL_SUBSECTOR);
        $result = $resultSet->result_array();
        return $result;
    }
    public function getSubSectorById($sector_id){
        $this->db->select('*');
        $resultSet =  $this->db->get_where(TBL_SUBSECTOR , array('id'=>$sector_id));
        $result = $resultSet->row_array();
        return $result;
    }//

    public function updateSubSector($sector_id,$updateArr){
        $this->db->where('id',$sector_id);
        $this->db->update(TBL_SUBSECTOR,$updateArr);
        //echo $this->db->last_query();
        return true;
    }

    public function deleteSubSector($sector_id){
        $this->db->delete(TBL_SUBSECTOR , array('id' => $sector_id));
    }



}//
?>