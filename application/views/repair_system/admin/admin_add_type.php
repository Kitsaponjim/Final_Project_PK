

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

<div class="content-wrapper">
	<section class="content">

		<div class="box custom-box">
			<div class="box-body">
				<div class="row">
					<div class="col-sm-12">



						<form class="form-horizontal">

							<div class="box-body">
								<div class="col-sm-6">

								<p style="font-size: 20px; background-color: #f2f2f2; padding: 10px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
    <i class="fa fa-plus"></i>&nbsp; เพิ่มรายการประเภทงานซ่อม
</p>

							

							
									<br>

									<div class="form-group">
										<div class="col-sm-4 control-label">
										<label><strong class="text-danger">*</strong>ประเภทงานซ่อม
												:</label>
										</div>

										<div class="col-sm-7">
											<input type="text" id="rp_type" name="rp_type"
												class="form-control rounded-0 custom-placeholder" placeholder="ประเภทงานแจ้งซ่อม">

										</div>
									</div>

	


								</div>
							</div>
						</form>
					</div>
				</div>

				<br>

				<div class="col-md-12 mt-2">
					<div class="button-container">

						<input class="btn btn-custom" type="button" name="btnSave" id="btnSave" value="บันทึกข้อมูล" style="background-color: #4281ff; color:white;"
							onclick="onSave()">
							&nbsp;&nbsp;
						<input type="button" value="ย้อนกลับ" class="btn btn-custom rounded-0"
							onclick="window.location='<?= base_url(); ?>repair_system/admin/admin_list_type'">

					</div>
				</div>

				<br>
				<br>

			</div><!-- /.box-body -->
		</div>
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
	function onSave() {
		var rp_type = $("#rp_type").val();
		// alert(rp_type);
		if (rp_type == "") {
			alert("กรุณากรอกประเภทงานแจ้งซ่อม");
			$("#rp_type").focus();
			return false;
		}
		else {
			var pmeters = 'rp_type=' + rp_type;
			pmeters = pmeters.replace("undefined", "");

			$.ajax({
				url: "<?= base_url(); ?>repair_system/admin/add_type",
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

</script>
