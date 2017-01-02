<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Grade extends CI_Controller {

    /*
    * Contact constructor
    * Added by Danish Ejaz
    */
    public function __construct(){
        parent::__construct();
        $this->load->model('grade_model');
        $this->load->library('form_validation');
        // check is user logged in else throw him out.
        is_admin_logged_in();
    }//

    public function index(){
       $msg = '';
       $data = $msg;
       $data['grade'] = $this->grade_model->getAllgrades();
	   $this->load->view('grade',$data);

    }//
	public function add_grade(){
		$error='';
	if(isset($_POST['btnSub']))
		{
		
			$grade_title = $this->input->post('grade_title');
			$amount = $this->input->post('amount');
			if(!$grade_title) $error .= "Title Is Required<br />";
			if(!$amount) $error .= "Amount Is Required<br />";
			if(!$error)
			{
			$insArr = array();
			
			$insArr['grade_title'] 					= $grade_title;
			$insArr['amount'] 						= $amount;
			
				$this->grade_model->addgrade($insArr);
				$msg 		= "Grade has been added.<br />";
				$this->session->set_flashdata('addgrade',$msg);
				$this->url->redirect($this->url->grade());
			}
		}
		$data['error'] = $error;
		$this->load->view('add_grade',$data);
	}
	public function edit_grade($grade_id)
	{
		$error='';
		if(isset($_POST['btnSub']))
		{
			$grade_title = $this->input->post('grade_title');
			$amount = $this->input->post('amount');
			if(!$grade_title) $error .= "Title Is Required<br />";
			if(!$amount) $error .= "Amount Is Required<br />";
			if(!$error)
			{
			$updateArr = array();
			$updateArr['grade_title'] 					= $grade_title;
			$updateArr['amount'] 						= $amount;
			
			
				$this->grade_model->updategrade($grade_id,$updateArr);
				$msg 		= "Grade has been updated.<br />";
				$this->session->set_flashdata('addgrade',$msg);
				$this->url->redirect($this->url->grade());
		}
		}
	
		
		$data['grade'] = $this->grade_model->getgradebyid($grade_id);
		$data['error'] = $error;
		$data['grade_id'] = $grade_id;
		$this->load->view('edit_grade',$data);
	}
	public function delete_grade($grade_id)
	{
		$this->grade_model->delete_grade($grade_id);
	
		$this->session->set_flashdata('addgrade','Grade deleted successfully!');
        $this->url->redirect($this->url->grade());
	}
}//
?>