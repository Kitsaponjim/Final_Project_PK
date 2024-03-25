<div class="content-wrapper">
	<section class="content">

		<p
			style="font-size: 20px; background-color: #ffffff; padding: 10px; border-radius: 10px; display: flex; align-items: center;">
			<i class="fa fa-pencil"
				style="margin-right: 10px; background-color: #b3c3ff; padding: 8px; border-radius: 50%; color: white"></i>
			<strong style="flex: 1; display: inline;">ฟอร์มแก้ไขงานซ่อม</strong>
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
							}

						</style>

						<?php

						$rp_case_id = $query['query']->rp_case_id;
						$rp_case_name = $query['query']->rp_case_name;
						$rp_case_type = $query['query']->rp_case_type;
						$rp_case_detail = $query['query']->rp_case_detail;
						$rp_case_username_id = $query['query']->rp_case_username;
						$rp_case_usertel = $query['query']->rp_case_usertel;
						$rp_case_useremail = $query['query']->rp_case_useremail;
						$rp_case_address = $query['query']->rp_case_address;

						$rp_case_address_detail = $query['query']->rp_case_address_detail;

						$rp_case_status = $query['query']->rp_case_status;
						$rp_add_date = $query['query']->rp_add_date;
						$rp_edit_date = $query['query']->rp_edit_date;

						$rp_update_detail = $query['query']->rp_update_detail;
						$rp_update_name = $query['query']->rp_update_name;

						?>

						<form class="form-horizontal">
							<div class="box-body">
								<div class="col-sm-8">

									<p
										style="font-size: 17px; background-color: #f2f2f2; padding: 4px; border-radius: 5px;">
										&nbsp;<i class="fa fa-user"></i>
										&nbsp;&nbsp;ข้อมูลแจ้งซ่อม</p>

									<div class="form-group">
										<div class="col-sm-3 control-label">
											<label></strong>ชื่อ-นามสกุล : </label>
										</div>

										<div class="col-sm-7">

											<input type="text" id="rp_case_username_id" name="rp_case_username_id"
												placeholder="<?= $rp_case_username_id; ?>"
												class="form-control rounded-0" readonly>
											<small id="nameError" class="text-danger"></small>

										</div>
									</div>


									<div class="form-group">

										<div class="col-sm-3 control-label">
											<label></strong>เบอร์โทรศัพท์มือถือ : </label>
										</div>

										<div class="col-sm-7">

											<input type="tel" id="rp_case_usertel" name="rp_case_usertel"
												class="form-control rounded-0" placeholder="เบอร์โทรศัพท์มือถือ"
												maxlength="10" oninput="validatePhoneNumber(this);">
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



									</div>
									<div class="form-group">

										<div class="col-sm-3 control-label">
											<label></strong>อีเมล: </label>
										</div>

										<div class="col-sm-7">

											<input type="email" id="rp_case_useremail" class="form-control rounded-0"
												placeholder="<?= $rp_case_useremail; ?>">
											<small id="emailError" class="text-danger"></small>
										</div>
									</div>

									<script>
										var emailInput = document.getElementById('rp_case_useremail');
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

									<p
										style="font-size: 17px; background-color: #f2f2f2; padding: 4px; border-radius: 5px;">
										&nbsp;<i class="fa fa-exclamation-circle"></i>
										&nbsp;&nbsp;ข้อมูลปัญหา</p>

									<div class="form-group">
										<div class="col-sm-3 control-label">
											<label>ประเภทงานซ่อม: </label>
										</div>

										<div class="col-sm-7">
											<select id="cus_type" name="cus_type" required class="form-control">

												<?php

												echo '<option value="#" selected>--เลือก--</option>';
												foreach ($cus_type['cus_type'] as $key => $rp_case) {
													$rp_name_type = @$rp_case->rp_name_type;
													$id_type = @$rp_case->id_type;
													// $selected = ($rp_case_type == $id_type) ? 'selected' : '';

													echo '<option value="' . $id_type . '">' . $rp_name_type . '</option>';
												}

												// if (!in_array($rp_case_type, array_column($cus_type['cus_type'], 'id_type'))) {
												// 	echo '<option value="other" selected>อื่นๆ</option>';
												// }
												?>
											</select>
										</div>




									</div>

									<div class="form-group">
										<div class="col-sm-3 control-label">
											<label>ชื่ออุปกรณ์: </label>
										</div>
										<div class="col-sm-7">
											<input type="text" id="rp_case_name" name="rp_case_name"
												class="form-control rounded-0" value=""
												placeholder="<?= $rp_case_name; ?>">

										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-3 control-label">
											<label>รายละเอียดปัญหา: </label>
										</div>


										<div class="col-sm-7">

											<textarea id="rp_case_detail" name="rp_case_detail"
												placeholder="<?= $rp_case_detail; ?>" class="form-control"></textarea>

										</div>
									</div>


									<div class="form-group">
										<div class="col-sm-3 control-label">
											<label>สถานที่แจ้งซ่อม: </label>
										</div>

										<div class="col-sm-7">
											<select id="address" name="address" required class="form-control">
												<?php
												echo '<option value="#" selected>--เลือก--</option>';
												foreach ($address['address'] as $key => $addressItem) {
													$name_address = @$addressItem->name_address;
													$id_address = @$addressItem->id_address;
													// $selected = ($rp_case_address == $id_address) ? 'selected' : '';
													echo '<option value="' . $id_address . '">' . $name_address . '</option>';
												}
												?>
											</select>
										</div>


									</div>

									<div class="form-group">
										<div class="col-sm-3 control-label">
											<label>รายละเอียดสถานที่: </label>
										</div>

										<div class="col-sm-7">
											<input type="text" id="rp_case_address_detail" name="rp_case_address_detail"
												class="form-control rounded-0" value=""
												placeholder="<?= $rp_case_address_detail; ?>">

										</div>
									</div>



								</div>

							</div>
						</form>

					</div>

					<div class="col-md-12 mt-2">
						<div class="button-container">
							<input class="btn btn-custom" type="submit" name="btnSave" id="btnSave"
								style="background-color: #4281ff; color:white;" value="บันทึกข้อมูล"
								onclick="onSave('<?php echo $rp_case_id; ?>')">

							&nbsp;&nbsp;

							<input type="button" value="ย้อนกลับ" class="btn btn-custom rounded-0"
								style="margin-right: 15px;"
								onclick="window.location='<?= base_url(); ?>repair_system/employee/list_repair'">


							<!-- <button onclick="back()" class="btn btn-danger rounded-0">กลับ</button> -->
						</div>
					</div>
				</div>
			</div>
			<br>
		</div><!-- /.box-body -->

