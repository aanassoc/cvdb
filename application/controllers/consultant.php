<?php
//consultant.php
error_reporting(0);
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Consultant extends CI_Controller {

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
        $this->load->model('assign_subsector_model');
        $this->load->model('assign_degreetype_model');
		$this->load->model('grade_model');
		$this->load->model('expertisemodel');
        $this->load->library('form_validation');
	}//
	
	public function index(){
        $result_per_page = 40;
        $this->load->library('pagination');
        $config['base_url'] = $this->url->consultants() . '/index/';
        $config['total_rows'] = $this->consultantmodel->getConsultantsCount();
        $config['per_page'] = $result_per_page;

        $this->pagination->initialize($config);

        if($this->uri->segment(3)){
            $start = $this->uri->segment(3);

        }else{
            $start = 0;
        }
        $limit = $result_per_page;

        $allConsultants = $this->consultantmodel->getAllConsultantsWithPages($start,$limit);
		for($i=0;$i<count($allConsultants);$i++)
		{
			$degree = $this->consultantmodel->getdegreename($allConsultants[$i]['degree']);
			$allConsultants[$i]['degreename']= $degree['title'];
			$grade = $this->grade_model->getgradebyid($allConsultants[$i]['grade']);
			$allConsultants[$i]['Gradetitle']= $grade['grade_title'];
			
			$sub_sector = $this->consultantmodel->getsubsector($allConsultants[$i]['consultantId']);
			$allConsultants[$i]['subSector']= $sub_sector;
				
			$sector = $this->consultantmodel->getsector($allConsultants[$i]['consultantId']);
			$allConsultants[$i]['SectorTitle']= $sector;
			
			

		}
		$data['allConsultants'] = $allConsultants;
		
        $data["links"] = $this->pagination->create_links();

		$this->load->view('consultant-listing',$data);
	}//
	
	
	public function add(){
		$msg = '';
		if(isset($_POST['btnSub'])){

            if ($this->form_validation->run('Consultant') == TRUE):
                $filename = '';
                if($_FILES['consultantFile']['name'] != ''){
                    $config['upload_path'] = 'cv/';
                    $config['allowed_types'] = 'doc|docx|pdf';
                    $config['encrypt_name'] = TRUE;
                    $config['remove_spaces'] = TRUE;

                    $this->load->library('upload', $config);

                    if (  $this->upload->do_upload('consultantFile')){
                        $fileInfo = array('upload_data' => $this->upload->data());
                        $filename = $fileInfo['upload_data']['file_name'];
                    }
                }

                $insArr = array();
                $insArr['firstname'] = $this->input->post('firstname');
                $insArr['lastname'] = $this->input->post('lastname');
                $insArr['gender'] = $this->input->post('gender');
               
                $insArr['nationality'] = $this->input->post('nationality');
                $insArr['experienceInYears'] = $this->input->post('experienceInYears');
                $insArr['experience_type'] = $this->input->post('experience_type');
				$insArr['certification'] = $this->input->post('certification');
              
                //$insArr['expertise'] = $this->input->post('expertise');
                $insArr['mobile'] = $this->input->post('mobile');
                $insArr['landline'] = $this->input->post('landline');
                $insArr['email'] = $this->input->post('email');
                $insArr['degree'] = $this->input->post('degree');
                $insArr['decipline'] = $this->input->post('decipline');
                $insArr['grade'] = $this->input->post('grade');
                $insArr['address'] = $this->input->post('address');
                $insArr['city'] = $this->input->post('city');
                $insArr['language'] = $this->input->post('language');
                $insArr['consultantFile'] = $filename;
                $insArr['dateAdded'] = date('Y-m-d H:i:s');

                $id = $this->consultantmodel->addconsultant($insArr);
                for($i=0;$i<count($_POST['subsector']);$i++){
                    $insArr2 = array();
                    $insArr2['consultant_id'] = $id;
                    $insArr2['subsector_id'] = $_POST['subsector'][$i];

                    $this->assign_subsector_model->addsubsector($insArr2);
                }
				
				for($i=0;$i<count($_POST['sector']);$i++){
                    $insArr3 = array();
                    $insArr3['consultant_id'] = $id;
                    $insArr3['sector_id'] = $_POST['sector'][$i];

                    $this->consultantmodel->add_asignsector($insArr3);
                }
				
                for($i=0;$i<count($_POST['degreeType']);$i++){
                    $insArr3 = array();
                    $insArr3['consultant_id'] = $id;
                    $insArr3['degree_type'] = $_POST['degreeType'][$i];

                    $this->assign_degreetype_model->adddegreetype($insArr3);
                }
				for($i=0;$i<count($_POST['name']);$i++){
                    $insArr4 = array();
                    $insArr4['consultant_id'] = $id;
                    $insArr4['name'] = $_POST['name'][$i];

                    $this->assign_degreetype_model->addtheme($insArr4);
                }//
				
				for($i=0;$i<count($_POST['expertise']);$i++){
					$insArr5 = array();
                    $insArr5['consultantId'] = $id;
                    $insArr5['expertiseId'] = $_POST['expertise'][$i];
										
                    $this->expertisemodel->addAssignExpertise($insArr5);
				}//
				
				
                if($id){
                    $msg = "Yes";
                }else{
                    $msg = "No";
                }
            endif;
		}//
		$data['msg'] = $msg;
        $data['sectors'] = $this->sectors_model->getAllSectors();
        $data['subsectors'] = $this->subsector_model->getAllSubSectors();
        $data['degrees'] = $this->degree_model->getAllDegrees();
		$data['grades'] = $this->grade_model->getAllgrades();
		$data['functionalExpertise'] = $this->expertisemodel->getAllExpertise();
		$this->load->view('add-consultant',$data);
	}//
	
	
	public function edit($consultantId){
		$msg = '';
		if(isset($_POST['btnSub'])){
			
            if ($this->form_validation->run('Consultant') == TRUE):
                $filename = '';
                if($_FILES['consultantFile']['name'] != ''){

                    $config['upload_path'] = 'cv/';
                    $config['allowed_types'] = 'doc|docx|pdf';
                    $config['encrypt_name'] = TRUE;
                    $config['remove_spaces'] = TRUE;

                    $this->load->library('upload', $config);

                    if (  $this->upload->do_upload('consultantFile')){
                        $fileInfo = array('upload_data' => $this->upload->data());
                        $filename = $fileInfo['upload_data']['file_name'];
                    }
                }

                $updateArr = array();
                $updateArr['firstname'] = $this->input->post('firstname');
                $updateArr['lastname'] = $this->input->post('lastname');
                $updateArr['gender'] = $this->input->post('gender');
              
                $updateArr['nationality'] = $this->input->post('nationality');
                $updateArr['experienceInYears'] = $this->input->post('experienceInYears');
                $updateArr['experience_type'] = $this->input->post('experience_type');
               
                $updateArr['certification'] = $this->input->post('certification');
              
                //$updateArr['expertise'] = $this->input->post('expertise');
                $updateArr['mobile'] = $this->input->post('mobile');
                $updateArr['landline'] = $this->input->post('landline');
                $updateArr['email'] = $this->input->post('email');
                $updateArr['degree'] = $this->input->post('degree');
                $updateArr['decipline'] = $this->input->post('decipline');
                $updateArr['grade'] = $this->input->post('grade');
                $updateArr['address'] = $this->input->post('address');
				$updateArr['address'] = $this->input->post('address');
                $updateArr['city'] = $this->input->post('city');
                $updateArr['date_updated'] = date('Y-m-d H:i:s');
                if($filename != ''){
                    $updateArr['consultantFile'] = $filename;
                }

                $bool = $this->consultantmodel->updateconsultant($consultantId,$updateArr);
                $this->assign_subsector_model->deleteSubsectorById($consultantId);
                $this->assign_degreetype_model->deleteDegreetypeById($consultantId);
				$this->assign_subsector_model->deletethemeById($consultantId);
				$this->consultantmodel->deletesectorById($consultantId);
				
				for($i=0;$i<count($_POST['sector']);$i++){
                    $insArr3 = array();
                    $insArr3['consultant_id'] = $consultantId;
                    $insArr3['sector_id'] = $_POST['sector'][$i];
					
                    $this->consultantmodel->add_asignsector($insArr3);
                }
				
                for($i=0;$i<count($_POST['subsector']);$i++){
                    $insArr2 = array();
                    $insArr2['consultant_id'] = $consultantId;
                    $insArr2['subsector_id'] = $_POST['subsector'][$i];
					
                    $this->assign_subsector_model->addsubsector($insArr2);
                }
                for($i=0;$i<count($_POST['degreeType']);$i++){
                    $insArr3 = array();
                    $insArr3['consultant_id'] = $consultantId;
                    $insArr3['degree_type'] = $_POST['degreeType'][$i];
					
                    $this->assign_degreetype_model->adddegreetype($insArr3);
                }
				for($i=0;$i<count($_POST['name']);$i++){
                    $insArr4 = array();
                    $insArr4['consultant_id'] = $consultantId;
                    $insArr4['name'] = $_POST['name'][$i];
					
                    $this->assign_degreetype_model->addtheme($insArr4);
                }
				
				$this->expertisemodel->deleteAssignExpertise($consultantId);
				for($i=0;$i<count($_POST['expertise']);$i++){
					$insArr5 = array();
                    $insArr5['consultantId'] = $consultantId;
                    $insArr5['expertiseId'] = $_POST['expertise'][$i];
										
                    $this->expertisemodel->addAssignExpertise($insArr5);
				}//
				
				
				
                if($bool){
                    $msg = "Yes";
                }else{
                    $msg = "No";
                }
            endif;
		}//

        $data['sectors'] = $this->sectors_model->getAllSectors();
        $data['subsectors'] = $this->subsector_model->getAllSubSectors();
        $data['seleccted_degreetype'] = $this->assign_degreetype_model->getDegreetypeById($consultantId);
        $data['selectedConsultants'] = $this->assign_subsector_model->getSubsectorById($consultantId);
        $data['selectedthemes'] = $this->assign_subsector_model->getthemeById($consultantId);
		
		$data['selectedsectors'] = $this->consultantmodel->getsectorById($consultantId);
		
        $data['degrees'] = $this->degree_model->getAllDegrees();
		$data['consultant'] = $this->consultantmodel->getConsultantById($consultantId);
		$data['grades'] = $this->grade_model->getAllgrades();
		$data['functionalExpertise'] = $this->expertisemodel->getAllExpertise();
		$data['assignedFunctionalExp'] = $this->expertisemodel->getExpertiseByConsultantId($consultantId);
		$data['msg'] = $msg;
		$this->load->view('edit-consultant',$data);		
	}//
	
	public function detail($consultantId){
		$consultant = $this->consultantmodel->getConsultantById($consultantId);
		$grade = $this->grade_model->getgradebyid($consultant['grade']);
		$consultant['Gradetitle'] = $grade['grade_title'];
		$consultant['Gradeamount'] = $grade['amount'];
		
        $data['subsectors'] = $this->assign_subsector_model->getSubsectorByConsId($consultantId);
        $data['degreetype'] = $this->assign_degreetype_model->getDegreetypeById($consultantId);
        
        $data['degree'] = $this->degree_model->getDegreeByConsId($consultantId);
		
		$sector = $this->consultantmodel->getsector($consultantId);
		$data['selectedthemes'] = $this->assign_subsector_model->getthemeById($consultantId);
		$data['sector'] = $sector;
		$data['consultant'] = $consultant;
		
		$data['functionalExpertise'] = $this->expertisemodel->getAllExpertiseByConsultantId($consultantId);
		
		$this->load->view('detail-consultant',$data);
	}
	
	public function delete($consultantId){
		$this->consultantmodel->deleteConsultantById($consultantId);
		$this->assign_subsector_model->deletethemeById($consultantId);
		$this->session->set_flashdata('delete', 'User has been deleted.');
		$this->url->redirect( $this->url->consultants());
		
	}
	
	
}//
?>