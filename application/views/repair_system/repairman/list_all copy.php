<?php

$count_case_new = $num_status->count_case_new;
$count_case_wait = $num_status->count_case_wait;
$count_case_finish = $num_status->count_case_finish;
$count_case_cancel = $num_status->count_case_cancel;
$total = $num_status->total;
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
			<strong style="flex: 1; display: inline;">รายการแจ้งซ่อมทั้งหมด
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
						<label for="start_date" style="margin-left:10px;">เลือกวันที่เวลา </label>

						<label for="start_date" style="margin-left:10px;">เริ่ม : </label>
						<input type="date" id="start_date" name="start_date" required
							value="<?= isset($_GET['start_date']) ? $_GET['start_date'] : date('Y') . '-01-01' ?>"
							max="<?= date('Y-m-d') ?>"
							style="border: 1px solid white; border-radius: 5px; padding: 5px; background-color: #e6f7ff; margin-left:10px;">

						<label for="end_date" style="margin-left:10px;">สิ้นสุด : </label>
						<input type="date" id="end_date" name="end_date" required
							value="<?= isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d') ?>"
							max="<?= date('Y-m-d') ?>"
							style="border: 1px solid white; border-radius: 5px; padding: 5px; background-color: #e6f7ff; margin-left:10px;">

						<button class="btn btn-custom-gray btn-lg" style="font-size: 13px; margin-left:20px;"
							type="submit">ค้นหา</button>
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



<a href="<?= base_url(); ?>repair_system/repairman/list_all?start_date=<?= isset($_GET['start_date']) ? $_GET['start_date'] : date('Y') . '-01-01'; ?>
&end_date=<?= isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d'); ?>" class="btn btn-custom<?= !isset($_GET['status']) ? ' active' : ''; ?>" style="background-color: #c79cff; color: white;"> 
    ทั้งหมด
    <span class="badge total">
	<?= isset($total) ? $total : 0; ?>
    </span>
</a>



<a href="<?= base_url(); ?>repair_system/repairman/list_all?status=1
&start_date=<?= isset($_GET['start_date']) ? $_GET['start_date'] : date('Y') . '-01-01'; ?>
&end_date=<?= isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d'); ?>" class="btn btn-warning<?= isset($_GET['status']) && $_GET['status'] == 1 ? ' active' : ''; ?>">
    รอดำเนินการ
    <span class="badge">
        <?= isset($count_case_new) ? $count_case_new : 0; ?>
    </span>
</a>

<a href="<?= base_url(); ?>repair_system/repairman/list_all?status=2
&start_date=<?= isset($_GET['start_date']) ? $_GET['start_date'] : date('Y') . '-01-01'; ?>
&end_date=<?= isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d'); ?>" class="btn btn-primary<?= isset($_GET['status']) && $_GET['status'] == 2 ? ' active' : ''; ?>" style="background-color: #4281ff; color: white;"> 
    กำลังดำเนินงาน
    <span class="badge">
        <?= isset($count_case_wait) ? $count_case_wait : 0; ?>
    </span>
</a>


<a href="<?= base_url(); ?>repair_system/repairman/list_all?status=3
&start_date=<?= isset($_GET['start_date']) ? $_GET['start_date'] : date('Y') . '-01-01'; ?>
&end_date=<?= isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d'); ?>" class="btn btn-success<?= isset($_GET['status']) && $_GET['status'] == 3 ? ' active' : ''; ?>">
    สำเร็จ
    <span class="badge">
        <?= isset($count_case_finish) ? $count_case_finish : 0; ?>
    </span>
</a>

<a href="<?= base_url(); ?>repair_system/repairman/list_all?status=4
&start_date=<?= isset($_GET['start_date']) ? $_GET['start_date'] : date('Y') . '-01-01'; ?>
&end_date=<?= isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d'); ?>" class="btn btn-customs<?= isset($_GET['status']) && $_GET['status'] == 4 ? ' active' : ''; ?>" style="background-color: #c7c7c7; color: white;">
    ยกเลิก
    <span class="badge">
        <?= isset($count_case_cancel) ? $count_case_cancel : 0; ?>
    </span>
