<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">


  <style>
    @media screen and (min-width: 600px) {
      .body {
        flex-direction: row;
        /* เปลี่ยนเป็นแนวนอน */
      }

      .login-logo {
        margin-right: 20px;
        /* เพิ่มระยะห่างข้างขวาของ .login-logo */
      }

      .wrapper {
        width: 70%;
        /* ปรับขนาดของ .wrapper */
      }
    }

    /* Media Query สำหรับอุปกรณ์ที่มีขนาดหน้าจอ 900px ขึ้นไป */
    @media screen and (min-width: 900px) {
      .login-logo h3 {
        font-size: 24px;
        /* เพิ่มขนาด font ของ .login-logo h3 */
      }

      .wrapper {
        width: 50%;
        /* ปรับขนาดของ .wrapper */
      }
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    .body {
      display: flex;
      /* justify-content: center; */
      align-items: center;
      min-height: 100vh;
      background: #ffffff;
      font-family: 'Kanit', sans-serif;
      flex-direction: column;
      /* เพิ่มบรรทัดนี้ */
    }

    img {
      width: 340px;
      height: 340px;
    }

    .login-logo {
      display: flex;
      text-align: center;
      margin-top: 10px;
      margin-left: -25px;
      order: -1;
    }

    .login-logo h3 {
      /* margin-left: -10px; */
      padding-top: 55px
    }

    .wrapper {
      width: 450px;
      background: #ffffff;
      color: #606060;
      padding-left: 30px;
      padding-right: 30px;
      padding-bottom: 20px;
      border-radius: 10px;
      box-shadow: 0 0 20px 5px #D1D1D1;

    }

    .wrapper h4 {
      font-size: 22px;
      text-align: center;
      color: #000;
      padding-top: 30px;
      margin-bottom: -30px;
    }

    .wrapper .input-box {
      width: 99%;
      height: 50px;
      margin: 50px 0;

    }

    .input-box input {
      width: 99%;
      height: 99%;
      background: #ededed;
      border: none;
      outline: none;
      border: 2px solid rgba(255, 255, 255, .2);
      border-radius: 5px;
      font-size: 16px;
      color: #606060;
      padding: 20px 45px 20px 20px;

    }

    .input-box input::placeholder {
      color: #606060;

    }

    .wrapper .remember-forgot {
      display: flex;
      justify-content: space-between;
      font-size: 14.5px;
      margin: -15px 0 15px;
    }

    .remember-forgot label input {
      margin-top: 20px;
      accent-color: #5bdb5b;
      margin-right: 4px;
    }

    .remember-forgot a {
      margin-top: 20px;
      color: #4a9ebb;
      text-decoration: none;
    }

    .wrapper .btn {
      width: 100%;
      height: 45px;
      color: #fff;
      background-color: #0b5ed7;
      border: none;
      outline: none;
      border-radius: 5px;
    }

    .container .card {
      display: flex;
      justify-content: space-between;
    }

    .landing-card {
      display: flex;
    }

    .card {
      display: block;
      margin: 30px;
      text-align: center;
    }

    .card-text {
      color: #535353;
    }
  </style>
</head>

<body class="body">

  <div class="login-logo">
    <img src="<?php echo base_url('img'); ?>/logo.png" class="img-fluid" style="width:150px; height:150px;">
    <h3>ระบบจัดการทรัพยากรทางกายภาพ</h3>
  </div>
  <div class="wrapper">
    <h4>เข้าสู่ระบบ</h4>
    <form action="<?= site_url('login/ck_login_choice'); ?>" method="post" class="form-horizontal">
      <div class="input-box">
        <label for="">ชื่อผู้ใช้งาน</label>
        <input type="email" name="user_login" placeholder="" required value="<?= set_value('user_login'); ?>">

        <span class="fr">
          <?= form_error('user_login'); ?>
        </span>

      </div>




      <div class="input-box">
        <label for="">รหัสผ่าน</label>
        <input type="password" name="user_password" placeholder="" required value="<?= set_value('user_password'); ?>">
        <span class="fr">
          <?= form_error('user_password'); ?>
        </span>
      </div>


      <div class="remember-forgot">
        <!-- <label><input type="checkbox">จดจำการเข้าสู่ระบบ</label> -->
        <a href="<?= base_url(); ?>login/forgot_password">ลืมรหัสผ่าน?</a>
      </div>


      <button type="submit" class="btn">เข้าสู่ระบบ</button>
    </form>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>
