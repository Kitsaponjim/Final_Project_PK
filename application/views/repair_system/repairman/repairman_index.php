<?php

$count_case_new = $num_status->count_case_new;
$count_case_wait = $num_status->count_case_wait;
$count_case_finish = $num_status->count_case_finish;
$count_case_cancel = $num_status->count_case_cancel;

?>


<div class="content-wrapper">
	<section class="content">
		<p
			style="font-size: 20px; background-color: #ffffff; padding: 10px; border-radius: 10px; display: flex; align-items: center;">

			<i class="fa fa-list-alt"
				style="margin-right: 10px; background-color: #b3c3ff; padding: 8px; border-radius: 50%; color: white"></i>

			<strong style="flex: 1; display: inline;">รายการแจ้งซ่อม</strong>
		</p>


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

<p style="font-size: 15px; background-color: #ffffff; padding: 10px; border-radius: 10px; display: flex; align-items: center;">
	<label for="start_date" style="margin-left:10px;font-size: 18px;">เลือกวันที่เวลา </label>

	<label for="start_date" style="margin-left:10px;font-size: 18px;">เริ่ม : </label>
	<input type="date" id="start_date" name="start_date" required
		   value="<?= isset($_GET['start_date']) ? $_GET['start_date'] : date('Y-m-d', strtotime('-3 month')) ?>"
		   max="<?= date('Y-m-d') ?>"
		   style="border: 1px solid white; border-radius: 5px; padding: 5px; background-color: #e6f7ff; margin-left:10px;">

	<label for="end_date" style="margin-left:10px;font-size: 18px;">สิ้นสุด : </label>
	<input type="date" id="end_date" name="end_date" required
       value="<?= isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d') ?>"
       max="<?= date('Y-m-d') ?>"
       style="border: 1px solid white; border-radius: 5px; padding: 5px; background-color: #e6f7ff; margin-left:10px;">

	<button class="btn btn-custom-gray btn-lg" style="font-size: 15px; margin-left:20px;" type="submit">ค้นหา</button>
	<strong style="flex: 1; display: inline;"></strong>
</p>

