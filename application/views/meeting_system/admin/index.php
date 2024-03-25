<div class="content-wrapper">
	<section class="content-header">
		<!-- <p style="font-size: 20px; background-color: #ffffff; padding: 10px; border-radius: 10px; display: flex; align-items: center;"> -->
		<p style="font-size: 20px;  padding: 10px; border-radius: 10px; display: flex; align-items: center;">

			<i class="fa fa-pencil"
				style="margin-right: 10px; background-color: #b3c3ff; padding: 8px; border-radius: 50%; color: white"></i>

			<strong style="flex: 1; display: inline;">รายการประชุม</strong>

			<a href="#" class="btn btn-custom open-popup" data-toggle="modal"
				style="background-color: #4281ff;color:white;" data-target="#popupModal_add" role="button"
				style="margin-left: auto;">
				<i class="fa fa-fw fa-plus-circle"></i>
				เพิ่มรายการ
			</a>


		</p>

		<style>
			.custom-box {
				background-color: white;
				border-radius: 10px;
				box-shadow: none;
				border-top: solid white;
				/* กำหนดสีขอบด้านบนเป็นสีขาว */
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


		<div class="container-fluid">
			<div class="row">



			</div>
		</div>


		<div class="box custom-box">
			<div class="box-header">

			</div>

			<div class="box-body">
				<div class="row">
					<div class="col-sm-12">

						<table id="example1">
							<thead>
								<tr>
									<th style="width: 5%; text-align: left; font-size: 22px;">
									ราการประชุม</th>
									<!-- <th style="width: 20%; text-align: center;">
										ราการประชุม</th> -->

								</tr>
							</thead>

							<tbody>
								<?php
								foreach ($meeting_topic['meeting_topic'] as $data) {
									$meeting_id = @$data->meeting_id;
									$title_name = @$data->title_name;
									$title_detail = @$data->title_detail;
									$created_by = @$data->created_by;
									$created_date = @$data->created_by;
									?>
									<tr>
										<td align="" style="font-size: 18px;">
											<a
												href="<?= base_url(); ?>meeting_system/admin/Topic_details?meeting_id=<?= $meeting_id; ?>&title_name=<?=$title_name; ?>">
												<?= $title_name; ?>
										</td>
										<!-- <td align="center" style="font-size: 12px;">
											<?= $created_date; ?>

											</a> -->
										</td>
									</tr>
									
									<?php
								}
								?>
							</tbody>

						</table>


					</div>
				</div>
			</div>


		</div>








	</section><!-- /.content -->
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

	.custom-width {
		max-width: 700px;
		/* Set your desired width here */
		width: auto;
		/* You can use a percentage value if needed */
	}

	.form-control {

		border-radius: 7px;
	}
</style>

<div class="modal fade" id="popupModal_add" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel2"
	aria-hidden="true">
	<div class="modal-dialog custom-width" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<p class="modal-title" id="popupModalLabel" style="font-size: 20px; color:back;">
					<strong>รายละเอียดหัวข้อการประชุม</strong>
				</p>
			</div>

			<div class="modal-body">
				<div class="row">

					<div class="col-md-12">

						<p style="font-size: 18px; color:back;"><strong> ข้อมูลประชุม</span></strong></p>

						<div class="form-group">
							<label for="title_name"><strong class="text-danger">*</strong>หัวข้อการประชุม :</label>
							<input type="text" class="form-control" id="title_name" name="title_name"
								placeholder="ชื่อหัวข้อการประชุม">
						</div>

						<div class="form-group">
							<label for="title_detail">รายละเอียด :</label>
							<input type="text" class="form-control" id="title_detail" name="title_detail"
								placeholder="รายละเอียด">
						</div>


						<div class="form-group">
							<!-- <label for="permissions_role"><strong class="text-danger">*</strong>ผู้มีสิทธ์
								:</label>
							<div class="checkbox-container" id="role_edit" style="margin-top:10px;">
								<?php $count = 0; ?>
								<div>
									<?php foreach ($user_role_edit['user_role_edit'] as $key => $value): ?>
										<input type="checkbox" id="permissions_role<?= $value->id_role; ?>" name="permissions_role[]"
											value="<?= $value->id_role; ?>" <?= in_array($value->id_role, $_GET['system_edit'] ?? []) ? 'checked_edit' : ''; ?>>
										<label for="permissions_role<?= $value->id_role; ?>">
											<?= $value->role_name; ?>
										</label>

										<?php $count++; ?>
										<?php if ($count % 2 == 0 || $count == count($user_role_edit['user_role_edit'])): ?>
										</div>
										<div>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>
							</div> -->

							<br>
							<?php
							$sql = "SELECT * FROM user_info";							
							$result_user = $this->db->query($sql)->result();

							?>

<!-- <?php
    foreach ($result_user as $data) {
        $user_name = $data->user_name;
        $id = $data->id;
        echo '<option value="' . $id . '">' . $user_name . '</option>';
    }
    ?> -->

<label for="permissions_name">จัดการสิทธ์ :</label>
<select id="permissions_name" name="permissions_name" required class="form-control">
    <option value="#">--เลือก--</option>
	<?php
    foreach ($result_user as $data) {
        $user_name = $data->user_name;
        $id = $data->id;
        echo '<option value="' . $id . '">' . $user_name . '</option>';
    }
    ?>

</select>
<div id="selectedItems"></div>

<!-- JavaScript -->
<script>
    var dropdown = document.getElementById("permissions_name");
    var selectedItemsDiv = document.getElementById("selectedItems");
    var selectedItems = [];
	dropdown.addEventListener("change", function() {
    if (dropdown.value !== "#") {
        var selectedOption = dropdown.options[dropdown.selectedIndex];
        selectedItems.push({ id: dropdown.value, name: selectedOption.text });
        displaySelectedItems();
        selectedOption.disabled = true; // ทำให้ option ที่ถูกเลือกไม่สามารถเลือกได้อีก
    }
});


    function displaySelectedItems() {
        selectedItemsDiv.innerHTML = "";
        selectedItems.forEach(function(item) {
            var listItem = document.createElement("div");
            listItem.textContent = item.name;
            selectedItemsDiv.appendChild(listItem);
        });
    }
</script>

						</div>


					</div>

				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-custom" id="saveChangesButton"
					style="background-color:#4281ff; color:#ffffff;" onclick="onAdd()">บันทึกข้อมูล</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
			</div>
		</div>
	</div>
</div>




<script>

	function onAdd() {
		var selectedValues = [];
    // วนลูปเพื่อเก็บค่าที่เลือกไว้ในตัวแปร selectedValues
    selectedItems.forEach(function(item) {
        selectedValues.push(item.id);
    });
    // สร้าง string โดยใช้ join() เพื่อรวมค่าที่เลือกเข้าด้วยกัน โดยใช้ "," เป็นตัวคั่นระหว่างค่า
    var permissions_name = selectedValues.join(",");

		var title_name = $("#title_name").val();
		var title_detail = $("#title_detail").val();

		var formData = new FormData();
		formData.append('title_name', title_name);
		formData.append('title_detail', title_detail);
		formData.append('permissions_name', permissions_name);

		$.ajax({
			url: "<?= base_url(); ?>meeting_system/meeting/Add_meeting",
			type: 'POST',
			data: formData,
			contentType: false,
			processData: false,
			async: false,
			success: function (data) {
				// alert(data);
				$("#submit").attr("disabled", true);
				window.location = "<?= base_url(); ?>meeting_system/admin";
			}
		});
		return false;



	}

</script>

<style>
						.checkbox-container {
							display: flex;
							flex-wrap: wrap;
							gap: 20px;
							/* ระยะห่างระหว่าง checkbox */
						}

						.checkbox-container div {
							display: flex;
							gap: 10px;
							/* ระยะห่างระหว่าง checkbox และ label */
							align-items: center;
							/* จัดตำแหน่งให้อยู่ตรงกลาง */
						}

						.checkbox-container input {
							opacity: 0;
							/* ซ่อน checkbox แบบปกติ */
							position: absolute;
							/* เพื่อให้ checkbox ไม่มีที่ตั้งที่กับ label */
						}

						.checkbox-container label {
							position: relative;
							padding-left: 30px;
							/* ปรับระยะห่างของ label จากซ้าย */
							cursor: pointer;
						}

						.checkbox-container label:before {
							content: '';
							position: absolute;
							left: 0;
							top: 0;
							width: 20px;
							/* กว้างของ checkbox */
							height: 20px;
							/* สูงของ checkbox */
							border: 2px solid #3498db;
							/* สีของ checkbox */
							background-color: #fff;
							/* สีพื้นหลังของ checkbox */
							border-radius: 4px;
							/* ทำให้มีขอบมน */
							transition: background-color 0.3s;
							/* เพื่อให้มี animation เมื่อเลือก */
						}

						.checkbox-container input:checked+label:before {
							background-color: #3498db;
							/* สีเมื่อ checkbox ถูกเลือก */
							border-color: #3498db;
							/* สีขอบเมื่อ checkbox ถูกเลือก */
						}
					</style>
