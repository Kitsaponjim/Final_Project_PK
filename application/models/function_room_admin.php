<?php
defined('BASEPATH') or exit('No direct script access allowed');
class function_room_admin extends CI_Model
{

	public function update()
{
    $status = 3; // สำเร็จ
    $status_reserve = 1; 

    $date = date("Y-m-d");
	$sql = "SELECT booking_id, date_time, start_time, end_time, room_status
	FROM room_booking_table
	WHERE room_status = '$status_reserve' AND DATE(date_time) <= CURDATE()";

	// $sql = "SELECT booking_id, date_time, start_time, end_time, room_status
    //     FROM room_booking_table
    //     WHERE room_status = '$status_reserve' AND date_time = '$date'";

    // $sql = "SELECT booking_id, date_time, start_time, end_time, room_status
    //         FROM room_booking_table
    //         WHERE room_status = $status_reserve  AND date_time = $date";
    
		// ต้องแก้กำหนดให้เป็นวันที่วันปัจจุบันและอาจจะน้อยกว่าปัจจยันเพราะบางครั้งผู้ใช้งานอาจะไม่ได้เข้าสู่ระบบ ก็แก้ให้มันเริ่มจาก

	// echo $sql;
	
    // $sql = "SELECT booking_id, date_time, start_time, end_time, room_status
    //         FROM room_booking_table
    //         WHERE room_status = $status_reserve OR room_status <=$status_reserve AND date_time = $date";
    
	// echo $sql;

    $result = $this->db->query($sql)->result();

    $time = date('H:i');

	// แก้ให้มีนเช๋๕แบบนย้อนหลังเพราะบางครั้ง ผู้ใช้งานอาจะไม่ไเด้เข้าสู่ระบบก็จะไม่อัพเดท ก็แก้ให้มันเชผ็๕ย้อนหลัง
	// แก้ของระบบจองรถด้วย ให้อัพเดทแบบย้อนหลังตั้งเค่าเพระา

    if (!empty($result)) {
        foreach ($result as $row) {
            $rowTimestamp = $row->end_time;
            $booking_id = $row->booking_id;

            if ($row->room_status != 2 && $rowTimestamp < $time) {
                $this->db->where('booking_id', $booking_id)
                         ->update('room_booking_table', array('room_status' => $status));
            }
        }
    }
}



	public function list_room()
	{

		$sql = "SELECT rt.*, GROUP_CONCAT(rq.equipment_name) AS equipment_names
		FROM room_table rt
		LEFT JOIN room_equipment rq ON FIND_IN_SET(rq.equipment_id, rt.room_equipment)
		GROUP BY rt.room_id;";

		$query = $this->db->query($sql)->result();
		return $query;

	}

	public function list_equipment(){
		$sql = "SELECT * FROM room_equipment";
		$query = $this->db->query($sql)->result();
		return $query;
	}


	public function list_roomID($room_id){
		$sql = "SELECT * FROM room_table WHERE room_id = $room_id";
		$query = $this->db->query($sql)->row();
		return $query;

	}
	
	public function del_room($room_id)
	{

		$this->db->delete('room_table', array('room_id' => $room_id));

	}

	public function del_equipment($equipment_id)
	{
		$this->db->delete('room_equipment', array('equipment_id' => $equipment_id));

	}



	public function list_NameRoom()
	{
		$sql = "SELECT room_id, room_name FROM room_table";
		$query = $this->db->query($sql)->result();
		return $query;

	}

	public function room_readiness()
	{
		$sql = "SELECT * FROM room_readiness";
		$query = $this->db->query($sql)->result();
		return $query;

	}
	public function room_equipment()
	{
		$sql = "SELECT * FROM room_equipment";
		$query = $this->db->query($sql)->result();
		return $query;

	}


	public function list_requesterRoom($id ,$date ,$date_end,$room ,$status)
	{
		$con = '';

		if(empty($date)){
			$date = date('Y-m-d');
		}
		if(empty($date_end)){
			$date_end = date('Y-m-d' , strtotime('+1 month'));
		}
	
			if (!empty($date) && !empty($date_end)) {
				$con .= " AND date_time BETWEEN '$date' AND '$date_end'";
			}elseif(!empty($date)){
				$con .= " AND date_time = '$date'";
			}

		if(!empty($room) && $room != '#'){
			$con .= " AND room_booking_table.room_id = $room";
		}

		if(!empty($status) && $status != '#'){
			$con .= " AND room_booking_table.room_status = $status";
		}
		// $sql = "SELECT room_booking_table.room_id , booking_id, user_id, number_people, meeting_topic, name_requester, tel_requester,
		// date_time, start_time, end_time, room_name, room_capacity, room_address, room_details ,room_equipment , room_attendant , room_note 
		// FROM room_booking_table JOIN room_table ON room_booking_table.room_id = room_table.room_id WHERE user_id = $id";

		$sql = "SELECT room_booking_table.room_id , booking_id, user_id, number_people, meeting_topic, name_requester, tel_requester,note ,room_booking_table.room_status ,room_booking_table.date_add,
				room_booking_table.cancel_detail ,room_booking_table.date_cancel,
		date_time, start_time, end_time, room_name, room_capacity, room_address, room_details ,room_equipment , room_attendant ,room_attendant_tel, room_note, room_status.status_name 
		FROM room_booking_table 
		JOIN room_table ON room_booking_table.room_id = room_table.room_id 
		JOIN room_status ON room_status.status_id = room_booking_table.room_status 
		WHERE user_id = $id $con";

		// echo $sql; 
		$query = $this->db->query($sql)->result();

		return $query;

	}