</form>



		<div class="container-fluid">

			<div class="row">
				<style>
					.small-box {
						color: white;
					}

					.small-box.bg-new {
						background-color: #4669e8;

					}

					.small-box.bg-doing {
						background-color: orange;

					}

					.small-box.bg-finish {
						background-color: green;

					}

					.small-box.bg-cancel {
						background-color: red;

					}

					/* CSS สำหรับเปลี่ยนรูปแบบมุมของกล่องเป็นสี่เหลี่ยมโค้ง */
					.small-box {
						border-radius: 10px;
						/* ปรับค่าตามต้องการ */
						overflow: hidden;
						/* จัดการขอบเขตของเนื้อหาในกรอบ */
					}

					/* สีพื้นหลังและสีตัวอักษรของกล่อง */
					.small-box.bg-new {
						background-color: #4669e8;
					}

					.square-icon {
						width: 30px;
						height: 30px;
						background-color: #e9d4ff;
						color: #a14aff;
						border-radius: 5px;
						display: flex;
						align-items: center;
						justify-content: center;
						font-size: 16px;
						font-weight: bold;
					}



					/* style กำหนดกบ่องใส่ข้อมูลสี่เหลี่ยมโค้ง */
					.custom-box {
						background-color: white;
						border-radius: 10px;
						box-shadow: none;
						border-top: solid white;
						/* กำหนดสีขอบด้านบนเป็นสีขาว */
					}

					.icon i {
						font-size: 70px;
						margin-top: 13px;
					}


					.mt-4 {
						margin-top: 16px;
						/* 1rem = 16px */
					}
				</style>

				<div class="mt-4 col-lg-3 col-6">
					<div class="small-box" style="background-color: #ffb24f; border-radius: 5px;">
						<div class="inner" style="font-size: 25px">

							<strong>
								รอดำเนินการ
								<?= isset($count_case_new) ? $count_case_new : 0; ?>
							</strong>
						</div>
						<div class="icon">
							<i class="fa fa-wrench"></i>
						</div>

						<br>
						<a href="<?= base_url(); ?>repair_system/repairman/list_all?status=1&start_date=<?= isset($_GET['start_date']) ? $_GET['start_date'] : ''; ?>&end_date=<?= isset($_GET['end_date']) ? $_GET['end_date'] : ''; ?>"
							class="small-box-footer rounded-0">
							ดูเพิ่มเติม <i class="fa fa-arrow-right"></i>
						</a>
					</div>
				</div>


				<div class="mt-4 col-lg-3 col-6">
					<div class="small-box" style="background-color: #4281ff; border-radius: 5px;">
						<div class="inner" style="font-size: 25px">

							<strong>
								กำลังดำเนินการ
								<?= isset($count_case_wait) ? $count_case_wait : 0; ?>
							</strong>
						</div>
						<div class="icon">
							<i class="fa fa-spinner"></i>
						</div>
						<br>

						<a href="<?= base_url(); ?>repair_system/repairman/list_all?status=2&start_date=<?= isset($_GET['start_date']) ? $_GET['start_date'] : ''; ?>&end_date=<?= isset($_GET['end_date']) ? $_GET['end_date'] : ''; ?>"
							class="small-box-footer rounded-0">
							ดูเพิ่มเติม <i class="fa fa-arrow-right"></i>
						</a>

					</div>
				</div>


				<div class="mt-4 col-lg-3 col-6">
					<div class="small-box" style="background-color: #78d654; border-radius: 5px;">
						<div class="inner" style="font-size: 25px">

							<strong>
								สำเร็จ
								<?= isset($count_case_finish) ? $count_case_finish : 0; ?>
							</strong>
						</div>
						<div class="icon">
							<i class="fa fa-check-circle"></i>
						</div>
						<br>
						<a href="<?= base_url(); ?>repair_system/repairman/list_all?status=3&start_date=<?= isset($_GET['start_date']) ? $_GET['start_date'] : ''; ?>&end_date=<?= isset($_GET['end_date']) ? $_GET['end_date'] : ''; ?>"
							class="small-box-footer rounded-0">
							ดูเพิ่มเติม <i class="fa fa-arrow-right"></i>
						</a>
					</div>
				</div>

				<div class="mt-4 col-lg-3 col-6">
					<div class="small-box" style="background-color: #c7c7c7; border-radius: 5px;">
						<div class="inner" style="font-size: 25px">

							<strong>
								ยกเลิก
								<?= isset($count_case_cancel) ? $count_case_cancel : 0; ?>
							</strong>
						</div>
						<div class="icon">
							<i class="fa fa-ban"></i>
						</div>
						<br>
						<a href="<?= base_url(); ?>repair_system/repairman/list_all?status=4&start_date=<?= isset($_GET['start_date']) ? $_GET['start_date'] : ''; ?>&end_date=<?= isset($_GET['end_date']) ? $_GET['end_date'] : ''; ?>"
							class="small-box-footer rounded-0">
							ดูเพิ่มเติม <i class="fa fa-arrow-right"></i>
						</a>

					</div>
				</div>





			</div>
		</div>
		<!-- 

		<p
			style="font-size: 20px; background-color: #ffffff; padding: 10px; border-radius: 10px; display: flex; align-items: center;">

			<i class="fa fa-list-alt"
				style="margin-right: 10px; background-color: #b3c3ff; padding: 8px; border-radius: 50%; color: white"></i>

			<strong style="flex: 1; display: inline;">รายการรดำเนินการ</strong>
		</p> -->



		<div class="box custom-box">
			<div class="box-body">

				<div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
					<div class="row">

						<div class="col-sm-7">
							<p
								style="font-size: 18px; background-color: #f2f2f2; padding: 10px; border-radius: 10px; display: flex; align-items: center;">


								<i class="fa fa-bar-chart"
									style="margin-right: 10px; background-color: #b3c3ff; padding: 8px; border-radius: 50%; color: white"
									aria-hidden="true"></i>

								<strong> กราฟแสดงงานซ่อมที่ รอดำเนินการ</strong>
							</p>



							<div id="chart_div" style="width: 100%; height: 200px;"></div>
						</div>

						<div class=" col-sm-5">


							<p
								style="font-size: 18px; background-color: #f2f2f2; padding: 10px; border-radius: 10px; display: flex; align-items: center;">

								<i class="fa fa-list"
									style="margin-right: 10px; background-color: #b3c3ff; padding: 8px; border-radius: 50%; color: white"></i>
								<strong> งานซ่อมที่ รอดำเนินการ</strong>
							</p>





							<table id="table1" class="table table-bordered table-striped" role="grid"
								aria-describedby="example1_info">
								<thead>
									<tr role="row" class="info">
										<th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">#</th>
										<th tabindex="0" rowspan="1" colspan="1" style="width: 75%;">ประเภทงานซ่อม</th>
										<th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">จำนวน</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$selectedStart_date = isset($_GET['start_date']) ? $_GET['start_date'] : '';
									$selectedEnd_date = isset($_GET['end_date']) ? $_GET['end_date'] : '';



									$whereCondition = "";
									if (!empty($selectedStart_date) && !empty($selectedEnd_date)) {
										$whereCondition .= " AND rp_case.rp_add_date BETWEEN '$selectedStart_date' AND '$selectedEnd_date'";
									} elseif (!empty($selectedStart_date)) {
										$whereCondition .= " AND rp_case.rp_add_date >= '$selectedStart_date'";
									} elseif (!empty($selectedEnd_date)) {
										$whereCondition .= " AND rp_case.rp_add_date <= '$selectedEnd_date'";
						
									}

									$sql = "SELECT COALESCE(rp_type.rp_name_type, 'อื่นๆ') AS rp_name_type,
											COUNT(rp_case.rp_case_type) AS count_type
									FROM rp_case
									LEFT JOIN rp_type ON rp_case.rp_case_type = rp_type.id_type
									WHERE rp_case.rp_case_status = 1 $whereCondition
									GROUP BY rp_name_type
									ORDER BY
									CASE WHEN rp_name_type = 'อื่นๆ' THEN 1 ELSE 0 END, rp_name_type;";

									// echo $sql;
									
									$query = $this->db->query($sql)->result();

									if (empty($query)) {
										echo '<tr style="text-align: center; margin-top: 20px; role="row"><td colspan="3">ไม่มีข้อมูล</td></tr>';
									} else {
										foreach ($query as $index => $row) {
											echo '<tr role="row">';
											echo '<td>' . ($index + 1) . '</td>';
											echo '<td>' . $row->rp_name_type . '</td>';
											echo '<td>' . $row->count_type . '</td>';
											echo '</tr>';
										}
									}
									?>
								</tbody>

							</table>




						</div>

					</div>

				</div>
			</div>
		</div>



	</section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'ประเภทงานซ่อม');
        data.addColumn('number', 'จำนวน');
        data.addColumn({ type: 'string', role: 'style' });

        <?php
        if (!empty($query)) {
            $tones = array('#ffb65c', '#FFA07A', '#FF8C00', '#FF6347', '#FF4500' ,);

            foreach ($query as $index => $row) {
                $color = isset($tones[$index]) ? $tones[$index] : 'orange';

                echo "data.addRow(['" . $row->rp_name_type . "', " . $row->count_type . ", '$color']);";
            }
        } else {
            echo "data.addRow(['ไม่มีข้อมูล', 0, 'gray']);"; 
        }
        ?>

        var options = {
            title: 'จำนวนงานซ่อมแต่ละประเภท',
            legend: 'none',
            bars: 'vertical' // กำหนดว่าเป็นกราฟแท่งแนวตั้ง
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>




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
