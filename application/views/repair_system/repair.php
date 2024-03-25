<div class="content-wrapper">


	<section class="content">
		<p
			style="font-size: 20px; background-color: #ffffff; padding: 10px; border-radius: 10px; display: flex; align-items: center;">

			<i class="fa fa-pencil"
				style="margin-right: 10px; background-color: #b3c3ff; padding: 8px; border-radius: 60%; color: white"></i>
			<strong style="flex: 1; display: inline;">เพิ่มข้อมูลแจ้งซ่อม</strong>
		</p>

		<div class="box custom-box">

			<div class="box-body">

				<div class="row">


					<div class="col-sm-12">

						<style>
							.button-container {
								display: flex;
								justify-content: flex-end;

							}

							.form-control {
								border-radius: 10px;

							}

							.custom-box {
								background-color: white;
								border-radius: 10px;
								box-shadow: none;
								border-top: solid white;
								/* กำหนดสีขอบด้านบนเป็นสีขาว */
							}

							.mt-4 {
								margin-top: 16px;
				
								/* 1rem = 16px */
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
							.label-font{
								font-size: 18px;
							}
						</style>

						<?php

						$id = $_SESSION['id'];

						?>
						<p style="font-size: 20px; background-color: #f2f2f2; padding: 10px; border-radius: 5px;"><i
								class="fa fa-pencil"></i> ข้อมูลผู้แจ้งซ่อม</p>

						<div class="mt-4 col-md-4 mb-2">
							<label class="label-font"><strong class="text-danger">*</strong>ชื่อ-นามสกุล </label>
							<input type="text" id="cus_name" name="cus_name" placeholder="ชื่อ-นามสกุล"
								class="form-control rounded-0" oninput="validateName(this);">
							<small id="nameError" class="text-danger"></small>
						</div>


						<div class="mt-4 col-md-4 mb-2">
							<label class="label-font"><strong class="text-danger">*</strong>เบอร์โทรศัพท์มือถือ</label>
							<input type="tel" id="cus_tel" name="cus_tel" class="form-control rounded-0"
								placeholder="เบอร์โทรศัพท์มือถือ" maxlength="10" oninput="validatePhoneNumber(this);">
							<small id="telError" class="text-danger"></small>
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
								} 
								else if (numericValue.length !== 10) {
									telError.textContent = 'กรุณากรอกเบอร์โทรศัพท์ 10 หลัก';
								} 
								
								else if (numericValue.charAt(0) !== '0') {
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

						<div class="mt-4 col-md-4 mb-2">
							<label class="label-font"><strong class="text-danger">*</strong>อีเมล</label>
							<input type="email" id="cus_email" class="form-control rounded-0" placeholder="อีเมล">
							<small id="emailError" class="text-danger"></small>
						</div>


						<script>
							var emailInput = document.getElementById('cus_email');
							var emailError = document.getElementById('emailError');

							emailInput.addEventListener('input', function () {
								validateEmail();
							});

							emailInput.addEventListener('blur', function () {
								validateEmail();
							});

							function validateEmail() {
								var emailValue = emailInput.value.trim();

								if (emailValue === '') {
									emailError.textContent = '';
								} else if (!isValidEmail(emailValue)) {
									emailError.textContent = 'กรุณากรอกอีเมลที่ถูกต้อง';
								} else {
									emailError.textContent = '';
								}
							}

							function isValidEmail(email) {
								// Use regular expression to check the email format
								var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
								return emailPattern.test(email);
							}
						</script>
						<br>
						<br>
						<br>
						<br>

						<p class="mt-4 text" style="font-size: 20px; background-color: #f2f2f2; padding: 10px; border-radius: 5px;">
							&nbsp;&nbsp;&nbsp;<i class="fa fa-bell"></i> ข้อมูลปัญหา
						</p>


						<div class="mt-4 col-md-3 mb-2">
							<label  class="label-font">วันที่แจ้งซ่อม</label>
							<input type="datetime-local" id="time_add" class="form-control rounded-0 d-inline-block"
								placeholder="วันที่และเวลาส่งซ่อม" value="<?= date('Y-m-d\TH:i'); ?>"
								min="<?= date('Y-m-d\TH:i'); ?>" readonly>
						</div>



						<div class="mt-4 col-md-4 mb-2">
							<label class="label-font"><strong class="text-danger">*</strong>ประเภทงานซ่อม </label>
							<select id="cus_type" name="cus_type" required class="form-control">
								<?php
								echo '<option value="#">--เลือก--</option>';
								foreach ($cus_type['cus_type'] as $key => $rp_case) {
									$rp_name_type = @$rp_case->rp_name_type;
									$id_type = @$rp_case->id_type;
									echo '<option value="' . $id_type . '">' . $rp_name_type . '</option>';
								}
								?>
							</select>
						</div>


						<div class="mt-4 col-md-4 mb-2">
							<label class="label-font"><strong class="text-danger">*</strong>ชื่ออุปกรณ์ </label>
							<input type="text" id="cus_equipment" class="form-control rounded-0"
								placeholder="ชื่ออุปกรณ์">
						</div>



						<div class="mt-4 col-md-10 mb-4">
							<label class="label-font"><strong class="text-danger">*</strong>รายละเอียดปัญหา</label>
							<textarea id="cus_details" class="form-control rounded-0"></textarea>
						</div>

						<div class="mt-4 col-md-4 mb-2">
							<label class="label-font"><strong class="text-danger">*</strong>อาคาร </label>
							<select id="address" name="address" required class="form-control">
								<?php
								echo '<option value="#">--เลือก---</option>';
								foreach ($address['address'] as $key => $address) {
									$name_address = @$address->name_address;
									$id_address = @$address->id_address;
									echo '<option value="' . $id_address . '">' . $name_address . '</option>';
								}
								?>
							</select>
						</div>

						<div class="mt-4 col-md-4 mb-2">
							<label class="label-font"><strong class="text-danger">*</strong>รายละเอียดสถานที่ </label>
							<input type="text" id="repair_equipment" class="form-control rounded-0"
								placeholder="รายละเอียดสถานที่">
						</div>


					</div>
					<br>
					<br>

					<div style="margin-left:10px;">
						<div class="mt-4 col-md-4 mb-2">
							<img id="attached_image" src="#" alt="ไฟล์ภาพ">
							<button type="button" id="remove_image_button" class="btn btn-warning"
								onclick="removeAttachedImage()"
								style="display: none; background-color: red; margin-top:25px;">ลบรูป</button>
						</div>

						<div class="mt-4 col-md-4 mb-2">
							<label class="label-font">แนบรูป </label>
							<input type="file" id="file_upload" name="file_upload"
								class="form-control rounded-0 custom-placeholder">
							<small id="fileError" class="text-danger"></small>
						</div>
					</div>


				</div>

				<script>
					function displayAttachedImage() {
						var input = document.getElementById('file_upload');
						var image = document.getElementById('attached_image');
						var removeButton = document.getElementById('remove_image_button');
						var fileError = document.getElementById('fileError');

						input.addEventListener('change', function () {
							var file = input.files[0];

							// Reset previous error message
							fileError.innerText = '';

							if (file) {
								var allowedExtensions = ['.png', '.jpg', '.jpeg'];
								var isValidExtension = allowedExtensions.some(function (ext) {
									return file.name.toLowerCase().endsWith(ext);
								});

								if (isValidExtension) {
									var reader = new FileReader();
									reader.onload = function (e) {
										image.src = e.target.result;
										// Show the remove button
										removeButton.style.display = 'inline-block';
									};
									reader.readAsDataURL(file);
								} else {
									// Display an error message for invalid file type
									fileError.innerText = 'กรุณาเลือกไฟล์ที่มีนามสกุล .png , .jpg หรือ .jpeg';
									image.src = ''; // Optionally, clear the image source
									// Hide the remove button
									removeButton.style.display = 'none';
								}
							} else {
								// Set a placeholder image or display a message
								image.src = 'path_to_placeholder_image.jpg'; // Replace with the path to your placeholder image
								// Hide the remove button
								removeButton.style.display = 'none';
							}
						});
					}

					function removeAttachedImage() {
						var image = document.getElementById('attached_image');
						var input = document.getElementById('file_upload');
						var removeButton = document.getElementById('remove_image_button');
						var fileError = document.getElementById('fileError');

						// Reset previous error message
						fileError.innerText = '';

						// Clear the image source and reset the file input
						image.src = '';
						input.value = null;
						// Hide the remove button
						removeButton.style.display = 'none';
					}

					// Call the function when the document is ready
					document.addEventListener('DOMContentLoaded', function () {
						displayAttachedImage();
					});
				</script>



				<br>

				<div class="col-md-12 mt-2">
					<div class="button-container">
						<input class="btn btn-success" type="submit" name="submit" id="submit" value="แจ้งซ่อม"
							onclick="onSave(<?= $id; ?>)" style="background-color: #4281ff;  font-size: 17px;">
					</div>
				</div>


				<br>
				<br>
				<br>
			


				</form>

			</div><!-- /.box-body -->

		</div>

	</section><!-- /.content -->
</div><!-- /.content-wrapper -->


<script>

	function onSave(id) {

		var cus_name = $("#cus_name").val();
		var cus_email = $("#cus_email").val();
		var cus_tel = $("#cus_tel").val();

		var cus_type = $("#cus_type option:selected").text();
		var cus_type_id = $("#cus_type").val();
		// alert(cus_type);
		var cus_equipment = $("#cus_equipment").val();
		var cus_details = $("#cus_details").val();
		var address = $("#address option:selected").text();

		// alert(address);
		var address_id = $("#address").val();



		var repair_equipment = $("#repair_equipment").val();
		var time_add = $("#time_add").val();

		var file_upload = $("#file_upload")[0].files[0];

		if (cus_name == "") {
			alert("กรุณากรอกชื่อ-นามสกุล");
			$("#cus_name").focus();
			return false;
		} else if (!/^[a-zA-Zก-๙ ]+$/.test(cus_name)) {
			alert("กรุณากรอกเฉพาะตัวอักษรในชื่อ-นามสกุล");
			$("#cus_name").focus();
			return false;
		}
		else if (cus_tel == "") {
			alert("กรุณากรอกเบอร์โทรศัพท์มือถือ");
			$("#cus_tel").focus();
			return false;
		}

		// else if (cus_tel.length !== 10) {
		// 	alert("กรุณากรอกเบอร์โทรศัพท์มือถือให้ครบ 10 หลัก");
		// 	$("#cus_tel").focus();
		// 	return false;
		// }
		else if (cus_email == "") {
			alert("กรุณากรอกอีเมล");
			$("#cus_email").focus();
			return false;
		} else if (!isValidEmail(cus_email)) {
			alert("กรุณากรอกอีเมลที่ถูกต้อง");
			$("#cus_email").focus();
			return false;
		}

		if (cus_type_id === "#" || cus_type_id === "") {
			alert("กรุณาเลือกประเภทงานซ่อม");
			$("#cus_type").focus();
			return false;
		}
		else if (cus_equipment === "") {
			alert("กรุณากรอกชื่ออุปกรณ์");
			$("#cus_equipment").focus();
			return false;
		}

		else if (cus_details === "") {
			alert("กรุณากรอกรายละเอียดปัญหา");
			$("#cus_details").focus();
			return false;
		}

		else if (address.trim() === "" || address === "--เลือก---") {
			alert("กรุณาเลือกสถานที่");
			$("#address").focus();
			return false;
		}

		else if (repair_equipment === "") {
			alert("กรุณากรอกรายละเอียดสถานที่");
			$("#repair_equipment").focus();
			return false;
		}


		if (file_upload && file_upload.size > 4 * 1024 * 1024 * 1024) {
			alert("ขนาดไฟล์ภาพเกิน 4 GB");
			return false;
		}

		// var file_upload = $("#file_upload")[0].files[0];
		var formData = new FormData();
		formData.append('file_upload', file_upload);


		if (confirm("คุณต้องการแจ้งซ่อมใช่หรือไม่")) {
			if (!isValidEmail(cus_email)) {
				alert("กรุณากรอกอีเมลที่ถูกต้อง");
				$("#cus_email").focus();
				return false;
			}

			else {
				formData.append('cus_name', cus_name);
				formData.append('cus_email', cus_email);
				formData.append('cus_tel', cus_tel);
				formData.append('cus_type', cus_type);
				formData.append('cus_equipment', cus_equipment);
				formData.append('cus_details', cus_details);
				formData.append('address', address);
				formData.append('repair_equipment', repair_equipment);
				formData.append('time_add', time_add);
				formData.append('id', id);
				formData.append('cus_type_id', cus_type_id);

				$.ajax({
					url: "<?= base_url(); ?>repair_system/repair/repair_add",
					type: 'POST',
					data: formData,
					contentType: false,
					processData: false,
					async: false,
					success: function (data) {
						// alert(data);
						$("#submit").attr("disabled", true);
						window.location = "<?= base_url(); ?>repair_system/repair/repair_choice";
					}
				});
				return false;
			}
		}
		return false;
	}



</script>
