<div class="content-wrapper">
	<style>
		.narrow-select {
			width: 100px;
			/* ปรับค่าเป็นขนาดที่คุณต้องการ */
			padding: 5px 5px;
			font-size: 14px;
			line-height: 1.42857143;
			color: #555;
			background-color: #fff;
			background-image: none;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
			transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
		}

		.narrow-select:focus {
			border-color: #66afe9;
			outline: 0;
			box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px rgba(102, 175, 233, .5);
		}

		.btn-custom-gray {
			background-color: #4281ff;
			/* สีเทา */
			color: #fff;
			/* สีข้อความ */
		}

		.btn-lg {
			padding: 5px 5px;
			/* ปรับขนาดให้ใหญ่ขึ้น */
			font-size: 10px;
			/* ปรับขนาดตัวอักษรให้ใหญ่ขึ้น */
			line-height: 1.3333333;
			/* ปรับความสูง */
			border-radius: 6px;
			/* ปรับขอบมน */
		}



		/* style กำหนดกบ่องใส่ข้อมูลสี่เหลี่ยมโค้ง */
		.custom-box {
			background-color: white;
			border-radius: 10px;
			box-shadow: none;
			border-top: solid white;
			/* กำหนดสีขอบด้านบนเป็นสีขาว */
		}
	</style>


	<style>
		/* Style for the table */
		#example1 {
			border-collapse: collapse;
			width: 100%;
			max-width: 800px;
			/* Set a maximum width for responsiveness */
			margin: 0 auto;
			/* Center the table */
			background-color: white;
			/* Background color for the table */
			border-radius: 10px;
			/* Rounded corners */
			overflow: hidden;
			/* Hide overflowing content */
		}



		/* Header row */
		#example1 thead th {
			background-color: white;
			/* Header background color */
			color: black;
			/* Header text color */
		}

		/* Alternating row colors */
		#example1 tbody tr:nth-child(even) {
			background-color: white;
		}

		/* Hover effect on rows */
		#example1 tbody tr:hover {
			background-color: white;
		}



		
	</style>


<section class="content">
<p

					style="font-size: 20px; background-color: #ffffff; padding: 10px; border-radius: 10px; display: flex; align-items: center;">
					<i class="fa fa-list-alt"
						style="margin-right: 10px; background-color: #b3c3ff; padding: 8px; border-radius: 50%; color: white"></i>
					<strong style="flex: 1; display: inline;">รายการจองห้องประชุม</strong>
				</p>


		<div class="box custom-box">
		
			<div class="box-body">

			<form method="get" action="">
			<p
						style="font-size: 15px; background-color: #ffffff; padding: 10px; border-radius: 10px; display: flex; align-items: center;">
					
						<label for="date" style="margin-left:10px;font-size:18px;">เลือกวันที่เวลา :</label>

						<label for="date" style="margin-left:10px;font-size:18px;">เริ่ม :</label>
						<input type="date" id="date" name="date" required
									value="<?= isset($_GET['date']) ? $_GET['date'] : date('Y-m-d') ?>"
									style="border: 1px solid white; border-radius: 5px; padding: 5px; background-color: #e6f7ff; margin-left:10px;">

						<label for="date" style="margin-left:10px;font-size:18px;">สิ่นสุด :</label>
						<input type="date" id="date_end" name="date_end" required
						value="<?= isset($_GET['date_end']) ? $_GET['date_end'] : date('Y-m-d', strtotime('+1 month')) ?>"
									style="border: 1px solid white; border-radius: 5px; padding: 5px; background-color: #e6f7ff; margin-left:10px;">

	
			
									&nbsp;&nbsp;&nbsp;
							<label for="room"style="font-size: 18px;">ห้องประชุม : </label>
							&nbsp;&nbsp;
							<select id="room" name="room" required class="narrow-select" style="margin-left: 10px; margin-right: 10px;  width: 150px;">
								
							<option value="#" <?php echo (empty($_GET['room']) ? 'selected' : ''); ?>>--เลือก--</option>
							<?php
									$sql = 'SELECT room_id , room_name FROM room_table';
									$query_1 = $this->db->query($sql)->result();

									foreach ($query_1 as $room) {
										$selected = (isset($_GET['room']) && $_GET['room'] == $room->room_id) ? 'selected' : '';
										echo '<option value="' . $room->room_id  . '" ' . $selected . '>' . $room->room_name . '</option>';
									}
									?>
							</select>

							&nbsp;&nbsp;&nbsp;
							<label for="status"style="font-size: 18px;">สถานะ : </label>
							&nbsp;&nbsp;
							<select id="status" name="status" required class="narrow-select">
								
							<option value="#" <?php echo (empty($_GET['status']) ? 'selected' : ''); ?>>--เลือก--</option>
							<?php
									$sql = 'SELECT * FROM car_status';
									$query_1 = $this->db->query($sql)->result();

									foreach ($query_1 as $status) {
										$selected = (isset($_GET['status']) && $_GET['status'] == $status->status_id) ? 'selected' : '';
										echo '<option value="' . $status->status_id  . '" ' . $selected . '>' . $status->status_name . '</option>';
									}
									?>
							</select>

				

							&nbsp;
							&nbsp;

