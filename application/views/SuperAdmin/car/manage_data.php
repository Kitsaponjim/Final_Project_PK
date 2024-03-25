<style>
	/* กำหนดหล่องเป็นเหลี่ยมโค้ง */
	.custom-box {
		background-color: white;
		border-radius: 10px;
		box-shadow: none;
		border-top: solid white;
		/* กำหนดสีขอบด้านบนเป็นสีขาว */
	}



	.form-control {
		border-radius: 10px;
		/* ปรับค่าตามที่คุณต้องการให้เหมาะสม */
	}

	.custom-placeholder::placeholder {
		color: #4a89ff;
		font-weight: bold;
	}

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

	/* .form-group {
								margin-top: 20px;
								margin-bottom: 20px;
							}

							 */
</style>

<!-- ############################################################################################## -->

<div style="display: flex; justify-content: center;">
	<div class="col-sm-9" style="padding-top: 15px;">

		<div class="box custom-box">


			<section class="content-header" style="display: flex; align-items: center;">

				<i class="fa fa-users" style="margin-right: 10px; padding: 8px; border-radius: 50%; color: back"></i>

				<strong style="flex: 1; display: inline;">ข้อมูลการขอใช้งานรถ</strong>


			</section>

			<?php

// ข้อมูลการจอง 
$case_id = $data_case['data_case']->case_id;
$name_reserve = $data_case['data_case']->name_reserve;
$tel_reserve = $data_case['data_case']->tel_reserve;

$car_title = $data_case['data_case']->car_title;
$reserve_detail = $data_case['data_case']->reserve_detail;
$Pickup_location = $data_case['data_case']->Pickup_location;
$Down_finish = $data_case['data_case']->Down_finish;
$address = $data_case['data_case']->address;

$detail_address = $data_case['data_case']->detail_address;
$number_passengers = $data_case['data_case']->number_passengers;
$name_passengers = $data_case['data_case']->name_passengers;
$tel_passengers = $data_case['data_case']->tel_passengers;
$note = $data_case['data_case']->note;

$car_add_date = $data_case['data_case']->car_add_date;
$formatted_date = date("Y-m-d H:i:s", $car_add_date);
$car_start_date = $data_case['data_case']->car_start_date;
$formatted_start = date("Y-m-d H:i:s", $car_start_date);

$car_end_date = $data_case['data_case']->car_end_date;
$date_time = date('Y-m-d H:i:s', $car_end_date);
$new_date_time = date('Y-m-d H:i:s', strtotime($date_time . ' -1 hour'));
$formatted_end = date("Y-m-d H:i:s", $car_end_date);


