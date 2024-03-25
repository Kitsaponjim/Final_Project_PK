<div class="content-wrapper">
	<section class="content-header">
		<p
			style="font-size: 20px; background-color: #ffffff; padding: 10px; border-radius: 10px; display: flex; align-items: center;">

			<i class="fa fa-pencil"
				style="margin-right: 10px; background-color: #b3c3ff; padding: 8px; border-radius: 50%; color: white"></i>

			<strong style="flex: 1; display: inline;">รายการห้องประชุม</strong>



			<a href="#" class="btn btn-custom open-popup" data-toggle="modal"
				style="background-color: #e0a94a;color:white;" data-target="#popupModal_time" role="button"
				style="margin-left: auto;">
				<i class="fa fa-clock-o"></i>
				จัดการเวลา
			</a>
			&nbsp;&nbsp;

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
					/* Custom CSS for the lighter green button */
					.btn-light-success {
						background-color: #64de57;
						/* Change this to your desired color */
						color: #fff;
						/* Text color on the button */
						border-color: #64de57;
						/* Border color, you can adjust this if needed */
					}

					.btn-light-success:hover {
						background-color: #46b839;
						/* Change this to the hover color */
						color: #fff;
						border-color: #46b839;
						/* Border color on hover, adjust as needed */

					}
				</style>


				<div class="col-sm-12">
					<?php foreach ($room['room'] as $value) {

						$room_id = $value->room_id;
						$room_name = $value->room_name;
						$room_capacity = $value->room_capacity;
						$room_address = $value->room_address;
						$room_details = $value->room_details;
						$room_equipment = $value->equipment_names;
						$room_attendant = $value->room_attendant;
						$room_attendant_tel = $value->room_attendant_tel;
						$room_note = $value->room_note;

						$room_status = $value->room_status;
						$equipment_name = $value->equipment_names;

						$image_data = base64_encode($value->image_data);
						$image_mime_type = $value->image_mime_type;
						$src = 'data:' . $image_mime_type . ';base64,' . $image_data;

						// $src = 'fa fa-comments';
						?>
						<div class="col-sm-4">
							<div class="box custom-box">
								<div class="box-body">

									<?php
									if ($src == 'fa fa-comments') {
										echo '<div style="text-align: center; height: 100px; width: 160px; border-radius: 20px; margin-top:10px;  padding: 3px;">';
										echo '<i class="' . $src . '" style="font-size: 80px; color: black;"></i>';
										echo '</div>';
									} else {
										echo '<div style="text-align: left; padding-left: 10px; margin-left:10px;">';
										echo '<img style="height: 110px; width: 170px; border-radius: 20px; margin-top:10px;" src="' . $src . '" alt="รูปภาพ">';
										echo '</div>';
									}
									?>

									<div style="position: absolute; top: 30px; right: 0; left: 40px; width: 60px; height: 40px;
													color: white; text-align: center; border-radius: 10px; line-height: 40px;
													transform: translate(-100%, -50%);
													<?php
													if ($room_status == 1) {
														echo 'background-color: green;">พร้อม';
													} elseif ($room_status == 2) {
														echo 'background-color: red;">ไม่พร้อม';
													} else {
														echo 'background-color: gray; font-size: 7px;">ไม่ได้กำหนดสถานะ';
													}
													?>
										</div>


									<div>
										<br>

										<span style=" font-size: 18px; color: #4281ff;margin-left: 20px;">
										<?= $room_name ? $room_name : '-'; ?>
										</span>

										<br>
										<strong style="margin-left: 20px; margin-top:10px;">สถานที่ :</strong>
										<?= $room_address ? $room_address : '-'; ?>
										<br>
										<strong style="margin-left: 20px; margin-top:10px;">ผู้ดูแลห้อง :</strong>
										<?= $room_attendant ? $room_attendant : '-'; ?>


									</div>

									<p style="font-size: 20px; display: flex; align-items: center; margin-top:5px;">
										<strong style="flex: 1; display: inline; margin-left: 20px;"> จำนวน
											<?= $room_capacity ? $room_capacity : '-'; ?>
											ที่นั่ง
										</strong>
										<a href="#" class="open-popup" data-toggle="modal" data-target="#popupModal_room"
											data-room_name="<?= !empty($room_name) ? $room_name : '-'; ?>"
											data-room_capacity="<?= !empty($room_capacity) ? $room_capacity : '-'; ?>"
											data-room_address="<?= !empty($room_address) ? $room_address : '-'; ?>"
											data-room_details="<?= !empty($room_details) ? $room_details : '-'; ?>"
											data-room_equipment="<?= !empty($room_equipment) ? $room_equipment : '-'; ?>"
											data-room_attendant="<?= !empty($room_attendant) ? $room_attendant : '-'; ?>"
											data-room_attendant_tel="<?= !empty($room_attendant_tel) ? $room_attendant_tel : '-'; ?>"
											data-image_data="<?= $image_data; ?>"
											data-image_mime_type="<?= $image_mime_type; ?>" data-src="<?= $src; ?>"
											data-room_note="<?= !empty($room_note) ? $room_note : '-'; ?>">

											<i class="fa fa-search" style="color: black; margin-right: 3px;"></i>
										</a>

										&nbsp;&nbsp;


										<a href="#" class="open-popup" data-toggle="modal" data-target="#popupModal_edit"
											data-room_id="<?= !empty($room_id) ? $room_id : '-'; ?>"
											data-room_id_edit="<?= !empty($room_id) ? $room_id : '-'; ?>">

											<i class="fa fa-edit" style="color: black; margin-right: 3px;"></i>
										</a>


										&nbsp;&nbsp;


										<a href="#" class="" onclick="onDel(<?= $room_id ?>)">
											<i class="fa fa-trash" style="color: black; margin-right: 7px;"></i>
										</a>


									</p>


								</div>
							</div>
						</div>
					<?php } ?>

				</div>

	</section><!-- /.content -->
