<div class="content-wrapper">
	<section class="content-header">
		<p style="font-size: 20px; padding: 10px; border-radius: 10px; display: flex; align-items: center;">
			<i class="fa fa-pencil"
				style="margin-right: 10px; background-color: #b3c3ff; padding: 8px; border-radius: 50%; color: white"></i>

			<strong style="flex: 1; display: inline;">รายการเอกสาร /
				<?= $title_name ?>
			</strong>

			<div>
			<a>
				<label for="file_upload" style="cursor: pointer;">
					<i class="fa fa-file-text"></i>
				</label>
				<input type="file" id="file_upload" name="file_upload" class="form-control rounded-0 custom-placeholder"
					style="display: none;" onchange="displayFileName(this)">
				<span id="file_name"></span>
				<button type="button" id="remove_file_button" class="btn btn-warning" style="display: none;"
					onclick="removeFile()">นำออก</button>
			</a>
			</div>
			

			<script>
				function displayFileName(input) {
					var fileName = input.files[0].name;
					document.getElementById("file_name").innerText = fileName;
					document.getElementById("remove_file_button").style.display = "inline-block";
				}

				function removeFile() {
					document.getElementById("file_upload").value = ""; // Clear file input
					document.getElementById("file_name").innerText = ""; // Clear file name display
					document.getElementById("remove_file_button").style.display = "none"; // Hide remove file button
				}
			</script>

			<button type="button" class="btn btn-custom" id="submit" style="background-color:#4281ff; color:#ffffff;"
				onclick="onAdd(<?= $meeting_id; ?>)">บันทึก</button>



		</p>


		<div class="col-sm-8">
			<div class="box custom-box">
				<!-- รายการเอกสาร -->


				<table>
					<thead>
						<tr>
							<th style="width: 5%; text-align: center;">
								ลำดับที่</th>
							<th style="width: 20%; text-align: left;">
								รายการเอกสาร</th>
							<th style="width: 8%; text-align: center;">
								จัดการ</th>

						</tr>
					</thead>

					<tbody>
						<?php
						$i = 1;
						foreach ($file['file'] as $data) {
							$file_id = @$data->file_id;
							$file_name = @$data->file_name;

							?>
							<tr>
								<td align="" style="font-size: 18px; text-align: center;">
									<?= $i; ?>

								</td>
								<td style="font-size: 12px; text-align: left;">
									<?= $file_name; ?>
									</a>
								</td>

								<td style="font-size: 12px; text-align: center;">
									<div
										style="display: inline-block; background-color: #7096ff; color: white; padding: 5px;">
										ดูเอกสาร</div>
									<div
										style="display: inline-block; background-color: #f28f49; color: white; padding: 5px;">
										ดาวโหลด</div>


								</td>
							</tr>
							<?php
							$i++;
						}
						?>
					</tbody>

				</table>

				<a>
					<label for="select_user">
						<i class="fa fa-check-circle"></i>
					</label>
				</a>
				<a>
					<label for="select_user">
						<i class="fa fa-trash"></i>
					</label>



				</a>

			</div>

		</div>

		<div class="col-sm-4">
			<div class="box custom-box">

				รายชื่อผู้มีสสิทธิ์


				<br>
				<?php
				$title_name = $meeting_topic['meeting_topic']->title_name;
				$user_name = $meeting_topic['meeting_topic']->user_name;
				$name = explode(',', $user_name);

				foreach ($name as $value) {
					echo '<label class="checkbox-label">';
					echo '<input type="checkbox" class="checkbox">';
					echo $value;
					echo '</label>';

					// echo '<input type="checkbox" class="checkbox" id="check_' . $value . '"> <span>' . $value . '</span><br>';
				}
				?>


				<style>
					.checkbox-label {
						display: flex;
						align-items: center;
					}
				</style>
				<a>
					<label for="select_user">
						<i class="fa fa-check-circle"></i>
					</label>



				</a>
				<a>
					<label for="select_user">
						<i class="fa fa-trash"></i>
					</label>



				</a>




				<?php
				$sql = "SELECT * FROM user_info";
				$result_user = $this->db->query($sql)->result();

				?>
				<a>
					<label for="add_user" style="cursor: pointer;">
						<i class="fa fa-users" onclick="togglePermissions()"></i> <!-- เพิ่ม onclick event -->
					</label>
					<input type="" id="add_user" name="add_user" class="form-control rounded-0 custom-placeholder"
						style="display: none;" onchange="displayUserName(this)">
					<span id="user_name"></span>
					<button type="button" id="remove_user_button" class="btn btn-warning" style="display: none;"
						onclick="removeUser()">นำออก</button>
				</a>
				<br>


				<label for="permissions_name" id="permissions_label" style="display: none;">จัดการสิทธ์ :</label>
				<select id="permissions_name" name="permissions_name" required class="form-control"
					style="display: none;">
					<option value="#">--เลือก--</option>
					<?php
					foreach ($result_user as $data) {
						$user_name = $data->user_name;
						$id = $data->id;
						// เช็คว่าค่า $user_name ไม่อยู่ในรายการที่แสดงด้านบนก่อนที่จะแสดงตัวเลือก
						if (!in_array($user_name, $name)) {
							echo '<option value="' . $id . '">' . $user_name . '</option>';
						}
					}
					?>
				</select>

				<div id="selectedItems"></div>


				<script>
					var dropdown = document.getElementById("permissions_name");
					var selectedItemsDiv = document.getElementById("selectedItems");
					var selectedItems = [];

					function togglePermissions() {
						var permissionsLabel = document.getElementById("permissions_label");
						var permissionsSelect = document.getElementById("permissions_name");

						if (permissionsLabel.style.display === "none") {
							permissionsLabel.style.display = "inline-block";
							permissionsSelect.style.display = "inline-block";
						} else {
							permissionsLabel.style.display = "none";
							permissionsSelect.style.display = "none";
						}
					}

					dropdown.addEventListener("change", function () {
						if (dropdown.value !== "#") {
							var selectedOption = dropdown.options[dropdown.selectedIndex];
							selectedItems.push({ id: dropdown.value, name: selectedOption.text });
							displaySelectedItems();
							selectedOption.disabled = true; // ทำให้ option ที่ถูกเลือกไม่สามารถเลือกได้อีก
						}
					});

					function displaySelectedItems() {
						selectedItemsDiv.innerHTML = "";
						selectedItems.forEach(function (item) {
							var listItem = document.createElement("div");
							listItem.textContent = item.name;
							selectedItemsDiv.appendChild(listItem);
						});
					}
				</script>



			</div>




		</div>




	</section><!-- /.content -->


</div><!-- /.content-wrapper -->





<script>

	function onAdd(meeting_id) {
		// alert(meeting_id);


		var file_upload = $("#file_upload")[0].files[0];
		var formData = new FormData();
		formData.append('file_upload', file_upload);
		formData.append('meeting_id', meeting_id);

		$.ajax({
			url: "<?= base_url(); ?>meeting_system/meeting/Add_file",
			type: 'POST',
			data: formData,
			contentType: false,
			processData: false,
			async: false,
			success: function (data) {
				alert(data);
				$("#submit").prop("disabled", true);
				window.location = "<?= base_url(); ?>meeting_system/admin";
			}
		});
		return false;
	}
</script>

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