</a>


				<br>

			</div>

			<div class="box-body">
				<div class="row">

					<div class="col-sm-12">

						<table id="example1" class="table table-silver table-bordered table-striped dataTable"
							role="grid" aria-describedby="example1_info style=" text-align: center;">
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
									// $rp_name_type = @$rp_case->rp_name_type;

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
												data-edit="<?= ($rp_case->rp_edit_date == '0000-00-00 00:00:00' || empty($rp_case->rp_edit_date)) ? '-' : $rp_case->rp_edit_date; ?>"
												data-upname="<?= empty($rp_update_name) ? '-' : $rp_update_name; ?>"
												data-updetail="<?= empty($rp_update_detail) ? '-' : $rp_update_detail; ?>
												
												">

												<i class="fa fa-search" style="color: black;font-size: 15px;"></i>
											</a>
											&nbsp;	&nbsp;
											<a href="#" class="" onclick="onEdit(<?= $rp_id ?>)">
												<i class="fa fa-edit" style="color: black; font-size: 15px;"></i>
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


		<!-- เพิ่ม xlsx library -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>


		<!-- เพิ่มรหัสสคริปต์สำหรับสร้างไฟล์ Excel -->

		<script>

			function exportToExcel() {
				const table = document.getElementById('example1');
				const ws = XLSX.utils.table_to_sheet(table);

				// เพิ่มข้อมูล "รายการแจ้งซ่อม" ในแถวสุดท้ายของ Sheet
				XLSX.utils.sheet_add_aoa(ws, [['รายการแจ้งซ่อม']], { origin: -1 });

				// ดึงค่า year, month, month_end ที่เลือกมา
				const selectedYear = document.getElementById('year').value;
				const selectedMonth = document.getElementById('month').value;
				const selectedMonthEnd = document.getElementById('month_end').value;

				// กำหนดข้อมูลเดือนภาษาไทย
				const thaiMonths = {
					'01': 'มกราคม',
					'02': 'กุมภาพันธ์',
					'03': 'มีนาคม',
					'04': 'เมษายน',
					'05': 'พฤษภาคม',
					'06': 'มิถุนายน',
					'07': 'กรกฎาคม',
					'08': 'สิงหาคม',
					'09': 'กันยายน',
					'10': 'ตุลาคม',
					'11': 'พฤศจิกายน',
					'12': 'ธันวาคม'
				};

				// กำหนดให้เป็น "-" ในกรณีที่มีการเลือกค่าเป็น "#"
				const displayYear = (selectedYear === '#') ? '-' : selectedYear;
				const displayMonth = (selectedMonth === '#') ? '-' : thaiMonths[selectedMonth];
				const displayMonthEnd = (selectedMonthEnd === '#') ? '-' : thaiMonths[selectedMonthEnd];


				// สร้างวันที่ปัจจุบัน
				const currentDate = new Date();
				const formattedDate = currentDate.toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });



				// เพิ่มข้อมูล "รายงานการทำงานปี" และ "เดือนเริ่มต้น - สิ้นสุด"
				XLSX.utils.sheet_add_aoa(ws, [['รายงานการทำงานปี_วันที่ออกรายการ: ' + formattedDate + ' ' + displayYear, 'เดือนเริ่มต้น ' + displayMonth, 'สิ้นสุด ' + displayMonthEnd]], { origin: -1 });

				const wb = XLSX.utils.book_new();
				XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');

				// ตั้งชื่อไฟล์

				const fileNameSuffix = (selectedMonthEnd === '-' || displayMonth === '-') ? '' : `-${displayMonthEnd}`;
				// const fileNameSuffix = (selectedMonthEnd == '-') ? '' : `-${displayMonthEnd}`;
				const fileName = `รายการแจ้งซ่อม_${displayMonth}${fileNameSuffix}${displayYear}.xlsx`;


				XLSX.writeFile(wb, fileName);
			}



		</script>






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

	<!-- Modal -->
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
									<i class="fa fa-envelope"></i>
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


					<p style="font-size: 18px; background-color: #2aad2a; padding: 3px; border-radius: 5px;"><i
							class="fa fa-tasks" style="margin-left:5px;"></i> &nbsp;&nbsp;
							ประวัติดำเนินการ</p>
						
					<table class="table table-bordered">
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
					<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
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

				var edit = button.data('edit');
				var rp_update_name = button.data('upname');
				var rp_update_detail = button.data('updetail');

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

				$('#popupEdit').text(edit);
				$('#popupUpName').text(rp_update_name);
				$('#popupUpDetail').text(rp_update_detail);

				var imgTag = '<img src="data:' + mime_type + ';base64,' + image_data + '" class="img-responsive" style="max-width: 50%; height: auto;">';
				$('#popupImage').html(imgTag);

			});
		});


		function onEdit(rp_id) {
			window.location = "<?= base_url(); ?>repair_system/repair/manage_data/" + rp_id;
		}

	</script>
