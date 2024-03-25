<?php

$count_case_new = $num_status->count_case_new;
$count_case_wait = $num_status->count_case_wait;
$count_case_finish = $num_status->count_case_finish;
$count_case_cancel = $num_status->count_case_cancel;
$total = $num_status->total;


$user_name = $_SESSION['user_name'];
?>

<div class="content-wrapper">
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


	<section class="content">
		<p
			style="font-size: 20px; background-color: #ffffff; padding: 10px; border-radius: 10px; display: flex; align-items: center;">
			<i class="fa fa-list-alt"
				style="margin-right: 10px; background-color: #b3c3ff; padding: 8px; border-radius: 50%; color: white"></i>
			<strong style="flex: 1; display: inline; ">ประวัติการแจ้งซ่อม


			</strong>
		</p>

		<div class="box custom-box">
			<div class="box-header">

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


				<form method="get" action="" onsubmit="return validateForm()">

					<p
						style="font-size: 15px; background-color: #ffffff; padding: 10px; border-radius: 10px; display: flex; align-items: center;">
						<label for="start_date" style="margin-left:10px;  font-size: 18px;">เลือกวันที่เวลา </label>

						<label for="start_date" style="margin-left:10px; font-size: 18px;">เริ่ม : </label>
						<input type="date" id="start_date" name="start_date" required
							value="<?= isset ($start_date) ? $start_date : date('Y-m-d', strtotime('-3 month')) ?>"
							max="<?= date('Y-m-d') ?>"
							style="border: 1px solid white; border-radius: 5px; padding: 5px; background-color: #e6f7ff; margin-left:10px;">

						<label for="end_date" style="margin-left:10px; font-size: 18px;">สิ้นสุด : </label>
						<input type="date" id="end_date" name="end_date" required
							value="<?= isset ($end_date) ? $end_date : date('Y-m-d', date('Y-m-d')) ?>"
							max="<?= date('Y-m-d') ?>"
							style="border: 1px solid white; border-radius: 5px; padding: 5px; background-color: #e6f7ff; margin-left:10px;">

						<button class="btn btn-custom-gray btn-lg"
							style="font-size: 13px; margin-left:20px; font-size: 16px;" type="submit">ค้นหา</button>

						<button class="btn btn-custom-gray btn-lg"
							style="font-size: 13px; margin-left:5px;  font-size: 16px;"
							onclick="exportToExcel()">ออกรายการ Excel</button>
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



				<a href="<?= base_url(); ?>repair_system/admin/list_repair?start_date=<?= isset ($_GET['start_date']) ? $_GET['start_date'] : date('Y-m-d', strtotime('-3 month')); ?>
