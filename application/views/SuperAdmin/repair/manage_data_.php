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

				<strong style="flex: 1; display: inline;">ฟอร์มอัพเดทงานซ่อม</strong>


			</section>

			<?php

			$rp_case_id = $query->rp_case_id;
			$rp_case_name = $query->rp_case_name;

			$rp_case_type = $query->rp_case_type;
			$rp_name_type = $query->rp_name_type;

			$rp_case_detail = $query->rp_case_detail;

			$rp_case_username_id = $query->rp_case_username;
			$rp_case_usertel = $query->rp_case_usertel;
			$rp_case_useremail = $query->rp_case_useremail;
			$rp_case_address = $query->rp_case_address;
			$rp_case_status = $query->rp_case_status;
			$rp_add_date = $query->rp_add_date;
			$rp_edit_date = $query->rp_edit_date;

			$rp_update_detail = $query->rp_update_detail;
			$rp_update_name = $query->rp_update_name;


			if ($rp_case_status == 1) {
				$rp_case_status = 'รอดำเนินการ';
			} elseif ($rp_case_status == 2) {
				$rp_case_status = 'กำลังดำเนินการ';
			} elseif ($rp_case_status == 3) {
				$rp_case_status = 'สำเร็จ';
			} elseif ($rp_case_status == 4) {
				$rp_case_status = 'ยกลเลิก';
			}

			?>

			<section class="content">
				<div class="box-body">


					<div class="col-sm-6">

						<p style="font-size: 17px; background-color: #f2f2f2; padding: 4px; border-radius: 5px;"><i
								class="fa fa-user"></i> ข้อมูลผู้แจ้ง</p>





						<div class="form-group">
							<div class="col-sm-4 control-label">
								<label></strong>ชื่อ-นามสกุล : </label>
							</div>

							<div class="col-sm-7">
								<input type="text" id="cus_name" name="cus_name"
									class="form-control rounded-0 custom-placeholder"
									value="<?= $rp_case_username_id ?>" readonly>

							</div>
						</div>

						<br>
						<br>

						<div class="form-group">
							<div class="col-sm-4 control-label">
								<label></strong>เบอร์โทรศัพท์ : </label>
							</div>

							<div class="col-sm-7">
								<input type="text" id="cus_name" name="cus_name"
									class="form-control rounded-0 custom-placeholder" value="<?= $rp_case_usertel ?>"
									readonly>

							</div>
						</div>
						<br>
						<br>

						<div class="form-group">
							<div class="col-sm-4 control-label">
								<label></strong>อีเมล : </label>
							</div>

							<div class="col-sm-7">
								<input type="text" id="cus_name" name="cus_name"
									class="form-control rounded-0 custom-placeholder" value="<?= $rp_case_useremail ?>"
									readonly>

							</div>
						</div>


						<br>
						<br>

						<div class="form-group">
							<div class="col-sm-4 control-label">
								<label></strong>ประเภทงานซ่อม : </label>
							</div>

							<div class="col-sm-7">
								<input type="text" id="cus_name" name="cus_name"
									class="form-control rounded-0 custom-placeholder" value="<?= $rp_name_type ?>"
									readonly>

							</div>
						</div>

						<br>
						<br>

						<div class="form-group">
							<div class="col-sm-4 control-label">
								<label></strong>ชื่ออุปกรณ์ : </label>
							</div>

							<div class="col-sm-7">
								<input type="text" id="cus_name" name="cus_name"
									class="form-control rounded-0 custom-placeholder" value="<?= $rp_case_name ?>"
									readonly>

							</div>
						</div>
						<br>
						<br>

						<div class="form-group">
							<div class="col-sm-4 control-label">
								<label></strong>รายละเอียดปัญหา : </label>
							</div>

							<div class="col-sm-7">
								<input type="text" id="cus_name" name="cus_name"
									class="form-control rounded-0 custom-placeholder" value="<?= $rp_case_detail ?>"
									readonly>

							</div>
						</div>

						<br>
						<br>

						<div class="form-group">
							<div class="col-sm-4 control-label">
								<label></strong>สถานที่แจ้งซ่อม : </label>
							</div>

							<div class="col-sm-7">
								<input type="text" id="cus_name" name="cus_name"
									class="form-control rounded-0 custom-placeholder" value="<?= $rp_case_address ?>"
									readonly>

							</div>
						</div>

						<br>
						<br>







					</div>
					</form>

					<div class=" col-sm-6">

						<p style="font-size: 17px; background-color: #f2f2f2; padding: 4px; border-radius: 5px;"><i
								class="fa fa-cogs"></i> ดำเนินการ</p>



					
						<div class="form-group">
							<div class="col-sm-4 control-label">
								<label></strong>สถานะปัจจุบัน : </label>
							</div>

							<div class="col-sm-7">
								<input type="text" id="cus_name" name="cus_name"
									class="form-control rounded-0 custom-placeholder" value="<?= $rp_case_status ?>"
									readonly>

							</div>
						</div>

						<br>
						<br>

						<div class="form-group">
							<div class="col-sm-4 control-label">
								<label></strong>วันที่ดำเนินการ : </label>
							</div>

							<div class="col-sm-7">
							<input type="datetime-local" id="time_edit" name="time_edit"
										class="form-control rounded-0 custom-placeholder"
										style="width: 70%; padding-right: 10px;" placeholder="วันที่และเวลาส่งซ่อม"
										value="<?= date('Y-m-d\TH:i'); ?>" min="<?= date('Y-m-d\TH:i'); ?> " readonly>

							</div>
						</div>


						<br>
						<br>

						<div class="form-group">
							<div class="col-sm-4 control-label">
								<label><strong
								class="text-danger">*</strong>อัพเดทสถานะ : </label>
							</div>

							<div class="col-sm-7">
						
							<select id="case_status" name="case_status" class="form-control">
							<?php
							echo '<option value="#">--เลือก---</option>';
							foreach ($status as $status_type) {
								$status_type_id = $status_type->c_id;
								$status_type_name = $status_type->c_name;
								echo '<option value="' . $status_type_id . '">' . $status_type_name . '</option>';
							}
							?>
						</select>

							</div>
						</div>



						<br>
						<br>

						<div class="form-group">
							<div class="col-sm-7 control-label">
								<label>
								<strong
								class="text-danger">*</strong>บันทึกการอัพเดทงานซ่อม
							:</label>
							</div>
						</div>


						<br>
					
						<textarea id="rp_update_detail"
							name="rp_update_detail" placeholder="" class="form-control"
							style="height: 70px; width: 550px;"></textarea>


						<br>
						<br>

					

						<div class="form-group">
							<div class="col-sm-4 control-label">
								<label><strong
								class="text-danger">*</strong>ลงชื่อผู้บันทึก : </label>
							</div>

							<div class="col-sm-7">
							<input type="text" id="rp_update_name" name="rp_update_name" placeholder="ชื่อ-นามสกุล"
							class="form-control rounded-0" oninput="validateName(this);"
							style="padding-right: 10px;">
						<small id="nameError" class="text-danger"></small>


							</div>
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


						</script>

					</div>


					<div class="col-md-12 mt-2">
					<div class="button-container">
						<input class="btn btn-success" type="submit" name="btnSave" id="btnSave" value="บันทึกข้อมูล" style="background-color: #4281ff;"
							onclick="onSave('<?php echo $rp_case_id; ?>')">


						&nbsp;&nbsp;

						<input type="button" value="ย้อนกลับ" class="btn btn-custom rounded-0" style="margin-right:15px"
								onclick="window.location='<?= base_url(); ?>superAdmin/repair_list_all'">
							

					
					</div>
				</div>


				</div><!-- /.box-body -->

			</section>

		</div>
	</div>
