<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login | DIMSUMM2PUTRI</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <link rel="stylesheet" href="<?= base_url('template/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('template/bower_components/font-awesome/css/font-awesome.min.css') ?>">
  
  <style>
    body {
      background: linear-gradient(135deg, #f39c12 0%, #d35400 100%) !important;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Source Sans Pro', sans-serif;
      margin: 0;
    }

    .login-container {
      width: 100%;
      max-width: 450px;
      padding: 15px;
    }

    .login-card {
      background: rgba(255, 255, 255, 0.9);
      border-radius: 20px;
      padding: 40px;
      box-shadow: 0 15px 35px rgba(0,0,0,0.2);
      backdrop-filter: blur(10px);
    }

    .section-title span {
      color: #d35400;
      font-weight: 800;
      text-transform: uppercase;
      letter-spacing: 2px;
    }

    /* Styling agar input rapi seperti Register */
    .form-control {
      border-radius: 0 20px 20px 0;
      border-left: none;
      height: 45px;
      box-shadow: none;
      border: 1px solid #ccc;
    }

    .input-group-addon {
      background: #f8f9fa !important;
      border-radius: 20px 0 0 20px !important;
      border-right: none;
      min-width: 45px;
      display: flex;
      align-items: center;
      justify-content: center;
      border: 1px solid #ccc;
    }

    .btn-login {
      background-color: #d35400;
      border: none;
      border-radius: 25px;
      font-weight: bold;
      transition: 0.3s;
      height: 50px;
      color: white;
      margin-top: 10px;
      letter-spacing: 1px;
    }

    .btn-login:hover {
      background-color: #e67e22;
      transform: translateY(-3px);
      box-shadow: 0 5px 15px rgba(211, 84, 0, 0.3);
      color: white;
    }

    .logo-login {
      width: 80px;
      margin-bottom: 20px;
      border-radius: 50%;
    }

    .text-orange {
      color: #d35400;
    }
  </style>
</head>
<body>

<div class="login-container">
  <div class="login-card">
    <div class="text-center mb-4">
      <img src="<?= base_url('template/img/logo.jpg') ?>" class="logo-login" alt="Logo">
      <h2 class="section-title"><span class="px-2">Login</span></h2>
      <p class="text-muted">Silakan masuk untuk mengelola pesanan.</p>
    </div>

    <form action="<?= base_url('login_action') ?>" method="post">
      
      <div class="form-group mb-3">
        <label class="small text-muted">Username</label>
        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-user text-orange"></i>
          </div>
          <input type="text" class="form-control" name="username" placeholder="Masukkan Username" required/>
        </div>
      </div>

      <div class="form-group mb-4">
        <label class="small text-muted">Password</label>
        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-lock text-orange"></i>
          </div>
          <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required/>
        </div>
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-login btn-block">
          SIGN IN
        </button>
      </div>
    </form>

    <div class="text-center mt-4">
      <p class="small text-muted">Belum punya akun? 
        <a href="<?= base_url('register') ?>" class="text-orange font-weight-bold">Daftar Sekarang</a>
      </p>
    </div>
  </div>
</div>

<script src="<?= base_url('template/bower_components/jquery/dist/jquery.min.js') ?>"></script>
<script src="<?= base_url('template/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>

</body>
</html>