&end_date=<?= isset ($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d'); ?>
&id=<?= $id; ?>" class="btn btn-custom<?= !isset ($_GET['status']) ? ' active' : ''; ?>"
					style="background-color: #894bdb; color: white;  font-size: 16px;">
					ทั้งหมด

					<span class="badge total">
						<?= isset ($total) ? $total : 0; ?>
					</span>
				</a>


				<a href="<?= base_url(); ?>repair_system/admin/list_repair?status=1
&start_date=<?= isset ($_GET['start_date']) ? $_GET['start_date'] : date('Y-m-d', strtotime('-3 month')); ?>
&end_date=<?= isset ($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d'); ?>
&id=<?= $id; ?>" class="btn btn-warning<?= isset ($_GET['status']) && $_GET['status'] == 1 ? ' active' : ''; ?>"
					style="font-size: 16px;">
					รอดำเนินการ
					<span class="badge">
						<?= isset ($count_case_new) ? $count_case_new : 0; ?>
					</span>
				</a>

				<a href="<?= base_url(); ?>repair_system/admin/list_repair?status=2
&start_date=<?= isset ($_GET['start_date']) ? $_GET['start_date'] : date('Y-m-d', strtotime('-3 month')); ?>
&end_date=<?= isset ($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d'); ?>
&id=<?= $id; ?>" class="btn btn-primary<?= isset ($_GET['status']) && $_GET['status'] == 2 ? ' active' : ''; ?>"
					style="background-color: #4281ff; color: white; font-size: 16px;">
					กำลังดำเนินงาน
					<span class="badge">
						<?= isset ($count_case_wait) ? $count_case_wait : 0; ?>
					</span>
				</a>


				<a href="<?= base_url(); ?>repair_system/admin/list_repair?status=3
&start_date=<?= isset ($_GET['start_date']) ? $_GET['start_date'] : date('Y-m-d', strtotime('-3 month')); ?>
&end_date=<?= isset ($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d'); ?>
&id=<?= $id; ?>" class="btn btn-success<?= isset ($_GET['status']) && $_GET['status'] == 3 ? ' active' : ''; ?>"
					style="font-size: 16px;">
					สำเร็จ
					<span class="badge">
						<?= isset ($count_case_finish) ? $count_case_finish : 0; ?>
					</span>
				</a>

				<a href="<?= base_url(); ?>repair_system/admin/list_repair?status=4
&start_date=<?= isset ($_GET['start_date']) ? $_GET['start_date'] : date('Y-m-d', strtotime('-3 month')); ?>
&end_date=<?= isset ($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d'); ?>
&id=<?= $id; ?>" class="btn btn-customs<?= isset ($_GET['status']) && $_GET['status'] == 4 ? ' active' : ''; ?>"
					style="background-color: #c7c7c7; color: white; font-size: 16px;">
					ยกเลิก
					<span class="badge">
						<?= isset ($count_case_cancel) ? $count_case_cancel : 0; ?>
					</span>
				</a>

				<br>

			</div>

			<div class="box-body">
				<div class="row">

					<div class="col-sm-12">

						<table id="example1" class="table table-silver table-bordered table-striped dataTable"
							role="grid" aria-describedby="example1_info" style="font-size: 16px;">

							<thead>
								<tr role="row" class="info">
									<th tabindex="0" rowspan="1" colspan="1" style="width: 12%; text-align: center;">
										วันเวลา</th>
									<th tabindex="0" rowspan="1" colspan="1" style="width: 17%; text-align: center;">
										ชื่อผู้แจ้งซ่อม</th>
									<th tabindex="0" rowspan="1" colspan="1" style="width: 18%; text-align: center;">
										รายการ</th>
									<th tabindex="0" rowspan="1" colspan="1" style="width: 23%; text-align: center;">
										รายละเอียด</th>
									<!-- <th tabindex="0" rowspan="1" colspan="1" style="width: 25%; text-align: center;">สาเหตุ/วิะ๊</th> -->

									<th tabindex="0" rowspan="1" colspan="1" style="width: 13%; text-align: center;">
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

									$rp_case_status = @$rp_case->c_name;
									$rp_add_date = @$rp_case->rp_add_date;
									$formatted_date = date('Y-m-d H:i', strtotime($rp_add_date));
									$rp_update_name = @$rp_case->rp_update_name;

									$rp_case_address = @$rp_case->rp_case_address;
									$rp_case_address_detail = @$rp_case->rp_case_address_detail;
									$rp_update_detail = @$rp_case->rp_update_detail;

									$rp_case_status_num = @$rp_case->rp_case_status;


									$rp_update_other = @$rp_case->rp_update_other;



									$current_row = $total_rows - $key; // หาลำดับของแถวที่ถูกแสดง
									?>
									<tr role="row">
										<td align="center" style="font-size: 15px;">
											<?= $formatted_date; ?>
										</td>
										<td style="font-size: 15px;">
											<?= $rp_case->rp_case_username; ?>
										</td>
										<td style="font-size: 15px;">
											ประเภทงานซ่อม :
											<span style="font-weight: bold;">
												&nbsp;
												<?php echo !empty ($rp_case_type_name) ? nl2br($rp_case_type_name) : '-'; ?>
											</span>
											<br><br>
											อุปกรณ์ :
											<span style="font-weight: bold; color: #4fa4ff;">
												&nbsp;
												<?php echo !empty ($rp_case_name) ? nl2br($rp_case_name) : '-'; ?>
											</span>
										</td>

										<td style="font-size: 15px;">

											<span style="font-weight: bold;">
												&nbsp;
												<?php echo !empty ($rp_case_detail) ? $rp_case_detail : '-'; ?>

											</span>
											<br>
										</td>

										<td align="" style="font-size: 15px;">

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
												data-image="<?= base64_encode($rp_case->image_data); ?>"
												data-mime="<?= $rp_case->image_mime_type; ?>"
												data-address="<?= $rp_case_address; ?>"
												data-rp_update_other="<?= $rp_update_other; ?>"
												data-rp_case_address_detail="<?= $rp_case_address_detail; ?>"
												data-edit="<?= ($rp_case->rp_edit_date == '0000-00-00 00:00:00' || empty ($rp_case->rp_edit_date)) ? '-' : $rp_case->rp_edit_date; ?>"
												data-upname="<?= empty ($rp_update_name) ? '-' : $rp_update_name; ?>"
												data-updetail="<?= empty ($rp_update_detail) ? '-' : $rp_update_detail; ?>
												
												">
												<i class="fa fa-search"
													style="color: black;font-size: 18px; margin-top:16px;"></i>
											</a>
											&nbsp; &nbsp;

											<a href="#"
												class="<?= ($rp_case_status_num == 2 || $rp_case_status_num == 3 || $rp_case_status_num == 4) ? 'disabled-button' : '' ?>"
												<?php if ($rp_case_status_num != 3 && $rp_case_status_num != 4 && $rp_case_status_num != 2): ?> onclick="onEdit(<?= $rp_id ?>, <?= $id ?>)"
												<?php endif; ?>>
												<i class="fa fa-edit" style="color: <?= ($rp_case_status_num == 2 || $rp_case_status_num == 3 || $rp_case_status_num == 4) ? 'grey' : 'black' ?>;
			 font-size: 18px;"></i>
											</a>

											<!-- 
											&nbsp; &nbsp;
											<a href="#" class="" onclick="onDel(<?= $rp_id ?>)">
												<i class="fa fa-trash" style="color: black; font-size: 18px;"></i>
											</a> -->

											&nbsp; &nbsp;

											<a href="#"
												class="<?= ($rp_case_status_num == 2 || $rp_case_status_num == 3 || $rp_case_status_num == 4) ? 'disabled-button' : '' ?>"
												<?php if ($rp_case_status_num != 3 && $rp_case_status_num != 4 && $rp_case_status_num != 2) { ?> onclick="onDel(<?= $rp_id ?>)" <?php } ?>>
												<i class="fa fa-trash"
													style="color: <?= ($rp_case_status_num == 3 || $rp_case_status_num == 4 || $rp_case_status_num == 2) ? 'grey' : 'black' ?>; font-size: 18px;"></i>
											</a>




										</td>

									</tr>
									<?php
								} ?>

							</tbody>
						</table>
					</div>
				</div>
			</div>


		</div>




	</section>

	<style>
		.table {
			width: 100%;
			/* ปรับความกว้างตาราง */
			background-color: #fff;
			/* สีพื้นหลังของตาราง */
			color: #333;
			/* สีตัวอักษร */
		}

		.table-bordered th,
		.table-bordered td {
			border: 1px solid #ddd;
			/* ขอบเส้นขอบของเซลล์ */
			padding: 8px;
			/* ระยะห่างของเนื้อหาภายในเซลล์ */
		}

		.table-bordered th {
			background-color: #f2f2f2;
			/* สีพื้นหลังของหัวข้อคอลัมน์ */


		}

		.table-bordered th.text-left {
			text-align: left;
		}

		.small-cell {
			width: 25%;
			max-width: 150px;
			/* หรือค่าที่คุณต้องการ */
		}
	</style>

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


					<p style="font-size: 18px; background-color: #2aad2a; padding: 3px; border-radius: 5px; display: none;"
						id="cancel_detail_title"><i class="fa fa-tasks" style="margin-left:5px;"></i> &nbsp;&nbsp;
						ประวัติดำเนินการ</p>

					<!-- <table class="table table-bordered" id="cancel_table" style="display: none;">
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
					</table> -->
					<table class="table table-bordered" id="cancel_table" style="display: none; margin-top: -10px;">
		
		<tr>
			<!-- <th class="text-left small-cell" style="font-size: 15px;">ประวัติการดำเนินการ</th> -->
			<td style="font-size: 13px;">

				&nbsp;&nbsp;<span id="rp_update_other"></span>
			</td>
		</tr>
	</table>


				</div>


				<div class="modal-footer">
					<button type="button" style="color: black;font-size:16px;" class="btn btn-secondary"
						data-dismiss="modal">ปิด</button>
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


				if (edit != '-' && rp_update_name != '-' && rp_update_detail != '-') {
					cancelTable.show();
					cancelDetailSpan.show();

					$('#popupEdit').text(edit);
					$('#popupUpName').text(rp_update_name);
					$('#popupUpDetail').text(rp_update_detail);


				} else {
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

				$('#popupStatus').text(status);
				$('#popupAddress').text(rp_case_address);
				$('#rp_case_address_detail').text(rp_case_address_detail);


				var rp_update_other = button.data('rp_update_other');
				$('#rp_update_other').empty(); // Clear any previous data

				var data_sets = rp_update_other.split(' / '); // Split the data into sets using '/'
				var table = $('<table></table>').addClass('table table-bordered'); // Create a new table element

				data_sets.forEach(function (data_set, index) {
					// Check if it's not the last data set
					if (index !== data_sets.length - 1) {
						var tr = $('<tr></tr>'); // Create a new table row element

						// Split the data set into parts using ', '
						var split_data = data_set.split(', ');

						// Get the status text based on the status code
						var status = getStatusText(split_data[0]);

						// Concatenate the status text with the rest of the data
						var formatted_data = (index + 1) + '. <strong> สถานะ : </strong> ' + status + ', <strong> วันที่ดำเนินการ : </strong> ' + split_data[3] + ', <strong> ผู้ดำเนินการ : </strong> ' + split_data[2] + ', <strong> วิธีการแก้ไข : </strong> ' + split_data[1];

						// Create a new table data element and set the text
						var td = $('<td></td>').css('font-size', '15px').html(formatted_data);

						// Append the table data element to the table row
						tr.append(td);

						// Append the table row to the table
						table.append(tr);
					}
				});

				$('#rp_update_other').append(table); // Append the table to the rp_update_other element

				function getStatusText(statusCode) {
					switch (statusCode) {
						case '1':
							return '<span style="color: #ffb24f;">รอดำเนินการ</span>';
						case '2':
							return '<span style="color: #4669e8;">กำลังดำเนินการ</span>';
						case '3':
							return '<span style="color: #35b000;">สำเร็จ</span>';
						case '4':
							return '<span style="color: #737373;">ยกเลิก</span>';
						default:
							return '<span style="color: #000000;">ไม่ทราบสถานะ</span>';
					}
				}



				// $('#popupEdit').text(edit);
				// $('#popupUpName').text(rp_update_name);
				// $('#popupUpDetail').text(rp_update_detail);

				var imgTag = '<img src="data:' + mime_type + ';base64,' + image_data + '" class="img-responsive" style="max-width: 50%; height: auto;">';
				$('#popupImage').html(imgTag);

			});
		});




		function onEdit(rp_id, id) {
			window.location = "<?= base_url(); ?>repair_system/admin/manage_data/" + rp_id + "/" + id;
		}


	</script>


	<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>

	<script>
		function exportToExcel() {

			const selectedMonth = document.getElementById('start_date').value;
			const selectedMonthEnd = document.getElementById('end_date').value;

			console.log("Selected Start Date:", selectedMonth);
			console.log("Selected End Date:", selectedMonthEnd);

			var table = document.getElementById("example1");

			var clonedTable = document.createElement('table');
			clonedTable.className = table.className;

			for (var i = 0; i < table.rows.length; i++) {
				var newRow = clonedTable.insertRow();
				for (var j = 0; j < 5; j++) {
					var cell = newRow.insertCell();
					if (table.rows[i].cells[j]) {
						cell.innerHTML = table.rows[i].cells[j].innerHTML;
					}
				}
			}

			var ws = XLSX.utils.table_to_sheet(clonedTable);

			XLSX.utils.sheet_add_aoa(ws, [
				['รายงานการทำงานปี ' + getFormattedDate(new Date()), 'เดือนเริ่มต้น ' + selectedMonth, 'สิ้นสุด ' + selectedMonthEnd],
				['ชื่อผู้ออกรายการ', '<?php echo $user_name; ?>']
			], { origin: -1 });


			var wb = XLSX.utils.book_new();
			XLSX.utils.book_append_sheet(wb, ws, "Sheet1");

			var fileName = "ประวัติการแจ้งซ่อม_" + getFormattedDate(new Date()) + "เริ่ม" + selectedMonth + "ถึง" + selectedMonthEnd + ".xlsx";


			console.log("Generated Filename:", fileName);

			XLSX.writeFile(wb, fileName);
		}

		function getFormattedDate(date) {
			return date.toLocaleDateString('th-TH', {
				day: 'numeric',
				month: 'long',
				year: 'numeric'
			});
		}



		function onDel(rp_id) {
    // alert(rp_id);
    if (confirm("คุณต้องการลบรายการแจ้งซ่อมใช่หรือไม่")) {
        $.ajax({
            url: "<?= base_url('repair_system/admin/del_repair'); ?>",
            type: 'POST',
            data: { rp_id: rp_id },
            success: function (data) {
                // alert(data);
                $("#btnSave").attr("disabled", true);
                window.location = "<?= base_url('repair_system/admin/list_repair'); ?>";
            }
        });
    }
}

		// function onDel(rp_id) {

		// 	// if (confirm("คุณต้องการลบรายการแจ้งซ่อมใช่หรือไม่")) {

		// 	// 	window.location = "<?= base_url(); ?>repair_system/admin/del_repair/" + rp_id;
		// 	// }

		// 	if (confirm("คุณต้องการบันทึกข้อมูลใช่หรือไม่")) {
		// 		var pmeters = 'rp_id=' + <?= $rp_id ?>;
		// 		pmeters = pmeters.replace("undefined", "");

		// 		$.ajax({
		// 			url: "<?= base_url(); ?>repair_system/admin/del_repair",
		// 			type: 'POST',
		// 			data: pmeters,
		// 			async: false,
		// 			success: function (data) {
		// 				$("#btnSave").attr("disabled", true);
		// 				window.location = "<?= base_url(); ?>repair_system/admin/list_repair";
		// 			}
		// 		});
		// 		return false;

		// 	}



		// }



	</script>
