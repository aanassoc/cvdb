<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Expertisemodel extends CI_Model {

    public function __construct(){
        // Call the Model constructor
        parent::__construct();
    }//

    public function addExpertise($insArr){
        $this->db->insert( TBL_EXPERTISE , $insArr);
        return true;
    }//

    public function getAllExpertise(){
        $this->db->select('*');
        $this->db->order_by("expertise", "ASC");
        $resultSet =  $this->db->get(TBL_EXPERTISE);
        $result = $resultSet->result_array();
        return $result;
    }
    public function getExpertiseById($expertiseId){
        $this->db->select('*');
        $resultSet =  $this->db->get_where(TBL_EXPERTISE , array('expertiseId'=>$expertiseId));
        $result = $resultSet->row_array();
        return $result;
    }//

    public function updateExpertise($expertiseId,$updateArr){
        $this->db->where('expertiseId',$expertiseId);
        $this->db->update(TBL_EXPERTISE,$updateArr);
        //echo $this->db->last_query();
        return true;
    }

    public function deleteExpertise($expertiseId){
        $this->db->delete(TBL_EXPERTISE , array('expertiseId' => $expertiseId));
    }
	
	
	public function addAssignExpertise($insArr){
		$this->db->insert( TBL_ASSIGN_EXPERTISE , $insArr);
        return true;
	}
	
	public function getExpertiseByConsultantId($consultantId){
        $this->db->select('*');
        $resultSet =  $this->db->get_where(TBL_ASSIGN_EXPERTISE , array('consultantId'=>$consultantId));
        $result = $resultSet->result_array();
        return $result;
    }//
	
	public function deleteAssignExpertise($consultantId){
        $this->db->delete(TBL_ASSIGN_EXPERTISE , array('consultantId' => $consultantId));
    }
	
	public function getAllExpertiseByConsultantId($consultantId){
		
		$qry = 	" SELECT 
					exp.expertiseId,
					exp.expertise
					
					FROM ".TBL_EXPERTISE." AS exp
					INNER JOIN ".TBL_ASSIGN_EXPERTISE." AS aexp
					ON
					exp.expertiseId = aexp.expertiseId
					WHERE 
					aexp.consultantId = ".$consultantId;
		$resultSet = $this->db->query( $qry );
        //echo $this->db->last_query() . '<br /><br />';
        $res = $resultSet->result_array();
        return $res;
	}
	
}//
?>