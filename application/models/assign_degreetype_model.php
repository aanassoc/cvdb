<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Assign_degreetype_model extends CI_Model {

    public function __construct(){
        // Call the Model constructor
        parent::__construct();
    }//

    public function adddegreetype($insArr){
        $this->db->insert( TBL_ASSIGN_DEGREETYPE , $insArr);
        return true;
    }//
   public function addtheme($insArr4){
        $this->db->insert( TBL_ASSIGN_THEME , $insArr4);
        return true;
    }//

    public function getDegreetypeById($consultantId){
        $this->db->select('*');
        $resultSet =  $this->db->get_where(TBL_ASSIGN_DEGREETYPE , array('consultant_id'=>$consultantId));
        $result = $resultSet->result_array();
        return $result;
    }//

    public function deleteDegreetypeById($consultantId){
        $this->db->delete(TBL_ASSIGN_DEGREETYPE , array('consultant_id' => $consultantId));
    }


}//
?>