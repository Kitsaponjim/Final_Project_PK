
<style>


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
	<!-- Content Header (Page header) -->
	<!-- <section class="content-header">
		<h1>
			<i class="fa fa-wrench"></i> รายการประเภทงานแจ้งซ่อมทั้งหมด
		</h1>
	</section> -->

	<section class="content">
    <p style="font-size: 20px; background-color: #ffffff; padding: 10px; border-radius: 10px; display: flex; align-items: center;">

            <i class="fa fa-list-alt" style="margin-right: 10px; background-color: #b3c3ff; padding: 8px; border-radius: 50%; color: white"></i>
     
        <strong style="flex: 1; display: inline;">รายการประเภทงานแจ้งซ่อม</strong>


		<a class="btn btn-custom" style="background-color: #4281ff; color:white;" href="<?= site_url('repair_system/repairman/add_type'); ?>"
							role="button"><i class="fa fa-fw fa-plus-circle"></i> เพิ่มรายการ</a>

	

    </p>


		<div class="box custom-box">
			<div class="box-body">
				<div class="row">

				



					<div class="col-sm-12">
						<br>
						<table id="example1" class="table table-bordered table-striped dataTable" role="grid"
							aria-describedby="example1_info">
							<thead>
								<tr role="row" class="info">
									<th tabindex="0" rowspan="1" colspan="1" style="width: 3%; text-align: center;">#
									</th>
									<th tabindex="0" rowspan="1" colspan="1" style="width: 45%; ">
										รายการประเภทงานแจ้งซ่อม</th>

									<!-- <th tabindex="0" rowspan="1" colspan="1" style="width: 7%;">เพิ่มเติม</th> -->
									<th tabindex="0" rowspan="1" colspan="1" style="width: 4%; text-align: center;">
										จัดการ</th>

								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;
								foreach ($query as $value) {
									$id_type = $value->id_type;

									$rp_name_type = $value->rp_name_type;
									?>

									<tr role="row">
										<td align="center" style="font-size: 15px;">
											<?= $i; ?>
										</td>

										<td align="" style="font-size: 15px;">
											<?= $rp_name_type; ?>
										</td>


										<td align="center" style="font-size: 15px;">
											<a href="#" class="" onclick="onEdit(<?= $id_type ?>)">
												<i class="fa fa-edit" style="color: black; font-size: 18px;"></i>
											</a>
									&nbsp;&nbsp;
											<a href="#" class="" onclick="onDel(<?= $id_type ?>)">
												<i class="fa fa-trash"style="color: black;font-size: 18px;"></i>
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

	function onEdit(id_type) {
		window.location = "<?= base_url(); ?>repair_system/repairman/edit_type/" + id_type;
	}

	function onDel(id_type) {
		// alert(id_type);
		if (confirm("คุณต้องการ ลบ ใช่หรือไม่")) {
			window.location = "<?= base_url(); ?>repair_system/repairman/del_type/" + id_type;
		}
	}


</script>
