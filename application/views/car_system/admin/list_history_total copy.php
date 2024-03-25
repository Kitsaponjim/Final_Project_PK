<div class="content-wrapper">
	<section class="content-header">
		<p
			style="font-size: 20px; background-color: #ffffff; padding: 10px; border-radius: 10px; display: flex; align-items: center;">

			<i class="fa fa-car"
				style="margin-right: 10px; background-color: #b3c3ff; padding: 8px; border-radius: 50%; color: white"></i>

			<strong style="flex: 1; display: inline;">ประวัติการจองรถทั้งหมด</strong>
		</p>

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


		<div class="container-fluid">

			<div class="row">
				<style>
					/* style กำหนดกบ่องใส่ข้อมูลสี่เหลี่ยมโค้ง */
					.custom-box {
						background-color: white;
						border-radius: 10px;
						box-shadow: none;
						border-top: solid white;
						/* กำหนดสีขอบด้านบนเป็นสีขาว */
					}

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
				</style>



				<!-- <div class="col-sm-12"> -->
				<div class="box custom-box">
					<div class="box-body">


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


		
<form method="get" action="" onsubmit="return validateForm(event)">

<p style="font-size: 15px; background-color: #ffffff; padding: 10px; border-radius: 10px; display: flex; align-items: center;">
	<label for="start_date" style="margin-left:10px;">เลือกวันที่เวลา </label>

	<label for="start_date" style="margin-left:10px;">เริ่ม : </label>
	<input type="date" id="start_date" name="start_date" required
		value="<?= isset($_GET['start_date']) ? $_GET['start_date'] : date('Y-m-d') ?>"
		style="border: 1px solid white; border-radius: 5px; padding: 5px; background-color: #e6f7ff; margin-left:10px;">

	<label for="end_date" style="margin-left:10px;">สิ้นสุด : </label>
	<input type="date" id="end_date" name="end_date" required
		value="<?= isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d', strtotime('+1 month')) ?>"
		style="border: 1px solid white; border-radius: 5px; padding: 5px; background-color: #e6f7ff; margin-left:10px;">

	<button id="submitBtn" class="btn btn-custom-gray btn-lg" style="font-size: 13px; margin-left:20px;" type="submit">ค้นหา</button>
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


						<br>

						<table id="example1" class="table table-bordered table-striped dataTable" role="grid"
							aria-describedby="example1_info">
							<thead>
								<tr role="row" class="info">
									<th tabindex="0" rowspan="1" colspan="1" style="width: 8%; text-align: center;">
										รูปภาพ</th>
									<!-- <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">Photp</th> -->

									<th tabindex="0" rowspan="1" colspan="1" style="width: 14%; text-align: center;">
										ข้อมูลรถ</th>
									<th tabindex="0" rowspan="1" colspan="1" style="width: 14%; text-align: center;">
										วันเวลา</th>
									<th tabindex="0" rowspan="1" colspan="1" style="width: 14%; text-align: center;">
										รายละเอียดการขอใช้</th>
									<th tabindex="0" rowspan="1" colspan="1" style="width: 3%; text-align: center;">
										สถานะ</th>
									<th tabindex="0" rowspan="1" colspan="1" style="width: 3%; text-align: center;">
										ยกเลิก</th>
								</tr>
							</thead>
							<tbody>


								<?php

								foreach ($data['data'] as $value) {

									$case_id = $value->case_id;
									$car_list = $value->car_list;
									$user_id = $value->user_id;

									$name_reserve = $value->name_reserve;
									$tel_reserve = $value->tel_reserve;

									$car_title = $value->car_title;
									$reserve_detail = $value->reserve_detail;
									$Pickup_location = $value->Pickup_location;
									$Down_finish = $value->Down_finish;
									$address = $value->address;

									$detail_address = $value->detail_address;
									$number_passengers = $value->number_passengers;
									$name_passengers = $value->name_passengers;

									$cancel_detail = $value->cancel_detail;
									$date_cancel = $value->date_cancel;


									// $status_reserve = $value->	status_reserve;
									$status_name = $value->status_name;
									$status_name_popup = $value->status_name;
									$status_popup = $value->status_reserve;

									$car_add_date = $value->car_add_date;
									$formatted_date = date("Y-m-d H:i:s", $car_add_date);
									$car_start_date = $value->car_start_date;
									$formatted_start = date("Y-m-d H:i:s", $car_start_date);
									$car_end_date = $value->car_end_date;

									$date_time = date('Y-m-d H:i:s', $car_end_date);
									$new_date_time = date('Y-m-d H:i:s', strtotime($date_time . ' -1 hour'));
									$formatted_end = date("Y-m-d H:i:s", $car_end_date);

									// data car
									$car_brand = $value->car_brand;
									$car_model = $value->car_model;
									$car_registration = $value->car_registration; //ทะเบียนรถ
									$car_color = $value->car_color;
									$car_type = $value->car_type;
									$car_number_seat = $value->car_number_seat;
									$car_other = $value->car_other;

									$image_data = base64_encode($value->image_data);
									$image_mime_type = $value->image_mime_type;

									$src = 'data:' . $image_mime_type . ';base64,' . $image_data;



									$image_data_r = base64_encode($value->image_data);
									$image_mime_type_r = $value->image_mime_type;

									$src_r = 'data:' . $image_mime_type_r . ';base64,' . $image_data_r;

									$id_driver = $value->id_driver;
									$driver_name = $value->driver_name;
									$driver_tel = $value->driver_tel;
									$driver_history = $value->driver_history;

									$image_data_driver = base64_encode($value->image_data_driver);
									$image_mime_type_driver = $value->image_mime_type_driver;

									$src_driver = 'data:' . $image_mime_type_driver . ';base64,' . $image_data_driver;

									?>

									<style>
										.gray-text {
											color: #b8b9ba;

										}
									</style>
									<tr role="row">
										<td align="center" style="font-size: 12px; text-align: left;">
											<img style="height: 80px; width: 130px; border-radius: 20px; margin-top:10px;"
												src="<?= $src; ?>" alt="รูปภาพ">
										</td>

										<td align="" style="font-size: 13px; text-align: left;">

											<p>
												<strong>ทะเบียนรถ :</strong> &nbsp;&nbsp;&nbsp;&nbsp;
												<span class="gray-text">
													<?= $car_registration; ?>
												</span>
												<!-- <span class="gray-text"><?= $Pickup_location; ?></span> -->
											</p>

											<p> <strong> ชื่อคนขับ :</strong> &nbsp;&nbsp;&nbsp;&nbsp;
												<span class="gray-text">
													<?= $driver_name; ?>
												</span>

											</p>
											<p> <strong>
											เบอร์โทรศัพท์มือถือ :
												</strong> &nbsp;&nbsp;&nbsp;&nbsp;
												<span class="gray-text">
													<?= $driver_tel; ?>
												</span>


												<br>
												<br>
												<a href="#" class="" data-toggle="modal" data-target="#popupModal_car"
													data-car_brand="<?= $car_brand; ?>" data-car_model="<?= $car_model; ?>"
													data-car_registration="<?= $car_registration; ?>"
													data-car_color="<?= $car_color; ?>" data-car_type="<?= $car_type; ?>"
													data-car_number_seat="<?= $car_number_seat; ?>"
													data-car_other="<?= !empty($car_other) ? $car_other : '-'; ?>"
													data-driver_name="<?= $driver_name; ?>"
													data-driver_tel="<?= $driver_tel; ?>"
													data-driver_history="<?= $driver_history; ?>"
													data-src_r="<?= $src_r; ?>"
													data-image_mime_type_r="<?= $image_mime_type_r; ?>"
													data-image_mime_type_driver="<?= $image_mime_type_driver; ?>"
													data-src_driver="<?= $src_driver; ?>">
													เพิ่มเติม
												</a>

											</p>

										</td>

										<td align="" style="font-size: 13px; text-align: left;">

											<p>
												<strong>เริ่มทำการจอง :</strong> &nbsp;&nbsp;&nbsp;
												<span class="gray-text">
													<?= $formatted_date; ?>
												</span>
											</p>

											<p>
												<strong>เริ่มต้น :</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<span class="gray-text">
													<?= $formatted_start; ?>
												</span>
											</p>


											<p>
												<strong>สิ้นสุด :</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<span class="gray-text">
													<?= $new_date_time; ?>
												</span>
											</p>


										</td>


										<td align="" style="font-size: 13px; text-align: left;">

											<p>
												<strong>เหตุผลการจองรถ :</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<span class="gray-text">
													<?= $car_title; ?>
												</span>
											</p>
											<p>
												<strong>รายละเอียด :</strong> &nbsp;&nbsp;
												<span class="gray-text">
													<?php
													$reserve_detail = $value->reserve_detail;

												
													$chunks = str_split($reserve_detail, 25);

									
													echo implode("<br>", $chunks);
													?>
												</span>

											</p>



											<a href="#" class="" data-toggle="modal" data-target="#popupModal_request"
												data-case_id="<?= $case_id; ?>" data-name_reserve="<?= $name_reserve; ?>"
												data-tel_reserve="<?= $tel_reserve; ?>" data-car_title="<?= $car_title; ?>"
												data-reserve_detail="<?= $reserve_detail; ?>"
												data-pickup_location="<?= $Pickup_location; ?>"
												data-down_finish="<?= $Down_finish; ?>" data-address="<?= $address; ?>"
												data-detail_address="<?= $detail_address; ?>"
												data-number_passengers="<?= $number_passengers; ?>"
												data-status_name_popup="<?= $status_name_popup; ?>"
												data-status_popup="<?= $status_popup; ?>"
												data-cancel_detail="<?= !empty($cancel_detail) ? $cancel_detail : '-'; ?>"
												data-date_cancel="<?= !empty($date_cancel) ? $date_cancel : '-'; ?>"
												data-name_passengers="<?= $name_passengers; ?>">
												เพิ่มเติม
											</a>


										</td>

										<td  align="center" style="font-size: 12px; text-align: center; color: black; border-color: inherit;
										<?php
										if ($status_name == 'จอง') {
											echo 'color: white;';
										} elseif ($status_name == 'ยกเลิก') {
											echo 'color: back;';
										}elseif ($status_name == 'สำเร็จ') {
											echo 'color: white;';
										}
										?>
									">
											<?php
							if ($status_name == 'จอง') {
								echo '<div style="padding: 5px; border-radius: 5px; background-color: #4281ff;">' . $status_name . '</div>';
							} elseif ($status_name == 'ยกเลิก') {
								echo '<div style="padding: 5px; border-radius: 5px; background-color: #d9d9d9;">' . $status_name . '</div>';
							}elseif ($status_name == 'สำเร็จ') {
								echo '<div style="padding: 5px; border-radius: 5px; background-color: #1fd13a;">' . $status_name . '</div>';
							} else {
								echo $status_name;
							}
											?>
										</td>
										<td align="center" style="font-size: 16px;">
											<?php
											if ($status_name == 'ยกเลิก') {
												echo '<span style="color: gray;">';
												$disable_button = 'disabled';
												$button_color = 'gray';
											} elseif ($status_name == 'สำเร็จ') {
												echo '<span style="color: gray;">';
												$disable_button = 'disabled';
												$button_color = 'gray';
											}else {
												$disable_button = '';
												$button_color = 'black';
											}
											?>

											<?php if ($status_name !== 'ยกเลิก' && $status_name !== 'สำเร็จ') : ?>
												<a href="#" class="" data-toggle="modal" data-target="#popupModal_date_cancel"
													data-car_list_cancel="<?= $case_id; ?>" <?= $disable_button; ?>>
													<i class="fa fa-ban" style="color: <?= $button_color; ?>; margin-right: 7px;"></i>
												</a>
											<?php else: ?>
												<i class="fa fa-ban" style="color: <?= $button_color; ?>; margin-right: 7px;"></i>
											<?php endif; ?>

											<?php
											if ($status_name == 'ยกเลิก' && $status_name == 'สำเร็จ') {
												echo '</span>';
											}
											?>
										</td>




									</tr>

									<?php
								} ?>
								</tr>

							</tbody>
						</table>

					</div>

				</div>


				<!-- </div> -->


	</section><!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- ############## -->
