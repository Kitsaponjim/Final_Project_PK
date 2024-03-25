<div class="content-wrapper">
	<section class="content-header">
		<p
			style="font-size: 20px; background-color: #ffffff; padding: 10px; border-radius: 10px; display: flex; align-items: center;">

			<i class="fa fa-car"
				style="margin-right: 10px; background-color: #b3c3ff; padding: 8px; border-radius: 50%; color: white"></i>
			<strong style="flex: 1; display: inline;">รายการรถ</strong>
			<a href="#" class="btn btn-custom open-popup" data-toggle="modal"
				style="background-color: #4281ff;color:white;" data-target="#popupModal_add" role="button"
				style="margin-left: auto;">
				<i class="fa fa-fw fa-plus-circle"></i>
				เพิ่มรายการ
			</a>

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

					.narrow-select {
						width: 130px;
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

				<form method="get" action="" style="margin-left: 20px; margin-top:10px;">

					<label for="status">เลือก </label>


					&nbsp;&nbsp;

					<label for="role">ตำแหน่ง : </label>
					<select id="role" name="role" required class="narrow-select">
						<option value="#" <?php echo (empty($_GET['role']) ? 'selected' : ''); ?>>--เลือก--
						</option>
						<?php
						$sql = 'SELECT * FROM car_brand';
						$query_1 = $this->db->query($sql)->result();

						foreach ($query_1 as $role) {
							$selected = (isset($_GET['role']) && $_GET['role'] == $role->brand_name) ? 'selected' : '';
							echo '<option value="' . $role->brand_name . '" ' . $selected . '>' . $role->brand_name . '</option>';
						}
						?>
					</select>

					&nbsp;&nbsp;&nbsp;
					<label for="status">สถานะ : </label>
					<select id="status" name="status" required class="narrow-select">
						<option value="#" <?php echo (empty($_GET['status']) ? 'selected' : ''); ?>>--เลือก--
						</option>
						<?php
						$sql = 'SELECT * FROM car_type';
						$query_1 = $this->db->query($sql)->result();

						foreach ($query_1 as $status) {
							$selected = (isset($_GET['status']) && $_GET['status'] == $status->type_name) ? 'selected' : '';
							echo '<option value="' . $status->type_name . '" ' . $selected . '>' . $status->type_name . '</option>';
						}
						?>
					</select>

					<label for="sit" style="margin-left: 30px;">จำนวนที่นั่ง :</label>
					<input type="number" id="sit" name="sit" class="narrow-select"
       style="border: 1px solid white; border-radius: 5px; padding: 5px; display: inline-block; width: 60px; margin-left:10px;"
       value="<?= isset($_POST['sit']) ? htmlentities($_POST['sit']) : (isset($_GET['sit']) ? htmlentities($_GET['sit']) : ''); ?>">

					&nbsp;
					<button class="btn btn-custom-gray btn-lg" style="font-size: 13px;" type="submit">ค้นหา</button>

				</form>





				<div class="col-sm-12" style="margin-top:22px;">
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
							$car_usage_status = $value->car_usage_status;

							$role_name = $value->role_names;
							$car_other = $value->car_other;

							$car_driver = $value->car_driver;
							$id_driver = $value->id_driver;

							$sql_check_driver = "SELECT id_driver FROM car_driver_information WHERE id_driver = ?";
							$result_check_driver = $this->db->query($sql_check_driver, array($id_driver))->row();

							$driver_name = $value->driver_name;
							$driver_tel = $value->driver_tel;
							$driver_history = $value->driver_history;


							$image_data = base64_encode($value->image_data);
							$image_mime_type = $value->image_mime_type;

							if (!empty($image_data)) {
								$src = 'data:' . $image_mime_type . ';base64,' . $image_data;
							} else {
								$src = 'fa fa-car';
							}

							$image_data_s = base64_encode($value->image_data);
							$image_mime_type_s = $value->image_mime_type;

							if (!empty($image_data_s)) {
								$src_s = 'data:' . $image_mime_type_s . ';base64,' . $image_data_s;
							} else {
								$src_s = 'fa fa-car';
							}

							$image_data_driver = base64_encode($value->image_data_driver);
							$image_mime_type_driver = $value->image_mime_type_driver;
							$src_driver = 'data:' . $image_mime_type_driver . ';base64,' . $image_data_driver;


							?>
							<div class="col-sm-4">
								<div class="box custom-box">
									<div class="box-body">

										<?php
										if ($src == 'fa fa-car') {
											echo '<div style="text-align: center; height: 100px; width: 160px; border-radius: 20px; margin-top:10px;  padding: 3px;">';
											echo '<i class="' . $src . '" style="font-size: 80px; color: black;"></i>';
											echo '</div>';
										} else {
											echo '<div style="text-align: left; padding-left: 10px;">';
											echo '<img style="height: 100px; width: 160px; border-radius: 20px; margin-top:10px;" src="' . $src . '" alt="รูปภาพ">';
											echo '</div>';
										}
										?>

										<div style="position: absolute; top: 30px; right: 0; left: 40px; width: 60px; height: 40px;
													color: white; text-align: center; border-radius: 10px; line-height: 40px;
													transform: translate(-100%, -50%);
													<?php
													if ($car_driver == '#') {
														echo 'background-color: #ffb24f; font-size: 10px;">เลือกคนขับ';
													} elseif ($car_usage_status == 1) {
														echo 'background-color: green;">พร้อม';
													} elseif ($car_usage_status == 2) {
														echo 'background-color: red;">ไม่พร้อม';
													} elseif (empty($result_check_driver)) {
														echo 'background-color: #ffb24f; font-size: 10px;">เลือกคนขับ'; // เพิ่ม font-size
													} else {
														echo 'background-color: gray; font-size: 7px;">ไม่ได้กำหนดสถานะ';
													}
													?>
										</div>

										<div>
										<br>
									<strong style=" margin-left: 20px;">ยี่ห้อรถ :</strong>
											<span style="font-size: 16px; color: #4281ff;">

												<?= $car_brand ? $car_brand : '-'; ?>
											</span>
											<br>

											<strong style="margin-left: 20px;">เลขทะเบียนรถ :</strong>
											<?= $car_registration ? $car_registration : '-'; ?>
											<br>
											<strong style="margin-left: 20px;">ประเภทของรถ :</strong>
											<?= $car_type ? $car_type : '-'; ?>
											<br>
											<strong style="margin-left: 20px;">ชื่อคนขับรถ :</strong>
											<?php
											echo $driver_name ? $driver_name : '<span style="font-weight: bold; color: #ffb24f;">โปรดเลือกคนขับ</span>';
											?>
										</div>

										<p style="font-size: 20px; display: flex; align-items: center; margin-top:5px;">
											<strong style="flex: 1; display: inline; margin-left: 20px;"> จำนวน
												<?= $car_number_seat ? $car_number_seat : '-'; ?>
												ที่นั่ง
											</strong>

											<a href="#" class="open-popup" data-toggle="modal" data-target="#popupModal_car"
												data-car_id="<?= $car_id; ?>"
												data-car_brand="<?= !empty($car_brand) ? $car_brand : '-'; ?>"
												data-car_model="<?= !empty($car_model) ? $car_model : '-'; ?>"
												data-car_type="<?= !empty($car_type) ? $car_type : '-'; ?>"
												data-car_registration="<?= !empty($car_registration) ? $car_registration : '-'; ?>"
												data-car_number_seat="<?= !empty($car_number_seat) ? $car_number_seat : '-'; ?>"
												data-src_s="<?= $src_s; ?>" data-image_mime_type_s="<?= $image_mime_type_s; ?>"
												data-driver_name="<?= !empty($driver_name) ? $driver_name : '-'; ?>"
												data-driver_tel="<?= !empty($driver_tel) ? $driver_tel : '-'; ?>"
												data-car_other="<?= !empty($car_other) ? $car_other : '-'; ?>"
												data-driver_history="<?= !empty($driver_history) ? $driver_history : '-'; ?>"
												data-image_driver="<?= $src_driver; ?>"
												data-car_color="<?= !empty($car_color) ? $car_color : '-'; ?>"
												data-role_name="<?= $role_name; ?>"
												data-image_mime_type_driver="<?= $image_mime_type_driver; ?>"
												data-src_driver="<?= $src_driver; ?>">
												<i class="fa fa-search" style="color: black; margin-right: 3px;"></i>
											</a>

											&nbsp;&nbsp;

											<a href="#" class="open-popup" data-toggle="modal" data-target="#popupModal_edit"
												data-car_id="<?= $car_id; ?>">
												<i class="fa fa-edit" style="color: black; margin-right: 7px;"></i>
											</a>

											&nbsp;&nbsp;
											<a href="#" class="" onclick="onDel(<?= $car_id ?>)">
												<i class="fa fa-trash" style="color: black; margin-right: 7px;"></i>
											</a>


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
									<i class="fa fa-plus" style="font-size: 80px; color: #4281ff;"></i>
									<p style="font-size: 18px; color: #000;">ไม่มีข้อมูลรถ</p>
									<p style="font-size: 16px; color: #000;">เพิ่มข้อมูลรถ</p>
								</div>
							</div>
						</div>
						<?php
					}
					?>


				</div>
			</div>

	</section><!-- /.content -->