</div>


<script>
 function onSave(rp_case_id) {
        var case_status = $("#case_status").val();
		// alert(case_status);
        var rp_update_detail = $("#rp_update_detail").val();
        var rp_update_name = $("#rp_update_name").val();
        var time_edit = $("#time_edit").val();

		if (case_status == "#") {
                alert("กรุณาเลือกรายการอัพเดทสถานะ");
                $("#case_status").focus();
                return false;
            } else if (rp_update_detail == "") {
				alert("กรุณากรอกรายละเอียดการอัพเดทงานซ่อม");
				$("#rp_update_detail").focus();
				return false;
			} else if (rp_update_name == "") {
				alert("กรุณากรอกชื่อผู้บันทึก");
				$("#rp_update_name").focus();
				return false;
			}
			else if (!/^[a-zA-Zก-๙ ]+$/.test(rp_update_name)) {
				alert("กรุณากรอกเฉพาะตัวอักษรในชื่อ-นามสกุล");
				$("#rp_update_name").focus();
				return false;
			}

		if (confirm("คุณต้องการบันทึกข้อมูลใช่หรือไม่")) {
            if (case_status == "#") {
                alert("กรุณาเลือกรายการอัพเดทสถานะ");
                $("#case_status").focus();
                return false;
            } else if (rp_update_detail == "") {
				alert("กรุณากรอกรายละเอียดการอัพเดทงานซ่อม");
				$("#rp_update_detail").focus();
				return false;
			} else if (rp_update_name == "") {
				alert("กรุณากรอกชื่อผู้บันทึก");
				$("#rp_update_name").focus();
				return false;
			}
			else if (!/^[a-zA-Zก-๙ ]+$/.test(rp_update_name)) {
				alert("กรุณากรอกเฉพาะตัวอักษรในชื่อ-นามสกุล");
				$("#rp_update_name").focus();
				return false;
			}

			else {

				var pmeters = 'rp_case_id=' + <?= $rp_case_id ?> + '&case_status=' + case_status
					+ '&rp_update_detail=' + rp_update_detail + '&rp_update_name=' + rp_update_name
					+ '&time_edit=' + time_edit;

				pmeters = pmeters.replace("undefined", "");

				$.ajax({
					url: "<?= base_url(); ?>repair_system/repair/manage_update_data",
					type: 'POST',
					data: pmeters,
					async: false,
					success: function (data) {
						alert(data);
						$("#btnSave").attr("disabled", true);
						window.location = "<?= base_url(); ?>superAdmin/repair_list_all";
					}
				});
				return false;
			}
		}
		return false;

	}
</script>


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
		background-color: #878787;

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
</style>
