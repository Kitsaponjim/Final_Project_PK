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

<div style="display: flex; justify-content: center;">


<div class="col-sm-10" style="padding-top: 15px;">

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

			<!-- <button class="btn btn-custom-gray btn-lg" style="font-size: 13px; margin-left:5px;" onclick="exportToExcel()">ออกรายการ Excel</button> -->


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


<div style="margin-left:30px;">


<a href="<?= base_url(); ?>SuperAdmin/repair_list_all?start_date=<?= isset($_GET['start_date']) ? $_GET['start_date'] :date('Y-m-d', strtotime('-2 month')); ?>
&end_date=<?= isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d'); ?>" class="btn btn-custom<?= !isset($_GET['status']) ? ' active' : ''; ?>" style="background-color: #894bdb; color: white;"> 
    ทั้งหมด
    <span class="badge total">
	<?= isset($total) ? $total : 0; ?>
    </span>
</a>


<a href="<?= base_url(); ?>SuperAdmin/repair_list_all?status=1
&start_date=<?= isset($_GET['start_date']) ? $_GET['start_date'] :date('Y-m-d', strtotime('-2 month')); ?>
&end_date=<?= isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d'); ?>" class="btn btn-warning<?= isset($_GET['status']) && $_GET['status'] == 1 ? ' active' : ''; ?>">
    รอดำเนินการ
    <span class="badge">
        <?= isset($count_case_new) ? $count_case_new : 0; ?>
    </span>
</a>

<a href="<?= base_url(); ?>SuperAdmin/repair_list_all?status=2
&start_date=<?= isset($_GET['start_date']) ? $_GET['start_date'] :date('Y-m-d', strtotime('-2 month')); ?>
&end_date=<?= isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d'); ?>" class="btn btn-primary<?= isset($_GET['status']) && $_GET['status'] == 2 ? ' active' : ''; ?>" style="background-color: #4281ff; color: white;"> 
    กำลังดำเนินงาน
    <span class="badge">
        <?= isset($count_case_wait) ? $count_case_wait : 0; ?>
    </span>
</a>


<a href="<?= base_url(); ?>SuperAdmin/repair_list_all?status=3
&start_date=<?= isset($_GET['start_date']) ? $_GET['start_date'] :date('Y-m-d', strtotime('-2 month')); ?>
&end_date=<?= isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d'); ?>" class="btn btn-success<?= isset($_GET['status']) && $_GET['status'] == 3 ? ' active' : ''; ?>">
    สำเร็จ
    <span class="badge">
        <?= isset($count_case_finish) ? $count_case_finish : 0; ?>
    </span>
</a>

<a href="<?= base_url(); ?>SuperAdmin/repair_list_all?status=4
&start_date=<?= isset($_GET['start_date']) ? $_GET['start_date'] :date('Y-m-d', strtotime('-2 month')); ?>
&end_date=<?= isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d'); ?>" class="btn btn-customs<?= isset($_GET['status']) && $_GET['status'] == 4 ? ' active' : ''; ?>" style="background-color: #c7c7c7; color: white;">
    ยกเลิก
    <span class="badge">
        <?= isset($count_case_cancel) ? $count_case_cancel : 0; ?>
    </span>
</a>


</div>
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
										<td style="font-size: 12px; text-align:left;">
											<?= $rp_case->rp_case_username; ?>
										</td>
										<td style="font-size: 12px; text-align:left;">
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


										<td style="font-size: 13px; text-align:left;">


											<span style="font-weight: bold;">
												&nbsp;
												<?php echo !empty($rp_case_detail) ? $rp_case_detail : '-'; ?>

											</span>
											<br>
										</td>

										<td align="" style="font-size: 12px; text-align:left;">

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

function onEdit(rp_id) {
			window.location = "<?= base_url(); ?>superAdmin/repair_manage_data/" + rp_id;
		}

		// function onEdit(rp_id) {
		// 	window.location = "<?= base_url(); ?>repair_system/repair/manage_data/" + rp_id;
		// }