<div class="modal fade" id="popupModal_car" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document" style="width: 800px;">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h3 class="modal-title" id="popupModalLabel">ข้อมูลเพิ่มเติม</h3>

			</div>


			<div class="modal-body scrollable">
				<div style="font-size: 18px; background-color: #57a2ff; padding: 3px; border-radius: 5px;">
					<i class="fa fa-car" style="margin-left:5px;"></i>&nbsp;&nbsp; รายละเอียดรถ
				</div>

				<table class="table table-bordered">

				<img id="src_r" alt="Driver Image" style="max-width: 200%; max-height: 200px;">
				<br>
					<tr>
						<th class="text-left small-cell" style="font-size: 15px; width:150px;">ยี่ห้อรถ</th>
						<td style="font-size: 15px; width:150px;">
							<span id="car_brand"></span><br>
						</td>
					</tr>
					<tr>
						<th class="text-left small-cell" style="font-size: 15px;">รุ่นรถ</th>
						<td style="font-size: 15px;">


							&nbsp;&nbsp;<span id="car_model"></span>
							<br>
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


				<p style="font-size: 18px; background-color: #2aad2a; padding: 3px; border-radius: 5px;"><i
						class="fa fa-user" style="margin-left:5px;"></i> &nbsp;&nbsp;
						รายละเอียดคนขับรถ</p>

				<table class="table table-bordered">

					<img id="src_driver" alt="Driver Image" style="max-width: 200%; max-height: 200px;">

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
						<th class="text-left small-cell" style="font-size: 15px;">เบอร์โทรศัพท์ติดต่อ</th>
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


