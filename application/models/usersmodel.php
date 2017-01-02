<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usersmodel extends CI_Model {

	public function __construct(){
        // Call the Model constructor
        parent::__construct();
	}//

    public function getuser_info($user_name,$user_password){
        $this->db->select('*');
        $resultSet =  $this->db->get_where(TBL_USERS,array('username'=>$user_name, 'user_password'=>$user_password ));
        $result = $resultSet->row_array();
		//echo $this->db->last_query();
		return $result;
    }

    public function adduser($insArr){
        $this->db->insert( TBL_USERS , $insArr);
        return true;
    }//

    public function getAllUsers(){
        $this->db->select('*');
        $this->db->order_by("userId", "DESC");
        $resultSet =  $this->db->get(TBL_USERS);
        $result = $resultSet->result_array();
        return $result;
    }
    public function getUserById($user_id){
        $this->db->select('*');
        $resultSet =  $this->db->get_where(TBL_USERS , array('userId'=>$user_id));
        $result = $resultSet->row_array();
        return $result;
    }//

    public function updateUser($user_id,$updateArr){
        $this->db->where('userId',$user_id);
        $this->db->update(TBL_USERS,$updateArr);
        return true;
    }

    public function deleteUser($user_id){
        $this->db->delete(TBL_USERS , array('userId' => $user_id));
    }

    public function CountUsers(){
        $this->db->select('*');
        $resultSet =  $this->db->get_where(TBL_USERS);
        $res = $resultSet->num_rows();
        return $res;
    }

}//
?>