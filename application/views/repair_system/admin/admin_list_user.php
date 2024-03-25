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

<div class="content-wrapper">
	<!--<section class="content-header">
	 <h1>
			<i class="fa fa-wrench"></i> รายการสมาชิก
		</h1> 
		</section>-->
	<section class="content">
		<p
			style="font-size: 20px; background-color: #ffffff; padding: 10px; border-radius: 10px; display: flex; align-items: center;">

			<i class="fa fa-users"
				style="margin-right: 10px; background-color: #b3c3ff; padding: 8px; border-radius: 50%; color: white"></i>

			<strong style="flex: 1; display: inline;">รายการสมาชิก</strong>
		</p>


		<div class="box custom-box">
			<div class="box-body">
				<div class="row">
			



					<div class="col-sm-12">
						<form method="get" action="" style="margin-left: 20px; margin-top:10px;">

							<label for="status" style="font-size: 16px;">เลือก </label>
							

							&nbsp;&nbsp;

							<label for="role" style="font-size: 16px;">ตำแหน่ง : </label>
							<select id="role" name="role" required class="narrow-select">
								<option value="#" <?php echo (empty($_GET['role']) ? 'selected' : ''); ?>>--เลือก--
								</option>
								<?php
								$sql = 'SELECT * FROM user_role';
								$query_1 = $this->db->query($sql)->result();

								foreach ($query_1 as $role) {
									$selected = (isset($_GET['role']) && $_GET['role'] == $role->id_role) ? 'selected' : '';
									echo '<option value="' . $role->id_role . '" ' . $selected . '>' . $role->role_name . '</option>';
								}
								?>
							</select>

							&nbsp;&nbsp;&nbsp;
							<label for="status" style="font-size: 16px;">สถานะ : </label>
							<select id="status" name="status" required class="narrow-select">
								<option value="#" <?php echo (empty($_GET['status']) ? 'selected' : ''); ?>>--เลือก--
								</option>
								<?php
								$sql = 'SELECT * FROM user_status_repair';
								$query_1 = $this->db->query($sql)->result();

								foreach ($query_1 as $status) {
									$selected = (isset($_GET['status']) && $_GET['status'] == $status->id_repair) ? 'selected' : '';
									echo '<option value="' . $status->id_repair . '" ' . $selected . '>' . $status->name_repair . '</option>';
								}
								?>
							</select>


							&nbsp;
							<button class="btn btn-custom-gray btn-lg" style="font-size: 15px;"
								type="submit">ค้นหา</button>

						</form>




						<br>

						<table id="example1" class="table table-bordered table-striped dataTable" role="grid" style="font-size: 16px;"
							aria-describedby="example1_info">
							<thead>
								<tr role="row" class="info">
									<th tabindex="0" rowspan="1" colspan="1" style="width: 5%; text-align: center;">ลำดับที่
									</th>
									<th tabindex="0" rowspan="1" colspan="1" style="width: 21%; text-align: center;">
										ข้อมูลผู้ใช้</th>
									<th tabindex="0" rowspan="1" colspan="1" style="width: 15%; text-align: center;">
										ข้อมูลติดต่อ</th>

										<th tabindex="0" rowspan="1" colspan="1" style="width: 7%; text-align: center;">
									ตำแหน่ง</th>

									<th tabindex="0" rowspan="1" colspan="1" style="width: 7%; text-align: center;">
										สถานะ</th>

							


									<th tabindex="0" rowspan="1" colspan="1" style="width: 4%; text-align: center;">
										จัดการ</th>


								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;
								foreach ($query as $value) {
									$id = $value->id;
									$user_login = $value->user_login;
									$user_name = $value->user_name;

									$user_email = $value->user_email;
									$user_tel = $value->user_tel;
									$user_status_repair = $value->user_status_repair;
									$n_status = $value->name_repair;
									$role_name = $value->role_name;
		
									?>

									<tr role="row">
										<td style="font-size: 15px;">
											<?= $i; ?>
										</td>

										<td style="font-size: 15px;">
										<strong>ชื่อผู้ใช้งาน :

										</strong>
											<span>
												&nbsp;
												<?php echo !empty($user_login) ? nl2br($user_login) : '-'; ?>
											</span>
											<br><br>
											<strong>
											ชื่อ-นามสกุล :
											</strong>
											
											<span>
												&nbsp;
												<?php echo !empty($user_name) ? nl2br($user_name) : '-'; ?>
											</span>
										</td>

										<td style="font-size: 15px;">
											<i class="fa fa-envelope fa-lg" style="margin-top:10px;"></i>
											<span style="font-weight: bold; margin-left:10px;">
											<?php echo !empty($user_email) ? $user_email : '-'; ?>
										
											</span>
											<br>

											<i class="fa fa-phone fa-lg" style="margin-top:10px;"></i>
											<span style="font-weight: bold; color: #4fa4ff; margin-left:10px;">
												<?php echo !empty($user_tel) ? $user_tel : '-'; ?>

											</span>

											<br>
										</td>
										<td style="font-size: 15px;text-align:center; ">
											<?php echo !empty($role_name) ? $role_name : '-'; ?>

										</td>



										<td style="font-size: 15px; text-align:center;">
											<?php echo !empty($n_status) ? $n_status : '-'; ?>

										</td>
						

										<td align="center" style="font-size: 18px;">
											<a href="#" class="" onclick="onEdit(<?= $id ?>)">
												<i class="fa fa-edit" style="color: black; font-size: 18px;"></i>
											</a>
										</td>


						

									</tr>

									<?php $i++;
								} ?>



							</tbody>
						</table>



					</div>
				</div>
			</div><!-- /.box-body -->
		</div>


	</section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script>

	function onEdit(id) {
		window.location = "<?= base_url(); ?>repair_system/admin/admin_edit_user/" + id;
	}


	function onDel(id) {
		if (confirm("คุณต้องการ ลบ ใช่หรือไม่")) {
			window.location = "<?= base_url(); ?>repair_system/admin/admin_del_user/" + id;
		}

	}
	function onEdit_pass(id) {

		window.location = "<?= base_url(); ?>repair_system/repair/edit_password/" + id;

	}


</script>