</div><!-- /.content-wrapper -->


<div class="modal fade" id="popupModal_edit" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel2"
	aria-hidden="true">
	<div class="modal-dialog custom-width" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<p class="modal-title" id="popupModalLabel" style="font-size: 20px; color:back;">
					<strong>แก้ไขรายการห้องประชุม</strong>
				</p>
			</div>
			<div class="modal-body">
				<div class="row">

					<div class="col-md-6">
						<p style="font-size: 18px; color:back;"><strong> ข้อมูลห้องประชุม</span></strong></p>
						<div class="form-group">
							<label for="room_name_edit">ชื่อห้องประชุม :</label>
							<input type="text" class="form-control" id="room_name_edit" name="room_name_edit"
								placeholder="ชื่อห้อง">
						</div>

						<!-- <div class="form-group">
							<label for="equipment_edit">อุปกรณ์ :</label>
							<input type="text" class="form-control" id="equipment_edit" name="equipment_edit"
								placeholder="อุปกรณ์">
						</div>
 -->

 <div class="form-group">
						<label for="equipment_edit">อุปกรณ์ :</label>
						<div class="checkbox-container" id="equipment_edit" style="margin-top:10px;">
<?php $count = 0; ?>
<div class="form-check">
    <?php foreach ($equipment['equipment'] as $value): ?>
        <input type="checkbox" id="equipment<?= $value->equipment_id; ?>" name="equipment[]"
            value="<?= $value->equipment_id; ?>">
        <label class="form-check-label" for="equipment<?= $value->equipment_id; ?>">
            <?= $value->equipment_name; ?>
        </label>

        <?php $count++; ?>
        <?php if ($count % 2 == 0 || $count == count($equipment['equipment'])): ?>
            </div>
            <div class="form-check">
        <?php endif; ?>
    <?php endforeach; ?>