<!-- ############### -->
<div class="modal fade" id="popupModal_request" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document" style="width: 800px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h3 class="modal-title" id="popupModalLabel">รายละเอียดการขอใช้งาน</h3>

			</div>


			<div class="modal-body scrollable">
				<div style="font-size: 18px; background-color: #57a2ff; padding: 3px; border-radius: 5px;">
					<i class="fa fa-car" style="margin-left:5px;"></i>&nbsp;&nbsp; ข้อมูลการขอใช้งาน
				</div>

				<br>

				<table class="table table-bordered">
					<tr>
						<th class="text-left small-cell" style="font-size: 15px; width:150px;">ชื่อผู้จอง</th>
						<td style="font-size: 15px; width:150px;">
							<span id="name_reserve"></span><br>
						</td>
					</tr>
					<tr>
						<th class="text-left small-cell" style="font-size: 15px;">เบอร์โทรศัพท์ติดต่อ</th>
						<td style="font-size: 15px;">
							<strong>
								<i class="fa fa-phone"></i>
							</strong>

							&nbsp;&nbsp;<span id="tel_reserve"></span>
							<br>
						</td>
					</tr>


					<tr>
						<th class="text-left small-cell" style="font-size: 15px;">เหตุผลการจองรถ</th>
						<td style="font-size: 15px;">
							&nbsp;&nbsp;<span id="car_title"></span>
							<br>


						</td>
					</tr>

					<tr>
						<th class="text-left small-cell" style="font-size: 15px;">รายละเอียดการจอง</th>
						<td style="font-size: 15px;">

							&nbsp;&nbsp;<span id="reserve_detail"></span>
							<br>
						</td>
					</tr>

					<tr>
						<th class="text-left small-cell" style="font-size: 15px;">จุดขึ้นรถ</th>
						<td style="font-size: 15px;">
							<strong>
								<i class="fa fa-map-marker"></i>
							</strong>

							&nbsp;&nbsp;<span id="pickup_location"></span>
							<br>
						</td>
					</tr>

					<tr>
						<th class="text-left small-cell" style="font-size: 15px;">จุดลงรถหลังเสร็จภารกิจ</th>
						<td style="font-size: 15px;">
							<strong>
								<i class="fa fa-map-marker"></i>
							</strong>

							&nbsp;&nbsp;<span id="down_finish"></span>
							<br>
						</td>
					</tr>



					<tr>
						<th class="text-left small-cell" style="font-size: 15px;">สถานที่</th>
						<td style="font-size: 15px;">
						<strong>
								<i class="fa fa-map-marker"></i>
							</strong>
							&nbsp;&nbsp;<span id="address"></span>
							<br>


						</td>
					</tr>


					<tr>
						<th class="text-left small-cell" style="font-size: 15px;">รายละเอียดสถานที่</th>
						<td style="font-size: 15px;">
							&nbsp;&nbsp;<span id="detail_address"></span>
							<br>


						</td>
					</tr>

					<tr>
						<th class="text-left small-cell" style="font-size: 15px;">จำนวนผู้โดยสาร</th>
						<td style="font-size: 15px;">
							&nbsp;&nbsp;<span id="number_passengers"></span>
							&nbsp;&nbsp; คน
							<br>


						</td>
					</tr>
					<tr>
						<th class="text-left small-cell" style="font-size: 15px;">รายชื่อผู้โดยสาร</th>
						<td style="font-size: 15px;">
							&nbsp;&nbsp;<span id="name_passengers"></span>
							<br>


						</td>
					</tr>




				</table>




				<p style="font-size: 18px; background-color: #d9d9d9; padding: 3px; border-radius: 5px; display: none;" id="cancel_detail_title">
    <i class="fa fa-user" style="margin-left:5px;"></i> &nbsp;&nbsp; ข้อมูลการยกเลิก
