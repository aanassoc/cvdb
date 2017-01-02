<?php
//expertise.php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Expertise extends CI_Controller {

	/*
	* Contact constructor
	* Added by Danish Ejaz
	*/
	public function __construct(){
		parent::__construct();
		// check is user logged in else throw him out.
		is_admin_logged_in();
		$this->load->model('expertisemodel');
        $this->load->library('form_validation');
	}//
	
	public function index(){
		
		$data['expertise'] =  $this->expertisemodel->getAllExpertise();
		
		$this->load->view('expertise',$data);
	}//
	
	public function add(){
		$msg='';
		if(isset($_POST['btnSub'])){
			$expertise_title = $this->input->post('expertise_title');
			$insArr['expertise'] = $expertise_title;
			$this->expertisemodel->addExpertise($insArr);
			$msg = '<strong>Success!</strong> Functional expertise has been added.';
			unset($_POST);
		}//
		$data['msg'] = $msg;
		$this->load->view('add-expertise',$data);
	}//
	
	public function edit($expertiseId){
		$msg='';
		if(isset($_POST['btnSub'])){
			$expertise_title = $this->input->post('expertise_title');
			$updateArr = array();
			$updateArr['expertise'] = $expertise_title;
			$this->expertisemodel->updateExpertise($expertiseId,$updateArr);
			$msg = '<strong>Success!</strong> Functional expertise has been updated.';
		}//
		$data['expertise'] = $this->expertisemodel->getExpertiseById($expertiseId);
		$data['msg'] = $msg;
		$this->load->view('edit-expertise',$data);
	}//
	
	public function delete($expertiseId){
		$this->expertisemodel->deleteExpertise($expertiseId);
		$this->session->set_flashdata('deleteFunctionalExp', 'Functional expertise has been deleted.');
		$this->url->redirect($this->url->expertise());
	}//
	
}//