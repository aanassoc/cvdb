<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Assign_subsector_model extends CI_Model {

    public function __construct(){
        // Call the Model constructor
        parent::__construct();
    }//

    public function addsubsector($insArr){
        $this->db->insert( TBL_ASSIGN_SUBSECTORS , $insArr);
        return true;
    }//

    public function getSubsectorById($consultantId){
        $this->db->select('*');
        $resultSet =  $this->db->get_where(TBL_ASSIGN_SUBSECTORS , array('consultant_id'=>$consultantId));
        $result = $resultSet->result_array();
        return $result;
    }//

    public function deleteSubsectorById($consultantId){
        $this->db->delete(TBL_ASSIGN_SUBSECTORS , array('consultant_id' => $consultantId));
    }

    public function getSubsectorByConsId($cons_id){
        $query="SELECT
                s1.subsector_id,
                s2.title

                FROM ".TBL_ASSIGN_SUBSECTORS ." AS s1
                INNER JOIN ".TBL_SUBSECTOR ." AS s2
                ON
                s1.subsector_id = s2.id
                WHERE
                s1.consultant_id = '".$cons_id."'";

        $resultSet = $this->db->query($query);
        $result = $resultSet->result_array();
        return $result;
    }
    public function getthemeById($consultantId){
        $this->db->select('*');
        $resultSet =  $this->db->get_where(TBL_ASSIGN_THEME , array('consultant_id'=>$consultantId));
        $result = $resultSet->result_array();
        return $result;
    }//
    public function deletethemeById($consultantId){
        $this->db->delete(TBL_ASSIGN_THEME , array('consultant_id' => $consultantId));
    }
}//
?>