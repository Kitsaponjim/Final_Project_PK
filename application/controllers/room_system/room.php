<?php
defined('BASEPATH') or exit('No direct script access allowed');

class room extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// if ($this->session->userdata('user_status_repair') != 1) {
		// 	redirect('login/logout', 'refresh');
		// }
		$this->load->model('function_model');
		$this->load->model('function_room');
		$this->load->model('function_room_admin');
	}



	public function admin_reserve_room()
	{
		if (isset($_POST['date']) && isset($_POST['start_time']) && isset($_POST['end_time'])) {
			$date = $this->input->post('date');
			$start_time = $this->input->post('start_time');
			$end_time = $this->input->post('end_time');
		} else {
			$date = null;
			$start_time = null;
			$end_time = null;
		}
		
		$data['data'] = $this->function_room->list_Empty_room($date, $start_time, $end_time);

		$data_all = array(
			'data' => $data
		);


		$this->load->view('template/room_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('room_system/admin/admin_reserve_room', $data_all);

	}


	public function reserve_room()
	{

		$id = $_SESSION['id'];

		$room_id = $this->input->post('room_id');
		$date = $this->input->post('date');
		$start_time = $this->input->post('start_time');
		$end_time = $this->input->post('end_time');
		$name_requester = $this->input->post('name_requester');
		$tel_requester = $this->input->post('tel_requester');
		$meeting_topic = $this->input->post('meeting_topic');
		$number_people = $this->input->post('number_people');
		$note = $this->input->post('note');

		$room_status = 1;
		$date_add = date('Y-m-d H:i:s');

		$data = array(
			'room_id' => $room_id,
			'name_requester' => $name_requester,
			'tel_requester' => $tel_requester,
			'meeting_topic' => $meeting_topic,
			'number_people' => $number_people,
			'note' => $note,
			'date_time' => $date,
			'start_time' => $start_time,
			'end_time' => $end_time,
			'room_status' => $room_status,
			'date_add' => $date_add,
			'user_id' => $id

		);

		$this->db->insert('room_booking_table', $data);
		$this->session->set_flashdata('save_success', TRUE);


	}




	public function edit_request()
	{
		$booking_id = $this->input->post('booking_id');
		$name_requester = $this->input->post('name_requester');
		$tel_requester = $this->input->post('tel_requester');
		$meeting_topic = $this->input->post('meeting_topic');
		$number_people = $this->input->post('number_people');
		$note = $this->input->post('note');

		$time_edit = date('Y-m-d H:i:s');

		if (!empty($booking_id)) {

			if (!empty($name_requester)) {
				$data['name_requester'] = $name_requester;
			}
			if (!empty($tel_requester)) {
				$data['tel_requester'] = $tel_requester;
			}
			if (!empty($meeting_topic)) {
				$data['meeting_topic'] = $meeting_topic;
			}
			if (!empty($number_people)) {
				$data['number_people'] = $number_people;
			}
		
			if (!empty($note)) {
				$data['note'] = $note;
			}
		
			if (!empty($data)) {
				$data['date_edit'] = $time_edit;
				$this->db->where('booking_id', $booking_id);
				$this->db->update('room_booking_table', $data);

					$this->session->set_flashdata('save_edit', TRUE);

			} else {
				$this->session->set_flashdata('no_data', TRUE);
			}

		} else {
			$this->session->set_flashdata('wrong_alert', TRUE);
		}



	}








}

