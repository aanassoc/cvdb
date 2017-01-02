<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Degree_model extends CI_Model {

    public function __construct(){
        // Call the Model constructor
        parent::__construct();
    }//

    public function addDegree($insArr){
        $this->db->insert( TBL_DEGREES , $insArr);
        return true;
    }//

    public function getAllDegrees(){
        $this->db->select('*');
        $this->db->order_by("title", "ASC");
        $resultSet =  $this->db->get(TBL_DEGREES);
        $result = $resultSet->result_array();
        return $result;
    }
    public function getDegreeById($id){
        $this->db->select('*');
        $resultSet =  $this->db->get_where(TBL_DEGREES , array('id'=>$id));
        $result = $resultSet->row_array();
        return $result;
    }//

    public function updateDegree($id,$updateArr){
        $this->db->where('id',$id);
        $this->db->update(TBL_DEGREES,$updateArr);
        //echo $this->db->last_query();
        return true;
    }

    public function deleteDegree($id){
        $this->db->delete(TBL_DEGREES , array('id' => $id));
    }

    public function getDegreeByConsId($cons_id){
        $query="SELECT
                degree.title,
                degree.id,
                cons.consultantId
                FROM ".TBL_DEGREES ." AS degree
                INNER JOIN ".TBL_CONSULTANTS ." AS cons
                ON
                degree.id = cons.degree
                WHERE
                cons.consultantId = '".$cons_id."'";

        $resultSet = $this->db->query($query);
        $result = $resultSet->row_array();
        return $result;
    }


}//
?>