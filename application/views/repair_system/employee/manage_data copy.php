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
							.custom-placeholder::placeholder {
								color: #0f007d;
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

						<!-- <form role="" action="<?= site_url('repair_system/repair/edit_data'); ?>" method="post" class="form-horizontal"> -->
						<form class="form-horizontal">

							<div class="box-body">
								<div class="col-sm-6">

									<p
										style="font-size: 17px; background-color: #f2f2f2; padding: 4px; border-radius: 5px;">
										&nbsp;<i class="fa fa-user"></i>
										&nbsp;&nbsp;ข้อมูลแจ้งซ่อม</p>


									<div class="form-group">
										<div class="col-sm-3 control-label">
											<label></strong>ชื่อ-นามสกุล : </label>
										</div>

										<div class="col-sm-7">
											<!-- <input type="text" id="rp_case_username_id" name="rp_case_username_id"
												class="form-control rounded-0 custom-placeholder"
												value="<?= $rp_case_username_id; ?>" readonly> -->

												<input type="text" id="rp_case_username_id" name="rp_case_username_id" placeholder="<?= $rp_case_username_id; ?>"
								class="form-control rounded-0" oninput="validateName(this);">
							<small id="nameError" class="text-danger"></small>

										</div>
									</div>


									<div class="form-group">

										<div class="col-sm-3 control-label">
											<label></strong>เบอร์โทรศัพท์ : </label>
										</div>

										<div class="col-sm-7">
											<!-- <input type="text" id="rp_case_usertel" name="rp_case_usertel"
												class="form-control rounded-0" value=""
												placeholder="<?= $rp_case_usertel; ?>"> -->

												<input type="tel" id="cus_tel" name="cus_tel" class="form-control rounded-0"
								placeholder="<?= $rp_case_usertel; ?>" maxlength="10" oninput="validatePhoneNumber(this);">
							<small id="telError" class="text-danger"></small>
										</div>

										<script>
							function validateName(input) {
								var nameError = document.getElementById('nameError');

								if (!/^[a-zA-Zก-๙ ]+$/.test(input.value)) {
									nameError.textContent = 'กรุณากรอกเฉพาะตัวอักษร';
								} else {
									nameError.textContent = '';
								}
							}

							function validatePhoneNumber(input) {
								var phoneNumber = input.value.replace(/\D/g, ''); // ลบทุกอักขระที่ไม่ใช่ตัวเลข
								var telError = document.getElementById('telError');

								if (phoneNumber.length !== 10 || !/^\d+$/.test(phoneNumber)) {
									telError.textContent = 'กรุณากรอกเบอร์โทรศัพท์ 10 หลักที่เป็นตัวเลข';
								} else {
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
											<!-- <input type="text" id="rp_case_useremail" name="rp_case_useremail"
												class="form-control rounded-0" value=""
												placeholder="<?= $rp_case_useremail; ?>"> -->

												<input type="email" id="cus_email" class="form-control rounded-0" placeholder="<?= $rp_case_useremail; ?>">
							<small id="emailError" class="text-danger"></small>
										</div>
									</div>

									<script>
							document.getElementById('cus_email').addEventListener('blur', function () {
								var emailInput = this.value;
								var emailError = document.getElementById('emailError');

								if (!isValidEmail(emailInput)) {
									emailError.textContent = 'กรุณากรอกอีเมลที่ถูกต้อง';
								} else {
									emailError.textContent = '';
								}
							});

							function isValidEmail(email) {
								// ใช้ regular expression ในการตรวจสอบรูปแบบของอีเมล
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
        foreach ($cus_type['cus_type'] as $key => $rp_case) {
            $rp_name_type = @$rp_case->rp_name_type;
            $id_type = @$rp_case->id_type;
            $selected = ($rp_case_type == $id_type) ? 'selected' : '';

            echo '<option value="' . $id_type . '" ' . $selected . '>' . $rp_name_type . '</option>';
        }

        // เพิ่มเงื่อนไข else เพื่อแสดง "อื่นๆ" ถ้าไม่มีการตรงกัน
        if (!in_array($rp_case_type, array_column($cus_type['cus_type'], 'id_type'))) {
            echo '<option value="other" selected>อื่นๆ</option>';
        }
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
												foreach ($address['address'] as $key => $addressItem) {
													$name_address = @$addressItem->name_address;
													$id_address = @$addressItem->id_address;
													$selected = ($rp_case_address == $id_address) ? 'selected' : '';
													echo '<option value="' . $id_address . '" ' . $selected . '>' . $name_address . '</option>';
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
		var rp_case_useremail = $("#rp_case_useremail").val();
		var cus_type = $("#cus_type option:selected").text();
		var rp_case_name = $("#rp_case_name").val();
		var rp_case_detail = $("#rp_case_detail").val();
		var address = $("#address option:selected").text();
		
		var rp_case_address_detail = $("#rp_case_address_detail").val();

		if (!/^[a-zA-Zก-๙ ]+$/.test(rp_case_username_id)) {
				alert("กรุณากรอกเฉพาะตัวอักษรในชื่อ-นามสกุล");
				$("#rp_case_username_id").focus();
				return false;
			}
			else if (rp_case_usertel.length !== 10) {
				alert("กรุณากรอกเบอร์โทรศัพท์ที่มี 10 ตัว");
				$("#rp_case_usertel").focus();
				return false;
			}
 else if (!isValidEmail(rp_case_useremail)) {
				alert("กรุณากรอกอีเมลที่ถูกต้อง");
				$("#rp_case_useremail").focus();
				return false;
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
