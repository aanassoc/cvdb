<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Degree extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('degree_model');
        $this->load->library('form_validation');
        // check is user logged in else throw him out.
        is_admin_logged_in();
    }//

    public function index(){
        $msg = '';
        $data = $msg;
        $data['degrees'] = $this->degree_model->getAllDegrees();

        $this->load->view('degrees',$data);
    }//

    public function add(){
        $error = "";
        if(isset($_POST['add_btn'])):
            if ($this->form_validation->run('Degree') == TRUE):
                $insArr = array();
                $insArr['title'] = $this->input->post('title');

                $bool = $this->degree_model->addDegree($insArr);
                if($bool):
                    $this->session->set_flashdata('success-msg', 'Record Added Successfully');
                    $this->url->redirect($this->url->degrees());
                else:
                    $error = "Error while adding new record";
                endif;
            endif;
        endif;
        $data['error'] = $error;
        $this->load->view('add_degree',$data);
    }

    public function delete($id){
        $this->degree_model->deleteDegree($id);
        $this->session->set_flashdata('success-msg', 'Record Deleted Successfully');
        $this->url->redirect($this->url->degrees());
    }

    public function edit($id){
        $error = "";
        if(isset($_POST['edit_btn'])):
            if ($this->form_validation->run('Degree') == TRUE):
                $updateArr = array();
                $updateArr['title'] = $this->input->post('title');

                $bool = $this->degree_model->updateDegree($id,$updateArr);
                if($bool):
                    $this->session->set_flashdata('success-msg', 'Record Updated Successfully');
                    $this->url->redirect($this->url->degrees());
                else:
                    $error = "Error while adding new record";
                endif;
            endif;
        endif;

        $data['degree'] = $this->degree_model->getDegreeById($id);

        $data['error'] = $error;
        $this->load->view('edit_degree',$data);
    }

}//
?>