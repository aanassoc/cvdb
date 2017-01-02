<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consultantmodel extends CI_Model {

	public function __construct(){
        // Call the Model constructor
        parent::__construct();
	}//

    public function addconsultant($insArr){
		$this->db->insert( TBL_CONSULTANTS , $insArr);
		 return $this->db->insert_id();
	}//
	  public function add_asignsector($insArr3){
		$this->db->insert( TBL_ASSIGN_SECTOR , $insArr3);
		 
	}//
    public function getsectorById($consultant_id){
        $this->db->select('*');
        $resultSet =  $this->db->get_where(TBL_ASSIGN_SECTOR , array('consultant_id'=>$consultant_id));
        $result = $resultSet->result_array();
        return $result;
    }//
	public function deletesectorById($consultant_id){
		$this->db->delete(TBL_ASSIGN_SECTOR , array('consultant_id' => $consultant_id));
	}
	public function getAllConsultants(){
        $this->db->select('*');
		$this->db->order_by("consultantId", "DESC");
        $resultSet =  $this->db->get(TBL_CONSULTANTS);
        $result = $resultSet->result_array();
        return $result;
    }

    public function getAllConsultantsWithPages($start,$limit){
        $this->db->select('*');
        $this->db->limit($limit,$start);
        $this->db->order_by("consultantId", "DESC");
        $resultSet =  $this->db->get(TBL_CONSULTANTS);
        //echo $this->db->last_query() ;
        $result = $resultSet->result_array();
        return $result;
    }

    public function getConsultantsCount(){
        $count = $this->db->count_all( TBL_CONSULTANTS );
        return $count;
    }//

	public function getConsultantById($consultantId){
		$this->db->select('*');
        $resultSet =  $this->db->get_where(TBL_CONSULTANTS , array('consultantId'=>$consultantId));
        $result = $resultSet->row_array();
        return $result;
	}//
	
	public function updateconsultant($consultantId,$updateArr){
		$this->db->where('consultantId',$consultantId);
        $this->db->update(TBL_CONSULTANTS,$updateArr);
		//echo $this->db->last_query();
        return true;
	}
	
	public function deleteConsultantById($consultantId){
		$this->db->delete(TBL_CONSULTANTS , array('consultantId' => $consultantId));
	}
	
	public function getSearch($str){
		$qry = " SELECT * FROM " . TBL_CONSULTANTS . " WHERE firstname LIKE '%".$str."%' OR lastname LIKE '%".$str."%' OR email LIKE '%".$str."%' GROUP BY consultantId ORDER BY firstname ";
		$resultSet = $this->db->query( $qry );
		//echo $this->db->last_query() . '<br /><br />';
		$speakers = $resultSet->result_array();
		return $speakers;
	}

    public function advancedsearch($flag ,$qryStr ){
       $qry = '';
       if($flag){
           $qry = " SELECT
                    cons.consultantId,
                    cons.firstname,
                    cons.lastname,
                    cons.email,
                    cons.nationality,
                    cons.experienceInYears,
					
                    cons.degree,
                    cons.city,
                    cons.language,
                    cvASub.subsector_id,
                    cvADeg.title
					

                    FROM
                    " . TBL_CONSULTANTS . " AS cons
                    INNER JOIN ".TBL_ASSIGN_SUBSECTORS." AS cvASub
                    ON
                    cons.consultantId = cvASub.consultant_id
                    INNER JOIN " . TBL_DEGREES . " AS cvADeg
                    ON
                    cvADeg.id = cons.degree
					LEFT JOIN ".TBL_ASSIGN_EXPERTISE." AS ae
					ON
					cons.consultantId = ae.consultantId
                    WHERE " . $qryStr . " GROUP BY consultantId ORDER BY cons.firstname ASC ";
                    //echo $qry . '<br />';

       }else{
           $qry = " SELECT * FROM " . TBL_CONSULTANTS ;
       }

        $resultSet = $this->db->query( $qry );
        //echo $this->db->last_query() . '<br /><br />';
        $searchRes = $resultSet->result_array();
        return $searchRes;

    }//

    public function CountConsultants(){
        $this->db->select('*');
        $resultSet =  $this->db->get(TBL_CONSULTANTS);
        $res = $resultSet->num_rows();
        return $res;
    }

    public function CountConsultantswithExperience(){
        $this->db->select('*');
        $resultSet =  $this->db->get_where(TBL_CONSULTANTS,array('experience'=>'Less than 5'));
        $res = $resultSet->num_rows();
        return $res;
    }

    public function CountConsultantswithExperienceInYears(){
        $this->db->select('*');
        $resultSet =  $this->db->get_where(TBL_CONSULTANTS,array('experienceInYears'=>'18+'));
        $res = $resultSet->num_rows();
        return $res;
    }
   public function consultantsmale(){
        $this->db->select('*');
        $resultSet =  $this->db->get_where(TBL_CONSULTANTS,array('gender'=>'Male'));
        $res = $resultSet->num_rows();
        return $res;
    }
   public function consultantsfemale(){
        $this->db->select('*');
        $resultSet =  $this->db->get_where(TBL_CONSULTANTS,array('gender'=>'Female'));
        $res = $resultSet->num_rows();
        return $res;
    }
   public function consultantnationals(){
        $this->db->select('*');
        $resultSet =  $this->db->get_where(TBL_ASSIGN_DEGREETYPE,array('degree_type'=>'National'));
        $res = $resultSet->num_rows();
        return $res;
    }
   public function consultanintInternational(){
        $this->db->select('*');
        $resultSet =  $this->db->get_where(TBL_ASSIGN_DEGREETYPE,array('degree_type'=>'International'));
        $res = $resultSet->num_rows();
        return $res;
    }
   public function getdegreename($id){
        $this->db->select('*');
        $resultSet =  $this->db->get_where(TBL_DEGREES , array('id'=>$id));
        $result = $resultSet->row_array();
        return $result;
    }//
    public function getsectorname($sector_id){
        $this->db->select('*');
        $resultSet =  $this->db->get_where(TBL_SECTORS , array('sectorId'=>$sector_id));
        $result = $resultSet->row_array();
        return $result;
    }//
	public function getsubsector($consultant_id){
        $query="
				SELECT
				cons.consultantId,
				sb.consultant_id,
				sb.subsector_id,
				sbti.id,
				sbti.title
				  
				FROM ".TBL_CONSULTANTS ."  AS cons
				INNER JOIN
				".TBL_ASSIGN_SUBSECTORS ." AS sb
				ON 
				cons.consultantId = sb.consultant_id
				INNER JOIN 
				".TBL_SUBSECTOR ." AS sbti
				ON 
				sb.subsector_id = sbti.id
				WHERE 
				cons.consultantId = ".$consultant_id."
				";
				
		$resultSet = $this->db->query($query);
        $result = $resultSet->result_array();
        return $result;
    }
	
	public function getsector($consultant_id){
        $query="
				SELECT
				cons.consultantId,
				sb.consultant_id,
				sb.sector_id,
				sbti.sectorId,
				sbti.sector
				  
				FROM ".TBL_CONSULTANTS ."  AS cons
				INNER JOIN
				".TBL_ASSIGN_SECTOR ." AS sb
				ON 
				cons.consultantId = sb.consultant_id
				INNER JOIN 
				".TBL_SECTORS ." AS sbti
				ON 
				sb.sector_id = sbti.sectorId
				WHERE 
				cons.consultantId = ".$consultant_id."
				";
				
		$resultSet = $this->db->query($query);
        $result = $resultSet->result_array();
        return $result;
    }

}//
?>