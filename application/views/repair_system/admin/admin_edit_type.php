<?php

$sql = "SELECT * FROM rp_type WHERE id_type ='$id_type'";
$row = $this->db->query($sql)->row();
$id_type = @$row->id_type;
$rp_name_type = @$row->rp_name_type;

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
    <i class="fa fa-pencil"></i>&nbsp; แก้ไขข้อมูลประเภทงานซ่อม
	
</p>

								

									<br>

									<div class="form-group">
										<div class="col-sm-4 control-label">
											<label></strong>ประเภทงานซ่อม : </label>
										</div>

										<div class="col-sm-7">
											<input type="text" id="cus_name" name="cus_name"
												class="form-control rounded-0 custom-placeholder"
												placeholder="<?= $rp_name_type ?>" readonly>

										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-4 control-label">
											<label></strong>ข้อมูลแก้ไข : </label>
										</div>

										<div class="col-sm-7">
											<input type="text" id="edit_name_type" name="edit_name_type"
												class="form-control rounded-0" placeholder="กรอกข้อมูลที่ต้องการแก้ไข"
												value="">

										</div>
									</div>

								</div>
							</div>
						</form>

					</div>

					<div class="col-md-12 mt-2">
						<div class="button-container">
							<input class="btn btn-success" type="submit" name="btnSave" id="btnSave" style="background-color: #4281ff;"
								value="บันทึกข้อมูล" onclick="onSave(<?= $id_type ?>)">

							&nbsp;&nbsp;

							<input type="button" value="ย้อนกลับ" class="btn btn-custom rounded-0"  style="margin-right: 15px;"
								onclick="window.location='<?= base_url(); ?>repair_system/admin/admin_list_type'">
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

	function onSave(id_type) {
		var edit_name_type = $('#edit_name_type').val();


		if (edit_name_type == '') {
				alert('กรุณากรอกข้อมูลประเภทงานซ้อมทีต้องการแก้ไข');
				$("#edit_name_type").focus();
				return false;
		}
		if (confirm('คุณต้องการบันทึกข้อมูลใช่หรือไม่')) {
			if (edit_name_type == '') {
				alert('กรุณากรอกข้อมูลประเภทงานซ้อมทีต้องการแก้ไข');
				$("#edit_name_type").focus();
				return false;
			} else {
				var pmeters = 'id_type=' + <?= $id_type ?> + '&edit_name_type=' + edit_name_type;
				pmeters = pmeters.replace("undefined", "");

				$.ajax({
					url: "<?= base_url(); ?>repair_system/admin/admin_update_type",
					type: 'POST',
					data: pmeters,
					async: false,
					success: function (data) {
						alert(data);
						$("#btnSave").attr("disabled", true);
						window.location = "<?= base_url(); ?>repair_system/admin/admin_list_type";
					}
				});
				return false;

			}
		}

	}
</script>