<button class="btn btn-custom-gray btn-lg" style="font-size: 15px;"
	type="submit">ค้นหา</button>


</form>

				<div class="row">

					<div class="col-sm-12">

						<table id="example1" class="table table-silver table-bordered table-striped dataTable"
							role="grid" aria-describedby="example1_info" style="font-size: 16px;">
							<thead>
								<tr role="row" class="info">

									<th tabindex="0" rowspan="1" colspan="1" style="width: 23%; text-align: center;">
									ชื่อห้องประชุม</th>

									<th tabindex="0" rowspan="1" colspan="1" style="width: 23%; text-align: center;">
									จุดประสงค์การใช้</th>

									<th tabindex="0" rowspan="1" colspan="1" style="width: 23%; text-align: center;">
									ข้อมูลผู้จอง</th>

									<th tabindex="0" rowspan="1" colspan="1" style="width: 12%; text-align: center;">
									สร้างเมื่อ</th>

									<th tabindex="0" rowspan="1" colspan="1" style="width: 10%; text-align: center;">
									สถานะ</th>
									<th tabindex="0" rowspan="1" colspan="1" style="width: 15%; text-align: center;">
									จัดการ
									</th>
								

								</tr>
							</thead>
							<tbody>


								<?php

									foreach ($list_room['list_room'] as $key => $list_room) {

										$room_id = $list_room->room_id;
									
										$booking_id = $list_room->booking_id;
										$user_id = $list_room->user_id;
										$date_time = $list_room->date_time;

										$start_time_formatted = $list_room->start_time;
										$end_time_formatted = $list_room->end_time;
										
										$start_time = substr($start_time_formatted, 0, 5); // เอาเฉพาะ 5 ตัวแรก (HH:mm)
										$end_time = substr($end_time_formatted, 0, 5);

										
										$number_people = $list_room->number_people;
										$meeting_topic = $list_room->meeting_topic;
										$name_requester = $list_room->name_requester;
										$tel_requester = $list_room->tel_requester;

										$note = $list_room->note;

										$room_name = $list_room->room_name;
										$room_capacity = $list_room->room_capacity;
										$room_address = $list_room->room_address;
										$room_details = $list_room->room_details;
										$room_equipment = $list_room->room_equipment;

										$room_attendant = $list_room->room_attendant;
										$room_attendant_tel = $list_room->room_attendant_tel;

										$room_note = $list_room->room_note;

										$status_name = $list_room->status_name;

										$room_status = $list_room->room_status;

										$date_add = $list_room->date_add;

										$cancel_detail = $list_room->cancel_detail;
										$date_cancel = $list_room->date_cancel;

										list($date_cancel_, $time_cancel) = explode(' ', $date_cancel);

										list($date, $time) = explode(' ', $date_add);

										// ดึงข้อมูลเวลาโดยไม่เอาวินาที
										$time_without_seconds = substr($time, 0, 5);

										$time_without_seconds_cancel = substr($time_cancel, 0, 5);


								
									?>
									<tr role="row">

									<td style="font-size: 15px;">
									<p style="font-size:18px; color:#4281ff;"><strong> 	<?=  $room_name; ?></strong> </p>

									<p style="font-size:15px;">
วันเวลาประชุม :	<?=  $date_time; ?> 
										<?=  $start_time; ?>  - <?=  $end_time; ?> 
									
							</p>		
										</td>

										<td style="font-size: 15px;">
										ใข้สำหรับ ประชุม &nbsp;&nbsp;<?=  $meeting_topic; ?>
										</td>

										<td style="font-size: 15px;">
										<p>
										ชื่อ-นามสกุล : 	<?=  $name_requester; ?>
										</p>	
										
										<i class="fa fa-phone"> </i>  <?=  $tel_requester; ?>
										</td>
							
							
										<td style="font-size: 15px; text-align:center;">
										<p>	<?=  $date; ?></p>	
										<?=  $time_without_seconds; ?>
										</td>


								

										<td align="center" style="font-size: 15px; text-align: center; color: black; border-color: inherit;
										<?php
										if ($room_status == 1) {
											echo 'color: white;';
										} elseif ($room_status == 2) {
											echo 'color: back;';
										} elseif ($room_status == 3) {
											echo 'color: white;';
										}
										?>
									">
											<?php
											if ($room_status == 1) {
												echo '<div style="padding: 3px;font-size:16px; border-radius: 5px; width: 70px; max-width: 100%; background-color: #4281ff;">' . $status_name . '</div>';
											} elseif ($room_status == 2) {
												echo '<div style="padding: 3px;font-size:16px; border-radius: 5px;width: 70px; max-width: 100%;  background-color: #d9d9d9;">' . $status_name . '</div>';
											} elseif ($room_status == 3) {
												echo '<div style="padding: 3px; font-size:16px;border-radius: 5px; width: 70px; max-width: 100%; background-color: #1fd13a;">' . $status_name . '</div>';
											} else {
												echo $status_name;
											}
											?>
										</td>

									
										<td align="center">


						

										<a href="#" class="open-popup" data-toggle="modal" data-target="#popupModal"
									
											 data-date_time="<?= $date_time; ?>"
											 data-start_time="<?= $start_time; ?>"
											data-end_time="<?= $end_time; ?>"
											data-name_requester="<?= !empty($name_requester) ? $name_requester : '-'; ?>" 
											data-meeting_topic="<?= !empty($meeting_topic) ? $meeting_topic : '-'; ?>" 
											data-tel_requester="<?= !empty($tel_requester) ? $tel_requester : '-'; ?>" 
											data-number_people="<?= !empty($number_people) ? $number_people : '-'; ?>" 
											data-room_name="<?= !empty($room_name) ? $room_name : '-'; ?>" 
											data-room_capacity="<?= !empty($room_capacity) ? $room_capacity : '-'; ?>" 
											data-room_address="<?= !empty($room_address) ? $room_address : '-'; ?>" 
											data-room_details="<?= !empty($room_details) ? $room_details : '-'; ?>" 
											data-room_equipment="<?= !empty($room_equipment) ? $room_equipment : '-'; ?>" 
											data-room_attendant="<?= !empty($room_attendant) ? $room_attendant : '-'; ?>" 
											data-room_attendant_tel="<?= !empty($room_attendant_tel) ? $room_attendant_tel : '-'; ?>" 
											data-cancel_detail="<?= !empty($cancel_detail) ? $cancel_detail : '-'; ?>" 
											data-date_cancel="<?= !empty($date_cancel) ? $date_cancel : '-'; ?>" 
											data-time_without_seconds_cancel="<?= !empty($time_without_seconds_cancel) ? $time_without_seconds_cancel : '-'; ?>" 
											data-note="<?= !empty($note) ? $note : '-'; ?>" 
											data-status_name="<?= $status_name; ?>"
											data-room_status="<?= $room_status; ?>"
											data-room_note="<?= !empty($room_note) ? $room_note : '-'; ?>" 
											>
											
											<i class="fa fa-search" style="color: black; margin-right: 3px;"></i>
										</a>
										&nbsp; 
										<a href="#" class="" <?php echo ($room_status == 1) ? 'onclick="onEdit(' . $booking_id . ')" style="color: black;"' : 'style="color: gray; pointer-events: none;"'; ?>>
    <i class="fa fa-edit" style="margin-right: 3px; font-size:18px;"></i>
</a>

										
											&nbsp;
										<?php
											if ($room_status == 2) {
												echo '<span style="color: gray;">';
												$disable_button = 'disabled';
												$button_color = 'gray';
											} elseif ($room_status == 3) {
												echo '<span style="color: gray;">';
												$disable_button = 'disabled';
												$button_color = 'gray';
											} else {
												$disable_button = '';
												$button_color = 'black';
											}
											?>

											<?php if ($room_status == 1): ?>
												<a href="#" class="" data-toggle="modal" data-target="#popupModal_date_cancel"
													data-booking_id="<?= $booking_id; ?>" <?= $disable_button; ?>>
													<i class="fa fa-ban"
														style="color: <?= $button_color; ?>; margin-right: 7px;font-size:18px;"></i>
												</a>
											<?php else: ?>
												<i class="fa fa-ban"
													style="color: <?= $button_color; ?>; margin-right: 7px;font-size:18px;"></i>
											<?php endif; ?>

											<?php
											if ($room_status == 2 && $room_status == 3) {
												echo '</span>';
											}
											?>

										</td>



									</tr>
									<?php
								} ?>
							</tbody>
						</table>
						
					</div>
				</div>
			</div>


		</div>

		<style>
	/* Customize the width, background color, and rounded corners of the modal */
	.modal-content {
		border-radius: 5px;
		/* Add rounded corners */
		background-color: white;
		/* Set your desired background color */
		padding: 20px;
		/* Add some padding for content */
	}

	/* Define custom width for the modal */
	.custom-width {
		max-width: 800px;
		/* Set your desired width here */
		width: 90%;
		/* You can use a percentage value if needed */
	}


	.form-control {

		border-radius: 7px;
	}
