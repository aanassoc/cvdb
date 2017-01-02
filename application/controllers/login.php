<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('usersmodel');
		}//
	
	public function index(){
		$error = "";
		if(isset($_POST['btnSub'])){
			$user_name = $this->input->post('user_name');
			$user_password = md5($this->input->post('user_password'));
			$user = $this->usersmodel->getuser_info($user_name,$user_password);
            if(count($user) > 0){
                if($user['status'] == 'Active'){
                    $this->session->set_userdata('UserData', $user);
                    $this->url->redirect($this->url->dashboard());
                }else{
                    $error = 'You cannot login to system. <br />';
                }

			}else{
				$error ="Invalid Login Please Check Your Name And Password<br />";
			}
		}
        $data['error'] = $error;
        $this->load->view('login',$data);
	}//
	
	public function logout(){
		$this->session->unset_userdata('UserData');
		$this->url->redirect($this->url->login());
    }

}//
?>