</script>


<div class="modal fade" id="popupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">

			<div class="modal-content">
				<div class="modal-header">
					<p style="font-size: 20px; background-color: #f2f2f2; padding: 10px; border-radius: 10px;"><i
							class="fa fa-info-circle"></i>
						รายละเอียดรายการแจ้งซ่อม</p>
				</div>

				<div class="modal-body scrollable">
					<div style="font-size: 18px; background-color: #57a2ff; padding: 3px; border-radius: 5px;">
						<i class="fa fa-wrench" style="margin-left:5px;"></i>&nbsp;&nbsp; ข้อมูลแจ้งซ่อม
					</div>


					<table class="table table-bordered">
						<tr>
							<th class="text-left small-cell" style="font-size: 15px;">รายงานแจ้งซ่อม</th>
							<td style="font-size: 15px;">
								ประเภทงานซ่อม : &nbsp;&nbsp;&nbsp;&nbsp; <span style="color: gray;"
									id="popupType"></span><br>
								ชื่ออุปกรณ์ :&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<span style="color: gray;" id="popupName_case"></span><br>
								รายละเอียดปัญหา : &nbsp;&nbsp;<span style="color: gray;" id="popupDetail"></span><br>
							</td>
						</tr>


						<tr>
							<th class="text-left small-cell" style="font-size: 15px;">วันเวลา</th>
							<td style="font-size: 15px;">
								<strong>
									<i class="fa fa-calendar"></i>
								</strong>

								&nbsp;&nbsp;<span id="popupAdd"></span>
								<br>
							</td>
						</tr>


						<tr>
							<th class="text-left small-cell" style="font-size: 15px;">ผู้แจ้งซ่อม</th>
							<td style="font-size: 15px;">
								<strong>
									<i class="fa fa-user"></i>
								</strong>
								&nbsp;&nbsp;<span id="popupUsername"></span>
								<br>


							</td>
						</tr>
						<tr>
							<th class="text-left small-cell" style="font-size: 15px;">ชื่อผู้ใช้งาน</th>
							<td style="font-size: 15px;">
								<strong>
									<i class="fa fa-user"></i>
								</strong>
								&nbsp;&nbsp;<span id="user_login"></span>
								<br>


							</td>
						</tr>
						<tr>
							<th class="text-left small-cell" style="font-size: 15px;">สถานที่</th>
							<td style="font-size: 15px;">
								<strong>
									<i class="fa fa-map-marker"></i>
								</strong>

								&nbsp;&nbsp;<span id="popupAddress"></span>
								&nbsp;&nbsp; ,<span id="rp_case_address_detail"></span>
								<br>
							</td>
						</tr>

						<tr>
							<th class="text-left small-cell" style="font-size: 15px;">ช้อมูลติดต่อ</th>
							<td style="font-size: 15px;">
								<strong>
									<i class="fa fa-phone"></i>
								</strong>

								&nbsp;&nbsp;<span id="popupTel"></span>
								<br>
								<strong>
									<i style="margin-top:10px;" class="fa fa-envelope"></i>
								</strong>

								&nbsp;&nbsp;<span id="popupEmail"></span>
								<br>

							</td>
						</tr>

						<tr>
							<th class="text-left small-cell" style="font-size: 15px;">สถานะ</th>
							<td style="font-size: 15px; margin-left:5px;">
								<span id="popupStatus"></span>
								<br>
							</td>
						</tr>

						<tr>
							<th class="text-left small-cell" style="font-size: 15px;">รูปภาพ </th>
							<td style="font-size: 15px;">

								&nbsp;<span id="popupImage"></span>
								<br>


							</td>
						</tr>
					</table>


					<p style="font-size: 18px; background-color: #2aad2a; padding: 3px; border-radius: 5px; display: none;" id="cancel_detail_title"><i
							class="fa fa-tasks" style="margin-left:5px;"></i> &nbsp;&nbsp;
							ประวัติดำเนินการ</p>
						
					<table class="table table-bordered" id="cancel_table"  style="display: none;">
						<tr>
							<th class="text-left small-cell" style="font-size: 15px;">วันเวลาดำเนินการ</th>
							<td style="font-size: 15px;">
								<strong>
									<i class="fa fa-calendar"></i>
								</strong>

								&nbsp;&nbsp;<span id="popupEdit"></span>

							</td>
						</tr>

						<tr>
							<th class="text-left small-cell" style="font-size: 15px;">ผู้ดำเนินการ</th>
							<td style="font-size: 15px;">
								<strong>
									<i class="fa fa-user"></i>
								</strong>


								&nbsp;&nbsp;<span id="popupUpName"></span>
							</td>
						</tr>
						<tr>
							<th class="text-left small-cell" style="font-size: 15px;">สาเหตุ/วิธีการแก้ไข</th>
							<td style="font-size: 15px;">

								&nbsp;&nbsp;<span id="popupUpDetail"></span>
							</td>
						</tr>
					</table>

				</div>


				<div class="modal-footer">
					<button type="button" style="color: black;" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
				</div>



			</div>
		</div>



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
	</style>

	<script>
		$(document).ready(function () {
			// Function to set the text color based on the data-status value
			function setStatusColor(status) {
				var spanStatus = $('#popupStatus');
				if (status === 'รอดำเนินการ') {
					spanStatus.text(status).css('color', '#ffb24f');
				} else if (status === 'กำลังดำเนินการ') {
					spanStatus.text(status).css('color', '#4669e8');
				} else if (status === 'สำเร็จ') {
					spanStatus.text(status).css('color', '#35b000');
				}
				else if (status === 'ยกเลิก') {
					spanStatus.text(status).css('color', '#737373');
				}
			}

			// Trigger when the modal is about to be shown
			$('#popupModal').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget);
				var username = button.data('username');
				var type = button.data('type');
				var name_case = button.data('name_case');
				var detail = button.data('detail');
				var tel = button.data('tel');
				var email = button.data('email');
				var add = button.data('add');
				var user_login = button.data('user_login');

				var status = button.data('status');
				var image_data = button.data('image');
				var mime_type = button.data('mime');
				var rp_case_address = button.data('address');
				var rp_case_address_detail = button.data('rp_case_address_detail');

				var edit = button.data('edit');
				var rp_update_name = button.data('upname');
				var rp_update_detail = button.data('updetail');

	var cancelTable = $('#cancel_table');
    var cancelDetailSpan = $('#cancel_detail_title');


	if (edit != '-'&& rp_update_name != '-'&& rp_update_detail != '-') {
        cancelTable.show();
        cancelDetailSpan.show();

		$('#popupEdit').text(edit);
		$('#popupUpName').text(rp_update_name);
		$('#popupUpDetail').text(rp_update_detail);


    } else{
		cancelTable.hide();
		cancelDetailSpan.hide();
		$('#popupEdit').text(edit);
		$('#popupUpName').text(rp_update_name);
		$('#popupUpDetail').text(rp_update_detail);

		} 


				setStatusColor(status); // Call the function to set the color based on status

				$('#popupUsername').text(username);
				$('#popupType').text(type);
				$('#popupName_case').text(name_case);
				$('#popupDetail').text(detail);
				$('#popupTel').text(tel);
				$('#popupEmail').text(email);
				$('#popupAdd').text(add);
				$('#user_login').text(user_login);

				$('#popupStatus').text(status);
				$('#popupAddress').text(rp_case_address);
				$('#rp_case_address_detail').text(rp_case_address_detail);

				// $('#popupEdit').text(edit);
				// $('#popupUpName').text(rp_update_name);
				// $('#popupUpDetail').text(rp_update_detail);

				var imgTag = '<img src="data:' + mime_type + ';base64,' + image_data + '" class="img-responsive" style="max-width: 50%; height: auto;">';
				$('#popupImage').html(imgTag);

			});
		});


	


	</script>
