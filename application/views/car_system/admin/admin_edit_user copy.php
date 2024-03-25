<?php

$sql = "SELECT * FROM user_info WHERE id ='$id_user'";

$row = $this->db->query($sql)->row();

$id_user = $row->id;
$user_login = @$row->user_login;
$user_password = @$row->user_password;
$user_name = @$row->user_name;
$user_email = @$row->user_email;
$user_tel = @$row->user_tel;
$user_status_repair = @$row->user_status_repair;
$user_role = @$row->user_role;

?>

<div class="content-wrapper">
	<section class="content">

		<div class="box custom-box">
			<div class="box-body">
				<div class="row">
					<div class="col-sm-12">

						<style>
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
								background-color: #878787;

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

						<form class="form-horizontal">

							<div class="box-body">

								<div class="col-sm-6">

								<p style="font-size: 20px; background-color: #f2f2f2; padding: 10px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
    <i class="fa fa-pencil"></i>&nbsp; แก้ไขข้อมูลของ&nbsp;<strong>
	<?= $user_name ?>
	</strong>
</p>


									<div class="form-group" style="margin-top:20px;">
										<div class="col-sm-3 control-label">
											<label></strong>ชื่อผู้ใช้งาน :</label>
										</div>

										<div class="col-sm-7">
											<input type="text" id="user_login" name="user_login"
												class="form-control rounded-0 custom-placeholder"
												placeholder="<?= $user_login ?>" readonly>

										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-3 control-label">
											<label></strong>ชื่อ-นามสกุล : </label>
										</div>

										<div class="col-sm-7">
											<input type="text" id="edit_cus_name" name="edit_cus_name"
												class="form-control rounded-0" placeholder="<?= $user_name ?>" value="">

										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-3 control-label">
											<label></strong>อีเมล : </label>
										</div>

										<div class="col-sm-7">
											<input type="text" id="edit_cus_email" name="edit_cus_email"
												class="form-control rounded-0" placeholder="<?= $user_email;?>" value="">

										</div>
									</div>


									<div class="form-group">
										<div class="col-sm-3 control-label">
											<label></strong>เบอร์โทรศัพท์ : </label>
										</div>

										<div class="col-sm-7">
											<input type="text" id="edit_cus_tel" name="edit_cus_tel"
												class="form-control rounded-0" placeholder="<?= $user_tel;?>" value="">

										</div>
									</div>


									<div class="form-group">
										<div class="col-sm-3 control-label">
											<label></strong>สถานะ : </label>
										</div>

										<div class="col-sm-7">
											<select id="status" name="status" required class="form-control">
									
												<?php
												foreach ($status_user['status_user'] as $key => $status) {
													$name_address = @$status->name_car;
													$id_address = @$status->id_car;
													$selected = ($user_status_car == $id_address) ? 'selected' : '';
													echo '<option value="' . $id_address . '" ' . $selected . '>' . $name_address . '</option>';
												}
												?>
											</select>

										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-3 control-label">
											<label></strong>ตำแหน่ง : </label>
										</div>

										<div class="col-sm-7">
											<select id="role" name="role" required class="form-control">
									
												<?php
												foreach ($role_user['role_user'] as $key => $role) {
													$name_address = @$role->role_name;
													$id_address = @$role->id_role;
													$selected = ($user_role == $id_address) ? 'selected' : '';
													echo '<option value="' . $id_address . '" ' . $selected . '>' . $name_address . '</option>';
												}
												?>
											</select>

										</div>
									</div>


									
								</div>
							</div>
						</form>

					</div>

					<div class="col-md-12 mt-2">
						<div class="button-container">
							<input class="btn btn-success" type="submit" name="btnSave" id="btnSave"style="background-color: #4281ff;"
								value="บันทึกข้อมูล" onclick="onSave(<?= $id_user; ?>)">

							&nbsp;&nbsp;

							<input type="button" value="ย้อนกลับ" class="btn btn-custom rounded-0" style="margin-right: 15px;"
								onclick="window.location='<?= base_url(); ?>car_system/admin/admin_list_user'">
						</div>

					</div>

				</div>
			</div>
			<br>

		</div>

</div>
</section>
</div>

<script>
	function onSave(id_user) {
		
		var edit_cus_name = $('#edit_cus_name').val();
		var edit_cus_email = $('#edit_cus_email').val();
		var edit_cus_tel = $('#edit_cus_tel').val();

		var status = $("#status").val();
		var role = $("#role").val();

// alert(role);
		if (confirm('คุณต้องการบันทึกข้อมูลใช่หรือไม่')) {
			var pmeters = 'id_user=' + <?= $id_user ?> + '&edit_cus_name=' + edit_cus_name + '&edit_cus_email='
			 + edit_cus_email + '&edit_cus_tel=' + edit_cus_tel
			 + '&status=' + status
			 + '&role=' + role;
			pmeters = pmeters.replace("undefined", "");

			$.ajax({
				url: "<?= base_url(); ?>repair_system/admin/admin_update_user",
				type: 'POST',
				data: pmeters,
				async: false,
				success: function (data) {
					alert(data);
					$("#btnSave").attr("disabled", true);
					window.location = "<?= base_url(); ?>car_system/admin/admin_list_user";
				}
			});
			return false;
		}
	}
</script>
