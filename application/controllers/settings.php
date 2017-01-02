<?php
//settings.php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Settings extends CI_Controller {

	/*
	* Contact constructor
	* Added by Danish Ejaz
	*/
	public function __construct(){
		parent::__construct();
		// check is user logged in else throw him out.
		is_admin_logged_in();
        $this->load->model('usersmodel');
        $this->load->library('form_validation');
	}//
	
	public function index(){
        $errorPass = "";
        $successPass = "";
        $userinfo = $this->session->userdata('UserData');


            if(isset($_POST['change_pass'])):
                $oldpass = $this->input->post('oldpass');
                $newpass = $this->input->post('newpass');
                if($this->form_validation->run('PasswordSettings') == TRUE):
                    $user_info = $this->usersmodel->getUserById($userinfo['userId']);
                    if(md5($oldpass) == $user_info['user_password']){
                        $updateArr = array();
                        $updateArr['user_password'] = md5($newpass);

                        $bool = $this->usersmodel->updateUser($userinfo['userId'],$updateArr);
                        if($bool):
                            $successPass = 'Record updated successfully';
                            unset($_POST);
                        else:
                            $errorPass = 'Error while updating password';
                        endif;

                    }else{
                        $errorPass = 'Old Password in incorrect';
                    }
                endif;
            endif;

        $data['errorPass'] = $errorPass;
        $data['successPass'] = $successPass;
		$this->load->view('settings',$data);
		
	}//
	
	
}//
?>