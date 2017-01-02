<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Subsector extends CI_Controller {

    /*
    * Contact constructor
    * Added by Danish Ejaz
    */
    public function __construct(){
        parent::__construct();
        $this->load->model('subsector_model');
        $this->load->library('form_validation');
        // check is user logged in else throw him out.
        is_admin_logged_in();
    }//

    public function index(){
        $msg = '';
        $data = $msg;
        $data['sectors'] = $this->subsector_model->getAllSubSectors();

        $this->load->view('subsectors',$data);

    }//

    public function add(){
        $error = "";
        if(isset($_POST['add_btn'])):
            if ($this->form_validation->run('Sector') == TRUE):
                $insArr = array();
                $insArr['title'] = $this->input->post('sname');

                $bool = $this->subsector_model->addsubsector($insArr);
                if($bool):
                    $this->session->set_flashdata('success-msg', 'Record Added Successfully');
                    $this->url->redirect($this->url->subsectors());
                else:
                    $error = "Error while adding new record";
                endif;
            endif;
        endif;
        $data['error'] = $error;
        $this->load->view('add_subsector',$data);
    }

    public function delete($id){
        $this->subsector_model->deleteSubSector($id);
        $this->session->set_flashdata('success-msg', 'Record Deleted Successfully');
        $this->url->redirect($this->url->subsectors());
    }

    public function edit($id){
        $error = "";
        if(isset($_POST['edit_btn'])):
            if ($this->form_validation->run('Sector') == TRUE):
                $updateArr = array();
                $updateArr['title'] = $this->input->post('sname');

                $bool = $this->subsector_model->updateSubSector($id,$updateArr);
                if($bool):
                    $this->session->set_flashdata('success-msg', 'Record Updated Successfully');
                    $this->url->redirect($this->url->subsectors());
                else:
                    $error = "Error while adding new record";
                endif;
            endif;
        endif;

        $data['sector'] = $this->subsector_model->getSubSectorById($id);

        $data['error'] = $error;
        $this->load->view('edit_subsector',$data);
    }

}//
?>