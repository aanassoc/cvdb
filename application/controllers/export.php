<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Export extends CI_Controller {

    public function __construct(){
        parent::__construct();
        // check is user logged in else throw him out.
        is_admin_logged_in();
        $this->load->model('consultantmodel');

    }//

    public function index(){
        $error = "";
        $consultants= $this->consultantmodel->getAllConsultants();
        if(isset($_POST['export_all'])){
            $this->load->library('zip');
            for($i=0;$i<count($consultants);$i++){
				if($consultants[$i]['consultantFile'] == '')
				{
					$error = 'File Not Available .';
				}else
				{
				
                $cv_file = $consultants[$i]['consultantFile'];
				
                $data = $cv_file;
                $path = './cv/';
                $this->zip->read_file($path.$data);
				}
            }
            $this->zip->download('all_cvs.zip');
        }
        elseif(isset($_POST['export_selected'])){
            if(count($_POST['consultant_id']) > 0){
                $this->load->library('zip');
                for($i=0;$i<count($_POST['consultant_id']);$i++){
                    $consultant = $this->consultantmodel->getConsultantById($_POST['consultant_id'][$i]);
					
                    if($consultant['consultantFile'] == '')
					{
					$error = 'No File Available.';
					}else
					{
						$cv_file = $consultant['consultantFile'];
						$data = $cv_file;
                        $path = './cv/';
                        $this->zip->read_file($path.$data);
						
                    }
                }
                $this->zip->download('selected_cvs.zip');
            }
            else{
                $error = "Please select consultants";
            }
        }
        $data['error'] = $error;
        $data['consultants'] = $consultants;
        $this->load->view('export_consultants',$data);
    }//



}//
?>