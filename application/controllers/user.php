<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('usersmodel');
        $this->load->library('form_validation');
        // check is user logged in else throw him out.
        is_admin_logged_in();
    }//

    public function index(){
        $data['users'] = $this->usersmodel->getAllUsers();

        $this->load->view('users_listing',$data);
    }//

    public function add(){
        $error = "";
        if(isset($_POST['add_btn'])):
            if ($this->form_validation->run('AddUser') == TRUE):
                $insArr = array();
                $insArr['firstname'] = $this->input->post('fname');
                $insArr['lastname'] = $this->input->post('lname');
                $insArr['type'] = $this->input->post('type');
                $insArr['username'] = $this->input->post('username');
                $insArr['user_password'] = md5($this->input->post('password'));
                //$insArr['type'] = 'Staff';
                $insArr['status'] = 'Active';
                $insArr['dateAdded'] = date('Y-m-d H:i:s');

                $bool = $this->usersmodel->adduser($insArr);
                if($bool):
                    $this->session->set_flashdata('success-msg', 'Record Added Successfully');
                    $this->url->redirect($this->url->users());
                else:
                    $error = "Error while adding new record";
                endif;
            endif;
        endif;
        $data['error'] = $error;
        $this->load->view('add_user',$data);
    }

    public function delete($id){
        $this->usersmodel->deleteUser($id);
        $this->session->set_flashdata('success-msg', 'Record Deleted Successfully');
        $this->url->redirect($this->url->users());
    }

    public function edit($id){
        $error = "";
        if(isset($_POST['edit_btn'])):
            if ($this->form_validation->run('EditUser') == TRUE):
                $updateArr = array();
                $updateArr['firstname'] = $this->input->post('fname');
                $updateArr['lastname'] = $this->input->post('lname');
                $updateArr['status'] = $this->input->post('status');

                $bool = $this->usersmodel->updateUser($id,$updateArr);
                if($bool):
                    $this->session->set_flashdata('success-msg', 'Record Updated Successfully');
                    $this->url->redirect($this->url->users());
                else:
                    $error = "Error while adding new record";
                endif;
            endif;
        endif;

        $data['user'] = $this->usersmodel->getUserById($id);

        $data['error'] = $error;
        $this->load->view('edit_user',$data);
    }

}//
?>