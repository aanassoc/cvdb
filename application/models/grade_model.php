<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grade_model extends CI_Model {

    public function __construct(){
        // Call the Model constructor
        parent::__construct();
    }//

    public function addgrade($insArr){
        $this->db->insert( TBL_GRADE , $insArr);
        return true;
    }//

    public function getAllgrades(){
        $this->db->select('*');
        $this->db->order_by("grade_id", "DESC");
        $resultSet =  $this->db->get(TBL_GRADE);
        $result = $resultSet->result_array();
        return $result;
    }
    public function getgradebyid($grade_id){
        $this->db->select('*');
        $resultSet =  $this->db->get_where(TBL_GRADE , array('grade_id'=>$grade_id));
        $result = $resultSet->row_array();
        return $result;
    }//

    public function updategrade($grade_id,$updateArr){
        $this->db->where('grade_id',$grade_id);
        $this->db->update(TBL_GRADE,$updateArr);
        //echo $this->db->last_query();
        return true;
    }

    public function delete_grade($grade_id){
        $this->db->delete(TBL_GRADE , array('grade_id' => $grade_id));
    }



}//
?>