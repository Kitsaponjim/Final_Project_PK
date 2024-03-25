<div class="content-wrapper">
	<section class="content-header">
		<p
			style="font-size: 20px; padding: 10px; border-radius: 10px; display: flex; align-items: center;">
			<i class="fa fa-pencil"
				style="margin-right: 10px; background-color: #b3c3ff; padding: 8px; border-radius: 50%; color: white"></i>

			<strong style="flex: 1; display: inline;">รายการเอกสาร</strong>
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


		<br>


    <!-- <div class="mt-4 col-md-4 mb-2">
        <label for="file_upload">แนบไฟล์</label>
        <input type="file" id="file_upload" name="file_upload" class="form-control rounded-0 custom-placeholder">
        <small id="fileError" class="text-danger"></small>
    </div> -->

<a>
    <label for="file_upload" style="cursor: pointer;">
        <i class="fa fa-file-text"></i>
    </label>
    <input type="file" id="file_upload" name="file_upload" class="form-control rounded-0 custom-placeholder" style="display: none;" onchange="displayFileName(this)">
    <span id="file_name"></span>
    <button type="button" id="remove_file_button" class="btn btn-warning" style="display: none;" onclick="removeFile()">นำออก</button>
</a>

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

<br>
<button type="button" class="btn btn-custom" id="submit" style="background-color:#4281ff; color:#ffffff;" onclick="onAdd()">บันทึก</button>



		<br>

		<div class="box custom-box">
			<div class="box-header">
				
			</div>

			<div class="box-body">
				<div class="row">
					<div class="col-sm-12">
				
							<tbody>
								<?php
								foreach ($file['file'] as $data) {
									$file_id   = @$data->file_id  ;
									$file_name = @$data->file_name;
									?>
									<tr>
										<td align="center" style="font-size: 12px;">
												<?= $file_id; ?>																					
										</td>
										<td align="center" style="font-size: 12px;">					
										<a href="#">
												<?= $file_name; ?>		
																			
											</a>	
											<a href="#">
												ดาวโหลดเอกสาร
																			
											</a>	
											<a href="#">
												ดูเอกสาร
																			
											</a>		
											
										</td>
										<br>
									</tr>
									<?php
								} 
								?>
							</tbody>

					</div>
				</div>
			</div>


		</div>








</section><!-- /.content -->
</div><!-- /.content-wrapper -->




<script>

function onAdd() {
        var file_upload = $("#file_upload")[0].files[0];
        var formData = new FormData();
        formData.append('file_upload', file_upload);

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