</div>
</section>
</div>

<script>
	function onSave(rp_case_id) {

		var rp_case_usertel = $("#rp_case_usertel").val();
		// alert(rp_case_usertel);
		var rp_case_useremail = $("#rp_case_useremail").val();
		// alert(rp_case_useremail);

		var cus_type = $("#cus_type option:selected").val();
		// var cus_type_ = $("#cus_type option:selected").val();
		// alert(cus_type);
		// alert(cus_type_);

		var address = $("#address option:selected").text();
		var address_ = $("#address option:selected").val();
		// alert(address);
		// alert(address_);

		// return false;

		var rp_case_name = $("#rp_case_name").val();
		// alert(rp_case_name);

		var rp_case_detail = $("#rp_case_detail").val();
		// alert(rp_case_detail);




		var rp_case_address_detail = $("#rp_case_address_detail").val();
		// alert(rp_case_address_detail);

		if (rp_case_usertel === '' && rp_case_useremail === '' && cus_type === '#'  && rp_case_name === '' && rp_case_detail === '' && address_ === '#' && rp_case_address_detail === '') {
			alert("กรุณากรอกข้อมูลที่ต้องการแก้ไข");
			return false;
		}


		if (rp_case_usertel != '') {
			if (rp_case_usertel.length !== 10) {
				alert("กรุณากรอกเบอร์โทรศัพท์มือถือให้ครบ 10 หลัก");
				$("#rp_case_usertel").focus();
				return false;
			}
		}


		if (rp_case_useremail != '') {
			if (!isValidEmail(rp_case_useremail)) {
				alert("กรุณากรอกอีเมลที่ถูกต้อง");
				$("#rp_case_useremail").focus();
				return false;
			}
		}

		if (confirm("คุณต้องการบันทึกข้อมูลใช่หรือไม่")) {
			// alert("1");
			var pmeters = 'rp_case_id=' + <?= $rp_case_id ?> +
				'&rp_case_usertel=' + rp_case_usertel +
				'&rp_case_useremail=' + rp_case_useremail +
				'&cus_type=' + cus_type +
				'&rp_case_name=' + rp_case_name +
				'&rp_case_detail=' + rp_case_detail +
				'&address=' + address +
				'&rp_case_address_detail=' + rp_case_address_detail;
			// alert("");
			pmeters = pmeters.replace("undefined", "");
			// alert("3");

			$.ajax({
				url: "<?= base_url(); ?>repair_system/admin/manage_update_data",
				type: 'POST',
				data: pmeters,
				async: false,
				success: function (data) {
					alert(data);
					$("#btnSave").attr("disabled", true);
					window.location = "<?= base_url(); ?>repair_system/employee/list_repair";
				}
			});
			return false;

		}
		return false;

	}
</script>