	public function list_requesterRoom_total($date ,$date_end,$room ,$status)
	{
		$con = '';

		if(empty($date)){
			$date = date('Y-m-d');
		}
		if(empty($date_end)){
			$date_end = date('Y-m-d' , strtotime('+1 month'));
		}

		
			if (!empty($date) && !empty($date_end)) {
				$con = " WHERE date_time BETWEEN '$date' AND '$date_end'";
			}elseif(!empty($date)){
				$con = " WHERE date_time = '$date'";
			}

		if(!empty($room) && $room != '#'){
			$con .= " AND room_booking_table.room_id = $room";
		}

		if(!empty($status) && $status != '#'){
			$con .= " AND room_booking_table.room_status = $status";
		}
		// $sql = "SELECT room_booking_table.room_id , booking_id, user_id, number_people, meeting_topic, name_requester, tel_requester,
		// date_time, start_time, end_time, room_name, room_capacity, room_address, room_details ,room_equipment , room_attendant , room_note 
		// FROM room_booking_table JOIN room_table ON room_booking_table.room_id = room_table.room_id WHERE user_id = $id";

		$sql = "SELECT room_booking_table.room_id , booking_id, user_id, number_people, meeting_topic, name_requester, tel_requester,note ,room_booking_table.room_status ,room_booking_table.date_add,
		room_booking_table.cancel_detail ,room_booking_table.date_cancel,
		date_time, start_time, end_time, room_name, room_capacity, room_address, room_details ,room_equipment , room_attendant ,room_attendant_tel, room_note, room_status.status_name 
		FROM room_booking_table 
		JOIN room_table ON room_booking_table.room_id = room_table.room_id 
		JOIN room_status ON room_status.status_id = room_booking_table.room_status $con";

		// echo $sql; 
		$query = $this->db->query($sql)->result();

		return $query;

	}


	public function edit_requestRoom($booking_id)
	{
		$sql = "SELECT room_booking_table.room_id , booking_id, user_id, number_people, meeting_topic, name_requester, tel_requester,note ,room_booking_table.room_status ,
		date_time, start_time, end_time, room_name, room_capacity, room_address, room_details ,room_equipment , room_attendant ,room_attendant_tel, room_note, room_status.status_name 
		FROM room_booking_table 
		JOIN room_table ON room_booking_table.room_id = room_table.room_id 
		JOIN room_status ON room_status.status_id = room_booking_table.room_status 
		WHERE booking_id = $booking_id";

		$query = $this->db->query($sql)->row();
		return $query;

	}







	public function list_user($status){
		$con = "";

		if (!empty($status) && $status != '#' && !empty($role) && $role != '#') {
			$con = "WHERE user_status_room = $status AND user_role = $role";
		} elseif (!empty($status) && $status != '#') {
			$con = "WHERE user_status_room = $status";
			if (!empty($role) && $role != '#') {
				$con .= " AND user_role = $role";
			}
		}elseif(!empty($role) && $role != '#') {
			$con = "WHERE user_role = $role";

			if (!empty($status) && $status != '#') {
				$con .= " AND user_status_room = $status";
			}
		}

		$sql_user = "SELECT id,user_login,user_password,user_name,user_email,user_tel,user_status_room,name_room
		,user_role , role_name
		 FROM user_info 
		 JOIN user_status_room ON user_status_room = id_room
		 JOIN user_role ON user_role = id_role
		  $con";

		$result_user = $this->db->query($sql_user)->result();

		return $result_user;
	}




	public function status_user(){
		
		$sql_status = "SELECT * FROM user_status_room";
		$status_user = $this->db->query($sql_status)->result();

		return $status_user;
	}



	public function user_status_id($id , $status_user){


		$sql_status = "SELECT name_room FROM user_info JOIN user_status_room ON user_status_room = id_room
		WHERE id = $id";
		
		$query = $this->db->query($sql_status)->row();

		
		return $query;


	}

	public function events()
	{
		$this->db->order_by('booking_id');
		return $this->db->get('room_booking_table');
	}

	public function rooms()
	{
		$this->db->order_by('room_id');
		return $this->db->get('room_table');
	}

}