</p>

<table class="table table-bordered" id="cancel_table" style="display: none;">
    <br>


    <tr>
        <th class="text-left small-cell" style="font-size: 15px; width:150px;">วันที่ยกเลิกอการจอง</th>
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


				<p><span style="display: none;" id="case_id"></span></p>


				<div class="modal-footer">
				<button type="button" class="btn btn-secondary" id="editButton" data-dismiss="modal"style="background-color:#4281ff; color:white;" onclick="OnEdit()">แก้ไขข้อมูล</button>


					<!-- <button type="button" class="btn btn-secondary" data-dismiss="modal"
						onclick="OnEdit()">แก้ไข</button> -->
					<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- ############### -->

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

				<p><span style="display: none;" id="car_list_cancel"></span></p>

				<div class="form-group">
					<label for=""><strong class="text-danger">*</strong>กรอกเหตุผลการยกเลิกการจอง</label>
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

		modal.find('#image_mime_type_r').text(button.data('image_mime_type_r'));
		modal.find('#src_r').attr('src', button.data('src_r'));

		modal.find('#image_mime_type_driver').text(button.data('image_mime_type_driver'));
		modal.find('#src_driver').attr('src', button.data('src_driver'));
	});


	$('#popupModal_request').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget); // ลิงก์ "เพิ่มเติม" ที่ถูกคลิก
		var modal = $(this);

		// ดึงข้อมูลจาก data-attributes และแสดงใน Modal
		modal.find('#case_id').text(button.data('case_id'));
		modal.find('#name_reserve').text(button.data('name_reserve'));
		modal.find('#tel_reserve').text(button.data('tel_reserve'));
		modal.find('#car_title').text(button.data('car_title'));
		modal.find('#reserve_detail').text(button.data('reserve_detail'));
		modal.find('#pickup_location').text(button.data('pickup_location'));
		modal.find('#down_finish').text(button.data('down_finish'));
		modal.find('#address').text(button.data('address'));
		modal.find('#detail_address').text(button.data('detail_address'));
		modal.find('#number_passengers').text(button.data('number_passengers'));
		modal.find('#name_passengers').text(button.data('name_passengers'));
		// modal.find('#date_cancel').text(button.data('date_cancel'));

		
	var status_name_popup = button.data('status_name_popup');
	
	var status_popup = button.data('status_popup');

	var cancelDetail = button.data('cancel_detail');
    var dateCancel = button.data('date_cancel');
    
    var cancelTable = $('#cancel_table');
    var cancelDetailSpan = $('#cancel_detail_title');

	var editButton = $('#editButton');

    if (status_popup == 2) {
        cancelTable.show();
        cancelDetailSpan.show();
        $('#cancel_detail').text(cancelDetail);
        $('#date_cancel').text(dateCancel);
		editButton.hide();
    } else if (status_popup == 3) {
		cancelTable.hide();
		cancelDetailSpan.hide();
		$('#cancel_detail').text('');
		$('#date_cancel').text('');
		editButton.hide();
		}
	else {
        cancelTable.hide();
        cancelDetailSpan.hide();
        $('#cancel_detail').text('');
        $('#date_cancel').text('');
		editButton.show();
    }


	});


	$('#popupModal_date_cancel').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget); 
		var modal = $(this);

		modal.find('#car_list_cancel').text(button.data('car_list_cancel'));

	});


	// ############################################################################



	function onSave_cancel() {
		var car_list_cancel = $("#car_list_cancel").text();
		var cancel = $("#cancel").val();

		var formData = new FormData();

		if (cancel === '') {
			alert('กรุณากรอกรายละเอียดการยกเลิกการจอง');
			$('#cancel').focus();
			return false;
		}

		if (confirm('คุณต้องการยกเลิกการจองใช่หรือไม่')) {
			formData.append('car_list_cancel', car_list_cancel);
			formData.append('cancel', cancel);

			$.ajax({
				url: "<?= base_url(); ?>car_system/reserve/update_cancel",
				type: 'POST',
				data: formData,
				contentType: false,
				processData: false,
				async: false,
				success: function (data) {
					// alert(data);
					$("#btnSave").attr("disabled", true);
					window.location = "<?= base_url(); ?>car_system/Admin/list_history_total";
				}
			});
			return false;
		}
	}



	function OnEdit() {
		var case_id = $('#case_id').text();
		window.location = "<?= base_url('car_system/Admin/edit_request_total/'); ?>" + case_id;
	}


</script>


