<?php
//dashboard.php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends CI_Controller {

	/*
	* Contact constructor
	* Added by Danish Ejaz
	*/
	public function __construct(){
		parent::__construct();
		// check is user logged in else throw him out.
		is_admin_logged_in();
        $this->load->model('usersmodel');
        $this->load->model('consultantmodel');
	}//
	
	public function index(){
		$data['consultants'] = $this->consultantmodel->CountConsultants();
        $data['users'] = $this->usersmodel->CountUsers();
        
        $data['consultantsmale'] = $this->consultantmodel->consultantsmale();
        $data['consultantsfemale'] = $this->consultantmodel->consultantsfemale();
        $data['consultantnationals'] = $this->consultantmodel->consultantnationals();
        $data['consultanintInternational'] = $this->consultantmodel->consultanintInternational();
       

		$this->load->view('dashboard',$data);
		
	}//
	
}//
?>