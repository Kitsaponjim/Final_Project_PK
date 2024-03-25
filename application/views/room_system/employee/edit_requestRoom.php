<div class="content-wrapper">
	<section class="content">


		<p
			style="font-size: 20px; background-color: #ffffff; padding: 10px; border-radius: 10px; display: flex; align-items: center;">
			<i class="fa fa-pencil"
				style="margin-right: 10px; background-color: #b3c3ff; padding: 8px; border-radius: 50%; color: white"></i>
			<strong style="flex: 1; display: inline;">ฟอร์มแก้ไขรายการจองห้องประชุม</strong>
		</p>


		<div class="box custom-box">
			<div class="box-body">


				<div class="row">
					<div class="col-sm-12">

						<style>
							.text-primary {
								color: #4a89ff;

								font-size: 18px;
							}

							.text-primary .fa {
								color: #07c700;

							}

							.button-container {
								display: flex;
								justify-content: flex-end;

							}

							.btn-primary {
								background-color: green;

								color: white;

								margin-right: 5px;

							}

							.btn-danger {
								background-color: red;

								color: white;

							}

							.form-control {
								border-radius: 10px;
								/* ปรับค่าตามที่คุณต้องการให้เหมาะสม */
							}

							/* style กำหนดกบ่องใส่ข้อมูลสี่เหลี่ยมโค้ง */
							.custom-box {
								background-color: white;
								border-radius: 10px;
								box-shadow: none;
								border-top: solid white;
								/* กำหนดสีขอบด้านบนเป็นสีขาว */
							}

							.btn-danger {
								background-color: #878787;

								color: white;

							}

							.font-label{
								font-size: 16px;
							}
						</style>

						<?php

						$room_id = $data_room->room_id;
						$booking_id = $data_room->booking_id;
						$user_id = $data_room->user_id;
						$date_time = $data_room->date_time;

						$start_time_formatted = $data_room->start_time;
						$end_time_formatted = $data_room->end_time;

						$start_time = substr($start_time_formatted, 0, 5); // เอาเฉพาะ 5 ตัวแรก (HH:mm)
						$end_time = substr($end_time_formatted, 0, 5);

						// $room_id = $data_room->room_id;
						$number_people = $data_room->number_people;
						$meeting_topic = $data_room->meeting_topic;
						$name_requester = $data_room->name_requester;
						$tel_requester = $data_room->tel_requester;
						$note = $data_room->note;

						$room_name = $data_room->room_name;
						$room_capacity = $data_room->room_capacity;
						$room_address = $data_room->room_address;
						$room_details = $data_room->room_details;
						$room_equipment = $data_room->room_equipment;
						$room_attendant = $data_room->room_attendant;
						$room_attendant_tel = $data_room->room_attendant_tel;
						$room_note = $data_room->room_note;

						?>

						<form class="">

							<div class="box-body">
								<div class="col-sm-8">
									<p
										style="font-size: 17px; background-color: #f2f2f2; padding: 4px; border-radius: 5px; margin-top:20px;">
										&nbsp;<i class="fa fa-"></i>
										&nbsp;&nbsp;ข้อมูลการจองห้องประชุม</p>
									<div class="form-group" style="margin-top:20px;">
										<div class="col-sm-4 control-label">
											<label class="font-label"></strong>วันที่ : </label>
										</div>

										<div class="col-sm-6">
											<input type="text" id="rp_case_username_id" name="rp_case_username_id"
												class="form-control rounded-0 custom-placeholder"
												placeholder="<?= $date_time; ?>" readonly>

										</div>
									</div>

									<br> <br>

									<div class="form-group">
										<div class="col-sm-4 control-label">
											<label class="font-label"></strong>เวลา : </label>
										</div>

										<div class="col-sm-6">
											<input type="text" id="rp_case_username_id" name="rp_case_username_id"
												class="form-control rounded-0 custom-placeholder"
												placeholder="<?= $start_time; ?> - <?= $end_time; ?> นาที" readonly>

										</div>
									</div>
									<br> <br>

									<div class="form-group">
										<div class="col-sm-4 control-label">
											<label class="font-label"></strong>ชื่อ-นามสกุล (ผู้จอง) : </label>
										</div>

										<div class="col-sm-6">
											<input type="text" id="name_requester" name="name_requester"
												class="form-control rounded-0 custom-placeholder"
												placeholder="<?= $name_requester; ?>" readonly>

										</div>
									</div>

									<br> <br>
									<div class="form-group">

										<div class="col-sm-4 control-label">
											<label class="font-label"></strong>เบอร์โทรศัพท์มือถือ (ผู้จอง) : </label>
										</div>

										<div class="col-sm-6">
											<input type="tel" id="tel_requester" name="tel_requester"
												class="form-control rounded-0" placeholder="<?= $tel_requester; ?>"
												maxlength="10" oninput="validatePhoneNumber(this);">
											<small id="telError" class="text-danger"></small>

										</div>
									</div>
									<br> <br>

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
												telError.textContent = 'กรุณากรอกเบอร์โทรศัพท์ 10 หลัก';
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


									</script>

									<div class="form-group">

										<div class="col-sm-4 control-label">
											<label class="font-label"></strong>จุดประสงค์การใช้รถ : </label>
										</div>

										<div class="col-sm-6">
											<input type="text" class="form-control" id="meeting_topic"
												name="meeting_topic" placeholder="<?= $meeting_topic; ?>">
										</div>
									</div>

									<br> <br>
									<div class="form-group">

										<div class="col-sm-4 control-label">
											<label class="font-label"></strong>จำนวนผู้เข้าร่วม : </label>
										</div>

										<div class="col-sm-6">
											<input type="text" class="form-control" id="number_people"
												name="number_people" placeholder="<?= $number_people; ?>">
										</div>
									</div>
									<br> <br>
									<div class="form-group">

										<div class="col-sm-4 control-label">
											<label class="font-label"></strong>หมายเหตุ : </label>
										</div>

										<div class="col-sm-6">
											<input type="text" class="form-control" id="note" name="note"
												placeholder="<?= $note ? $note : '-'; ?>">
										</div>
									</div>

									<br>

								</div>

								<div class="col-sm-4">


									<p
										style="font-size: 17px; background-color: #f2f2f2; padding: 4px; border-radius: 5px; margin-top:20px;">
										&nbsp;<i class="fa fa-"></i>
										&nbsp;&nbsp;ข้อมูลห้องประชุม</p>

										<style>
											.col-sm-10{
												font-size: 16px;
												margin-top: 7px;
											}
										</style>
						

									<div class="form-group" style="margin-top:30px; font-size:14px;">
										<div class="col-sm-10">
											<label style="margin-right:15px;"></strong>ชื่อห้องประชุม : </label>

											<?= $room_name; ?>
										</div>

										<div class="col-sm-10">
											<label style="margin-right:15px;"></strong>สถานที่ของห้อง : </label>
											<?= $room_address; ?>
										</div>
										<div class="col-sm-10">
											<label style="margin-right:15px;"></strong>ความจุ : </label>
											<?= $room_capacity; ?> คน
										</div>
										<div class="col-sm-10">
											<label style="margin-right:15px;"></strong>ผู้ดูแลห้อง : </label>
											<?= $room_attendant; ?>
										</div>
										<div class="col-sm-10">
											<label style="margin-right:15px;"></strong>เบอร์โทรศัพท์มือถือ : </label>
											<?= $room_attendant_tel; ?>
										</div>

										<div class="col-sm-10">
											<label style="margin-right:15px;"></strong>หมายเหตุ : </label>
											<?= $room_note ? $room_note : '-'; ?>
										</div>

									</div>



								</div>


							</div>

						</form>


						<br>


						<div class="col-md-12 mt-2">
							<div class="button-container">
								<input class="btn btn-success" type="submit" name="btnSave" id="btnSave"
									value="บันทึกข้อมูล" style="background-color: #4281ff;"
									onclick="onEdit_room(<?= $booking_id; ?>)">

								&nbsp;&nbsp;
								<input type="button" value="ย้อนกลับ" class="btn btn-custom rounded-0"
									style="margin-right:15px"
									onclick="window.location='<?= base_url(); ?>room_system/employee/list_requesterRoom'">


							</div>
						</div>



					</div>
				</div>
			</div>
			<br>


		</div><!-- /.box-body -->
	</section>
