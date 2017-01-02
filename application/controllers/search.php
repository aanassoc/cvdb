<?php
//search.php
error_reporting(0);
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Search extends CI_Controller {

	/*
	* Contact constructor
	* Added by Danish Ejaz
	*/
	public function __construct(){
		parent::__construct();
		// check is user logged in else throw him out.
		is_admin_logged_in();
		$this->load->model('consultantmodel');
        $this->load->model('sectors_model');
        $this->load->model('subsector_model');
        $this->load->model('degree_model');
		$this->load->model('expertisemodel');
	}//
	
	public function index(){
	$userInfo = $this->session->userdata('UserData');
	
		$msg='';
		$error = "";
        $searchConsultants = array();
		$allConsultants = array();
		if(isset($_POST['btnSub'])){
			$txtsearch = $this->input->post('txtsearch');
			$allConsultants = $this->consultantmodel->getSearch($txtsearch);
			
			for($i=0;$i<count($allConsultants);$i++){
				$allConsultants[$i]['sectors'] = $this->sectors_model->getAllSectorByConsId($allConsultants[$i]['consultantId']);
			}
			
			for($i=0;$i<count($allConsultants);$i++){
				$allConsultants[$i]['subsectors'] = $this->sectors_model->getSubSectorByConsId($allConsultants[$i]['consultantId']);
			}
			
			if(count($allConsultants) > 0){
				$msg = 'Yes';
			}else{
				$msg = 'No';
			}
		}
        if(isset($_POST['btn_search'])){
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $nationality = $this->input->post('nationality');
            $experienceInYears = $this->input->post('experienceInYears');
            $subsector = $this->input->post('subsector');
            $degree = $this->input->post('degree');
            $city = $this->input->post('city');
            $language = $this->input->post('language');
			$expertise = $this->input->post('expertise');
			

            $flag = false;
            $qryStr = '';
            if($name != ''){
                $qryStr .= " cons.firstname LIKE '%".$name."%'  OR cons.lastname LIKE '%".$name."%' OR ";
                $flag = true;
            }

            if($email != ''){
                $qryStr .= " cons.email LIKE '%".$email."%' OR ";
                $flag = true;

            }

            if($nationality != ''){
                $qryStr .= " cons.nationality LIKE '%".$nationality."%' OR ";
                $flag = true;
            }

            if($experienceInYears != ''){
                $qryStr .= " cons.experienceInYears LIKE '%".$experienceInYears."%' OR ";
                $flag = true;
            }

            if($sector != ''){
                $qryStr .= " cons.sector = ".$sector." OR ";
                $flag = true;
            }

            if($subsector != ''){
                $qryStr .= " cvASub.subsector_id = ".$subsector." OR ";
                $flag = true;
            }


            if($experienceInYears != ''){
                $qryStr .= " cons.experienceInYears LIKE '%".$experienceInYears."%' OR ";
                $flag = true;
            }


            if($degree != ''){
                $qryStr .= " cons.degree = ".$degree." OR ";
                $flag = true;
            }
			if($city != ''){
                $qryStr .= " cons.city LIKE '%".$city."%' OR ";
                $flag = true;
            }
			if($language != ''){
                $qryStr .= " cons.language LIKE '%".$language."%' OR ";
                $flag = true;
            }
			
			if($expertise != ''){
				$qryStr .= " ae.expertiseId = " . $expertise . " OR ";
                $flag = true;
			}
			
            $qryStr = rtrim($qryStr , ' OR ');

            $searchConsultants = $this->consultantmodel->advancedsearch($flag ,$qryStr );
            if(count($searchConsultants) > 0){
                $msg = 'Yes';
            }else{
                $msg = 'No';
            }
			
			
			for($i=0;$i<count($searchConsultants);$i++){
				$searchConsultants[$i]['sectors'] = $this->sectors_model->getAllSectorByConsId($searchConsultants[$i]['consultantId']);
			}
			
			for($i=0;$i<count($searchConsultants);$i++){
				$searchConsultants[$i]['subsectors'] = $this->sectors_model->getSubSectorByConsId($searchConsultants[$i]['consultantId']);
			}
			
        }

        $consultants= $this->consultantmodel->getAllConsultants();
		
		
		
        if(isset($_POST['export_all'])){
            $this->load->library('zip');
            for($i=0;$i<count($consultants);$i++){
				if($consultants[$i]['consultantFile'] == '')
				{
					$error = 'File Not Available .';
				}else
				{
				
                $cv_file = $consultants[$i]['consultantFile'];
				
                $data = $cv_file;
                $path = './cv/';
                $this->zip->read_file($path.$data);
				}
            }
            $this->zip->download('all_cvs.zip');
        }
        elseif(isset($_POST['export_selected'])){
            if(count($_POST['consultant_id']) > 0){
                $this->load->library('zip');
                for($i=0;$i<count($_POST['consultant_id']);$i++){
                    $consultant = $this->consultantmodel->getConsultantById($_POST['consultant_id'][$i]);
					
                    if($consultant['consultantFile'] == '')
					{
					$error = 'No File Available.';
					}else
					{
						$cv_file = $consultant['consultantFile'];
						$data = $cv_file;
                        $path = './cv/';
                        $this->zip->read_file($path.$data);
						
                    }
                }
                $this->zip->download('selected_cvs.zip');
            }
            else{
                $error = "Please select consultants";
            }
        }
        
		$data['error'] = $error;
        $data['consultants'] = $consultants;
        $data['sectors'] = $this->sectors_model->getAllSectors();
        $data['subsectors'] = $this->subsector_model->getAllSubSectors();
        $data['degrees'] = $this->degree_model->getAllDegrees();
        $data['cites'] = $this->consultantmodel->getAllConsultants();
		$data['functionalExpertise'] = $this->expertisemodel->getAllExpertise();
		$data['allConsultants'] = $allConsultants;
        $data['searchConsultants'] = $searchConsultants;
		$data['msg'] = $msg;
		$data['userInfo'] = $userInfo;
		$this->load->view('search',$data);
		
	}//
}
?>