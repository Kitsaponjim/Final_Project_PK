<?php
defined('BASEPATH') or exit('No direct script access allowed');
class function_SuperAdmin extends CI_Model
{



	public function list_user($system_type , $selectedStatus){

		$con = "";

		if(!empty($system_type)) {
			if($system_type == 1){
				// $con = "WHERE user_status_repair IS NOT NULL AND user_status_repair <> 0"; //<> และ != มีหน้าที่เดียวกัน
				$con = "JOIN user_status ON user_status_repair = u_id WHERE user_status_repair IS NOT NULL AND user_status_repair <> 0"; //<> และ != มีหน้าที่เดียวกัน
				
				if (!empty($selectedStatus)) {
					// ใช้ implode เพื่อรวมค่าใน $selectedStatus เป็นสตริง และใช้ IN ใน SQL เพื่อเปรียบเทียบ
					$selectedStatusStr = implode(', ', $selectedStatus);
					$con .= " AND user_status_repair IN ($selectedStatusStr)";
				}


			}
			elseif($system_type == 2){
				$con = "JOIN user_status ON user_status_car = u_id WHERE user_status_car IS NOT NULL AND user_status_car <> 0";
			}
			elseif($system_type == 3){
				$con = "JOIN user_status ON user_status_room = u_id WHERE user_status_room IS NOT NULL AND user_status_room <> 0";
			}
			elseif($system_type == 4){
				$con = "JOIN user_status ON user_status_emeeting = u_id WHERE user_status_emeeting IS NOT NULL AND user_status_emeeting <> 0";
			}
		}

		$sql_user = "SELECT * FROM user_info $con";

    	$result_user = $this->db->query($sql_user)->result();

		return $result_user;
	}



	public function list_user_all($role ,$status){

		if (!empty($role) && $role != '#' && !empty($status) && $status != '#') {
			$con = "WHERE user_role = '$role' AND user_status_info = '$status'";
		} else if (!empty($role) && $role != '#') {
			$con = "WHERE user_role = '$role'";
		} else if (!empty($status) && $status != '#') {
			$con = "WHERE user_status_info = '$status'";
		} else {
			$con = "";
		}

		
		$sql = "SELECT * FROM user_info LEFT JOIN user_role ON user_role.id_role = user_info.user_role $con";
		$result = $this->db->query($sql)->result();
		
	// echo $sql;
		return $result;
		
	}

	
	public function role(){

		$sql = "SELECT * FROM user_role";
		$result = $this->db->query($sql)->result();
		return $result;
		
	}
	


	public function list_user_id($id){

		$sql = "SELECT * FROM user_info
		JOIN user_role ON user_info.user_role = user_role.id_role 
		JOIN user_status_repair ON user_info.user_status_repair = user_status_repair.id_repair
		JOIN user_status_car ON user_info.user_status_car = user_status_car.id_car 
		JOIN user_status_emeeting ON user_info.user_status_emeeting = user_status_emeeting.id_emeeting 
		JOIN user_status_room ON user_info.user_status_room = user_status_room.id_room 
		WHERE id = $id";
		
		$result = $this->db->query($sql)->row();
		
		return $result;
		
	}



	public function list_system(){
		$sql = "SELECT * FROM system";
		$result_system = $this->db->query($sql)->result();

		return $result_system;
		
	}
	public function list_status(){
		$sql = "SELECT * FROM user_status";
		$result_status = $this->db->query($sql)->result();

		return $result_status;

	}

	public function list_status_user(){

		$sql = "SELECT * FROM user_status";
		$list_status_user = $this->db->query($sql)->result();

		return $list_status_user;

	}
	
	public function forgot_password(){

		$sql = "SELECT * FROM user_fogotpassword";
		$user_fogotpassword = $this->db->query($sql)->result();

		return $user_fogotpassword;

	}
	


	public function user_status_repair(){
		
		$sql_status = "SELECT * FROM user_status_repair";
		$status_user = $this->db->query($sql_status)->result();

		return $status_user;
	}
	
	public function showUsers()
	{
		$this->db->order_by('id');
		return $this->db->get('user_info');
	}
}