</div>



<script>
	function onEdit_room(booking_id) {

		var name_requester = $("#name_requester").val();
		var tel_requester = $("#tel_requester").val();
		var meeting_topic = $("#meeting_topic").val();
		var number_people = $("#number_people").val();
		var note = $("#note").val();


		if (name_requester === '' && tel_requester === '' && meeting_topic === '' && number_people === '' && note === '') {
			alert("กรุณากรอกข้อมูลที่ต้องการแก้ไข");
			return false;
		}

		if (tel_requester != '') {
			if (tel_requester.length !== 10) {
				alert("กรุณากรอกเบอร์โทรศัพท์มือถือให้ครบ 10 หลัก");
				$("#tel_requester").focus();
				return false;
			}
		}

		if (confirm('คุณต้องการบันทึกข้อมูลใช่หรือไม่')) {

			var pmeters = 'booking_id=' + <?= $booking_id ?>
				+ '&name_requester=' + name_requester
				+ '&tel_requester=' + tel_requester
				+ '&meeting_topic=' + meeting_topic
				+ '&number_people=' + number_people
				+ '&note=' + note
				;

			pmeters = pmeters.replace("undefined", "");

			$.ajax({
				url: "<?= base_url(); ?>room_system/room/edit_request",
				type: 'POST',
				data: pmeters,
				async: false,
				success: function (data) {
					// alert(data);
					$("#btnSave").attr("disabled", true);
					window.location = "<?= base_url(); ?>room_system/employee/list_requesterRoom";
				}
			});
			return false;

		}
		return false;


	}




</script>