</style>



		<div class="modal fade" id="popupModal" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document" style="width: 700px;">
		<div class="modal-content">

		<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h3 class="modal-title" id="popupModalLabel" style="color:back;">รายละเอียดการขอใช้ห้องประชุม</h3>

			</div>

			<div class="modal-body" style="margin-left: 15px;">

			<div style="font-size: 18px; background-color: #57a2ff; padding: 3px; border-radius: 5px;">
					<i class="fa fa-book" style="margin-left:5px;"></i>&nbsp;&nbsp; ข้อมูลการขอใช้งาน
				</div>
				
			<table class="table table-bordered">


			<tr>
						<th class="text-left small-cell" style="font-size: 15px; width:150px;">วันที่ขอใช้</th>
						<td style="font-size: 15px; width:150px;">
							<span id="date_time"></span><br>
						</td>
					</tr>
					<tr>
						<th class="text-left small-cell" style="font-size: 15px;">เวลาที่ขอใช้</th>
						<td style="font-size: 15px;">


							&nbsp;&nbsp;<span id="start_time"></span> -<span id="end_time"></span> น.
							<br>
						</td>
					</tr>


					<tr>
						<th class="text-left small-cell" style="font-size: 15px;">ชื่อห้องประชุม</th>
						<td style="font-size: 15px;">
							&nbsp;&nbsp;<span id="room_name"></span>
							<br>

						</td>
					</tr>

					<tr>
						<th class="text-left small-cell" style="font-size: 15px;">สถานที่</th>
						<td style="font-size: 15px;">

							&nbsp;&nbsp;<span id="room_address"></span>
							<br>
						</td>
					</tr>

					<tr>
						<th class="text-left small-cell" style="font-size: 15px;">ผู้ดูแลห้องประชุม</th>
						<td style="font-size: 15px;">


							&nbsp;&nbsp;<span id="room_attendant"></span>
							<br>
						</td>
					</tr>
					<tr>
						<th class="text-left small-cell" style="font-size: 15px;">เบอร์โทรศัพท์มือถือ</th>
						<td style="font-size: 15px;">


							&nbsp;&nbsp;<span id="room_attendant_tel"></span>
							<br>
						</td>
					</tr>





		<tr>
			<th class="text-left small-cell" style="font-size: 15px;">หัวข้อการประชุม</th>
			<td style="font-size: 15px;">


				&nbsp;&nbsp;<span id="meeting_topic"></span>
				<br>
			</td>
		</tr>
		<tr>
						<th class="text-left small-cell" style="font-size: 15px;">จำนวนผู้เข้าร่วมประชุม</th>
						<td style="font-size: 15px;">


							&nbsp;&nbsp;<span id="number_people"></span>
							<br>
						</td>
					</tr>


					<tr>
						<th class="text-left small-cell" style="font-size: 15px;">ชื่อผู้ขอใช้</th>
						<td style="font-size: 15px;">


							&nbsp;&nbsp;<span id="name_requester"></span>
							<br>
						</td>
					</tr>
					<tr>
						<th class="text-left small-cell" style="font-size: 15px;">เบอร์โทรศัพท์ผู้ขอใช้</th>
						<td style="font-size: 15px;">


							&nbsp;&nbsp;<span id="tel_requester"></span>
							<br>
						</td>
					</tr>
					<tr>
						<th class="text-left small-cell" style="font-size: 15px;">หมายเหตุ</th>
						<td style="font-size: 15px;">


							&nbsp;&nbsp;<span id="room_note"></span>
							<br>
						</td>
					</tr>
					
					</table>

					
					<p style="font-size: 18px; background-color: #d9d9d9; padding: 3px; border-radius: 5px; display: none;"
					id="cancel_detail_title">
					<i class="fa fa-user" style="margin-left:5px;"></i> &nbsp;&nbsp; ข้อมูลการยกเลิก
				</p>

				<table class="table table-bordered" id="cancel_table" style="display: none;">
		

					<tr>
						<th class="text-left small-cell" style="font-size: 15px; width:150px;">วันที่เวลา</th>
						<td style="font-size: 15px; width:150px;">

							&nbsp;&nbsp;<span id="date_cancel"></span> 
						</td>
					</tr>
					<tr>
						<th class="text-left small-cell" style="font-size: 15px; width:150px;">รายละเอียกดการยกเลิก</th>
						<td style="font-size: 15px; width:150px;">

							&nbsp;&nbsp;<span id="cancel_detail"></span>
						</td>
					</tr>

				</table>



				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
			</div>
		</div>
	</div>