</div>
</div>


</div>


				

						
						<div class="form-group">
							<label for="room_address_edit">สถานที่ :</label>
							<input type="text" class="form-control" id="room_address_edit" name="room_address_edit"
								placeholder="สถานที่">
						</div>
						<div class="form-group">
							<label for="room_seating_edit">จำนวนที่นั่ง :</label>
							<input type="text" class="form-control" id="room_seating_edit" name="room_seating_edit"
								placeholder="จำนวนที่นั่ง" maxlength="2" oninput="validateNumber(this);">
							<small id="numError" class="text-danger"></small>
						</div>

					</div>
					<!-- validateNumber -->
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
					<div class="col-md-6">
						<br>
						<br>

						<div class="form-group">
							<label for="">ผู้ดูแลห้อง :</label>
							<input type="text" class="form-control" id="room_attendant_edit" name="room_attendant_edit"
								placeholder="ผู้ดูแลห้อง" oninput="validateNameEdit_edit(this);">
							<small id="nameErrorEdit_edit" class="text-danger"></small>

						</div>
						<div class="form-group">
							<label for="">เบอร์โทรศัพท์มือถือ :</label>
							<input type="tel" class="form-control" id="room_attendant_tel_edit" name="room_attendant_tel_edit"
								placeholder="เบอร์โทรศัพท์มือถือ" maxlength="10"
								oninput="validatePhoneNumberEdit_edit(this);">
							<small id="telErrorEdit_edit" class="text-danger"></small>

						</div>


						<script>
							function validatePhoneNumberEdit_edit(input) {
								var telError = document.getElementById('telErrorEdit_edit');
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


							function validateNameEdit_edit(input) {
								var nameError = document.getElementById('nameErrorEdit_edit');
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

						<div class="form-group">
							<label for="room_readiness_edit">ความพร้อมใช้งาน :</label>

							<select id="room_readiness_edit" name="room_readiness_edit" required class="form-control">

							<?php
							

								echo '<option value="#">--เลือก---</option>';
								foreach ($room_readiness['room_readiness'] as $value) {

									$readiness_id = @$value->readiness_id;
									$readiness_name = @$value->readiness_name;

									echo '<option value="' . $readiness_id . '">' . $readiness_name . '</option>';

	
								}
								?>

							</select>
						</div>

						<div class="form-group">
							<label for="room_note_edit">หมายเหตุ :</label>
							<input type="text" class="form-control" id="room_note_edit" name="room_note_edit"
								placeholder="หมายเหตุ">
						</div>

					</div>
					<br>
					<br>
					<div class="col-sm-12">

						<div class="mt-4 col-md-4 mb-2">
							<img id="attached_image_edit" src="#" alt="ไฟล์ภาพ">
						</div>
						<div class="mt-4 col-md-4 mb-2">
							<label> แนบรูป </label>
							<input type="file" id="file_upload_edit" name="file_upload_edit"
								class="form-control rounded-0 custom-placeholder">
						</div>

					</div>


					<!-- <input type="text" class="form-control" id="room_id_edit" name="room_id_edit" style="display: none;" readonly> -->
					<input type="text" class="form-control" id="room_id" name="room_id" style="display: none;" readonly>


				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-custom" id="saveChangesButton"
					style="background-color:#4281ff; color:#ffffff;" onclick="onEdit('room_id')">บันทึกข้อมูล</button>
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
				<p class="modal-title" id="popupModalLabel" style="font-size: 20px; color:back;">
					<strong>เพิ่มรายการห้องประชุม</strong>
				</p>
			</div>
			<div class="modal-body">
				<div class="row">

					<div class="col-md-6">
						<p style="font-size: 18px; color:back;"><strong> ข้อมูลห้องประชุม</span></strong></p>
						<div class="form-group">
							<label for="room_name"><strong class="text-danger">*</strong>ชื่อห้อง :</label>
							<input type="text" class="form-control" id="room_name" name="room_name"
								placeholder="ชื่อห้อง">
						</div>



						<div class="form-group">
						<label for="equipment">อุปกรณ์ :</label>
						<div class="checkbox-container" id="equipment" style="margin-top:10px;">
<?php $count = 0; ?>
<div class="form-check">
    <?php foreach ($equipment['equipment'] as $value): ?>
        <input type="checkbox" id="equipment<?= $value->equipment_id; ?>" name="equipment[]"
            value="<?= $value->equipment_id; ?>">
        <label class="form-check-label" for="equipment<?= $value->equipment_id; ?>">
            <?= $value->equipment_name; ?>
        </label>

        <?php $count++; ?>
        <?php if ($count % 2 == 0 || $count == count($equipment['equipment'])): ?>
            </div>
            <div class="form-check">
        <?php endif; ?>
    <?php endforeach; ?>
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







						<div class="form-group">
							<label for="room_address"><strong class="text-danger">*</strong>สถานที่ :</label>
							<input type="text" class="form-control" id="room_address" name="room_address"
								placeholder="สถานที่">
						</div>
						<div class="form-group">
							<label for="room_seating"><strong class="text-danger">*</strong>จำนวนที่นั่ง :</label>
							<input type="text" class="form-control" id="room_seating" name="room_seating"
								placeholder="จำนวนที่นั่ง" maxlength="2" oninput="validateNumber(this);">
							<small id="numError" class="text-danger"></small>
						</div>

					</div>
					<!-- validateNumber -->
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
					<div class="col-md-6">
						<br>
						<br>

						<div class="form-group">
							<label for=""><strong class="text-danger">*</strong>ผู้ดูแลห้อง :</label>
							<input type="text" class="form-control" id="room_attendant" name="room_attendant"
								placeholder="ผู้ดูแลห้อง" oninput="validateNameEdit(this);">
							<small id="nameErrorEdit" class="text-danger"></small>

						</div>
						<div class="form-group">
							<label for=""><strong class="text-danger">*</strong>เบอร์โทรศัพท์มือถือ :</label>
							<input type="tel" class="form-control" id="room_attendant_tel" name="room_attendant_tel"
								placeholder="เบอร์โทรศัพท์มือถือ" maxlength="10"
								oninput="validatePhoneNumberEdit(this);">
							<small id="telErrorEdit" class="text-danger"></small>

						</div>


						<script>
							function validatePhoneNumberEdit(input) {
								var telError = document.getElementById('telErrorEdit');
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


							function validateNameEdit(input) {
								var nameError = document.getElementById('nameErrorEdit');
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

						<div class="form-group">
							<label for="room_status"><strong class="text-danger">*</strong>ความพร้อมใช้งาน :</label>

							<select id="room_status" name="room_status" required class="form-control">

							<?php
					
							echo '<option value="#">--เลือก---</option>';
							foreach ($room_readiness['room_readiness'] as $value) {

								$readiness_id = @$value->readiness_id;
								$readiness_name = @$value->readiness_name;

								echo '<option value="' . $readiness_id . '">' . $readiness_name . '</option>';


							}
							?>

							</select>
						</div>

						<div class="form-group">
							<label for="room_note">หมายเหตุ :</label>
							<input type="text" class="form-control" id="room_note" name="room_note"
								placeholder="หมายเหตุ">
						</div>

					</div>
					<br>
					<br>
					<div class="col-sm-12">

						<div class="mt-4 col-md-4 mb-2">
							<img id="attached_image" src="#" alt="ไฟล์ภาพ">
						</div>
						<div class="mt-4 col-md-4 mb-2">
							<label> <strong class="text-danger">*</strong>แนบรูป </label>
							<input type="file" id="file_upload" name="file_upload"
								class="form-control rounded-0 custom-placeholder">
						</div>

					</div>

				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-custom" id="saveChangesButton"
					style="background-color:#4281ff; color:#ffffff;" onclick="onAdd()">บันทึกข้อมูล</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="popupModal_room" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document" style="width: 800px;">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h3 class="modal-title" id="">ข้อมูลเพิ่มเติม</h3>

			</div>


			<div class="modal-body scrollable">
				<div style="font-size: 18px; background-color: #57a2ff; padding: 3px; border-radius: 5px;">
					<i class="" style="margin-left:5px;"></i>&nbsp;&nbsp; รายละเอียดห้องประชุม
				</div>
				<br>

				<div id="imageContainer">
					<img id="src" alt="" style="max-width: 200%; max-height: 200px;">
				</div>

				<i id="fontAwesomeIcon" class="fa fa-comments"
					style="max-width: 300%; max-height: 250px; font-size: 130px; color: #000000;  margin-left:20px; margin-top:20px; margin-bottom:20px;"></i>


				<br>
				<table class="table table-bordered">
					<tr>
						<th class="text-left small-cell" style="font-size: 15px; width:150px;">ห้องประชุม</th>
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
						<th class="text-left small-cell" style="font-size: 15px;">จำนวนที่นั่ง</th>
						<td style="font-size: 15px;">

							&nbsp;&nbsp;<span id="room_capacity"></span> &nbsp;ที่นั่ง
							<br>
						</td>
					</tr>

					<tr>
						<th class="text-left small-cell" style="font-size: 15px;">ผู้ดูแลห้อง</th>
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

<div class="modal fade" id="popupModal_time" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel2"
	aria-hidden="true">
	<div class="modal-dialog custom-width-time" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<p class="modal-title" id="popupModalLabel" style="font-size: 20px; color:back;">
					<strong>จัดการเวลาการจอง</strong>
				</p>
			</div>
			<div class="modal-body">
				<div class="row">

					<div class="col-md-6">
						<p style="font-size: 18px; color:back;"><strong> ข้อมูลห้องประชุม</span></strong></p>
					
						

						<div class="form-group">

							<label for="start_time"><strong class="text-danger">*</strong>เวลาเริ่มต้น :</label>
							<input type="time" id="start_time" name="start_time" oninput="roundToNearestMinute(this);">

<script>
function roundToNearestMinute(input) {
    var timeValue = input.value;
    
    if (timeValue) {
        var timeArray = timeValue.split(":");
        var hours = parseInt(timeArray[0], 10);
        var minutes = parseInt(timeArray[1], 10);

        // Round to the nearest 10 minutes for the first digit of minutes
        if (minutes % 10 !== 0) {
            minutes = Math.ceil(minutes / 10) * 10;
            if (minutes === 60) {
                hours += 1;
                minutes = 0;
            }
        }

        // Pad single-digit hours and minutes with leading zeros
        var paddedHours = hours.toString().padStart(2, '0');
        var paddedMinutes = minutes.toString().padStart(2, '0');

        // Set the rounded time back to the input
        input.value = paddedHours + ":" + paddedMinutes;
    }
}
</script>



<label for="end_time"><strong class="text-danger">*</strong>เวลาสิ้นสุด :</label>
							<input type="time" id="end_time" name="end_time" oninput="roundToNearestMinuteEnd(this);">

<script>
function roundToNearestMinuteEnd(input) {
    var timeValue = input.value;
    
    if (timeValue) {
        var timeArray = timeValue.split(":");
        var hours = parseInt(timeArray[0], 10);
        var minutes = parseInt(timeArray[1], 10);

        // Round to the nearest 10 minutes for the first digit of minutes
        if (minutes % 10 !== 0) {
            minutes = Math.ceil(minutes / 10) * 10;
            if (minutes === 60) {
                hours += 1;
                minutes = 0;
            }
        }

        // Pad single-digit hours and minutes with leading zeros
        var paddedHours = hours.toString().padStart(2, '0');
        var paddedMinutes = minutes.toString().padStart(2, '0');

        // Set the rounded time back to the input
        input.value = paddedHours + ":" + paddedMinutes;
    }
}
</script>
			
						</div>





				</div>
			</div>
			<div class="modal-footer">

				<!-- <button type="button" class="btn btn-custom" id="saveChangesButton" onsubmit="return validateForm()"
					style="background-color:#4281ff; color:#ffffff;" onclick="Edit_time()">บันทึกข้อมูล</button> -->

					<button type="button" class="btn btn-custom" id="saveChangesButton"
        style="background-color:#4281ff; color:#ffffff;" onclick="Edit_time()">บันทึกข้อมูล</button>
<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>



			</div>
		</div>
	</div>
</div>




<div class="modal fade" id="popupModal_room" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document" style="width: 800px;">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h3 class="modal-title" id="">ข้อมูลเพิ่มเติม</h3>

			</div>


			<div class="modal-body scrollable">
				<div style="font-size: 18px; background-color: #57a2ff; padding: 3px; border-radius: 5px;">
					<i class="" style="margin-left:5px;"></i>&nbsp;&nbsp; รายละเอียดห้องประชุม
				</div>
				<br>

				<div id="imageContainer">
					<img id="src" alt="" style="max-width: 200%; max-height: 200px;">
				</div>

				<i id="fontAwesomeIcon" class="fa fa-comments"
					style="max-width: 300%; max-height: 250px; font-size: 130px; color: #000000;  margin-left:20px; margin-top:20px; margin-bottom:20px;"></i>


				<br>
				<table class="table table-bordered">
					<tr>
						<th class="text-left small-cell" style="font-size: 15px; width:150px;">ห้องประชุม</th>
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
						<th class="text-left small-cell" style="font-size: 15px;">จำนวนที่นั่ง</th>
						<td style="font-size: 15px;">

							&nbsp;&nbsp;<span id="room_capacity"></span> &nbsp;ที่นั่ง
							<br>
						</td>
					</tr>

					<tr>
						<th class="text-left small-cell" style="font-size: 15px;">ผู้ดูแลห้อง</th>
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



<!-- onAdd -->
<script>


function Edit_time() {
	var start_time = $('#start_time').val();
    var end_time = $('#end_time').val();

	// alert(start_time);
	// alert(end_time);

			var pmeters = 'start_time=' + start_time + '&end_time=' + end_time;
			pmeters = pmeters.replace("undefined", "");
				alert(pmeters);
			$.ajax({
				url: "<?= base_url(); ?>room_system/admin/edit_time",
				type: 'POST',
				data: pmeters,
				async: false,
				success: function (data) {
					alert(data);
					$("#btnSave").attr("disabled", true);
					window.location = "<?= base_url(); ?>room_system/Admin/list_room";
				}
			});
			return false;
		

	}


				</script>

				

<script>
		// function Edit_time() {
			// var start_time = $('#start_time').val();
			// var end_time = $('#end_time').val();

			// if (end_time > start_time) {
			// 	alert("เวลาสิ้นสุดต้องมากกว่าเวลาเริ่ม");
		
			// return false;
				
			// }

			// alert(start_time);
			// alert(end_time);

		// }



	function onAdd() {
		var room_name = $("#room_name").val();

		var room_address = $('#room_address').val();
		var room_seating = $('#room_seating').val();
		var room_attendant = $('#room_attendant').val();
		var room_attendant_tel = $('#room_attendant_tel').val();
		var room_note = $('#room_note').val();
		var room_status = $('#room_status').val();
		var file_upload = $("#file_upload")[0].files[0];

		var selectedEquipment = $('#equipment input[name="equipment[]"]:checked').map(function() {
            return $(this).val();
        }).get();

		alert(selectedEquipment);

		if (room_name == "") {
			alert("กรุณากรอกชื่อห้อง");
			$("#room_name").focus();
			return false;
		}
	
		else if (room_address == "") {
			alert("กรุณากรอกสถานที่ห้องประชุม");
			$("#room_address").focus();
			return false;
		}
		else if (room_seating == "") {
			alert("กรุณากรอกจำนวนที่นั่งภายในห้องประชุม");
			$("#room_seating").focus();
			return false;
		}

		else if (room_attendant == "") {
			alert("กรุณากรอกชื่อ-นามสกุล ผู้ดูแลห้อง");
			$("#room_attendant").focus();
			return false;
		}
		else if (room_attendant_tel == "") {
			alert("กรุณากรอกเบอร์โทรศัพท์มือถือผู้ดูแลห้อง");
			$("#room_attendant_tel").focus();
			return false;
		}
		else if (room_status == "#") {
			alert("กรุณาเลือกความพร้อมใช้งานห้องประชุม");
			$("#room_status").focus();
			return false;
		}
		else if (!file_upload) {
			alert("กรุณากรอกแนบไฟล์ภาพ");
			$("#file_upload").focus();
			return false;
		}

		var formData = new FormData();
		formData.append('file_upload', file_upload);

		if (confirm("คุณต้องการแจ้งซ่อมใช่หรือไม่")) {

			if (room_name == "") {
				alert("กรอชื่อห้อง");
				$('#room_name');
				return false;
			}
			else {
				formData.append('room_name', room_name);
				formData.append('room_seating', room_seating);
				formData.append('room_address', room_address);
				formData.append('room_attendant', room_attendant);
				formData.append('room_attendant_tel', room_attendant_tel);
				formData.append('room_note', room_note);
				formData.append('room_status', room_status);
				formData.append('selectedEquipment', selectedEquipment);

				$.ajax({
					url: "<?= base_url(); ?>room_system/Admin/admin_addRoom",
					type: 'POST',
					data: formData,
					contentType: false,
					processData: false,
					async: false,
					success: function (data) {
						// alert(data);
						$("#submit").attr("disabled", true);
						window.location = "<?= base_url(); ?>room_system/Admin/list_room";
					}
				});
				return false;



			}
		}

		return false;


	}

</script>
<!-- onEdit -->
<script>
		function onEdit(room_id) {

		var room_id = $('#' + room_id).val();
		var room_name = $("#room_name_edit").val();

		var room_address = $('#room_address_edit').val();
		var room_seating = $('#room_seating_edit').val();
		var room_attendant = $('#room_attendant_edit').val();
		var room_attendant_tel = $('#room_attendant_tel_edit').val();
		var room_note = $('#room_note_edit').val();
		var room_status = $('#room_readiness_edit').val();
		var file_upload = $("#file_upload_edit")[0].files[0];

		var selectedEquipment = $('#equipment_edit input[name="equipment[]"]:checked').map(function() {
            return $(this).val();
        }).get();

		if (
			room_name === '' &&
			room_address === '' &&
			room_status === '#' &&
			room_seating === '' &&
			room_attendant === '' &&
			room_attendant_tel === '' &&
			room_note === '' &&
			(selectedEquipment.length === 0 || selectedEquipment[0] === '') &&
			(typeof file_upload === 'undefined' || file_upload === null)
		) {
			alert("กรุณากรอกข้อมูลที่ต้องการแก้ไข");
			return false;
		}

		if (room_status === '2') {
			alert("ขอแจ้งให้ทราบว่าหากมีการอัพเดทสถานะห้องเป็น 'ไม่พร้อมใช้งาน', เราจะทำการยกเลิกรายการจองห้องในวันนี้ทั้งหมด");
		}

		var formData = new FormData();

		formData.append('file_upload', file_upload);
	
		if (confirm("คุณต้องการแก้ไขข้อมูลใช่หรือไม่")) {

				formData.append('room_id', room_id);
				formData.append('room_name', room_name);
				formData.append('room_seating', room_seating);
				formData.append('room_address', room_address);
				formData.append('selectedEquipment', selectedEquipment);
				formData.append('room_attendant', room_attendant);
				formData.append('room_attendant_tel', room_attendant_tel);
				formData.append('room_note', room_note);
				formData.append('room_status', room_status);

				$.ajax({
					url: "<?= base_url(); ?>room_system/Admin/admin_EditRoom",
					type: 'POST',
					data: formData,
					contentType: false,
					processData: false,
					async: false,
					success: function (data) {
						// alert(data);
						$("#submit").attr("disabled", true);
						window.location = "<?= base_url(); ?>room_system/Admin/list_room";
					}
				});
				return false;
			}

			return false;





	}

</script>

<!-- popupModal_room -->
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

	$('#popupModal_edit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var modal = $(this);

    modal.find('#room_id').val(button.data('room_id'));
    modal.find('#room_id_edit').text(button.data('room_id_edit'));
});


</script>



<script>



	function onDel(room_id) {
	alert("⚠️ คำเตือน : หากลบห้องประชุมนี้รายการจองที่มีห้องประชุมนี้อยู่จะถูกยกเลิกทั้งหมด");
	
		if (confirm("คุณต้องการลบรายการห้องใช่หรือไม่")) {
			window.location = "<?= base_url(); ?>room_system/admin/admin_DelRoom/" + room_id;
		}
	}



	function displayAttachedImage() {
		var input = document.getElementById('file_upload');
		var image = document.getElementById('attached_image');

		input.addEventListener('change', function () {
			var file = input.files[0];

			if (file) {
				var reader = new FileReader();
				reader.onload = function (e) {
					image.src = e.target.result;
				};
				reader.readAsDataURL(file);
			} else {
				// Set a placeholder image or display a message
				image.src = 'path_to_placeholder_image.jpg'; // Replace with the path to your placeholder image
				// Alternatively, you can display a message inside the box
				// image.src = '';
				// image.alt = 'ไฟล์รูป';
			}
		});
	}

	// Call the function when the document is ready
	document.addEventListener('DOMContentLoaded', function () {
		displayAttachedImage();
	});


	function displayAttachedImage_edit() {
		var input = document.getElementById('file_upload_edit');
		var image = document.getElementById('attached_image_edit');

		input.addEventListener('change', function () {
			var file = input.files[0];

			if (file) {
				var reader = new FileReader();
				reader.onload = function (e) {
					image.src = e.target.result;
				};
				reader.readAsDataURL(file);
			} else {
				// Set a placeholder image or display a message
				image.src = 'path_to_placeholder_image.jpg'; // Replace with the path to your placeholder image
				// Alternatively, you can display a message inside the box
				// image.src = '';
				// image.alt = 'ไฟล์รูป';
			}
		});
	}

	// Call the function when the document is ready
	document.addEventListener('DOMContentLoaded', function () {
		displayAttachedImage_edit();
	});





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
		max-width: 900px;
		/* Set your desired width here */
		width: 90%;
		/* You can use a percentage value if needed */
	}
	.custom-width-time {
		max-width: 900px;
		/* Set your desired width here */
		width: 50%;
		/* You can use a percentage value if needed */
	}

	.form-control {

		border-radius: 7px;
	}


	#attached_image {

		max-width: 100%;
		width: 100%;
		border: 1px dashed #ccc;
		/* Border style for the box */
		padding: 10px;
		/* Padding for the box content */
		border-radius: 5px;
		/* Rounded corners for the box */
		box-sizing: border-box;
	}
	#attached_image_edit {

		max-width: 100%;
		width: 100%;
		border: 1px dashed #ccc;
		/* Border style for the box */
		padding: 10px;
		/* Padding for the box content */
		border-radius: 5px;
		/* Rounded corners for the box */
		box-sizing: border-box;
	}
</style>
