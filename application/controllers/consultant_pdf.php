<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Consultant_pdf extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('consultantmodel');
        $this->load->model('sectors_model');
        $this->load->model('degree_model');
        $this->load->model('assign_subsector_model');
        $this->load->model('assign_degreetype_model');
    }//

    public function index(){
        //this data will be passed on to the view
        $data['the_content']='mPDF and CodeIgniter are cool!';

        //load the view, pass the variable and do not show it but "save" the output into $html variable
        $html=$this->load->view('pdf_consultant_details', $data, true);

        //this the the PDF filename that user will get to download
        $pdfFilePath = "consultant_details";

        //load mPDF library
        $this->load->library('m_pdf');
        //actually, you can pass mPDF parameter on this load() function
        $pdf = $this->m_pdf->load();
        //generate the PDF!
        $pdf->WriteHTML($html);
        //offer it to user via browser download! (The PDF won't be saved on your server HDD)
        $pdf->Output($pdfFilePath, "D");

    }//

    public function download_details($consultantId){
        
        $data['consultant'] = $this->consultantmodel->getConsultantById($consultantId);
        $data['subsectors'] = $this->assign_subsector_model->getSubsectorByConsId($consultantId);
        $data['degreetype'] = $this->assign_degreetype_model->getDegreetypeById($consultantId);
        $data['sectors'] = $this->sectors_model->getSectorByConsId($consultantId);
        $data['degree'] = $this->degree_model->getDegreeByConsId($consultantId);
        $html=$this->load->view('pdf_consultant_details', $data, true);

        $pdfFilePath = "ConsultantDetails.pdf";

        $this->load->library('m_pdf');
        $pdf = $this->m_pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output($pdfFilePath, "D");
    }



}
?>