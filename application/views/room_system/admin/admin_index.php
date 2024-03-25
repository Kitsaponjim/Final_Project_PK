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
		<div class="col-sm-9">

			<div class="box custom-box">

				<section class="content-header" style="display: flex; align-items: center;">

					<i class="fa fa-list" style="margin-right: 10px; font-size:18px;padding: 8px; border-radius: 50%; color: back"></i>

					<strong style="flex: 1; display: inline; font-size:18px;">ข้อมูลรายการจองห้องประชุม วันที่
						<span style="color:#4281ff;">
							<?php
							$date = isset($_POST['date']) ? $_POST['date'] : (isset($_GET['date']) ? $_GET['date'] : date('Y-m-d'));

							echo date('d-m-Y', strtotime($date));
							?>
						</span>
					</strong>

				</section>

				<br>


				<div class="box-body">

					<div class="row">

						<div class="col-sm-12">

							<table id="example1" class="table table-silver table-bordered table-striped dataTable"
								role="grid" aria-describedby="example1_info" style="text-align: center;font-size:16px;">
								<thead>
									<tr role="row" class="info">

										<th tabindex="0" rowspan="1" colspan="1" style="width: 23%; text-align: left;">
											ชื่อห้องประชุม</th>

										<th tabindex="0" rowspan="1" colspan="1" style="width: 23%; text-align: left;">
											ชื่อผู้จอง</th>

										<th tabindex="0" rowspan="1" colspan="1"
											style="width: 17%; text-align: center;">
											เวลาเริ่มต้น/สิ้นสุด</th>

										<th tabindex="0" rowspan="1" colspan="1" style="width: 8%; text-align: center;">
											สถานะ</th>




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

												<p style="font-size:18px; color:#4281ff; text-align:left;"><strong>
														<?= $room_name; ?>
													</strong> </p>
											</td>


											<td style="font-size: 15px; text-align:left;">

												<?= $name_requester; ?>

											</td>

											<td style="font-size: 15px; text-align:center;">
												<?= $start_time; ?> -
												<?= $end_time; ?>

											</td>


											<td align="center" style="font-size: 15px; text-align: center; color: black; border-color: inherit;
										<?php
										if ($room_status == 1) {
											echo 'color: white; ';
										} elseif ($room_status == 2) {
											echo 'color: back;';
										} elseif ($room_status == 3) {
											echo 'color: white;';
										}
										?>
									">
												<?php
												if ($room_status == 1) {
													echo '<div style="padding: 3px; border-radius: 5px;  width: 70px; max-width: 100%; background-color: #4281ff;">' . $status_name . '</div>';
												} elseif ($room_status == 2) {
													echo '<div style="padding: 3px; border-radius: 5px;width: 70px; max-width: 100%;  background-color: #d9d9d9;">' . $status_name . '</div>';
												} elseif ($room_status == 3) {
													echo '<div style="padding: 3px; border-radius: 5px; width: 70px; max-width: 100%; background-color: #1fd13a;">' . $status_name . '</div>';
												} else {
													echo $status_name;
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



		</div>

		<div class="col-sm-3">

			<form method="get" action="">

				<div class="box custom-box">

				<section class="content-header">

				<div>
					<?php 
					
					$sql = "SELECT * FROM room_time";
					$row = $this->db->query($sql)->row();

					$start = $row->start_time;
					$end = $row->end_time;

					$start_time =  date('H:i', strtotime($start));
					$end_time =  date('H:i', strtotime($end));
					?>

				<!-- <span>
	เวลา <?= $start_time ?> -  <?= $end_time ?> 

				</span>  -->


				</div>


					<div style="margin-top:15px;">
					<i class="fa fa-calendar" style="margin-left:10px;"></i>
						<label for="date" style="margin-left:5px; font-size:18px;">เลือกวันที่ </label>
						<br>
						<input type="date" id="date" name="date"
							value="<?= isset($_POST['date']) ? $_POST['date'] : (isset($_GET['date']) ? $_GET['date'] : date('Y-m-d')) ?>"
							style="border: 1px solid white; border-radius: 5px; padding: 5px; background-color: #e6f7ff; margin-left:10px;">
					</div>
<br>
					<div style="margin-top:15px;">
						<label for="room" style="margin-left:10px; font-size:18px;">ห้องประชุม  </label>

						<br>
						<select id="room" name="room" required class="narrow-select"
							style="margin-left: 10px; margin-right: 10px;  width: 150px;">

							<option value="#" <?php echo (empty($_GET['room']) ? 'selected' : ''); ?>>--เลือก--</option>
							<?php
							$sql = 'SELECT room_id , room_name FROM room_table';
							$query_1 = $this->db->query($sql)->result();

							foreach ($query_1 as $room) {
								$selected = (isset($_GET['room']) && $_GET['room'] == $room->room_id) ? 'selected' : '';
								echo '<option value="' . $room->room_id . '" ' . $selected . '>' . $room->room_name . '</option>';
							}
							?>
						</select>
					</div>


					<br>

					<button type="submit" class="btn btn-custom-gray btn-lg" style="font-size: 15px;">ค้นหา</button>

					<br>
					<br>

				</div>

						</section>

			</form>


		</div>





	</section>

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
