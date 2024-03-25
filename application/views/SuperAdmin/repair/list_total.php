<?php

$count_case_new = $num_status->count_case_new;
$count_case_wait = $num_status->count_case_wait;
$count_case_finish = $num_status->count_case_finish;
$count_case_cancel = $num_status->count_case_cancel;
$total = $num_status->total;

$user_name = $_SESSION['user_name'];
?>


<style>
	/* กำหนดหล่องเป็นเหลี่ยมโค้ง */
	.custom-box {
		background-color: white;
		border-radius: 10px;
		box-shadow: none;
		border-top: solid white;
		/* กำหนดสีขอบด้านบนเป็นสีขาว */
	}



	/* ตั้งค่า i con  */
	.user-icons {
		width: 50px;
		height: 50px;
		background-color: #f2f2f2;
		color: #4281ff;
		border-radius: 5px;
		display: flex;
		align-items: center;
		justify-content: center;
		font-size: 16px;
		font-weight: bold;
	}



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

	#example1 th,
	#example1 td {
		padding: 10px;
		text-align: center;
		border: 1px solid #e6eaf5;
		/* Border for cells */
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


<!-- ############################################################################################## -->


<div class="col-sm-9" style="padding-top: 15px;">

	<div class="box custom-box">


		<section class="content-header" style="display: flex; align-items: center;">

			<i class="fa fa-list" style="margin-right: 10px; padding: 8px; border-radius: 50%; color: back"></i>

			<strong style="flex: 1; display: inline;">รายการแจ้งซ่อมทั้งหมด</strong>


		</section>



		<form method="get" action="" onsubmit="return validateForm()">

<p
		style="font-size: 15px; background-color: #ffffff; padding: 10px; border-radius: 10px; display: flex; align-items: center;">
		<label for="start_date" style="margin-left:10px;">เลือกวันที่เวลา </label>

		<label for="start_date" style="margin-left:10px;">เริ่ม : </label>
		<input type="date" id="start_date" name="start_date" required
			value="<?= isset($_GET['start_date']) ? $_GET['start_date'] : date('Y-m-d', strtotime('-2 month')) ?>"
			max="<?= date('Y-m-d') ?>"
			style="border: 1px solid white; border-radius: 5px; padding: 5px; background-color: #e6f7ff; margin-left:10px;">

		<label for="end_date" style="margin-left:10px;">สิ้นสุด : </label>
		<input type="date" id="end_date" name="end_date" required
			value="<?= isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d') ?>"
			max="<?= date('Y-m-d') ?>"
			style="border: 1px solid white; border-radius: 5px; padding: 5px; background-color: #e6f7ff; margin-left:10px;">

		<button class="btn btn-custom-gray btn-lg" style="font-size: 13px; margin-left:20px;"
			type="submit">ค้นหา</button>

			<button class="btn btn-custom-gray btn-lg" style="font-size: 13px; margin-left:5px;" onclick="exportToExcel()">ออกรายการ Excel</button>


		<strong style="flex: 1; display: inline;"></strong>
	</p>

</form>



<script>
					function validateForm() {
						const selectedStart = document.getElementById('start_date').value;
						const selectedEnd = document.getElementById('end_date').value;

						if (selectedStart === '' || selectedEnd === '') {
							alert('กรุณาเลือกทั้งเริ่มและสิ้นสุด');
							return false;
						}

						const numericStart = new Date(selectedStart).getTime();
						const numericEnd = new Date(selectedEnd).getTime();

						if (isNaN(numericStart) || isNaN(numericEnd)) {
							alert('กรุณาเลือกวันที่ให้ถูกต้อง');
							return false;
						}

						if (numericStart > numericEnd) {
							alert('วันที่สิ้นสุดต้องมากกว่าหรือเท่ากับวันที่เริ่มต้น');
							return false;
						}

						return true;
					}
				</script>
