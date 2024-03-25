

<style>
	/* กำหนดหล่องเป็นเหลี่ยมโค้ง */
	.custom-box {
		background-color: white;
		border-radius: 10px;
		box-shadow: none;
		border-top: solid white;
		/* กำหนดสีขอบด้านบนเป็นสีขาว */
	}

</style>


<!-- ############################################################################################## -->
<div style="display: flex; justify-content: center;">
    <div class="col-sm-5" style="padding-top: 15px; margin-right: 10px;">
        <div class="box custom-box" style="border-radius: 10px; background-color: #f0f0f0; padding: 20px;">
            <section class="content-header" style="display: flex; align-items: center;">
                <i class="fa fa-user" style="margin-right: 10px; padding: 8px; border-radius: 50%; color: back; font-size: 24px;"></i>
                <strong style="flex: 1; display: inline; font-size: 24px;">กรอกข้อมูลของคุณกรณีลืมรหัสผ่าน</strong>
            </section>
            <section class="content">
                <div class="box-body">

				<form action="<?= site_url('login/forgotPassword_from'); ?>" method="post">
                    <!-- <form action="#" method="post"> -->
                        <div class="form-group" style="margin-bottom: 10px;">
                            <label for="username" style="margin-bottom: 5px;">ชื่อผู้ใช้งาน</label>
                            <input type="text" id="username" name="username" placeholder="ชื่อผู้ใช้งาน" style="width: 100%; padding: 8px; border-radius: 5px; border: 2px solid #007bff;" required>
							
                        </div>
                        <div class="form-group" style="margin-bottom: 10px;">
                            <label for="fullname" style="margin-bottom: 5px;">ชื่อ-นามสกุล</label>
                            <input type="text" id="fullname" name="fullname" placeholder="ชื่อ-นามสกุล" style="width: 100%; padding: 8px; border-radius: 5px; border: 2px solid #007bff;" required>
                        </div>
                        <div class="form-group" style="margin-bottom: 10px;">
                            <label for="phone" style="margin-bottom: 5px;">เบอร์โทรศัพท์</label>
							<input type="tel" id="phone" name="phone" placeholder="เบอร์โทรศัพท์" style="width: 100%; padding: 8px; border-radius: 5px; border: 2px solid #007bff;" required>
                        </div>
                        <div class="form-group" style="margin-bottom: 10px;">
                            <label for="email" style="margin-bottom: 5px;">อีเมล</label>
                            <input type="email" id="email" name="email" placeholder="อีเมล" style="width: 100%; padding: 8px; border-radius: 5px; border: 2px solid #007bff;" required>
                        </div>
                        <div class="form-group" style="margin-bottom: 10px;">
                            <label for="department" style="margin-bottom: 5px;">แผนก</label>
                            <input type="text" id="department" name="department" placeholder="แผนก" style="width: 100%; padding: 8px; border-radius: 5px; border: 2px solid #007bff;" required>
                        </div>
                        <div class="form-group" style="text-align: center;">
                            <button type="submit" style="padding: 10px 20px; border: none; border-radius: 5px; background-color: #007bff; color: white; cursor: pointer;">บันทึกข้อมูล</button>
                        </div>
                    </form>


                </div><!-- /.box-body -->
            </section>
        </div>
    </div>
</div>