</div>






<div class="modal fade" id="popupModal_date_cancel" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h3 class="modal-title" id="popupModalLabel">ยกเลิกการจอง</h3>
			</div>
			<div class="modal-body">

				<p><span style="display: none;" id="booking_id"></span></p>

				<div class="form-group">
					<label for="" style="font-size:16px;"><strong class="text-danger">*</strong>กรอกเหตุผลการยกเลิกการจอง</label>
					<input type="text" class="form-control" id="cancel" name="cancel" placeholder="เหตุผลการยกเลิก">
				</div>

			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-custom" id="saveChangesButton"
					style="background-color:#4281ff; color:white;" onclick="onSave_cancel()">บันทึกข้อมูล</button>

				<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
			</div>
		</div>
	</div>
</div>





	</section>

<!--  -->
</div>


<script>

$('#popupModal_date_cancel').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget);
		var modal = $(this);

		modal.find('#booking_id').text(button.data('booking_id'));

	});


$('#popupModal').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget); // ลิงก์ "เพิ่มเติม" ที่ถูกคลิก
		var modal = $(this);

		// ดึงข้อมูลจาก data-attributes และแสดงใน Modal
		modal.find('#date_time').text(button.data('date_time'));
		modal.find('#start_time').text(button.data('start_time'));
		modal.find('#end_time').text(button.data('end_time'));
		modal.find('#name_requester').text(button.data('name_requester'));
		modal.find('#meeting_topic').text(button.data('meeting_topic'));
		modal.find('#tel_requester').text(button.data('tel_requester'));
		modal.find('#number_people').text(button.data('number_people'));
		modal.find('#room_name').text(button.data('room_name'));
		modal.find('#room_capacity').text(button.data('room_capacity'));
		modal.find('#room_address').text(button.data('room_address'));
		modal.find('#room_details').text(button.data('room_details'));
		modal.find('#room_equipment').text(button.data('room_equipment'));
		modal.find('#room_attendant').text(button.data('room_attendant'));
		modal.find('#room_attendant_tel').text(button.data('room_attendant_tel'));
		modal.find('#status_name').text(button.data('status_name'));
		modal.find('#room_note').text(button.data('room_note'));
		modal.find('#note').text(button.data('note'));


		var room_status = button.data('room_status');
		var cancelDetail = button.data('cancel_detail');
		var dateCancel = button.data('date_cancel');


		var cancelTable = $('#cancel_table');
		var cancelDetailSpan = $('#cancel_detail_title');


		if (room_status == 2) {
			cancelTable.show();
			cancelDetailSpan.show();
			$('#cancel_detail').text(cancelDetail);
			$('#date_cancel').text(dateCancel);
		
		} else if (room_status == 3) {
			cancelTable.hide();
			cancelDetailSpan.hide();
			$('#cancel_detail').text('');
			$('#date_cancel').text('');
			
		} else if (room_status == 1){
			cancelTable.hide();
			cancelDetailSpan.hide();
			$('#cancel_detail').text('');
			$('#date_cancel').text('');
			
		}




	});



	function onEdit(booking_id){
		// alert(booking_id);
		window.location = "<?= base_url(); ?>room_system/admin/edit_requestRoom_total/" + booking_id;

	}


	function onSave_cancel() {
		var booking_id = $("#booking_id").text();
		var cancel = $("#cancel").val();

		var formData = new FormData();
		
		if (cancel === '') {
			alert('กรุณากรอกรายละเอียดการยกเลิกการจอง');
			$('#cancel').focus();
			return false;
		}


		if (confirm('คุณต้องการยกเลิกการจองใช่หรือไม่')) {
			formData.append('booking_id', booking_id);
			formData.append('cancel', cancel);

			$.ajax({
				url: "<?= base_url(); ?>room_system/Admin/update_cancel",
				type: 'POST',
				data: formData,
				contentType: false,
				processData: false,
				async: false,
				success: function (data) {
					// alert(data);
					$("#btnSave").attr("disabled", true);
					window.location = "<?= base_url(); ?>room_system/Admin/list_requesterRoom_total";
				}
			});
			return false;
		}
	}


</script>