<style>
    .btn {
        display: inline-block;
        position: relative;
        text-decoration: none;
        color: white;
        cursor: pointer;
    }

    .btn::after {
        content: "";
        display: block;
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 3px;
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    .btn-primary:hover::after,
    .btn-primary.active::after {
        transform: scaleX(1);
        background-color: #000;
    }

    .btn-warning:hover::after,
    .btn-warning.active::after {
        transform: scaleX(1);
        background-color: #ffc107;
    }

    .btn-custom:hover::after,
    .btn-custom.active::after {
        transform: scaleX(1);
        background-color: #5d1bb3;
    }

    .btn-primary:hover::after,
    .btn-primary.active::after {
        transform: scaleX(1);
        background-color: #b5ceff;
    }
    .btn-success:hover::after,
    .btn-success.active::after {
        transform: scaleX(1);
        background-color: #b5ffca;
    }

    .btn-customs:hover::after,
    .btn-customs.active::after {
        transform: scaleX(1);
        background-color: #e6e6e6;
    }

    .btn-primary.active::after,
    .btn-warning.active::after,
    .btn-success.active::after,
    .btn-customs.active::after,
    .btn-custom.active::after {
        transform: scaleX(1);
        background-color: #000;
    }

    .btn-primary.active:hover::after,
    .btn-warning.active:hover::after,
    .btn-success.active:hover::after,
    .btn-customs.active:hover::after,
    .btn-custom.active:hover::after {
        background-color: #ccddff;
    }

	.badge.total {
		background-color: white;
		color: #c79cff;
	}

</style>



<a href="<?= base_url(); ?>repair_system/admin/list_all?start_date=<?= isset($_GET['start_date']) ? $_GET['start_date'] :date('Y-m-d', strtotime('-2 month')); ?>
&end_date=<?= isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d'); ?>" class="btn btn-custom<?= !isset($_GET['status']) ? ' active' : ''; ?>" style="background-color: #894bdb; color: white;"> 
    ทั้งหมด
    <span class="badge total">
	<?= isset($total) ? $total : 0; ?>
    </span>
</a>


<a href="<?= base_url(); ?>repair_system/admin/list_all?status=1
&start_date=<?= isset($_GET['start_date']) ? $_GET['start_date'] :date('Y-m-d', strtotime('-2 month')); ?>
&end_date=<?= isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d'); ?>" class="btn btn-warning<?= isset($_GET['status']) && $_GET['status'] == 1 ? ' active' : ''; ?>">
    รอดำเนินการ
    <span class="badge">
        <?= isset($count_case_new) ? $count_case_new : 0; ?>
    </span>
</a>

<a href="<?= base_url(); ?>repair_system/admin/list_all?status=2
&start_date=<?= isset($_GET['start_date']) ? $_GET['start_date'] :date('Y-m-d', strtotime('-2 month')); ?>
&end_date=<?= isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d'); ?>" class="btn btn-primary<?= isset($_GET['status']) && $_GET['status'] == 2 ? ' active' : ''; ?>" style="background-color: #4281ff; color: white;"> 
    กำลังดำเนินงาน
    <span class="badge">
        <?= isset($count_case_wait) ? $count_case_wait : 0; ?>
    </span>
</a>


<a href="<?= base_url(); ?>repair_system/admin/list_all?status=3
&start_date=<?= isset($_GET['start_date']) ? $_GET['start_date'] :date('Y-m-d', strtotime('-2 month')); ?>
&end_date=<?= isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d'); ?>" class="btn btn-success<?= isset($_GET['status']) && $_GET['status'] == 3 ? ' active' : ''; ?>">
    สำเร็จ
    <span class="badge">
        <?= isset($count_case_finish) ? $count_case_finish : 0; ?>
    </span>
</a>

<a href="<?= base_url(); ?>repair_system/admin/list_all?status=4
&start_date=<?= isset($_GET['start_date']) ? $_GET['start_date'] :date('Y-m-d', strtotime('-2 month')); ?>
&end_date=<?= isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d'); ?>" class="btn btn-customs<?= isset($_GET['status']) && $_GET['status'] == 4 ? ' active' : ''; ?>" style="background-color: #c7c7c7; color: white;">
    ยกเลิก
    <span class="badge">
        <?= isset($count_case_cancel) ? $count_case_cancel : 0; ?>
    </span>
</a>


				<br>



		<section class="content">
			<div class="box-body">
				<div class="row">

					<table id="example1" class="table table-bordered table-striped dataTable" role="grid"
						aria-describedby="example1_info">
						<thead>
							<tr role="row" class="info">
									<th tabindex="0" rowspan="1" colspan="1" style="width: 10%; text-align: center;">
										วันเวลา</th>
									<th tabindex="0" rowspan="1" colspan="1" style="width: 15%; text-align: center;">
										ชื่อผู้แจ้งซ่อม</th>
									<th tabindex="0" rowspan="1" colspan="1" style="width: 18%; text-align: center;">
										รายการ</th>
									<th tabindex="0" rowspan="1" colspan="1" style="width: 25%; text-align: center;">
										รายละเอียด</th>
									<!-- <th tabindex="0" rowspan="1" colspan="1" style="width: 25%; text-align: center;">สาเหตุ/วิะ๊</th> -->

									<th tabindex="0" rowspan="1" colspan="1" style="width: 15%; text-align: center;">
										สถานะ</th>
									<th tabindex="0" rowspan="1" colspan="1" style="width: 12%; text-align: center;">
									จัดการ
									</th>
									

								</tr>

						</thead>
						<tbody>
							<?php

								$total_rows = count($data['query']); // นับจำนวนแถวทั้งหมด
								foreach ($data['query'] as $key => $rp_case) {
									$rp_id = @$rp_case->rp_case_id;
									$rp_case_type_name = @$rp_case->rp_name_type;
									$rp_case_name = @$rp_case->rp_case_name;
									$rp_case_detail = @$rp_case->rp_case_detail;
									$user_login = @$rp_case->user_login;

									$rp_case_status = @$rp_case->c_name;
									$rp_add_date = @$rp_case->rp_add_date;
									$formatted_date = date('Y-m-d H:i', strtotime($rp_add_date));
									$rp_update_name = @$rp_case->rp_update_name;

									$rp_case_address = @$rp_case->rp_case_address;
									$rp_update_detail = @$rp_case->rp_update_detail;
									$rp_case_address_detail = @$rp_case->rp_case_address_detail;

									// $rp_name_type = @$rp_case->rp_name_type;

									$rp_case_status_num = @$rp_case->rp_case_status;
									

									$current_row = $total_rows - $key; // หาลำดับของแถวที่ถูกแสดง
								?>
								<tr role="row">
										<td align="center" style="font-size: 12px;">
											<?= $formatted_date; ?>
										</td>
										<td style="font-size: 12px;">
											<?= $rp_case->rp_case_username; ?>
										</td>
										<td style="font-size: 12px;">
											ประเภทงานซ่อม :
											<span style="font-weight: bold;">
												&nbsp;
												<?php echo !empty($rp_case_type_name) ? nl2br($rp_case_type_name) : '-'; ?>
											</span>
											<br><br>
											อุปกรณ์ :
											<span style="font-weight: bold; color: #4fa4ff;">
												&nbsp;
												<?php echo !empty($rp_case_name) ? nl2br($rp_case_name) : '-'; ?>
											</span>
										</td>


										<td style="font-size: 13px;">


											<span style="font-weight: bold;">
												&nbsp;
												<?php echo !empty($rp_case_detail) ? $rp_case_detail : '-'; ?>

											</span>
											<br>
										</td>

										<td align="" style="font-size: 12px;">

											<?php
											$status = $rp_case->c_name;
											if ($status == 'รอดำเนินการ') {
												echo '<span style="color: #ffb24f; font-weight: bold;">' . $status . '</span>';
											} elseif ($status == 'กำลังดำเนินการ') {
												echo '<span style="color: #4669e8; font-weight: bold;">' . $status . '</span>';
											} elseif ($status == 'สำเร็จ') {
												echo '<span style="color: #35b000; font-weight: bold;">' . $status . '</span>';
											} elseif ($status == 'ยกเลิก') {
												echo '<span style="color: #737373; font-weight: bold;">' . $status . '</span>';
											} else {
												echo $status;
											}
											echo "<br>";
											echo "<br>";

											if ($status != 'รอดำเนินการ') {
												echo "ผู้ดำเนินงาน : ";
												echo '<span style="font-weight: bold;">' . $rp_update_name . '</span>';

											}
											?>

											<br>

										</td>



										<td align="center">
											<a href="#" class="" data-toggle="modal" data-target="#popupModal"
												data-username="<?= $rp_case->rp_case_username; ?>"
												data-type="<?= $rp_case_type_name; ?>"
												data-name_case="<?= $rp_case->rp_case_name; ?>"
												data-detail="<?= $rp_case->rp_case_detail; ?>"
												data-tel="<?= $rp_case->rp_case_usertel; ?>"
												data-email="<?= $rp_case->rp_case_useremail; ?>"
												data-add="<?= $rp_case->rp_add_date; ?>"
												data-status="<?= $rp_case->c_name; ?>"
												data-user_login="<?= $rp_case->user_login; ?>"
												data-image="<?= base64_encode($rp_case->image_data); ?>"
												data-mime="<?= $rp_case->image_mime_type; ?>"
												data-address="<?= $rp_case_address; ?>"
												data-rp_case_address_detail="<?= $rp_case_address_detail; ?>"
												data-edit="<?= ($rp_case->rp_edit_date == '0000-00-00 00:00:00' || empty($rp_case->rp_edit_date)) ? '-' : $rp_case->rp_edit_date; ?>"
												data-upname="<?= empty($rp_update_name) ? '-' : $rp_update_name; ?>"
												data-updetail="<?= empty($rp_update_detail) ? '-' : $rp_update_detail; ?>
												
												">

												<i class="fa fa-search" style="color: black;font-size: 15px;"></i>
											</a>
											&nbsp;	&nbsp;


																<a href="#" class="<?= ($rp_case_status_num == 3 || $rp_case_status_num == 4) ? 'disabled-button' : '' ?>" <?php if ($rp_case_status_num != 3 && $rp_case_status_num != 4) { ?> onclick="onEdit(<?= $rp_id ?>)" <?php } ?>>
    <i class="fa fa-edit" style="color: <?= ($rp_case_status_num == 3 || $rp_case_status_num == 4) ? 'grey' : 'black' ?>; font-size: 15px;"></i>
</a>

										</td>

									</tr>
									<?php
								} ?>
								
						</tbody>
					</table>
				</div>
			</div><!-- /.box-body -->

		</section>

	</div>
</div>



<style>
	.system-container {
		border: 2px solid #ccc;
		padding: 10px;
		margin: 10px;
		margin-top: 20px;
		display: inline-block;
		width: 300px;
		position: relative;
		/* เริ่มการใช้งาน Positioning */
	}

	.system-title {
		font-weight: bold;
		position: absolute;
		/* ทำให้หัวข้อเป็น Absolute Position */
		top: -10px;
		/* ย้ายหัวข้อขึ้นเหนือเส้นขอบ */
		left: 10px;
		/* ชิดซ้ายขอบ */
		background-color: #fff;
		/* ตั้งสีพื้นหลังของหัวข้อ */
		padding: 0 10px;
		/* ระยะห่างขอบหัวข้อ */
	}


	/* จัดการระยะห่าง checkbox สถานะ */
	.checkbox-container {
		display: flex;
		flex-wrap: wrap;
		gap: 10px;
		/* ระยะว่างระหว่างตัวเลือก */
	}

	.checkbox-container label {
		margin-right: 50px;
		/* ระยะว่างขวาของตัวเลือก */
	}


	.narrow-select {
		width: 200px;
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


<div class="col-sm-3" style="padding-top: 15px;">

	<div class="box custom-box">

		<section class="content-header">

		<form method="get" action="" style="margin-left: 10px; margin-top:10px;">

			<div>
				<i class="fa fa-users" style="margin-right: 10px; padding: 5px; border-radius: 50%; color: back"></i>

				<strong style="flex: 1; display: inline;">กรองข้อมูล</strong>

			</div>


			<div class="system-container">
				<p class="system-title">ตำแหน่ง</p>

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


			</div>


			<div class="system-container">
				<p class="system-title">สถานะการใข้งาน</p>

<select id="status" name="status" required class="narrow-select">
	<option value="#" <?php echo (empty($_GET['status']) ? 'selected' : ''); ?>>--เลือก--
	</option>
	<?php
	$sql = 'SELECT * FROM user_status_info';
	$query_1 = $this->db->query($sql)->result();

	foreach ($query_1 as $status) {
		$selected = (isset($_GET['status']) && $_GET['status'] == $status->id_status) ? 'selected' : '';
		echo '<option value="' . $status->id_status . '" ' . $selected . '>' . $status->status_name . '</option>';
	}
	?>
</select>

			</div>


			<button class="btn btn-custom-gray btn-lg" style="font-size: 13px;"
	type="submit">ค้นหา</button>


	<br>
	<br>

		</form>
		</section>
	</div>



</div>



<script>

	function onData(id) {

		// alert(id);
		window.location = "<?= base_url(); ?>SuperAdmin/manage_data/" + id;
	}


</script>







<div class="modal fade" id="popupModal" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel1"
	aria-hidden="true">
	<div class="modal-dialog custom-width" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>

				<p class="modal-title" id="popupModalLabel" style="font-size: 20px; color:back;">
					<strong>เพิ่มข้อมูลผู้ใช้งาน</strong>
				</p>
			</div>


			<div class="row" style="margin-top:12px;">
				<div class="col-md-12">

					<div class="col-sm-4 control-label">
						<label><strong class="text-danger">*</strong>ชื่อผู้ใช้งาน : </label>
					</div>

					<div class="col-sm-7">
						<input type="text" id="user_login" name="user_login" placeholder="ชื่อผู้ใช้งาน"
							class="form-control rounded-0 custom-placeholder" value="">
					</div>

				</div>
			</div>

			<div class="row" style="margin-top:12px;">
				<div class="col-md-12">

					<div class="col-sm-4 control-label">
						<label><strong class="text-danger">*</strong>รหัสผ่าน : </label>
					</div>

					<div class="col-sm-7">
						<input type="password" id="user_password_1" name="user_password_1" placeholder="รหัสผ่าน"
							class="form-control rounded-0 custom-placeholder" value="">
					</div>

				</div>
			</div>

			<div class="row" style="margin-top:12px;">
				<div class="col-md-12">

					<div class="col-sm-4 control-label">
						<label><strong class="text-danger">*</strong>ยืนยันรหัสผ่าน : </label>
					</div>

					<div class="col-sm-7">
						<input type="password" id="user_password_2" name="user_password_2" placeholder="ยืนยันรหัสผ่าน"
							class="form-control rounded-0 custom-placeholder" value="">
					</div>

				</div>
			</div>

			<div class="row" style="margin-top:12px;">
				<div class="col-md-12">
					<div class="col-sm-4 control-label">
						<label><strong class="text-danger">*</strong>ชื่อ-นามสกุล : </label>
					</div>
					<div class="col-sm-7">
						<input type="text" id="user_name" name="user_name" placeholder="ชื่อ-นามสกุล"
							class="form-control rounded-0 custom-placeholder" oninput="validateName(this);">
						<small id="nameError" class="text-danger"></small>
					</div>
				</div>
			</div>

			<div class="row" style="margin-top:18px;">
				<div class="col-md-12">
					<div class="col-sm-4 control-label">
						<label><strong class="text-danger">*</strong>เบอร์โทรศัพท์มือถือ : </label>
					</div>
					<div class="col-sm-7">
						<input type="text" id="user_tel" name="user_tel" placeholder="เบอร์โทรศัพท์มือถือ"
							class="form-control rounded-0 custom-placeholder" maxlength="10"
							oninput="validatePhoneNumber(this);">
						<small id="telError" class="text-danger"></small>
					</div>
				</div>
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
						telError.textContent = 'กรุณากรอกเบอร์โทรศัพท์มือถือ 10 หลัก';
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




			<div class="row" style="margin-top:12px;">
				<div class="col-md-12">

					<div class="col-sm-4 control-label">
						<label><strong class="text-danger">*</strong>อีเมล : </label>
					</div>

					<div class="col-sm-7">
						<input type="text" id="user_email" name="user_email" placeholder="อีเมล"
							class="form-control rounded-0 custom-placeholder" value="">
					</div>

				</div>
			</div>




			<div class="row" style="margin-top:12px;">
				<div class="col-md-12">

					<div class="col-sm-4 control-label">
						<label><strong class="text-danger">*</strong>ตำแหน่ง : </label>
					</div>

					<div class="col-sm-7">
						<select id="user_role" name="user_role" required class="form-control">
							<?php
							$sql_role = "SELECT * FROM user_role";
							$result_role = $this->db->query($sql_role)->result();
							echo '<option value="#">--เลือก---</option>';
							foreach ($result_role as $role) {

								$id_role = @$role->id_role;
								$role_name = @$role->role_name;

								echo '<option value="' . $id_role . '">' . $role_name . '</option>';
							}
							?>
						</select>


					</div>

				</div>
			</div>




			<div class="row" style="margin-top:12px;">
				<div class="col-md-12">

					<div class="col-sm-4 control-label">
						<label><strong class="text-danger">*</strong>สถานะระบบแจ้งซ่อม : </label>
					</div>

					<div class="col-sm-7">
						<select id="user_status_repair" name="user_status_repair" required class="form-control">
							<?php
							$sql_repair = "SELECT * FROM user_status_repair";
							$result_repair = $this->db->query($sql_repair)->result();
							echo '<option value="#">--เลือก---</option>';
							foreach ($result_repair as $repair) {

								$id_repair = @$repair->id_repair;
								$name_repair = @$repair->name_repair;

								echo '<option value="' . $id_repair . '">' . $name_repair . '</option>';
							}
							?>
						</select>


					</div>

				</div>
			</div>

			<div class="row" style="margin-top:12px;">
				<div class="col-md-12">

					<div class="col-sm-4 control-label">
						<label><strong class="text-danger">*</strong>สถานะระบบจองรถ : </label>
					</div>

					<div class="col-sm-7">
						<select id="user_status_car" name="user_status_car" required class="form-control">
							<?php
							$sql_role = "SELECT * FROM user_status_car";
							$result_role = $this->db->query($sql_role)->result();
							echo '<option value="#">--เลือก---</option>';
							foreach ($result_role as $role) {

								$id_car = @$role->id_car;
								$role_name = @$role->name_car;

								echo '<option value="' . $id_car . '">' . $role_name . '</option>';
							}
							?>
						</select>


					</div>

				</div>
			</div>

			<div class="row" style="margin-top:12px;">
				<div class="col-md-12">

					<div class="col-sm-4 control-label">
						<label><strong class="text-danger">*</strong>สถานะระบบจองห้องประชุม : </label>
					</div>

					<div class="col-sm-7">
						<select id="user_status_room" name="user_status_room" required class="form-control">
							<?php
							$sql_role = "SELECT * FROM user_status_room";
							$result_role = $this->db->query($sql_role)->result();
							echo '<option value="#">--เลือก---</option>';
							foreach ($result_role as $role) {

								$id_room = @$role->id_room;
								$role_name = @$role->name_room;

								echo '<option value="' . $id_room . '">' . $role_name . '</option>';
							}
							?>
						</select>


					</div>

				</div>
			</div>

			<div class="row" style="margin-top:12px;">
				<div class="col-md-12">

					<div class="col-sm-4 control-label">
						<label><strong class="text-danger">*</strong>สถานะระบบเอกสารการประชุม : </label>
					</div>

					<div class="col-sm-7">
						<select id="user_status_emeeting" name="user_status_emeeting" required class="form-control">
							<?php
							$sql_role = "SELECT * FROM user_status_emeeting";
							$result_role = $this->db->query($sql_role)->result();
							echo '<option value="#">--เลือก---</option>';
							foreach ($result_role as $role) {

								$id_emeeting = @$role->id_emeeting;
								$role_name = @$role->name_emeeting;

								echo '<option value="' . $id_emeeting . '">' . $role_name . '</option>';
							}
							?>
						</select>


					</div>

				</div>
			</div>


			<div class="row" style="margin-top:12px;">
				<div class="col-md-12">

					<div class="col-sm-4 control-label">
						<label><strong class="text-danger">*</strong>สถานะการใข้งานระบบ : </label>
					</div>

					<div class="col-sm-7">
						<select id="user_status_info" name="user_status_info" required class="form-control">
							<?php
							$sql_role = "SELECT * FROM user_status_info";
							$result_role = $this->db->query($sql_role)->result();
							echo '<option value="#">--เลือก---</option>';
							foreach ($result_role as $role) {

								$id_role = @$role->id_status;
								$role_name = @$role->status_name;

								echo '<option value="' . $id_role . '">' . $role_name . '</option>';
							}
							?>
						</select>


					</div>

				</div>
			</div>

			<br>
			<br>


			<div class="form-group">
				<textarea style="display: none;" id="car_id_r" name="car_id_r"
					class="form-control rounded-0"></textarea>
			</div>



			<div class="modal-footer">

				<button type="button" class="btn btn-custom" id="saveChangesButton"
					style="background-color: #4281ff; color:white;" onclick="onAdd()">บันทึกข้อมูล</button>

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
		max-width: 700px;
		/* Set your desired width here */
		width: 90%;
		/* You can use a percentage value if needed */
	}

	.form-control {

		border-radius: 7px;
	}
</style>

<script>

	function onAdd() {

		var user_login = $("#user_login").val();
		var user_password_1 = $("#user_password_1").val();
		var user_password_2 = $("#user_password_2").val();
		var user_name = $("#user_name").val();
		var user_email = $("#user_email").val();
		var user_tel = $("#user_tel").val();

		var user_role = $("#user_role").val();
		var user_status_info = $("#user_status_info").val();
		var user_status_repair = $("#user_status_repair").val();
		var user_status_car = $("#user_status_car").val();
		var user_status_room = $("#user_status_room").val();
		var user_status_emeeting = $("#user_status_emeeting").val();



		if (user_login == "") {
			alert("กรุณากรอกชื่อผู้ใช้งาน");
			$("#user_login").focus();
			return false;
		}

		if (user_password_1 === '') {
			alert('กรุณากรอกรหัวผ่าน');
			$('#user_password_1').focus();
			return false;
		} else if (user_password_2 === '') {
			alert('กรุณายืนยันรหัวผ่าน');
			$('#user_password_2').focus();
			return false;
		} else if (user_password_2 !== user_password_1) {
			alert('รหัสผ่านไม่ตรงกัน');
			$('#user_password_2').focus();
			return false;
		}



		if (user_name == "") {
			alert("กรุณากรอกชื่อ-นามสกุล");
			$("#user_name").focus();
			return false;
		}
		else if (user_tel == "") {
			alert("กรุณากรอกเบอร์โทรศัพท์มือถือ");
			$("#user_tel").focus();
			return false;
		}
		else if (user_email == "") {
			alert("กรุณากรอกอีเมล");
			$("#user_email").focus();
			return false;
		}


		else if (user_role == "#") {
			alert("กรุณาเลือกตำแหน่งการใข้งารระบบ");
			$("#user_role").focus();
			return false;
		}
		else if (user_status_repair == "#") {
			alert("กรุณาเลือกสถานะระบบแจ้งซ่อม");
			$("#user_status_repair").focus();
			return false;
		}
		else if (user_status_car == "#") {
			alert("กรุณาเลือกสถานะระบบจองรถ");
			$("#user_status_car").focus();
			return false;
		}
		else if (user_status_room == "#") {
			alert("กรุณาเลือกสถานะระบบจองห้องประชุม");
			$("#user_status_room").focus();
			return false;
		}
		else if (user_status_emeeting == "#") {
			alert("กรุณาเลือกสถานะระบบเอกสารการประชุม");
			$("#user_status_emeeting").focus();
			return false;
		}
		else if (user_status_info == "#") {
			alert("กรุณาเลือกสถานะการใข้งานระบบ");
			$("#user_status_info").focus();
			return false;
		}

		// alert(user_status_repair);
		// alert(user_status_car);
		// alert(user_status_room);
		// alert(user_status_emeeting);

		var formData = new FormData();
		formData.append('user_login', user_login);
		formData.append('user_password_1', user_password_1);
		formData.append('user_password_2', user_password_2);
		formData.append('user_name', user_name);
		formData.append('user_email', user_email);
		formData.append('user_tel', user_tel);
		formData.append('user_role', user_role);
		formData.append('user_status_info', user_status_info);
		formData.append('user_status_repair', user_status_repair);
		formData.append('user_status_car', user_status_car);
		formData.append('user_status_room', user_status_room);
		formData.append('user_status_emeeting', user_status_emeeting);

		if (confirm("คุณต้องการบันทึกข้อมูลใช่หรือไม่")) {
			$.ajax({
				url: "<?= base_url(); ?>SuperAdmin/Add_user",
				type: 'POST',
				data: formData,
				contentType: false, // ต้องเป็น false เมื่อใช้ FormData
				processData: false, // ต้องเป็น false เมื่อใช้ FormData
				success: function (data) {
					// alert(data);
					$("#btnSave").attr("disabled", true);
					window.location = "<?= base_url(); ?>SuperAdmin/list_user";
				}
			});
			return false;

		}
		return false;


	}



</script>
