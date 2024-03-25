<div class="content-wrapper">
	<section class="content">
		<p
			style="font-size: 20px; background-color: #ffffff; padding: 10px; border-radius: 10px; display: flex; align-items: center;">

			<i class="fa fa-list"
				style="margin-right: 10px; background-color: #b3c3ff; padding: 8px; border-radius: 50%; color: white"></i>

			<strong style="flex: 1; display: inline;">รายการห้องประชุม</strong>
		</p>

		<div class="container-fluid">

			<div class="row">
				<style>
					.custom-box {
						background-color: white;
						border-radius: 10px;
						box-shadow: none;
						border-top: solid white;
						/* กำหนดสีขอบด้านบนเป็นสีขาว */
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
				</style>


				<!-- <form action="<?= site_url('room_system/room/admin_reserve_room'); ?>" method="post" -->

				<form action="<?= site_url('room_system/room/admin_reserve_room'); ?>" method="post"
					onsubmit="return checkTime()">

					<p
						style="font-size: 15px; background-color: #ffffff; padding: 10px; border-radius: 10px; display: flex; align-items: center;">
						<label for="date" style="margin-left:10px;font-size: 18px;">เลือกวันที่ :</label>
						<input type="date" id="date" name="date" required min="<?= date('Y-m-d'); ?>"
							value="<?= isset($_POST['date']) ? $_POST['date'] :  date('Y-m-d') ?>"
							style="border: 1px solid white; border-radius: 5px; padding: 5px; background-color: #e6f7ff; margin-left:10px;">

						<label for="start_time" style="margin-left:30px;font-size: 18px;">เวลา &nbsp; &nbsp;เริ่ม :</label>
						<select id="start_time" name="start_time" required oninput="validateNumber()"
							style="border: 1px solid white; border-radius: 5px; padding: 5px; background-color: #e6f7ff; margin-left:10px;">

							<?php
							$sql_time = "SELECT id_time, start_time, end_time FROM room_time";
							$result_time = $this->db->query($sql_time)->row();

							if ($result_time) {
								$startTime = strtotime($result_time->start_time);
								$endTime = strtotime($result_time->end_time);


								while ($startTime <= $endTime) {
									$formattedTime = date("H:i", $startTime);
									echo '<option value="' . $formattedTime . '"';

									// ตรวจสอบว่ามีการส่งค่าเวลามาจากฟอร์มหรือไม่
									if (isset($_POST['start_time']) && $_POST['start_time'] == $formattedTime) {
										echo ' selected';
									}

									echo '>' . $formattedTime . '</option>';

									$startTime += 1800; // เพิ่มขึ้นทีละ 30 นาที
								}
							}

							?>
						</select>

						<label for="end_time" style="margin-left:30px;font-size: 18px;">สิ้นสุด :</label>
						<select id="end_time" name="end_time" required oninput="validateNumber()"
							style="border: 1px solid white; border-radius: 5px; padding: 5px; background-color: #e6f7ff; margin-left:10px;">


							<?php
							$sql_time = "SELECT id_time, start_time, end_time FROM room_time";
							$result_time = $this->db->query($sql_time)->row();

							if ($result_time) {
								$startTime = strtotime($result_time->start_time);
								$endTime = strtotime($result_time->end_time);

								while ($startTime <= $endTime) {
									$formattedTime = date("H:i", $startTime);
									echo '<option value="' . $formattedTime . '"';

									// ตรวจสอบว่ามีการส่งค่าเวลามาจากฟอร์มหรือไม่
									if (isset($_POST['end_time']) && $_POST['end_time'] == $formattedTime) {
										echo ' selected';
									}

									echo '>' . $formattedTime . '</option>';

									$startTime += 1800; // เพิ่มขึ้นทีละ 30 นาที
								}
							}

							?>
						</select>



						<button class="btn btn-custom-gray btn-lg" style="font-size: 15px; margin-left:20px;"
							type="submit">ค้นหา</button>
						&nbsp; &nbsp;
						<strong>
							<small id="TimeError" class="text-danger"></small>
						</strong>
						<strong style="flex: 1; display: inline;"></strong>
					</p>
				</form>
				
				<script>
					function checkTime() {
						var date = document.getElementById('date').value;
						var start_time = document.getElementById('start_time').value;
						var end_time = document.getElementById('end_time').value;

						var TimeError = document.getElementById('TimeError');


						// แปลงเวลาเป็นวินาที
						var start_timestamp = new Date(date + ' ' + start_time).getTime() / 1000;
						var end_timestamp = new Date(date + ' ' + end_time).getTime() / 1000;


						// ตรวจสอบว่า date เป็นวันที่ปัจจุบันหรือไม่
						var currentDate = new Date();
						var currentDateString = currentDate.toISOString().split('T')[0]; // รับรูปแบบ YYYY-MM-DD ของวันที่ปัจจุบัน
						if (date === currentDateString) {
							var currentTimestamp = new Date().getTime() / 1000;
							if (start_timestamp <= currentTimestamp) {
								TimeError.textContent = 'เวลาเริ่มต้องมากกว่าเวลาปัจจุบัน';
								return false;
							}

						}
						// ตรวจสอบว่าเวลาสิ้นสุดมากกว่าเวลาเริ่มหรือไม่
						if (end_timestamp <= start_timestamp) {
							TimeError.textContent = 'เวลาสิ้นสุดต้องมากกว่าเวลาเริ่มต้น';
							return false; // ไม่ส่งฟอร์มถ้าข้อมูลไม่ถูกต้อง
						} else {
							// ตรวจสอบห่างกันมากกว่าหรือเท่ากับ ครึ่ง ชั่วโมง
							if ((end_timestamp - start_timestamp) < 1800) {
								TimeError.textContent = 'ช่วงเวลาต้องห่างกันอย่างน้อย 1 ชั่วโมง';
								return false; // ไม่ส่งฟอร์มถ้าข้อมูลไม่ถูกต้อง
							}
							// ตรวจสอบห่างกันไม่เกิน 3 ชั่วโมง
							// else if ((end_timestamp - start_timestamp) > 10800) {
							// 	TimeError.textContent = 'ช่วงเวลาต้องไม่เกิน 3 ชั่วโมง';
							// 	return false; // ไม่ส่งฟอร์มถ้าข้อมูลไม่ถูกต้อง
							// }
							 else {
								// ถ้าถูกต้อง กำหนดข้อความเป็นว่าง
								TimeError.textContent = '';
								return true; // ส่งฟอร์มถ้าข้อมูลถูกต้อง
							}
						}
					}
				</script>



				<script>
					function check_(car_id) {
						var start_date = "<?= isset($_POST['start_date']) ? $_POST['start_date'] : '' ?>";
						var end_date = "<?= isset($_POST['end_date']) ? $_POST['end_date'] : '' ?>";

						if (!start_date || !end_date) {
							alert('โปรดเลือกวันที่เริ่มและวันที่สิ้นสุด');
							$('#start_date').focus();
							window.location = "<?= base_url(); ?>car_system/Reserve/list_car";
						}

						else {
							$.ajax({
								url: "<?= base_url(); ?>car_system/reserve/list_car_check",
								type: 'POST',
								data: {
									car_id: car_id,
									start_date: start_date
								},
								async: false,
								success: function (data) {
									if (data.trim() !== "ok" && data.trim() !== "") {
										alert(data);
									}
								}
							});
							return false;
						}

					}
				</script>



				<div class="col-sm-12">
					<?php

					if (!empty($data['data'])) {

						foreach ($data['data'] as $value) {

							$room_id = $value->room_id;
							$room_name = $value->room_name;
							$room_capacity = $value->room_capacity;
							$room_address = $value->room_address;
							$room_details = $value->room_details;
							$room_equipment = $value->room_equipment;
							$room_attendant = $value->room_attendant;
							$room_attendant_tel = $value->room_attendant_tel;
							$room_note = $value->room_note;
							$room_status = $value->room_status;
		
							$room_status = $value->room_status;

							$equipment_name = $value->equipment_names;

							$image_data = base64_encode($value->image_data);
							$image_mime_type = $value->image_mime_type;
							$src = 'data:' . $image_mime_type . ';base64,' . $image_data;


							$image_data_r = base64_encode($value->image_data);
							$image_mime_type_r = $value->image_mime_type;
							$src_r = 'data:' . $image_mime_type . ';base64,' . $image_data;

							?>
							<div class="col-sm-4">

								<div class="box custom-box">
									<div class="box-body">
										<img src="<?php echo $src; ?>" class="card-img-top mt-2" alt="ระบบจองห้องประชุม"
											style="height: 100px; width: 160px; border-radius: 20px; margin-top:10px; margin-left:10px;">

										<div style="position: absolute; top: 30px; right: 0; left: 40px; width: 60px; height: 40px;
													color: white; text-align: center; border-radius: 10px; line-height: 40px;
													transform: translate(-100%, -50%);
													<?php
													if ($room_status == 1) {
														echo 'background-color: green;">พร้อม';
													} elseif ($room_status == 2) {
														echo 'background-color: #ff5e5e;">ไม่พร้อม';
													} else {
														echo 'background-color: gray;">ไม่ได้กำหนดสถานะ';
													}
													?>
										</div>
										<br>
										<br> 


									<span style=" font-size: 20px; color: #4281ff;margin-left: 20px;">
										
										<?= $room_name ? $room_name : '-'; ?>
											</span>

											<br>
											<strong style="margin-left: 20px; margin-top:15px; font-size:18px;">สถานที่ :</strong>
										 <span style="font-size:16px;">
										 <?= $room_address ? $room_address : '-'; ?>
										 </span>	
											<br>
											<strong style="margin-left: 20px; margin-top:15px;font-size:18px;">ผู้ดูแลห้อง :</strong>
											<span style="font-size:16px;">
											<?= $room_attendant ? $room_attendant : '-'; ?>
											</span>	

											<p style="font-size: 20px; display: flex; align-items: center; margin-top:5px;">
												<strong style="flex: 1; display: inline; margin-left: 20px;"> จำนวน
													<?= $room_capacity ? $room_capacity : '-'; ?>
													ที่นั่ง
												</strong>
												<a href="#" class="open-popup" data-toggle="modal"
													data-target="#popupModal_room"
													data-room_name="<?= !empty($room_name) ? $room_name : '-'; ?>"
													data-room_capacity="<?= !empty($room_capacity) ? $room_capacity : '-'; ?>"
													data-room_address="<?= !empty($room_address) ? $room_address : '-'; ?>"
													data-room_details="<?= !empty($room_details) ? $room_details : '-'; ?>"
													data-room_equipment="<?= !empty($equipment_name) ? $equipment_name : '-'; ?>"
													data-room_attendant="<?= !empty($room_attendant) ? $room_attendant : '-'; ?>"
													data-room_attendant_tel="<?= !empty($room_attendant_tel) ? $room_attendant_tel : '-'; ?>"
													data-image_data="<?= $image_data; ?>"
													data-image_mime_type="<?= $image_mime_type; ?>" data-src="<?= $src; ?>"
													data-room_note="<?= !empty($room_note) ? $room_note : '-'; ?>">

													<i class="fa fa-search" style="color: black; margin-right: 3px;"></i>
												</a>

												&nbsp;&nbsp;


												<a href="#" class="open-popup" data-toggle="modal"
													data-target="<?= ($room_status == 2) ? '' : '#popupModal_reserve'; ?>"
													data-room_id="<?= $room_id; ?>" data-room_name="<?= $room_name; ?>"
													data-room_capacity="<?= $room_capacity; ?>"
													data-room_address="<?= $room_address; ?>"
													data-room_details="<?= $room_details; ?>"
													data-room_equipment="<?= $room_equipment; ?>"
													data-room_attendant="<?= $room_attendant; ?>" data-src="<?= $src_r; ?>"
													data-image_mime_type="<?= $image_mime_type_r; ?>"
													data-room_attendant_tel="<?= $room_attendant_tel; ?>"
													data-room_note="<?= $room_note; ?>"
													data-date_r="<?= isset($_POST['date']) ? $_POST['date'] : '' ?>"
													data-start_time="<?= isset($_POST['start_time']) ? $_POST['start_time'] : '' ?>"
													data-end_time="<?= isset($_POST['end_time']) ? $_POST['end_time'] : '' ?>"
													role="button"
   <?= ($room_status == 2) ? 'style="pointer-events: none;  cursor: not-allowed;"' : 'onclick="checkAndOpenPopup(' . $room_id . ')"'; ?>>

   <button class="btn btn-custom-gray btn-lg" style="<?= ($room_status == 2) ? 'color: gray; background-color: lightgray;' : 'color: white;'; ?> margin-right: 3px; font-size: 16px; margin-left:8px;" type="submit">จอง</button>


   <!-- <button class="btn btn-custom-gray btn-lg"  style="<?= ($room_status == 2) ? 'color: gray;' : 'color: while;'; ?> margin-right: 3px; font-size: 16px; margin-left:8px;" type="submit">จอง</button> -->

</a>


												&nbsp;&nbsp;




											</p>


										</div>
									</div>
								</div>

								<?php
						}
					} else {
						?>
							<br>
							<div class="col-sm-12">
								<div class="box custom-box">
									<div class="box-body"
										style="text-align: center; background-color: #ffffff; padding: 20px; border-radius: 10px;">
										<!-- <i class="fa fa-car" style="font-size: 80px; color: #4281ff;"></i> -->
										<img src="<?php echo base_url('img'); ?>/meeting.png" class="icon" alt="" style="height: 120px; width: 120px;">

										<p style="font-size: 18px; color: #000; margin-top:20px;">ไม่มีรายการห้องประชุม</p>

									</div>
								</div>
							</div>
							<?php
					}
					?>




					</div>
				</div>
			</div>

	</section>
</div>

<script>
function checkAndOpenPopup(roomId) {
    var date = "<?= isset($_POST['date']) ? $_POST['date'] : '' ?>";
    var start_time = "<?= isset($_POST['start_time']) ? $_POST['start_time'] : '' ?>";
    var end_time = "<?= isset($_POST['end_time']) ? $_POST['end_time'] : '' ?>";

    if (date === '' || start_time === '' || end_time === '') {
        alert('กรุณาเลือกวันที่, เวลาเริ่ม, และเวลาสิ้นสุดก่อนเปิด');
		window.location = "<?= base_url(); ?>room_system/room/admin_reserve_room";
    } else {
        checkDates(roomId);
    }

}
</script>



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

	.font-label{
		font-size: 16px;;
	}
</style>


<div class="modal fade" id="popupModal_room" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document" style="width: 800px;">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h3 class="modal-title" style="color: #cf7c38;" id="">รายละเอียดห้องประชุม</h3>

			</div>
			<!-- #cf7c38 -->
			<!-- 57a2ff -->


			<div class="modal-body scrollable">
				

				<div id="imageContainer">
					<img id="src" alt="" style="max-width: 200%; max-height: 200px;">
				</div>

				<i id="fontAwesomeIcon" class="fa fa-comments"
					style="max-width: 300%; max-height: 250px; font-size: 130px; color: #000000;  margin-left:20px; margin-top:20px; margin-bottom:20px;"></i>


				<br>
				<table class="table table-bordered">
					<tr>
						<th class="text-left small-cell" style="font-size: 15px; width:150px;">ชื่อห้องประชุม</th>
						<td style="font-size: 15px; width:150px;">
							<span id="room_name"></span><br>
						</td>
					</tr>
					<tr>
						<th class="text-left small-cell" style="font-size: 15px;">อุปกรณ์</th>
						<td style="font-size: 15px;">


							&nbsp;&nbsp;<span id="room_equipment"></span>
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
						<th class="text-left small-cell" style="font-size: 15px;">จำนวนผู้เข้าร่วมประชุมที่รองรับ</th>
						<td style="font-size: 15px;">

							&nbsp;&nbsp;<span id="room_capacity"></span> &nbsp;ที่นั่ง
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
						<th class="text-left small-cell" style="font-size: 15px;">ข้อมูลอื่นๆ</th>
						<td style="font-size: 15px;">
							&nbsp;&nbsp;<span id="room_note"></span>
							<br>

						</td>
					</tr>

				</table>


				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
				</div>
			</div>


		</div>
	</div>
</div>



<div class="modal fade" id="popupModal_reserve" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel1"
	aria-hidden="true">
	<div class="modal-dialog custom-width" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>


				<p class="modal-title" id="popupModalLabel" style="font-size: 22px; color:back;">
					<strong>กรอกรายละเอียดข้อมูลการจอง</strong>
				</p>
			</div>

			<div class="modal-body">
				<div class="row">


					<div class="box custom-box">

						<div style="display: flex; align-items: center; margin-top: 15px;">

							<div id="imageContainer">
								<img id="src" alt="" style="max-width: 200%; max-height: 150px;border-radius: 10px;">
							</div>

							<i id="fontAwesomeIcon" class="fa fa-comments"
								style="max-width: 300%; max-height: 250px; font-size: 130px; color: #4281ff;  margin-left:20px; margin-top:20px; margin-bottom:20px;"></i>


							<p style="margin-left: 20px;">
							

								<strong style="font-size:22px; color: #4281ff; "> <span id="room_name"></span>
								</strong> 
									
									<br>
								<strong style="font-size:18px; margin-top:16px;">อุปกรณ์ :</strong> <span id="room_capacity"
									style="font-size:16px; margin-left:15px;"></span> <br>

								<strong style="font-size:18px;"> สถานที่ :</strong> <span id="room_address"
									style="font-size:16px;margin-left:15px;"></span> <br>

								<strong style="font-size:18px;"> ผู้ดูแลห้อง :</strong> <span id="room_attendant"
									style="font-size:16px;margin-left:15px;"></span> <br>

							</p>

							<br>
						</div>


					</div>

					<p style="font-size: 18px; color:back;"><strong> ข้อมูลการจอง</span></strong></p>

					<div class="row" style="margin-top:10px;">
						<div class="col-md-6">


							<div class="form-group">
								<label class="font-label" for="">วันที่</label>
								<input type="text" class="form-control" id="date_r" name="" readonly>
							</div>




						</div>

						<div class="col-md-6">
							<!-- combined_data_end -->

							<div class="form-group">
								<label class="font-label"for="">เวลาเริ่ม-สิ้นสุด </label>
								<input type="text" class="form-control" id="combinedData" readonly>
							</div>

						</div>
					</div>



					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="font-label"><strong class="text-danger">*</strong>ชื่อ-นามสกุล (ผู้จอง) </label>
								<input type="text" id="name_requester" name="name_requester" placeholder="ชื่อ-นามสกุล"
									class="form-control rounded-0" oninput="validateName(this);">
								<small id="nameError" class="text-danger"></small>
							</div>

						</div>

						<div class="col-md-6">


							<div class="form-group">
								<label class="font-label"><strong class="text-danger">*</strong>เบอร์โทรศัพท์มือถือ (ผู้จอง) </label>

								<input type="tel" id="tel_requester" name="tel_requester" class="form-control rounded-0"
									placeholder="เบอร์โทรศัพท์มือถือ(ผู้จอง) " maxlength="10"
									oninput="validatePhoneNumber(this);">
								<small id="telError" class="text-danger"></small>
								<script>
									function validatePhoneNumber(input) {
										var telError = document.getElementById('telError');
										var inputValue = input.value;

										// ลบทุกอักขระที่ไม่ใช่ตัวเลข
										var numericValue = inputValue.replace(/[^\d]/g, '');

										// ไม่ให้เริ่มต้นด้วย 0
										if (numericValue.length > 0 && numericValue.charAt(0) !== '0') {
											numericValue = '0' + numericValue.substring(1);
										}

										// จำกัดความยาวไม่เกิน 10 ตัว
										numericValue = numericValue.substring(0, 10);

										// นำค่าที่ได้ไปใส่ใน input
										input.value = numericValue;

										// ตรวจสอบความถูกต้องของเบอร์โทร
										if (!/^[0-9]*$/.test(numericValue)) {
											telError.textContent = 'กรุณากรอกเฉพาะตัวเลข';
										} else if (numericValue.length !== 10) {
											telError.textContent = 'กรุณากรอกเบอร์โทรศัพท์มือถือ 10 หลัก';
										} else if (numericValue.charAt(0) !== '0') {
											telError.textContent = 'เบอร์โทรต้องขึ้นต้นด้วยเลข 0';
										} else {
											telError.textContent = '';
										}

										if (numericValue === '') {
											input.value = '';
											telError.textContent = '';
										}

									}

									function validateName(input) {
										var nameError = document.getElementById('nameError');

										if (!/^[a-zA-Zก-๙ ]+$/.test(input.value)) {
											nameError.textContent = 'กรุณากรอกเฉพาะตัวอักษร';
										} else {
											nameError.textContent = '';
										}
									}

									function validateName(input) {
										var nameError = document.getElementById('nameError');
										var inputValue = input.value;

										if (!/^[a-zA-Zก-๙ ]+$/.test(inputValue)) {
											nameError.textContent = 'กรุณากรอกเฉพาะตัวอักษร';
										} else {
											nameError.textContent = '';
										}
										if (inputValue === '') {
											input.value = '';
											nameError.textContent = '';
										}
									}


								</script>

								<!-- <input type="text" class="form-control" id="tel_reserve" name="tel_reserve"> -->
							</div>

						</div>
					</div>




					<div class="row" style="margin-top:10px;">
						<div class="col-md-6">

							<div class="form-group">
								<label class="font-label" for=""><strong class="text-danger">*</strong>จุดประสงค์การใช้</label>
								<input type="text" class="form-control" id="meeting_topic" name="meeting_topic"
									placeholder="จุดประสงค์การใช้">
							</div>

						</div>

						<div class="col-md-6">

							<div class="form-group">
								<label class="font-label" for=""><strong class="text-danger">*</strong>จำนวนผู้เข้าร่วม</label>
								<input type="tel" id="number_people" name="number_people" class="form-control rounded-0"
									placeholder="จำนวนผู้เข้าร่วม" maxlength="2" oninput="validateNumber(this);">
								<small id="numError" class="text-danger"></small>
							</div>

						</div>

						<script>
							function validateNumber(input) {
								var numError = document.getElementById('numError');
								var inputValue = input.value;

								// ลบทุกอักขระที่ไม่ใช่ตัวเลข
								var numericValue = inputValue.replace(/[^\d]/g, '');

								// จำกัดความยาวไม่เกิน 10 ตัว
								numericValue = numericValue.substring(0, 10);

								// นำค่าที่ได้ไปใส่ใน input
								input.value = numericValue;

								// ตรวจสอบความถูกต้องของเบอร์โทร
								if (!/^[0-9]*$/.test(inputValue)) {
									numError.textContent = 'กรุณากรอกเฉพาะตัวเลข';
								} else {
									numError.textContent = '';
								}
							}
						</script>

					</div>



					<div class="row" style="margin-top:10px;">


						<div class="col-md-6">

							<div class="form-group">
								<label class="font-label"for="">หมายเหตุ </label>
								<textarea id="note" class="form-control" placeholder="หมายเหตุ"></textarea>
							</div>


						</div>
					</div>


					<div class="form-group">
						<textarea style="display: none;" id="room_id" name="room_id"
							class="form-control rounded-0"></textarea>
						<textarea style="display: none;" id="start_time" name="start_time"
							class="form-control rounded-0"></textarea>
						<textarea style="display: none;" id="end_time" name="end_time"
							class="form-control rounded-0"></textarea>
					</div>


				</div>
			</div>
			<div class="modal-footer">

				<button type="button" class="btn btn-custom" id="saveChangesButton"
					style="background-color: #4281ff; color:white; font-size:16px;" onclick="onReserve()">บันทึกข้อมูล</button>

				<button type="button" class="btn btn-secondary" style="font-size:16px;" data-dismiss="modal">ปิด</button>

			</div>
		</div>
	</div>
</div>


<script>


	function onReserve() {

		var room_id = $('#room_id').val();
		var date = $('#date_r').val();
		var start_time = $('#start_time').val();
		var end_time = $('#end_time').val();

		var name_requester = $("#name_requester").val();
		var tel_requester = $("#tel_requester").val();
		var meeting_topic = $("#meeting_topic").val();

		var number_people = $("#number_people").val();
		var note = $("#note").val();


		if (start_time == "") {
			alert("กรุณาเลือกวันที่เริ่มจอง");
			$("#start_time").focus();
			return false;
		} else if (end_time == "") {
			alert("กรุณาเลือกวันที่สิ้นสุดการจอง ");
			$("#end_time").focus();
			return false;

		}
		else if (name_requester == "") {
			alert("กรุณากรอกชื่อ-นามสกุลผู้จอง");
			$("#name_requester").focus();
			return false;

		}
		else if (!/^[a-zA-Zก-๙ ]+$/.test(name_requester)) {
			alert("กรุณากรอกเฉพาะตัวอักษรในชื่อ-นามสกุลผู้จอง");
			$("#name_requester").focus();
			return false;
		}

		else if (tel_requester == "") {
			alert("กรุณากรอกเบอร์โทรศัพท์มือถือผู้จอง");
			$("#tel_requester").focus();
			return false;

		}

		else if (tel_requester.length !== 10) {
			alert("กรุณากรอกเบอร์โทรศัพท์มือถือ 10 หลัก");
			$("#tel_requester").focus();
			return false;
		}

		else if (meeting_topic == "") {
			alert("กรุณากรอกจุดประสงค์ในการใช้ห้องประชุม");
			$("#meeting_topic").focus();
			return false;
		}

		else if (number_people == "") {
			alert("กรุณากรอกจำนวนผู้เข้าร่วม");
			$("#number_people").focus();
			return false;
		}



		if (confirm('คุณต้องการบันทึกข้อมูลใช่หรือไม่')) {

			var pmeters = 'room_id=' + room_id
				+ '&date=' + date
				+ '&start_time=' + start_time
				+ '&end_time=' + end_time
				+ '&name_requester=' + name_requester
				+ '&tel_requester=' + tel_requester
				+ '&meeting_topic=' + meeting_topic
				+ '&number_people=' + number_people
				+ '&note=' + note
				;
			pmeters = pmeters.replace("undefined", "");

			$.ajax({
				url: "<?= base_url(); ?>room_system/room/reserve_room",
				type: 'POST',
				data: pmeters,
				async: false,
				success: function (data) {
					// alert(data);
					$("#btnSave").attr("disabled", true);
					window.location = "<?= base_url(); ?>room_system/room/admin_reserve_room";
				}
			});
			return false;

		}
		return false;


	}



</script>

<script>


	$('#popupModal_room').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget); // ลิงก์ "เพิ่มเติม" ที่ถูกคลิก
		var modal = $(this);

		modal.find('#room_name').text(button.data('room_name'));
		modal.find('#room_capacity').text(button.data('room_capacity'));
		modal.find('#room_address').text(button.data('room_address'));
		modal.find('#room_details').text(button.data('room_details'));
		modal.find('#room_equipment').text(button.data('room_equipment'));
		modal.find('#room_attendant').text(button.data('room_attendant'));
		modal.find('#room_attendant_tel').text(button.data('room_attendant_tel'));
		modal.find('#room_note').text(button.data('room_note'));

		modal.find('#image_data').text(button.data('image_data'));
		modal.find('#image_mime_type').text(button.data('image_mime_type'));

		//การปสดงรูปกรณีไม่มีไฟล์รูป กันเอาไว้
		var src = button.data('src');
		var fontAwesomeIcon = modal.find('#fontAwesomeIcon');
		var imageContainer = modal.find('#imageContainer');

		if (src == 'fa fa-comments') {
			imageContainer.hide();
			fontAwesomeIcon.show();
		} else {
			imageContainer.show();
			fontAwesomeIcon.hide();
			modal.find('#src').attr('src', src);
		}


	});



	$('#popupModal_reserve').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget); // ลิงก์ "เพิ่มเติม" ที่ถูกคลิก
		var modal = $(this);

		modal.find('#room_id').text(button.data('room_id'));
		modal.find('#room_name').text(button.data('room_name'));
		modal.find('#room_capacity').text(button.data('room_capacity'));
		modal.find('#room_address').text(button.data('room_address'));
		modal.find('#room_details').text(button.data('room_details'));
		modal.find('#room_equipment').text(button.data('room_equipment'));
		modal.find('#room_attendant').text(button.data('room_attendant'));
		modal.find('#room_attendant_tel').text(button.data('room_attendant_tel'));
		modal.find('#room_note').text(button.data('room_note'));

		modal.find('#image_data').text(button.data('image_data'));
		modal.find('#image_mime_type').text(button.data('image_mime_type'));

		var date_r = button.data('date_r');
		$('#date_r').val(date_r);



		//การปสดงรูปกรณีไม่มีไฟล์รูป กันเอาไว้
		var src = button.data('src');
		var fontAwesomeIcon = modal.find('#fontAwesomeIcon');
		var imageContainer = modal.find('#imageContainer');

		if (src == 'fa fa-comments') {
			imageContainer.hide();
			fontAwesomeIcon.show();
		} else {
			imageContainer.show();
			fontAwesomeIcon.hide();
			modal.find('#src').attr('src', src);
		}

		var start_time = button.data('start_time');
		var end_time = button.data('end_time');


		$('#start_time').val(start_time);
		$('#end_time').val(end_time);

		var combinedData = start_time + " - " + end_time;
		$('#combinedData').val(combinedData);



	});


</script>