</div><!-- /.content-wrapper -->


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

<div class="modal fade" id="popupModal" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel1"
	aria-hidden="true">
	<div class="modal-dialog custom-width" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>

				<p class="modal-title" id="popupModalLabel" style="font-size: 20px; color:back;">
					<strong>รายละเอียดข้อมูลรถ</strong>
				</p>
			</div>

			<div class="modal-body">
				<div class="row">
					<!-- Left Column -->
					<div class="col-md-5">

						<p style="font-size: 18px; color:back;"><strong> ข้อมูลรถ</span></strong></p>

						<div>
							<span id="popupImage"></span></p>
						</div>

						<p><strong>ยี่ห้อรถ/รุ่นรถ:</strong> <span id="car_brand"></span> / <span id="car_model"></span>
						</p>

						<!-- Add more left-side content here -->


						<p><strong>เลขทะเบียนรถ :</strong> <span id="car_registration"></span></p>
						<p><strong>ประเภทของรถ :</strong> <span id="car_type"></span></p>
						<p><strong>สีรถ :</strong> <span id="car_color"></span></p>
						<p><strong>จำนวนที่นั่ง :</strong> <span id="car_number_seat"> </span> ที่นั่ง</p>
						<!-- <p><strong>ประเภทเชื้อเพลิง :</strong> <span id=""></span></p>
						<p><strong>สถานะ :</strong> <span id=""></span></p> -->

					</div>
					<!-- Right Column -->
					<div class="col-md-7">

						<p style="font-size: 18px; color:back;"><strong> ข้อมูลคนขับรถ</span></strong></p>

						<div>
							<span id="popupImage_driver"></span></p>
						</div>
						<!-- <p><strong>รูป :</strong> <span id=""></span></p> -->
						<p><strong>ชื่อ-นามสกุล :</strong> <span id="driver_name"></span></p>
						<p><strong>เบอร์โทรศัพท์มือถือ :</strong> <span id="driver_tel"></span></p>
						<!-- <p><strong>สถานะ :</strong> <span id=""></span></p> -->
						<p><strong>ข้อมูลอื่นๆ :</strong> <span id="driver_history"></span></p>


					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
			</div>
		</div>
	</div>
