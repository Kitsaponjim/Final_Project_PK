<div class="content-wrapper">
	<section class="content">
		<p
			style="font-size: 20px; background-color: #ffffff; padding: 10px; border-radius: 10px; display: flex; align-items: center;">

			<i class="fa fa-car"
				style="margin-right: 10px; background-color: #b3c3ff; padding: 8px; border-radius: 50%; color: white"></i>

			<strong style="flex: 1; display: inline;">รายการรถ</strong>
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

				<form action="<?= site_url('car_system/reserve/list_car'); ?>" method="post"
					onsubmit="return validateForm()">
					<p
						style="font-size: 15px; background-color: #ffffff; padding: 10px; border-radius: 10px; display: flex; align-items: center;">
						<label for="start_date" style="margin-left:10px; font-size: 18px;">เลือกวันที่เวลา </label>

						<label for="start_date" style="margin-left:10px; font-size: 18px;">เริ่ม : </label>
						<input type="datetime-local" id="start_date" name="start_date" required
							min="<?= date('Y-m-d H:i'); ?>"
							value="<?= isset($_POST['start_date']) ? $_POST['start_date'] : '' ?>"
							style="border: 1px solid white; border-radius: 5px; padding: 5px; background-color: #e6f7ff; margin-left:10px;">

						<label for="end_date" style="margin-left:30px; font-size: 18px;">สิ้นสุด :</label>
						<input type="datetime-local" id="end_date" name="end_date" required
							min="<?= date('Y-m-d H:i'); ?>"
							value="<?= isset($_POST['end_date']) ? $_POST['end_date'] : '' ?>"
							style="border: 1px solid white; border-radius: 5px; padding: 5px; background-color: #e6f7ff; margin-left:10px;">


