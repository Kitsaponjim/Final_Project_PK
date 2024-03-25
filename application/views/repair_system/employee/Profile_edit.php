<div class="content-wrapper">
	<section class="content">

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
    border-radius: 10px; /* ปรับค่าตามที่คุณต้องการให้เหมาะสม */
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

						<?php

						$id_user = $query->id;
						$user_login = $query->user_login;
						$user_name = $query->user_name;
						$user_email = $query->user_email;
						$user_tel = $query->user_tel;
					
						?>

						<form class="form-horizontal">

							<div class="box-body">

								<div class="col-sm-7">

								<p style="font-size: 20px; background-color: #f2f2f2; padding: 10px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
									<i
											class="fa fa-user"></i>
											&nbsp; แก้ไขข้อมูลของ 
											&nbsp;
											<strong>
											<?= $user_name ?>
											</strong> 
									</p>

									<br>
									<div class="form-group">
										<div class="col-sm-3 control-label">
											<label></strong>ชื่อผู้ใช้งาน : </label>
										</div>

										<div class="col-sm-7">
											<input type="text" id="cus_name" name="cus_name"
												class="form-control rounded-0 custom-placeholder"
												value=" <?= $user_login ?>" readonly>

										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-3 control-label">
											<label></strong>ชื่อ-นามสกุล : </label>
										</div>

										<div class="col-sm-7">
											<input type="text" id="edit_cus_name" name="edit_cus_name"
												class="form-control rounded-0" placeholder="<?= $user_name; ?>">

										</div>
									</div>



									<div class="form-group">

										<div class="col-sm-3 control-label">
											<label></strong>อีเมล : </label>
										</div>

										<div class="col-sm-6">
											<input type="text" id="edit_cus_email" name="edit_cus_email"
												class="form-control rounded-0" placeholder="<?= $user_email; ?>">
										</div>
									</div>

									<div class="form-group">

										<div class="col-sm-3 control-label">
											<label></strong>เบอร์โทรศัพท์มิอถือ : </label>
										</div>

										<div class="col-sm-6">
											<input type="text" id="edit_cus_tel" name="edit_cus_tel"
												class="form-control rounded-0" placeholder="<?= $user_tel; ?>">

										</div>
									</div>
								</div>
							</div>

						</form>

					</div>

					<div class="col-md-12 mt-2">
						<div class="button-container">
							<input class="btn btn-custom" type="submit" name="btnSave" id="btnSave" style="background-color: #4281ff; color:white;"
								value="บันทึกข้อมูล" onclick="onSave(<?= $id_user; ?>)">

							&nbsp;
							&nbsp;
							<input type="button" value="ย้อนกลับ" class="btn btn-custom rounded-0" style="margin-right:15px"
								onclick="window.location='<?= base_url(); ?>repair_system/employee/profile'">

							<!-- <button onclick="back()" class="btn btn-danger rounded-0">กลับ</button> -->
						</div>
					</div>
				</div>
			</div>
			<br>
		</div><!-- /.box-body -->

</div>
</section>
</div><!-- /.content-wrapper -->

<script>
	function onSave(id_user) {
		var edit_cus_name = $('#edit_cus_name').val();
		var edit_cus_email = $('#edit_cus_email').val();
		var edit_cus_tel = $('#edit_cus_tel').val();

		if (confirm('คุณต้องการบันทึกข้อมูลใช่หรือไม่')) {
			var pmeters = 'id_user=' + <?= $id_user ?> + '&edit_cus_name=' + edit_cus_name + '&edit_cus_email=' + edit_cus_email + '&edit_cus_tel=' + edit_cus_tel;

			pmeters = pmeters.replace("undefined", "");

			$.ajax({
				url: "<?= base_url(); ?>repair_system/admin/admin_update_user",
				type: 'POST',
				data: pmeters,
				async: false,
				success: function (data) {
					// alert(data);
					$("#btnSave").attr("disabled", true);
					window.location = "<?= base_url(); ?>repair_system/employee/Profile";
				}
			});
			return false;
		}
	}
</script>
