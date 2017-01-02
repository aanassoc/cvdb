<?php
//sectors.php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sectors extends CI_Controller {

	/*
	* Contact constructor
	* Added by Danish Ejaz
	*/
	public function __construct(){
		parent::__construct();
        $this->load->model('sectors_model');
        $this->load->library('form_validation');
		// check is user logged in else throw him out.
		is_admin_logged_in();
	}//
	
	public function index(){
		$msg = '';
		$data = $msg;
        $data['sectors'] = $this->sectors_model->getAllSectors();
		
		$this->load->view('sectors',$data);
		
	}//

    public function add(){
        $error = "";
        if(isset($_POST['add_btn'])):
            if ($this->form_validation->run('Sector') == TRUE):
                $insArr = array();
                $insArr['sector'] = $this->input->post('sname');

                $bool = $this->sectors_model->addsector($insArr);
                if($bool):
                    $this->session->set_flashdata('success-msg', 'Record Added Successfully');
                    $this->url->redirect($this->url->sectors());
                else:
                    $error = "Error while adding new record";
                endif;
            endif;
        endif;
        $data['error'] = $error;
        $this->load->view('add_sector',$data);
    }

    public function delete($id){
        $this->sectors_model->deleteSector($id);
        $this->session->set_flashdata('success-msg', 'Record Deleted Successfully');
        $this->url->redirect($this->url->sectors());
    }

    public function edit($id){
        $error = "";
        if(isset($_POST['edit_btn'])):
            if ($this->form_validation->run('Sector') == TRUE):
                $updateArr = array();
                $updateArr['sector'] = $this->input->post('sname');

                $bool = $this->sectors_model->updateSector($id,$updateArr);
                if($bool):
                    $this->session->set_flashdata('success-msg', 'Record Updated Successfully');
                    $this->url->redirect($this->url->sectors());
                else:
                    $error = "Error while adding new record";
                endif;
            endif;
        endif;

        $data['sector'] = $this->sectors_model->getSectorById($id);

        $data['error'] = $error;
        $this->load->view('edit_sector',$data);
    }
	
}//
?>