<label for="sit" style="margin-left: 30px; font-size: 18px;">จำนวนที่นั่ง :</label>
<input type="number" id="sit" name="sit" oninput="javascript: if (this.value.length > 2) this.value = this.value.slice(0, 2);" style="border: 1px solid white; border-radius: 5px; padding: 5px; background-color: #e6f7ff; display: inline-block; width: 60px; margin-left:10px;" value="<?= isset($_POST['sit']) ? htmlentities($_POST['sit']) : ''; ?>">


						<button class="btn btn-custom-gray btn-lg" style="font-size: 15px; margin-left:20px;"
							type="submit">ค้นหา</button>
						<strong style="flex: 1; display: inline;"></strong>
					</p>
				</form>

				<script>
					function validateForm() {
						var startDate = new Date(document.getElementById('start_date').value);
						var endDate = new Date(document.getElementById('end_date').value);

						if (endDate < startDate) {
							alert('เวลาสิ้นสุดต้องมากกว่าหรือเท่ากับเวลาเริ่มต้น');
							return false;
						}

						return true;
					}
				</script>



				<div class="col-sm-12">
					<?php

					if (!empty($data['data'])) {

						foreach ($data['data'] as $value) {

							$car_id = $value->car_id;
							$car_brand = $value->car_brand;
							$car_model = $value->car_model;
							$car_registration = $value->car_registration;
							$car_type = $value->car_type;
							$car_number_seat = $value->car_number_seat;
							$car_color = $value->car_color;
							$car_other = $value->car_other;
							$car_usage_status = $value->car_usage_status;



							$driver_name = $value->driver_name;
							$driver_tel = $value->driver_tel;
							$driver_history = $value->driver_history;

							$image_data = base64_encode($value->image_data);
							$image_mime_type = $value->image_mime_type;

							$src = 'data:' . $image_mime_type . ';base64,' . $image_data;


							$image_data_r = base64_encode($value->image_data);
							$image_mime_type_r = $value->image_mime_type;
							$src_r = 'data:' . $image_mime_type_r . ';base64,' . $image_data_r;



							$image_data_s = base64_encode($value->image_data);
							$image_mime_type_s = $value->image_mime_type;
							$src_s = 'data:' . $image_mime_type_s . ';base64,' . $image_data_s;



							$image_data_driver = base64_encode($value->image_data_driver);
							$image_mime_type_driver = $value->image_mime_type_driver;
							$src_driver = 'data:' . $image_mime_type_driver . ';base64,' . $image_data_driver;



							?>
							<div class="col-sm-4">

								<div class="box custom-box">
									<div class="box-body">
										<img src="<?php echo $src; ?>" class="card-img-top mt-2" alt="ระบบจองรถ"
											style="height: 100px; width: 160px; border-radius: 20px; margin-top:10px; margin-left:10px;">

										<div style="position: absolute; top: 30px; right: 0; left: 40px; width: 60px; height: 40px;
													color: white; text-align: center; border-radius: 10px; line-height: 40px;
													transform: translate(-100%, -50%);
													<?php
													if ($car_usage_status == 1) {
														echo 'background-color: green;">พร้อม';
													} elseif ($car_usage_status == 2) {
														echo 'background-color: #ff5e5e;">ไม่พร้อม';
													} else {
														echo 'background-color: gray;">ไม่ได้กำหนดสถานะ';
													}
													?>
										</div>
										<div>
										<br>
										
										<strong style=" margin-left: 20px; font-size: 16px;">ยี่ห้อรถ :</strong>
											<span style="font-size: 16px; color: #4281ff;">
	
												<?= $car_brand ? $car_brand : '-'; ?>
											</span>
											<br>

											<strong style="margin-left: 20px; margin-top: 10px; font-size: 16px;">ประเภทรถ
												:</strong>

											<span style="font-size: 16px;">
											<?= $car_type ? $car_type : '-'; ?>
										
											</span>

											<br>


											<strong style="margin-left: 20px; margin-top: 10px; font-size: 16px;">ชื่อคนขับรถ
												:</strong>
											<span style="font-size: 16px;">
											<?= $driver_name ? $driver_name : '-'; ?>

									
											</span>

										</div>


										<p style="font-size: 20px; display: flex; align-items: center; margin-top: 2px;">
											<strong style="flex: 1; display: inline; margin-left: 20px;"> จำนวน
											<?= $car_number_seat ? $car_number_seat : '-'; ?>
								 ที่นั่ง
											</strong>

											<a href="#" class="open-popup" data-toggle="modal" data-target="#popupModal_car"
												data-car_id="<?= $car_id; ?>" data-car_brand="<?= $car_brand; ?>"
												data-car_model="<?= $car_model; ?>" data-car_type="<?= $car_type; ?>"
												data-car_registration="<?= $car_registration; ?>"
												data-car_number_seat="<?= $car_number_seat; ?>" data-src_s="<?= $src_s; ?>"
												data-image_mime_type_s="<?= $image_mime_type_s; ?>"
												data-driver_name="<?= $driver_name; ?>" data-driver_tel="<?= $driver_tel; ?>"
												data-car_other="<?= !empty($car_other) ? $car_other : '-'; ?>"
												data-driver_history="<?= !empty($driver_history) ? $driver_history : '-'; ?>"
												data-image_driver="<?= $src_driver; ?>" data-car_color="<?= $car_color; ?>"
												data-image_mime_type_driver="<?= $image_mime_type_driver; ?>"
												data-src_driver="<?= $src_driver; ?>">
												<i class="fa fa-search" style="color: black; margin-right: 3px;"></i>
											</a>

											&nbsp;&nbsp;

											<a href="#" class="open-popup" data-toggle="modal"
   data-target="<?= ($car_usage_status == 2) ? '' : '#popupModal_reserve'; ?>"
   data-car_id_r="<?= $car_id; ?>" data-car_brand_r="<?= $car_brand; ?>"
   data-car_model_r="<?= $car_model; ?>" data-car_type_r="<?= $car_type; ?>"
   data-car_registration_r="<?= $car_registration; ?>"
   data-car_color_r="<?= $car_color; ?>"
   data-car_number_seat_r="<?= $car_number_seat; ?>" data-src_r="<?= $src_r; ?>"
   data-image_mime_type_r="<?= $image_mime_type_r; ?>"
   data-driver_name_r="<?= $driver_name; ?>"
   data-driver_tel_r="<?= $driver_tel; ?>"
   data-driver_history_r="<?= $driver_history; ?>"
   data-start_date="<?= isset($_POST['start_date']) ? $_POST['start_date'] : '' ?>"
   data-end_date="<?= isset($_POST['end_date']) ? $_POST['end_date'] : '' ?>"
   role="button" <?= ($car_usage_status == 2) ? 'style="pointer-events: none;  cursor: not-allowed;"' : 'onclick="checkDates(' . $car_id . ')"'; ?>>

   <button class="btn btn-custom-gray btn-lg" style="<?= ($car_usage_status == 2) ? 'color: gray; background-color: lightgray;' : 'color: white;'; ?> margin-right: 3px; font-size: 16px; margin-left:8px;" type="submit">จอง</button>
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
									<i class="fa fa-car" style="font-size: 80px; color: #4281ff;"></i>
									<p style="font-size: 18px; color: #000; margin-top:20px;">ไม่มีรายการรถ</p>

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
	function checkDates(car_id) {
		var start_date = "<?= isset($_POST['start_date']) ? $_POST['start_date'] : '' ?>";
		var end_date = "<?= isset($_POST['end_date']) ? $_POST['end_date'] : '' ?>";

		if (!start_date || !end_date) {
			alert('โปรดเลือกวันที่เริ่มและวันที่สิ้นสุด');
			$('#start_date').focus();
			window.location = "<?= base_url(); ?>car_system/Reserve/list_car";
		}

		// else {
		// 	$.ajax({
		// 		url: "<?= base_url(); ?>car_system/reserve/list_car_check",
		// 		type: 'POST',
		// 		data: {
		// 			car_id: car_id,
		// 			start_date: start_date
		// 		},
		// 		async: false,
		// 		success: function (data) {
		// 			if (data.trim() !== "ok" && data.trim() !== "") {
		// 				alert(data);
		// 			}
		// 		}
		// 	});
		// 	return false;
		// }

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
</style>


<div class="modal fade" id="popupModal_car" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document" style="width: 800px;">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h3 class="modal-title" id="">รายละเอียดเพิ่มเติม</h3>
			</div>


			<div class="modal-body scrollable">
				<div style="font-size: 18px; background-color: #57a2ff; padding: 3px; border-radius: 5px;">
					<i class="fa fa-car" style="margin-left:5px;"></i>&nbsp;&nbsp; รายละเอียดรถ
				</div>

				
				<img id="src_s" alt="Driver Image" style="max-width: 200%; max-height: 200px; margin-top:10px;">
				<br>
				<br>

				<table class="table table-bordered">
					<tr>
						<th class="text-left small-cell" style="font-size: 15px; width:150px;">ยี่ห้อรถ</th>
						<td style="font-size: 15px; width:150px;">
							<span id="car_brand"></span><br>
						</td>
					</tr>
	

					<tr>
						<th class="text-left small-cell" style="font-size: 15px;">ประเภทรถ</th>
						<td style="font-size: 15px;">
							&nbsp;&nbsp;<span id="car_type"></span>
							<br>

						</td>
					</tr>

					<tr>
						<th class="text-left small-cell" style="font-size: 15px;">ทะเบียนรถ</th>
						<td style="font-size: 15px;">

							&nbsp;&nbsp;<span id="car_registration"></span>
							<br>
						</td>
					</tr>

					<tr>
						<th class="text-left small-cell" style="font-size: 15px;">สีรถ</th>
						<td style="font-size: 15px;">


							&nbsp;&nbsp;<span id="car_color"></span>
							<br>
						</td>
					</tr>

					<tr>
						<th class="text-left small-cell" style="font-size: 15px;">จำนวนที่นั่ง</th>
						<td style="font-size: 15px;">


							&nbsp;&nbsp;<span id="car_number_seat"></span> &nbsp;&nbsp;ที่นั่ง
							<br>
						</td>
					</tr>



					<tr>
						<th class="text-left small-cell" style="font-size: 15px;">ข้อมูลอื่นๆ</th>
						<td style="font-size: 15px;">
							&nbsp;&nbsp;<span id="car_other"></span>
							<br>


						</td>
					</tr>
				</table>


				<p style="font-size: 18px; background-color: #2aad2a; padding: 3px; border-radius: 5px;">
					<i class="fa fa-user" style="margin-left:5px;"></i> &nbsp;&nbsp;
					รายละเอียดคนขับรถ
				</p>

				<table class="table table-bordered">

					<img id="src_driver" alt="Driver Image"
						style="max-width: 200%; max-height: 200px;  margin-top:10px;">

					<br>
					<br>

					<tr>
						<th class="text-left small-cell" style="font-size: 15px;">ชื่อคนขับ</th>
						<td style="font-size: 15px;">
							<strong>
								<i class="fa fa-user"></i>
							</strong>


							&nbsp;&nbsp;<span id="driver_name"></span>
						</td>
					</tr>
					<tr>
						<th class="text-left small-cell" style="font-size: 15px;">เบอร์โทรศัพท์มือถือ</th>
						<td style="font-size: 15px;">
							<strong>
								<i class="fa fa-phone"></i>
							</strong>

							&nbsp;&nbsp;<span id="driver_tel"></span>
						</td>
					</tr>
					<tr>
						<th class="text-left small-cell" style="font-size: 15px;">ข้อมูลอื่นๆ</th>
						<td style="font-size: 15px;">

							&nbsp;&nbsp;<span id="driver_history"></span>
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

				<p class="modal-title" id="popupModalLabel" style="font-size: 20px; color:back;">
					<strong>กรอกรายละเอียดข้อมูลการจอง</strong>
				</p>
			</div>

			<div class="modal-body">
				<div class="row">


					<div class="box custom-box">

						<div style="display: flex; align-items: center; margin-top: 15px;">

							<div style="height: 150px; width: 210px; border-radius: 20px; margin-left:25px;">
								<span id="popupImage_r"></span></p>
							</div>

							<p style="margin-left: 10px;">
								<strong style="font-size:20px;">
									ยานพาหนะ
								</strong> <br>

								<strong style="font-size:16px;"> ยี่ห้อรถ :</strong></strong> <span
									id="car_brand_r" style="font-size:15px;"></span> 
									<!-- /
								<span id="car_model_r" style="font-size:15px;"></span> -->
								<br>
								<strong style="font-size:16px;">ประเภทรถ :</strong> <span id="car_type_r"
									style="font-size:15px;"></span> <br>
								<strong style="font-size:16px;"> สีรถ :</strong> <span id="car_color_r"
									style="font-size:15px;"></span> <br>

								<strong style="font-size:16px;"> เลขทะเบียน :</strong> <span id="car_registration_r"
									style="font-size:15px;"></span> <br>

							</p>

							<br>

						</div>


					</div>



					<p style="font-size: 18px; color:back;"><strong> ข้อมูลการจอง</span></strong></p>


					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label><strong class="text-danger">*</strong>ชื่อ-นามสกุล (ผู้จอง) </label>
								<input type="text" id="name_reserve" name="name_reserve" placeholder="ชื่อ-นามสกุล"
									class="form-control rounded-0" oninput="validateName(this);">
								<small id="nameError" class="text-danger"></small>
							</div>

						</div>

						<div class="col-md-6">

							<div class="form-group">
								<label><strong class="text-danger">*</strong>เบอร์โทรศัพท์มือถือ (ผู้จอง) </label>

								<input type="tel" id="tel_reserve" name="tel_reserve" class="form-control rounded-0"
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
								<label for="">วันและเวลาเริ่มต้นการใช้รถ </label>
								<input type="text" class="form-control" id="combined_data_input" readonly>

							</div>

						</div>

						<div class="col-md-6">
							<!-- combined_data_end -->

							<div class="form-group">
								<label for="">วันและเวลาสิ้นสุดการใช้รถ </label>
								<input type="text" class="form-control" id="combined_data_end" readonly>
							</div>

						</div>
					</div>



					<div class="row" style="margin-top:10px;">
						<div class="col-md-6">

							<div class="form-group">
								<label for=""><strong class="text-danger">*</strong>จุดประสงค์การใช้รถ </label>
								<input type="text" class="form-control" id="car_title" name="car_title"
									placeholder="จุดประสงค์การใช้รถ">
							</div>

						</div>

						<div class="col-md-6">

							<div class="form-group">
								<label for=""><strong class="text-danger">*</strong>จำนวนผู้โดยสาร</label>
								<input type="tel" id="number_passengers" name="number_passengers"
									class="form-control rounded-0" placeholder="จำนวนผู้โดยสาร" maxlength="2"
									oninput="validateNumber(this);">
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
								<label for=""><strong class="text-danger">*</strong>ชื่อผู้โดยสารหลัก</label>


								<input type="text" class="form-control" id="name_passengers" name="name_passengers"
									placeholder="ชื่อผู้โดยสารหลัก">

							</div>

						</div>

						<div class="col-md-6">

							<div class="form-group">
								<label><strong class="text-danger">*</strong>เบอร์โทรศัพท์มือถือ (ผู้โดยสารหลัก)
								</label>
								<input type="tel" id="tel_reserve_main" name="tel_reserve_main"
									class="form-control rounded-0" placeholder="เบอร์โทรศัพท์มือถือ(ผู้โดยสารหลัก)"
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


					</div>


					<div class="row" style="margin-top:10px;">
						<div class="col-md-6">
							<div class="form-group">
								<label for=""><strong class="text-danger">*</strong>จุดขึ้นรถ </label>
								<input type="text" class="form-control" id="Pickup_location" name="Pickup_location"
									placeholder="จุดขึ้นรถ">
							</div>


						</div>

						<div class="col-md-6">

							<div class="form-group">
								<label for=""><strong class="text-danger">*</strong>จุดลงรถ </label>
								<input type="text" class="form-control" id="Down_finish" name="Down_finish"
									placeholder="จุดลงรถ">
							</div>


						</div>
					</div>

					<div class="row" style="margin-top:10px;">
						<div class="col-md-6">
							<div class="form-group">
								<label for=""><strong class="text-danger">*</strong>สถานที่ปลายทาง</label>
								<input type="text" class="form-control" id="address" name="address"
									placeholder="สถานที่ปลายทาง">
							</div>


						</div>

						<div class="col-md-6">

							<div class="form-group">
								<label for="">หมายเหตุ </label>
								<textarea id="detail" class="form-control" placeholder="หมายเหตุ"></textarea>
							</div>


						</div>
					</div>


					<div class="form-group">
						<textarea style="display: none;" id="car_id_r" name="car_id_r"
							class="form-control rounded-0"></textarea>
					</div>


				</div>
			</div>
			<div class="modal-footer">

				<button type="button" class="btn btn-custom" id="saveChangesButton"
					style="background-color: #4281ff; color:white;" onclick="onReserve_car()">บันทึกข้อมูล</button>

				<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>

			</div>
		</div>
	</div>
</div>

<script>

	$('#popupModal_car').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget); // ลิงก์ "เพิ่มเติม" ที่ถูกคลิก
		var modal = $(this);

		modal.find('#car_brand').text(button.data('car_brand'));
		modal.find('#car_model').text(button.data('car_model'));
		modal.find('#car_registration').text(button.data('car_registration'));
		modal.find('#car_color').text(button.data('car_color'));
		modal.find('#car_type').text(button.data('car_type'));
		modal.find('#car_number_seat').text(button.data('car_number_seat'));
		modal.find('#car_other').text(button.data('car_other'));

		modal.find('#driver_name').text(button.data('driver_name'));
		modal.find('#driver_tel').text(button.data('driver_tel'));
		modal.find('#driver_history').text(button.data('driver_history'));

		modal.find('#src_s').attr('src', button.data('src_s'));
		modal.find('#image_mime_type_s').text(button.data('image_mime_type_s'));

		modal.find('#image_mime_type_driver').text(button.data('image_mime_type_driver'));
		modal.find('#src_driver').attr('src', button.data('src_driver'));


	});


	$(document).ready(function () {
		// เมื่อคลิกที่ลิงก์ "Open Popup"
		$('.open-popup').click(function () {
			var car_id = $(this).data('car_id');
			var car_brand = $(this).data('car_brand');
			var car_model = $(this).data('car_model');
			var car_type = $(this).data('car_type');
			var car_number_seat = $(this).data('car_number_seat');
			var car_registration = $(this).data('car_registration');

			var driver_name = $(this).data('driver_name');
			var driver_tel = $(this).data('driver_tel');
			var driver_history = $(this).data('driver_history');
			var car_color = $(this).data('car_color');
			var car_other = $(this).data('car_other');

			var image_data = $(this).data('image');
			var mime_type = $(this).data('mime');


			var image_data_driver = $(this).data('image_driver');
			var mime_type_driver = $(this).data('mime_driver');

			// แสดงข้อมูลในป๊อปอัพ
			$('#car_id').text(car_id);
			$('#car_brand').text(car_brand);
			$('#car_model').text(car_model);
			$('#car_type').text(car_type);
			$('#driver_name').text(driver_name);
			$('#car_color').text(car_color);
			$('#car_other').text(car_other);

			$('#car_number_seat').text(car_number_seat);
			$('#driver_tel').text(driver_tel);
			$('#driver_history').text(driver_history);
			$('#car_registration').text(car_registration);

			var imgTag = '<img src="' + image_data + '" class="img-responsive" style="max-width: 80%; height: auto;">';
			$('#popupImage').html(imgTag);

			var imgTag_driver = '<img src="' + image_data_driver + '" class="img-responsive" style="max-width: 40%; height: auto;">';
			$('#popupImage_driver').html(imgTag_driver);


			// แสดงตอบจอง
			var car_id_r = $(this).data('car_id_r');
			var car_brand_r = $(this).data('car_brand_r');
			var car_model_r = $(this).data('car_model_r');
			var car_type_r = $(this).data('car_type_r');
			var car_number_seat_r = $(this).data('car_number_seat_r');
			var car_registration_r = $(this).data('car_registration_r');
			var car_color_r = $(this).data('car_color_r');
			var driver_name_r = $(this).data('driver_name_r');
			var driver_tel_r = $(this).data('driver_tel_r');
			var driver_history_r = $(this).data('driver_history_r');
			var image_data_r = $(this).data('src_r');
			var image_mime_type_r = $(this).data('image_mime_type_r');

			var start_date = $(this).data('start_date');
			$('#popupModal_reserve').data('start_date', start_date);

			var datetimeValue = $('#start_date').val();
			var [date, time] = datetimeValue.split('T');

			$('#popupModal_reserve').data('start_date', date);
			$('#popupModal_reserve').data('start_time', time);

			var start_date = $('#popupModal_reserve').data('start_date');
			var start_time = $('#popupModal_reserve').data('start_time');

			var combinedData = start_date + " เวลา : " + start_time;

			$('#combined_data_input').val(combinedData);

			$('#start_date_input').val(start_date);
			$('#start_time_input').val(start_time);


			// ใน JavaScript ที่ใช้ส่งค่าไป popup และแยกค่าวันที่และเวลา
			var end_date = $(this).data('end_date');
			$('#popupModal_reserve').data('end_date', end_date);

			var datetimeValue_end = $('#end_date').val();
			var [date, time] = datetimeValue_end.split('T');

			$('#popupModal_reserve').data('end_date', date);
			$('#popupModal_reserve').data('end_time', time);

			// ใน JavaScript ในหน้าแสดงใน popup
			var end_date = $('#popupModal_reserve').data('end_date');
			var end_time = $('#popupModal_reserve').data('end_time');

			var combinedData_end = end_date + " เวลา : " + end_time;

			$('#combined_data_end').val(combinedData_end);

			$('#start_date_end').val(end_date);
			$('#start_time_end').val(end_time);


			// แสดงข้อมูลในป๊อปอัพ
			$('#car_id_r').text(car_id_r);
			$('#car_brand_r').text(car_brand_r);
			$('#car_model_r').text(car_model_r);
			$('#car_type_r').text(car_type_r);
			$('#driver_name_r').text(driver_name_r);

			$('#car_number_seat_r').text(car_number_seat);

			$('#driver_tel_r').text(driver_tel_r);
			$('#driver_history_r').text(driver_history_r);
			$('#car_registration_r').text(car_registration_r);
			$('#car_color_r').text(car_color_r);

			var imgTag_r = '<img src="' + image_data_r + '" class="img-responsive" style="max-width: 80%; height: auto;">';
			$('#popupImage_r').html(imgTag_r);


		});
	});


	function onReserve_car() {

		var start_date = $('#start_date').val(); 
		var end_date = $('#end_date').val();
		var carIdValue = $('#car_id_r').val(); 
		var name_reserve = $("#name_reserve").val(); 
		var tel_reserve = $("#tel_reserve").val(); 
		var car_title = $("#car_title").val(); 

		var Pickup_location = $("#Pickup_location").val(); 
		var Down_finish = $("#Down_finish").val();  
		var address = $("#address").val(); 

		var detail = $("#detail").val();// หมายเหตุ 

		var number_passengers = $("#number_passengers").val(); 
		var name_passengers = $("#name_passengers").val(); 
		var tel_reserve_main = $("#tel_reserve_main").val(); 


		if (start_date == "") {
			alert("กรุณาเลือกวันที่เริ่มจอง");
			$("#start_date").focus();
			return false;
		} else if (end_date == "") {
			alert("กรุณาเลือกวันที่สิ้นสุดการจอง ");
			$("#end_date").focus();
			return false;

		}
		else if (name_reserve == "") {
			alert("กรุณากรอกชื่อ-นามสกุลผู้จอง");
			$("#name_reserve").focus();
			return false;

		}
		else if (!/^[a-zA-Zก-๙ ]+$/.test(name_reserve)) {
			alert("กรุณากรอกเฉพาะตัวอักษรในชื่อ-นามสกุลผู้จอง");
			$("#name_reserve").focus();
			return false;
		}

		else if (tel_reserve == "") {
			alert("กรุณากรอกเบอร์โทรศัพท์มือถือผู้จอง");
			$("#tel_reserve").focus();
			return false;

		}

		else if (tel_reserve.length !== 10) {
			alert("กรุณากรอกเบอร์โทรศัพท์มือถือ 10 หลัก");
			$("#tel_reserve").focus();
			return false;
		}

		else if (car_title == "") {
			alert("กรุณากรอกจุดประสงค์ในการใช้รถ");
			$("#car_title").focus();
			return false;
		}

		else if (number_passengers == "") {
			alert("กรุณากรอกจำนวนผู้โดยสาร");
			$("#number_passengers").focus();
			return false;
		}
		else if (name_passengers == "") {
			alert("กรุณากรอกชื่อผู้โดยสารหลัก");
			$("#name_passengers").focus();
			return false;
		}

		else if (tel_reserve_main == "") {
			alert("กรุณากรอกเบอร์โทรศัพท์มือถือ (ผู้โดยสารหลัก)");
			$("#tel_reserve_main").focus();
			return false;
		}
		else if (tel_reserve_main.length !== 10) {
			alert("กรุณากรอกเบอร์โทรศัพท์มือถือ 10 หลัก");
			$("#tel_reserve_main").focus();
			return false;
		}


		else if (Pickup_location == "") {
			alert("กรุณากรอกจุดขึ้นรถ");
			$("#Pickup_location").focus();
			return false;

		}
		else if (Down_finish == "") {
			alert("กรุณากรอกจุดลงรถ");
			$("#Down_finish").focus();
			return false;

		}
		else if (address == "") {
			alert("กรุณากรอกสถานที่ปลายทาง");
			$("#address").focus();
			return false;

		}

		if (confirm('คุณต้องการบันทึกข้อมูลใช่หรือไม่')) {

			if (start_date == "") {
				alert("เลือกวันที่เริ่มจอง");
				$("#start_date").focus();
				return false;
			} else if (end_date == "") {
				alert("เลือกวันที่สิ้นสุดการจอง ");
				$("#end_date").focus();
				return false;

			}

			else {
				var pmeters = 'carIdValue=' + carIdValue
					+ '&name_reserve=' + name_reserve
					+ '&tel_reserve=' + tel_reserve
					+ '&car_title=' + car_title
					+ '&Pickup_location=' + Pickup_location
					+ '&Down_finish=' + Down_finish
					+ '&address=' + address
					+ '&number_passengers=' + number_passengers
					+ '&name_passengers=' + name_passengers
					+ '&tel_reserve_main=' + tel_reserve_main
					+ '&detail=' + detail
					+ '&start_date=' + start_date
					+ '&end_date=' + end_date
					;
					
				pmeters = pmeters.replace("undefined", "");

				$.ajax({
					url: "<?= base_url(); ?>car_system/reserve/reserve_car_add",
					type: 'POST',
					data: pmeters,
					async: false,
					success: function (data) {
						// alert(data);
						$("#btnSave").attr("disabled", true);
						window.location = "<?= base_url(); ?>car_system/admin/list_history_id";
					}
				});
				return false;
			}
		}
		return false;


	}




</script>
