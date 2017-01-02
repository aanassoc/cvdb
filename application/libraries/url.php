<?php
/*
 *---------------------------------------------------------------
 * URL Library
 *---------------------------------------------------------------
 *
 * @category	Library
 * @filename	url.php
 * @author		task management Team
 * @created-on	04-04-2013
 * All code (c)2013 task management inc. all rights reserved
 */
 
class Url{
	
	//adding base url
	var $base_url;
	var $base_url_footer;
	var $temp_url;
	//var $temp_url_footer;
	var $ci;
	
	function Url()
	{
		$this->ci =& get_instance();
		//live
		//$this->base_url = str_replace('index.php','',$this->ci->config->site_url());
		
		//$this->temp_url = $this->base_url.'index.php/';
		
		$this->temp_url = $this->base_url ;
		
		//local
		$this->base_url = str_replace('index.php','',$this->ci->config->site_url());
		$this->temp_url = $this->base_url.'index.php/';
	}

	function root_url(){
		$distination=$this->temp_url;
		return $distination;
	}
	
	// Index
	function index(){
		$distination=$this->temp_url;
		return $distination;
	}
		
	// Redirect
	function redirect( $uri = '', $method = 'location', $refresh_time = 0, $exit = true )
	{
		switch($method)
		{
			case 'refresh':
				header("Refresh:$refresh_time;url=$uri" );
				break;
			default:
				header("Location: ". $uri );
				break;
		}
		if( $exit )
			exit;
	}
	
	public function login(){
		$distination=$this->temp_url.'login';
		return $distination;
	}//
	public function logout(){
		$distination=$this->temp_url.'login/logout/';
		return $distination;
	}//
	
	public function dashboard(){
		$distination=$this->temp_url.'dashboard';
		return $distination;
	}//
	
	public function consultants(){
		$distination=$this->temp_url.'consultant';
		return $distination;
	}//
	
	public function addConsultant(){
		$distination=$this->temp_url.'consultant/add/';
		return $distination;
	}//
	
	public function editConsultant($consultantId){
		$distination=$this->temp_url.'consultant/edit/'.$consultantId;
		return $distination;
	}//
	
	public function consultantDetail($consultantId){
		$distination=$this->temp_url.'consultant/detail/'.$consultantId;
		return $distination;
	}
	
	public function deleteConsultant($consultantId){
		$distination=$this->temp_url.'consultant/delete/'.$consultantId;
		return $distination;
	}
	
	public function search(){
		$distination=$this->temp_url.'search/';
		return $distination;
	}//
	
	public function settings(){
		$distination=$this->temp_url.'settings/';
		return $distination;
	}
	



    public function sectors(){
        $distination=$this->temp_url.'sectors/';
        return $distination;
    }//

    public function add_sector(){
        $distination=$this->temp_url.'sectors/add';
        return $distination;
    }

    public function delete_sector($id){
        $distination=$this->temp_url.'sectors/delete/'.$id;
        return $distination;
    }

    public function edit_sector($id){
        $distination=$this->temp_url.'sectors/edit/'.$id;
        return $distination;
    }



    public function subsectors(){
        $distination=$this->temp_url.'subsector';
        return $distination;
    }

    public function add_subsector(){
        $distination=$this->temp_url.'subsector/add';
        return $distination;
    }

    public function delete_subsector($id){
        $distination=$this->temp_url.'subsector/delete/'.$id;
        return $distination;
    }

    public function edit_subsector($id){
        $distination=$this->temp_url.'subsector/edit/'.$id;
        return $distination;
    }



    public function degrees(){
        $distination=$this->temp_url.'degree';
        return $distination;
    }

    public function add_degree(){
        $distination=$this->temp_url.'degree/add';
        return $distination;
    }

    public function delete_degree($id){
        $distination=$this->temp_url.'degree/delete/'.$id;
        return $distination;
    }

    public function edit_degree($id){
        $distination=$this->temp_url.'degree/edit/'.$id;
        return $distination;
    }



    public function users(){
        $distination=$this->temp_url.'user';
        return $distination;
    }

    public function add_user(){
        $distination=$this->temp_url.'user/add';
        return $distination;
    }

    public function delete_user($id){
        $distination=$this->temp_url.'user/delete/'.$id;
        return $distination;
    }

    public function edit_user($id){
        $distination=$this->temp_url.'user/edit/'.$id;
        return $distination;
    }


    public function download_details($id){
        $distination=$this->temp_url.'consultant_pdf/download_details/'.$id;
        return $distination;
    }


    public function export(){
        $distination=$this->temp_url.'export';
        return $distination;
    }

    public function test(){
        $distination=$this->temp_url.'export/test';
        return $distination;
    }
    public function grade(){
        $distination=$this->temp_url.'grade';
        return $distination;
    }
    public function add_grade(){
        $distination=$this->temp_url.'grade/add_grade';
        return $distination;
    }
	public function edit_grade($grade_id){
        $distination=$this->temp_url.'grade/edit_grade/'.$grade_id;
        return $distination;
    }
	
	public function delete_grade($grade_id){
        $distination=$this->temp_url.'grade/delete_grade/'.$grade_id;
        return $distination;
    }
	
	public function expertise(){
		$distination=$this->temp_url.'expertise/';
        return $distination;
	}
	
	public function add_experties(){
		$distination=$this->temp_url.'expertise/add/';
        return $distination;
	}
	
	public function edit_expertise($expertiseId){
		$distination=$this->temp_url.'expertise/edit/'.$expertiseId.'/';
        return $distination;
	}
	
	public function delete_expertise($expertiseId){
		$distination=$this->temp_url.'expertise/delete/'.$expertiseId.'/';
        return $distination;
	}//
	
}//End Class

	
?>