?>

			<section class="content">
				<div class="box-body">


					<div class="col-sm-9">

						<p style="font-size: 17px; background-color: #f2f2f2; padding: 4px; border-radius: 5px;"><i
								class="fa fa-user"></i> ข้อมูลผู้แจ้ง</p>



						<div class="form-group">
							<div class="col-sm-4 control-label">
								<label></strong>วันเวลาเริ่มต้น : </label>
							</div>

							<div class="col-sm-7">
								<input type="text" id="cus_name" name="cus_name"
									class="form-control rounded-0 custom-placeholder"
									value="<?= $formatted_start ?>" readonly>

							</div>
						</div>

						<br>
						<br>

						<div class="form-group">
							<div class="col-sm-4 control-label">
								<label></strong>วันเวลาสิ้นสุด : </label>
							</div>

							<div class="col-sm-7">
								<input type="text" id="cus_name" name="cus_name"
									class="form-control rounded-0 custom-placeholder" value="<?= $formatted_end ?>"
									readonly>

							</div>
						</div>
						<br>
						<br>

						<div class="form-group">
							<div class="col-sm-4 control-label">
								<label></strong>ชื่อ-นามสกุล (ผู้จอง)  : </label>
							</div>

							<div class="col-sm-7">
							<input type="text" id="rp_case_username_id" name="rp_case_username_id"
												class="form-control rounded-0 custom-placeholder"
												placeholder="<?= $name_reserve; ?>" readonly>


							</div>
						</div>


						<br>
						<br>

						<div class="form-group">
							<div class="col-sm-4 control-label">
								<label></strong>เบอร์โทรศัพท์มือถือ (ผู้จอง) : </label>
							</div>

							<div class="col-sm-7">
							<input type="tel" id="tel_reserve" name="tel_reserve"
												class="form-control rounded-0" placeholder="<?= $tel_reserve; ?>"
												maxlength="10" oninput="validatePhoneNumber(this);">
											<small id="telError" class="text-danger"></small>


							</div>
						</div>

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


						<br>
						<br>

						<div class="form-group">
							<div class="col-sm-4 control-label">
								<label></strong>จุดประสงค์การใช้รถ : </label>
							</div>

							<div class="col-sm-7">
							<input type="text" class="form-control" id="car_title" name="car_title"
												placeholder="<?= $car_title; ?>">
							</div>
						</div>
						<br>
						<br>

						<div class="form-group">
							<div class="col-sm-4 control-label">
								<label></strong>จุดขึ้นรถ : </label>
							</div>

							<div class="col-sm-7">
							<input type="text" class="form-control" id="Pickup_location"
												name="Pickup_location" placeholder="<?= $Pickup_location; ?>">

							</div>
						</div>

						<br>
						<br>

						<div class="form-group">
							<div class="col-sm-4 control-label">
								<label></strong>จุดลงรถ : </label>
							</div>

							<div class="col-sm-7">
							<input type="text" class="form-control" id="Down_finish" name="Down_finish"
												placeholder="<?= $Down_finish; ?>">

							</div>
						</div>

						<br>
						<br>

						<div class="form-group">
							<div class="col-sm-4 control-label">
								<label></strong>สถานที่ปลายทาง : </label>
							</div>

							<div class="col-sm-7">
							<input type="text" class="form-control" id="address" name="address"
												placeholder="<?= $address; ?>">

							</div>
						</div>

						<br>
						<br>

						<div class="form-group">
							<div class="col-sm-4 control-label">
								<label></strong>จำนวนผู้โดยสาร : </label>
							</div>

							<div class="col-sm-7">
							<input type="tel" id="number_passengers" name="number_passengers"
												class="form-control rounded-0" placeholder="<?= $number_passengers; ?>"
												maxlength="2" oninput="validateNumber(this);">
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



						<br>
						<br>


						<div class="form-group">
							<div class="col-sm-4 control-label">
								<label></strong>ชื่อผู้โดยสารหลัก : </label>
							</div>

							<div class="col-sm-7">
							<input type="text" class="form-control" id="name_passengers"
												name="name_passengers" placeholder="<?= $name_passengers; ?>">


							</div>
						</div>

						<br>
						<br>

						<div class="form-group">
							<div class="col-sm-4 control-label">
								<label></strong>เบอร์โทรศัพท์มือถือ : </label>
							</div>

							<div class="col-sm-7">
							<input type="tel" id="tel_reserve_main" name="tel_reserve_main"
												class="form-control rounded-0" placeholder="<?= $tel_passengers; ?>"
												maxlength="10" oninput="validatePhoneNumberMain(this);">
											<small id="telError_main" class="text-danger"></small>

							</div>
						</div>
						<script>
										function validatePhoneNumberMain(input) {
											var telError = document.getElementById('telError_main');
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



									</script>

						<br>
						<br>

						<div class="form-group">
							<div class="col-sm-4 control-label">
								<label></strong>หมายเหตุ : </label>
							</div>

							<div class="col-sm-7">
							<input type="text" class="form-control" id="note" name="note"
												placeholder="<?= $note; ?>">
							</div>
						</div>

						<br>
						<br>





					</div>
					</form>

				
					<div class="col-md-12 mt-2">
					<div class="button-container">
						<input class="btn btn-success" type="submit" name="btnSave" id="btnSave" value="บันทึกข้อมูล" style="background-color: #4281ff;"
							onclick="onEdit_car(<?= $case_id; ?>)">


						&nbsp;&nbsp;

						<input type="button" value="ย้อนกลับ" class="btn btn-custom rounded-0" style="margin-right:15px"
								onclick="window.location='<?= base_url(); ?>superAdmin/car_list_all'">
							

					
					</div>
				</div>


				</div><!-- /.box-body -->

			</section>

		</div>
	</div>
</div>

<script>
	function onEdit_car(case_id) {

		var tel_reserve = $("#tel_reserve").val();
		var car_title = $("#car_title").val();
		var Pickup_location = $("#Pickup_location").val();
		var Down_finish = $("#Down_finish").val();
		var address = $("#address").val();
		var number_passengers = $("#number_passengers").val();
		var name_passengers = $("#name_passengers").val();
		var tel_reserve_main = $("#tel_reserve_main").val();
		var note = $("#note").val();

		if (tel_reserve === '' && car_title === '' && tel_reserve_main === '' && Pickup_location === '' && Down_finish === '' && address === '' && note === '' && number_passengers === '' && name_passengers === '') {
			alert("กรุณากรอกข้อมูลที่ต้องการแก้ไข");
			return false;
		}

		if (tel_reserve != '') {
			if (tel_reserve.length !== 10) {
				alert("กรุณากรอกเบอร์โทรศัพท์มือถือให้ครบ 10 หลัก");
				$("#tel_reserve").focus();
				return false;
			}
		}
		if (tel_reserve_main != '') {
			if (tel_reserve_main.length !== 10) {
				alert("กรุณากรอกเบอร์โทรศัพท์มือถือให้ครบ 10 หลัก");
				$("#tel_reserve_main").focus();
				return false;
			}
		}

		if (confirm('คุณต้องการบันทึกข้อมูลใช่หรือไม่')) {

			var pmeters = 'case_id=' + <?= $case_id ?>
				+ '&tel_reserve=' + tel_reserve
				+ '&car_title=' + car_title
				+ '&tel_reserve_main=' + tel_reserve_main
				+ '&Pickup_location=' + Pickup_location
				+ '&Down_finish=' + Down_finish
				+ '&address=' + address
				+ '&note=' + note
				+ '&number_passengers=' + number_passengers
				+ '&name_passengers=' + name_passengers
				;

			pmeters = pmeters.replace("undefined", "");

			$.ajax({
				url: "<?= base_url(); ?>car_system/reserve/edit_request",
				type: 'POST',
				data: pmeters,
				async: false,
				success: function (data) {
					// alert(data);
					$("#btnSave").attr("disabled", true);
					window.location = "<?= base_url(); ?>superAdmin/car_list_all";
				}
			});
			return false;

		}
		return false;


	}




</script>
