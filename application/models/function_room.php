<?php
defined('BASEPATH') or exit('No direct script access allowed');
class function_room extends CI_Model
{



	public function list_Empty_room($date, $start_time, $end_time)
	{


		if (!empty($date) && !empty($start_time) && !empty($end_time)) {
			$sql = "SELECT DISTINCT * 
            FROM room_booking_table  
            WHERE room_status != 2 AND room_status != 3
            AND date_time = '$date'
            AND  (
                (start_time < '$start_time' AND end_time > '$start_time') OR
                (start_time < '$end_time' AND end_time > '$end_time')
            )";
			
			$result = $this->db->query($sql)->result();

		}

		$sql_room = "SELECT rt.*, GROUP_CONCAT(rq.equipment_name) AS equipment_names, rr.readiness_name
        FROM room_table rt
        LEFT JOIN room_equipment rq ON FIND_IN_SET(rq.equipment_id, rt.room_equipment)
        INNER JOIN room_readiness rr ON rt.room_status = rr.readiness_id";

		// $sql = "SELECT rt.*, GROUP_CONCAT(rq.equipment_name) AS equipment_names
		// FROM room_table rt
		// LEFT JOIN room_equipment rq ON FIND_IN_SET(rq.equipment_id, rt.room_equipment)
		// GROUP BY rt.room_id;";

		// $sql_room = "SELECT *
		// FROM room_table
		// JOIN room_readiness ON room_table.room_status = room_readiness.readiness_id";


		if (!empty($result)) {
			$room_list_values = [];
			foreach ($result as $room_id) {
				$room_list_values[] = $room_id->room_id;
			}
			$room_list_values = implode(",", $room_list_values);
			$sql_room .= " WHERE room_id NOT IN ($room_list_values)";
		}
		$sql_room .= " GROUP BY rt.room_id";
		// 
		$result_room = $this->db->query($sql_room)->result();

		return $result_room;


	}



	public function list_requesterRoom_total_index($date , $room)
	{
		$con = '';

		if(empty($date)){
			$date = date('Y-m-d');
		}


		if(!empty($date)){
				$con = " WHERE date_time = '$date'";
			}

			if(!empty($room) && $room != '#'){
				$con .= " AND room_booking_table.room_id = $room";
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





}
