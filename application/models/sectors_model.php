<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sectors_model extends CI_Model {

    public function __construct(){
        // Call the Model constructor
        parent::__construct();
    }//

    public function addsector($insArr){
        $this->db->insert( TBL_SECTORS , $insArr);
        return true;
    }//

    public function getAllSectors(){
        $this->db->select('*');
        $this->db->order_by("sector", "ASC");
        $resultSet =  $this->db->get(TBL_SECTORS);
        $result = $resultSet->result_array();
        return $result;
    }
    public function getSectorById($sector_id){
        $this->db->select('*');
        $resultSet =  $this->db->get_where(TBL_SECTORS , array('sectorId'=>$sector_id));
        $result = $resultSet->row_array();
        return $result;
    }//

    public function updateSector($sector_id,$updateArr){
        $this->db->where('sectorId',$sector_id);
        $this->db->update(TBL_SECTORS,$updateArr);
        //echo $this->db->last_query();
        return true;
    }

    public function deleteSector($sector_id){
        $this->db->delete(TBL_SECTORS , array('sectorId' => $sector_id));
    }

    public function getSectorByConsId($cons_id){
        $query="SELECT
                sec.sector,
                sec.sectorId,
                cons.consultantId
                FROM ".TBL_SECTORS ." AS sec
                INNER JOIN ".TBL_CONSULTANTS ." AS cons
                ON
                sec.sectorId = cons.sector
                WHERE
                cons.consultantId = '".$cons_id."'";

        $resultSet = $this->db->query($query);
        $result = $resultSet->row_array();
        return $result;
    }
	
	public function getAllSectorByConsId($cons_id){
		$qry = "
				SELECT 
				asg.consultant_id,
				asg.sector_id,
				sec.sectorId,
				sec.sector
				
				FROM
				" . TBL_ASSIGN_SECTOR . " AS asg
				INNER JOIN 
				" . TBL_SECTORS . " AS sec
				ON
				asg.sector_id = sec.sectorId
				WHERE 
				asg.consultant_id = ".$cons_id;
		//echo $qry . '<br /><br /><br />';
		$resultSet = $this->db->query($qry);
        $result = $resultSet->result_array();
        return $result;
  
	}
	
	public function getSubSectorByConsId($cons_id){
		$qry = "
				SELECT 
				asg.consultant_id,
				asg.subsector_id,
				sec.id,
				sec.title
				
				FROM
				" . TBL_ASSIGN_SUBSECTORS . " AS asg
				INNER JOIN 
				" . TBL_SUBSECTOR . " AS sec
				ON
				asg.subsector_id = sec.id
				WHERE 
				asg.consultant_id = ".$cons_id;
		//echo $qry . '<br /><br /><br />';
		$resultSet = $this->db->query($qry);
        $result = $resultSet->result_array();
        return $result;
	}
	
}//
?>