<?php
defined('BASEPATH') or exit('No direct script access allowed');
class function_meeting extends CI_Model
{


	public function meeting_topic(){
		$sql = "SELECT mt.* , GROUP_CONCAT(uf.user_name) AS user_name
		FROM meeting_topic mt 
		LEFT JOIN user_info uf ON FIND_IN_SET(uf.id, mt.permissions_name)
		GROUP BY mt.meeting_id
		";

		$result = $this->db->query($sql)->result();
		return $result;
		
	}
	// $sql = "SELECT rt.*, GROUP_CONCAT(rq.equipment_name) AS equipment_names
	// FROM room_table rt
	// LEFT JOIN room_equipment rq ON FIND_IN_SET(rq.equipment_id, rt.room_equipment)
	// GROUP BY rt.room_id;";


	public function meeting_topic_id($meeting_id){
		$sql = "SELECT mt.* , GROUP_CONCAT(uf.user_name) AS user_name
		FROM meeting_topic mt 
		LEFT JOIN user_info uf ON FIND_IN_SET(uf.id, mt.permissions_name)
		WHERE meeting_id = $meeting_id
		GROUP BY mt.meeting_id
		";
		$row = $this->db->query($sql)->row();
		return $row;
		
	}

	public function file_meeting($meeting_id){
		$sql = "SELECT * FROM meeting_files 
		WHERE meeting_id = $meeting_id";

		$result = $this->db->query($sql)->result();
		return $result;
	}








}