</div>



<div class="modal fade" id="popupModal_edit" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel2"
	aria-hidden="true">
	<div class="modal-dialog custom-width" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<p class="modal-title" id="popupModalLabel" style="font-size: 20px; color:back;">
					<strong>แก้ไขรายละเอียดรถ</strong>
				</p>
			</div>
			<div class="modal-body">
				<div class="row">

					<div class="col-md-7">
						<p style="font-size: 18px; color:back;"><strong> ข้อมูลรถ</span></strong></p>

						<div class="form-group">
							<label for="car_brand">ยี่ห้อรถ :</label>
							<select id="brand_name_edit" name="brand_name_edit" required class="form-control">
								<?php
								$i = 1;

								echo '<option value="#">--เลือก---</option>';
								foreach ($data_brand_car['data_brand_car'] as $value) {

									$brand_id = @$value->brand_id;
									$brand_name = @$value->brand_name;

									echo '<option value="' . $brand_name . '">' . $brand_name . '</option>';

									$i++;
								}
								?>
							</select>

						</div>


						<div class="form-group">
							<label for="car_model">ประเภทของรถ :</label>
							<select id="type_name_edit" name="type_name_edit" required class="form-control">
								<?php
								$i = 1;

								echo '<option value="#">--เลือก---</option>';
								foreach ($data_type_car['data_type_car'] as $value) {

									$car_type_id = @$value->car_type_id;
									$type_name = @$value->type_name;

									echo '<option value="' . $type_name . '">' . $type_name . '</option>';

									$i++;
								}
								?>
							</select>
						</div>

						<div class="form-group">
							<label for="">สีรถ :</label>
							<input type="text" class="form-control" id="car_color_edit" name="car_color_edit"
								placeholder="สีรถ">
						</div>


						<div class="form-group">
							<label><strong class="text-danger"></strong>เลือกคนขับ :</label>

							<select id="id_driver_edit" name="id_driver_edit" required class="form-control">

								<?php
								if (isset($data_driver['data_driver']) && !empty($data_driver['data_driver'])) {
									echo '<option value="">--เลือก---</option>';
									// echo '<option value="#">ว่าง</option>';
									foreach ($data_driver['data_driver'] as $value) {
										$id_driver = @$value->id_driver;
										$driver_name = @$value->driver_name;
										echo '<option value="' . $id_driver . '">' . $driver_name . '</option>';
									}
								} else {
									echo '<option value="">--ไม่มีรายการคนขับ--</option>';
									// echo '<option value="#">ว่าง</option>';
								}
								?>
							</select>

						</div>

						<div class="form-group">
							<label for="system_edit"><strong class="text-danger">*</strong>ตำแหน่งที่สามารถจองรถได้
								:</label>
							<div class="checkbox-container" id="role_edit" style="margin-top:10px;">
								<?php $count = 0; ?>
								<div>
									<?php foreach ($user_role_edit['user_role_edit'] as $key => $value): ?>
										<input type="checkbox" id="system_edit<?= $value->id_role; ?>" name="system_edit[]"
											value="<?= $value->id_role; ?>" <?= in_array($value->id_role, $_GET['system_edit'] ?? []) ? 'checked_edit' : ''; ?>>
										<label for="system_edit<?= $value->id_role; ?>">
											<?= $value->role_name; ?>
										</label>

										<?php $count++; ?>
										<?php if ($count % 2 == 0 || $count == count($user_role_edit['user_role_edit'])): ?>
										</div>
										<div>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>
							</div>

						</div>


					</div>

					<div class="col-md-5">

						<br>
						<br>
						<div class="form-group">
							<label for="">เลขทะเบียนรถ :</label>
							<input type="text" class="form-control" id="car_registration_edit"
								name="car_registration_edit" placeholder="เลขทะเบียนรถ">
						</div>


						<div class="form-group">
							<label for="car_number_seat_edit">จำนวนผู้โดยสาร :</label>

							<input type="text" class="form-control" id="car_number_seat_edit"
								name="car_number_seat_edit" placeholder="จำนวนผู้โดยสาร" maxlength="2"
								oninput="validateNumberEdit(this);">
							<small id="numErrorEdit" class="text-danger"></small>

						</div>

						<script>
							function validateNumberEdit(input) {
								var numError = document.getElementById('numErrorEdit');
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




						<div class="form-group">
							<label><strong class="text-danger"></strong>ความพร้อมใช้งาน </label>

							<select id="readiness_id" name="readiness_id" required class="form-control">
								<?php
								$i = 1;

								echo '<option value="#">--เลือก---</option>';
								foreach ($car_readiness['car_readiness'] as $value) {

									$readiness_id = @$value->readiness_id;
									$readiness_name = @$value->readiness_name;

									echo '<option value="' . $readiness_id . '">' . $readiness_name . '</option>';

									$i++;
								}
								?>
							</select>

						</div>


						<div class="form-group">
							<label for=""><strong class="text-danger"></strong>ข้อมูลอื่นๆ:</label>
							<input type="text" class="form-control" id="car_other_edit" name="car_other_edit">
						</div>

						<div class="col-md-4 mb-2">
							<label>แนบไฟล์ภาพ</label>
							<input type="file" id="file_upload_e" class="form-control-file">
						</div>

					</div>


					<input type="text" class="form-control" id="car_id" name="car_id" style="display: none;" readonly>

				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info" id="saveChangesButton" style="background-color:#4281ff;"
					onclick="onEdit_car('car_id')">บันทึกข้อมูล</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>


			</div>
		</div>


	</div>
</div>





<div class="modal fade" id="popupModal_add" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel2"
	aria-hidden="true">
	<div class="modal-dialog custom-width" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<p class="modal-title" id="popupModalLabel" style="font-size: 22px; color:back;">
					<i class="fa fa-plus"></i>
					<strong>เพิ่มรายการรถ</strong>
				</p>
			</div>
			<div class="modal-body">
				<div class="row">

					<div class="col-md-7">
						<p style="font-size: 18px; color:back;"><strong> ข้อมูลรถ</span></strong></p>

						<div class="form-group">
							<label for="car_brand_add"><strong class="text-danger">*</strong>ยี่ห้อรถ :</label>
							<select id="car_brand_add" name="car_brand_add" required class="form-control">
								<?php
								$i = 1;

								echo '<option value="#">--เลือก---</option>';
								foreach ($data_brand_car['data_brand_car'] as $value) {

									$brand_id = @$value->brand_id;
									$brand_name = @$value->brand_name;

									echo '<option value="' . $brand_name . '">' . $brand_name . '</option>';

									$i++;
								}
								?>
							</select>

						</div>


						<div class="form-group">
							<label for="car_model_add"><strong class="text-danger">*</strong>ประเภทของรถ :</label>
							<select id="car_model_add" name="car_model_add" required class="form-control">
								<?php
								$i = 1;

								echo '<option value="#">--เลือก---</option>';
								foreach ($data_type_car['data_type_car'] as $value) {

									$car_type_id = @$value->car_type_id;
									$type_name = @$value->type_name;

									echo '<option value="' . $type_name . '">' . $type_name . '</option>';

									$i++;
								}
								?>
							</select>
						</div>

						<div class="form-group">
							<label for=""><strong class="text-danger">*</strong>สีของรถ :</label>
							<input type="text" class="form-control" id="car_color_add" name="car_color_add"
								placeholder="สีของรถ">
						</div>

						<div class="form-group">
							<label><strong class="text-danger"></strong>เลือกคนขับ </label>

							<select id="car_driver_add" name="car_driver_add" required class="form-control">
								<?php
								if (isset($data_driver['data_driver']) && !empty($data_driver['data_driver'])) {
									echo '<option value="#">ว่าง</option>';
									foreach ($data_driver['data_driver'] as $value) {
										$id_driver = @$value->id_driver;
										$driver_name = @$value->driver_name;
										echo '<option value="' . $id_driver . '">' . $driver_name . '</option>';
									}
								} else {
									echo '<option value="#">--ไม่มีรายการคนขับ--</option>';
									echo '<option value="#">ว่าง</option>';
								}
								?>
							</select>

						</div>


						<div class="form-group" style="margin-top:25px;">
							<label for="system"><strong class="text-danger">*</strong>ตำแหน่งที่สามารถจองรถได้ :</label>
							<div class="checkbox-container" id="role" style="margin-top:10px;">
								<?php $count = 0; ?>
								<div>
									<?php foreach ($user_role['user_role'] as $key => $value): ?>
										<input type="checkbox" id="system<?= $value->id_role; ?>" name="system[]"
											value="<?= $value->id_role; ?>" <?= in_array($value->id_role, $_GET['system'] ?? []) ? 'checked' : ''; ?>>
										<label for="system<?= $value->id_role; ?>">
											<?= $value->role_name; ?>
										</label>

										<?php $count++; ?>
										<?php if ($count % 2 == 0 || $count == count($user_role['user_role'])): ?>
										</div>
										<div>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>
							</div>




						</div>






					</div>



					<style>
						.checkbox-container {
							display: flex;
							flex-wrap: wrap;
							gap: 20px;
							/* ระยะห่างระหว่าง checkbox */
						}

						.checkbox-container div {
							display: flex;
							gap: 10px;
							/* ระยะห่างระหว่าง checkbox และ label */
							align-items: center;
							/* จัดตำแหน่งให้อยู่ตรงกลาง */
						}

						.checkbox-container input {
							opacity: 0;
							/* ซ่อน checkbox แบบปกติ */
							position: absolute;
							/* เพื่อให้ checkbox ไม่มีที่ตั้งที่กับ label */
						}

						.checkbox-container label {
							position: relative;
							padding-left: 30px;
							/* ปรับระยะห่างของ label จากซ้าย */
							cursor: pointer;
						}

						.checkbox-container label:before {
							content: '';
							position: absolute;
							left: 0;
							top: 0;
							width: 20px;
							/* กว้างของ checkbox */
							height: 20px;
							/* สูงของ checkbox */
							border: 2px solid #3498db;
							/* สีของ checkbox */
							background-color: #fff;
							/* สีพื้นหลังของ checkbox */
							border-radius: 4px;
							/* ทำให้มีขอบมน */
							transition: background-color 0.3s;
							/* เพื่อให้มี animation เมื่อเลือก */
						}

						.checkbox-container input:checked+label:before {
							background-color: #3498db;
							/* สีเมื่อ checkbox ถูกเลือก */
							border-color: #3498db;
							/* สีขอบเมื่อ checkbox ถูกเลือก */
						}
					</style>


					<div class="col-md-5">

						<br>
						<br>
						<div class="form-group">
							<label for=""><strong class="text-danger">*</strong>เลขทะเบียนรถ :</label>
							<input type="text" class="form-control" id="car_registration_add" placeholder="เลขทะเบียนรถ"
								name="car_registration_add">
						</div>



						<div class="form-group">
							<label for="car_number_seat_add"><strong class="text-danger">*</strong>จำนวนผู้โดยสาร :</label>
							<input type="text" class="form-control" id="car_number_seat_add" name="car_number_seat_add"
								placeholder="จำนวนผู้โดยสาร" maxlength="2" oninput="validateNumber(this);">
							<small id="numError" class="text-danger"></small>
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



						<div class="form-group">
							<label for="car_usage_status_add"><strong class="text-danger">*</strong>ความพร้อมใช้งาน
							</label>

							<select id="car_usage_status_add" name="car_usage_status_add" required class="form-control">
								<?php
								$i = 1;

								echo '<option value="#">--เลือก---</option>';
								foreach ($car_readiness['car_readiness'] as $value) {

									$readiness_id_add = @$value->readiness_id;
									$readiness_name = @$value->readiness_name;

									echo '<option value="' . $readiness_id_add . '">' . $readiness_name . '</option>';

									$i++;
								}
								?>
							</select>

						</div>


						<div class="form-group">
							<label for=""><strong class="text-danger"></strong>ข้อมูลอื่นๆ:</label>
							<input type="text" class="form-control" id="car_other_add" name="car_other_add">
						</div>




						<div class="col-md-4 mb-2">
							<label><strong class="text-danger">*</strong>แนบไฟล์ภาพ</label>
							<input type="file" id="file_upload_add" class="form-control-file">
						</div>

					</div>



				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-custom" id="saveChangesButton"
					style="background-color:#4281ff; color:#ffffff;" onclick="onAdd_car()">บันทึกข้อมูล</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>


			</div>
		</div>


	</div>
</div>



<div class="modal fade" id="popupModal_car" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document" style="width: 800px;">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h3 class="modal-title" id="">ข้อมูลรถ</h3>

			</div>


			<div class="modal-body scrollable">
				<div style="font-size: 18px; background-color: #57a2ff; padding: 3px; border-radius: 5px;">
					<i class="fa fa-car" style="margin-left:5px;"></i>&nbsp;&nbsp; รายละเอียดรถ
				</div>

				<br>

				<div id="imageContainer">
					<img id="src_s" alt="Driver Image" style="max-width: 200%; max-height: 200px;">
				</div>

				<i id="fontAwesomeIcon" class="fa fa-car"
					style="max-width: 300%; max-height: 250px; font-size: 130px; color: #000000;  margin-left:20px; margin-top:20px; margin-bottom:20px;"></i>

				<br>

				<table class="table table-bordered">
					<tr>
						<th class="text-left small-cell" style="font-size: 15px; width:150px;">ยี่ห้อรถ</th>
						<td style="font-size: 15px; width:150px;">
							<span id="car_brand"></span><br>
						</td>
					</tr>
					<!-- <tr>
						<th class="text-left small-cell" style="font-size: 15px;">รุ่นรถ</th>
						<td style="font-size: 15px;">


							&nbsp;&nbsp;<span id="car_model"></span>
							<br>
						</td>
					</tr> -->


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
					<tr>
						<th class="text-left small-cell" style="font-size: 15px;">ตำแหน่งที่สามารถจองรถได้</th>
						<td style="font-size: 15px;">
							&nbsp;&nbsp;<span id="role_name"></span>
							<br>


						</td>
					</tr>


				</table>


				<p style="font-size: 18px; background-color: #2aad2a; padding: 3px; border-radius: 5px; display: none;"
					id="cancel_detail_title">
					<i class="fa fa-user" style="margin-left:5px;"></i> &nbsp;&nbsp;
					รายละเอียดคนขับรถ
				</p>

				<table class="table table-bordered" id="cancel_table" style="display: none;">

					<img id="src_driver" alt="Driver Image"
						style="max-width: 200%; max-height: 200px;  margin-top:10px; display: none;">

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


				<p style="text-align:center; font-size: 18px; background-color: #ffb24f; padding: 3px; border-radius: 5px; display: none;"
					id="car_driver_ch">
					<i class="fa fa-user" style="margin-left:5px;"></i> &nbsp;&nbsp;
					โปรดเลือกคนขับรถ
				</p>



				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
				</div>
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
		modal.find('#role_name').text(button.data('role_name'));

		//การปสดงรูปกรณีไม่มีไฟล์รูป กันเอาไว้
		var src_s = button.data('src_s');
		var fontAwesomeIcon = modal.find('#fontAwesomeIcon');
		var imageContainer = modal.find('#imageContainer');

		if (src_s == 'fa fa-car') {
			imageContainer.hide();
			fontAwesomeIcon.show();
		} else {
			imageContainer.show();
			fontAwesomeIcon.hide();
			modal.find('#src_s').attr('src', src_s);
		}


		modal.find('#image_mime_type_s').text(button.data('image_mime_type_s'));
		modal.find('#image_mime_type_driver').text(button.data('image_mime_type_driver'));
		modal.find('#src_driver').attr('src', button.data('src_driver'));

		modal.find('#driver_name').text(button.data('driver_name'));
		modal.find('#driver_tel').text(button.data('driver_tel'));
		modal.find('#driver_history').text(button.data('driver_history'));

		//กรณีไม่มีคนขับรถ
		var driver_name = button.data('driver_name');
		var driver_tel = button.data('driver_tel');
		var driver_history = button.data('driver_history');
		var cancelTable = $('#cancel_table');
		var cancelDetailSpan = $('#cancel_detail_title');
		var src_driver = $('#src_driver');
		var car_driver_ = $('#car_driver_ch');

		if (driver_name != '-' && driver_tel != '-') {
			cancelTable.show();
			cancelDetailSpan.show();
			src_driver.show();
			car_driver_.hide();
			$('#driver_name').text(driver_name);
			$('#driver_tel').text(driver_tel);
			$('#driver_history').text(driver_history);

		} else {
			cancelTable.hide();
			cancelDetailSpan.hide();
			src_driver.hide();
			car_driver_.show();
			$('#driver_name').text(driver_name);
			$('#driver_tel').text(driver_tel);
			$('#driver_history').text(driver_history);

		}



	});


	$('#popupModal_edit').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget);
		var modal = $(this);
		modal.find('#car_id').val(button.data('car_id'));

	});



	//start popup list car
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

			$('#car_number_seat').text(car_number_seat);
			$('#driver_tel').text(driver_tel);
			$('#driver_history').text(driver_history);
			$('#car_registration').text(car_registration);

			var imgTag = '<img src="' + image_data + '" class="img-responsive" style="max-width: 80%; height: auto;">';
			$('#popupImage').html(imgTag);

			var imgTag_driver = '<img src="' + image_data_driver + '" class="img-responsive" style="max-width: 40%; height: auto;">';
			$('#popupImage_driver').html(imgTag_driver);

		});
	});

	function onDel(car_id) {
		alert("⚠️ คำเตือน : หากลบรถคันนี้รายการจองที่มีรถคันนี้อยู่จะถูกยกเลิกทั้งหมด");

		if (confirm("คุณต้องการลบรายการรถใช่หรือไม่")) {
			window.location = "<?= base_url(); ?>car_system/admin/del_car/" + car_id;
		}
	}


	function onEdit_car(inputId) {


		var inputValue = $('#' + inputId).val();

		var brand_name = $("#brand_name_edit option:selected").text();
		var brand_name_ = $("#brand_name_edit option:selected").val();
		var type_name = $("#type_name_edit option:selected").text();
		var type_name_ = $("#type_name_edit option:selected").val();
		var readiness_id = $("#readiness_id option:selected").val();
		var car_color = $("#car_color_edit").val();
		var car_registration = $("#car_registration_edit").val();
		var car_number_seat = $("#car_number_seat_edit").val();
		var id_driver = $("#id_driver_edit").val();
		var car_other_edit = $("#car_other_edit").val();

		var selectedRoles = $('#role_edit input[name="system_edit[]"]:checked').map(function () {
			return $(this).val();
		}).get();

		var file_upload = $("#file_upload_e")[0].files[0];


		if (
			brand_name_ === '#' &&
			type_name_ === '#' &&
			readiness_id === '#' &&
			car_color === '' &&
			car_registration === '' &&
			car_number_seat === '' &&
			car_other_edit === '' &&
			id_driver === '' &&
			(selectedRoles.length === 0 || selectedRoles[0] === '') &&
			(typeof file_upload === 'undefined' || file_upload === null)
		) {
			alert("กรุณากรอกข้อมูลที่ต้องการแก้ไข");
			return false;
		}

		// if (readiness_id === '2') {
		// 	alert("แจ้งให้ทราบหากมีการอัพเดทรายรถ 'ไม่พร้อมใช้งาน' เราจะยกเลิกรายการจองรถนี้ที่มีรายการจองอีก 2 วันข้างหน้า");
		// }

		if (readiness_id === '2') {
			alert("ขอแจ้งให้ทราบว่าหากมีการอัพเดทสถานะรถเป็น 'ไม่พร้อมใช้งาน', เราจะทำการยกเลิกรายการจองรถที่มีรายการจองอีก 2 วันข้างหน้า");
		}

		var formData = new FormData();
		formData.append('file_upload', file_upload);
		formData.append('inputValue', inputValue);
		formData.append('brand_name', brand_name);
		formData.append('readiness_id', readiness_id);
		formData.append('type_name', type_name);
		formData.append('car_color', car_color);
		formData.append('car_registration', car_registration);
		formData.append('car_number_seat', car_number_seat);
		formData.append('id_driver', id_driver);
		formData.append('selectedRoles', selectedRoles);
		formData.append('car_other_edit', car_other_edit);

		if (confirm("คุณต้องการบันทึกข้อมูลใช่หรือไม่")) {

			$.ajax({
				url: "<?= base_url(); ?>car_system/Admin/edit_car",
				type: 'POST',
				data: formData,
				contentType: false,
				processData: false,
				async: false,
				success: function (data) {
					// alert(data);
					$("#btnSave").attr("disabled", true);
					window.location = "<?= base_url(); ?>car_system/Admin/admin_car_list";
				}
			});
			return false;

		}
		return false;
	}

	function onAdd_car() {

		var car_brand = $("#car_brand_add").val();
		var car_model = $("#car_model_add").val();
		var car_color = $("#car_color_add").val();
		var car_registration = $("#car_registration_add").val();
		var car_number_seat = $("#car_number_seat_add").val();

		var car_usage_status = $("#car_usage_status_add").val();
		var car_drive = $("#car_driver_add").val();
		var car_other = $("#car_other_add").val();

		var file_upload = $('#file_upload_add')[0].files[0];

		var selectedRoles = $('input[name="system[]"]:checked').map(function () {
			return $(this).val();
		}).get();

		if (car_brand == "#") {
			alert("กรุณาเลือกยี่ห้อรถ");
			$("#car_brand_add").focus();
			return false;
		} else if (car_model == "#") {
			alert("กรุณาเลือกประเภทของรถ");
			$("#car_model_add").focus();
			return false;

		} else if (car_color == "") {
			alert("กรุณากรอกสีรถ");
			$("#car_color_add").focus();
			return false;
		} else if (selectedRoles.length === 0 || selectedRoles[0] === '') {
			alert("กรุณาเลือกตำแหน่งที่สามารถจองรถได้");
			return false;
		}

		else if (car_registration == "") {
			alert("กรุณากรอกเลขทะเบียนรถ");
			$("#car_registration_add").focus();
			return false;
		}
		else if (car_number_seat == "") {
			alert("กรุณากรอกจำนวนผู้โดยสาร");
			$("#car_number_seat_add").focus();
			return false;
		}
		else if (car_usage_status == "") {
			alert("กรุณาเลือกความพร้อมใช้งานของรถ");
			$("#car_usage_status_add").focus();
			return false;
		}

		else if (car_usage_status == "#") {
			alert("กรุณาเลือกความพร้อมใช้งานของรถ");
			$("#car_usage_status_add").focus();
			return false;
		}


		if (!file_upload) {
			alert("กรุณาแนบไฟล์ภาพ");
			return false;
		}
		if (file_upload && file_upload.size > 4 * 1024 * 1024 * 1024) {
			alert("ขนาดไฟล์ภาพเกิน 4 GB");
			return false;
		}



		var formData = new FormData();
		formData.append('file_upload', file_upload);

		formData.append('car_brand', car_brand);
		formData.append('car_model', car_model);
		formData.append('car_color', car_color);
		formData.append('car_registration', car_registration);
		formData.append('car_number_seat', car_number_seat);
		formData.append('car_usage_status', car_usage_status);
		formData.append('car_drive', car_drive);
		formData.append('car_other', car_other);
		formData.append('selectedRoles', selectedRoles);

		if (confirm("คุณต้องการบันทึกข้อมูลใช่หรือไม่")) {
			$.ajax({
				url: "<?= base_url(); ?>car_system/Admin/car_add",
				type: 'POST',
				data: formData,
				contentType: false, // ต้องเป็น false เมื่อใช้ FormData
				processData: false, // ต้องเป็น false เมื่อใช้ FormData
				success: function (data) {
					// alert(data);
					$("#btnSave").attr("disabled", true);
					window.location = "<?= base_url(); ?>car_system/Admin/admin_car_list";
				}
			});
			return false;

		}
		return false;


	}





</script>
