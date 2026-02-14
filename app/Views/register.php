<style>
    /* Background mengikuti tema Login */
    body {
        background: linear-gradient(135deg, #f39c12 0%, #d35400 100%) !important;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Source Sans Pro', sans-serif;
    }

    .register-container {
        width: 100%;
        max-width: 500px;
        padding: 15px;
    }

    .register-card {
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

    .form-control {
        border-radius: 0 20px 20px 0;
        border-left: none;
        height: 45px;
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

    .btn-register {
        background-color: #d35400;
        border: none;
        border-radius: 25px;
        font-weight: bold;
        transition: 0.3s;
        height: 50px;
        color: white;
        margin-top: 10px;
    }

    .btn-register:hover {
        background-color: #e67e22;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(211, 84, 0, 0.3);
    }

    .logo-register {
        width: 80px;
        margin-bottom: 20px;
    }
</style>

<div class="register-container">
    <div class="register-card">
        <div class="text-center mb-4">
            <img src="<?= base_url('template/img/logo.jpg') ?>" class="logo-register" alt="Logo">
            <h2 class="section-title"><span class="px-2">Join Member</span></h2>
            <p class="text-muted">Daftar sekarang untuk mulai memesan dimsum lezat!</p>
        </div>

        <form name="sentMessage" method="post" action="<?= base_url('register/simpan') ?>" id="contactForm">
            
            <div class="control-group mb-3">
                <label class="small text-muted">Pilih Username</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-user text-orange"></i>
                    </div>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Contoh: dimsum_lover" required />
                </div>
            </div>

            <div class="control-group mb-4">
                <label class="small text-muted">Password</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-lock text-orange"></i>
                    </div>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Minimal 6 karakter" required />
                </div>
            </div>

            <div class="text-center">
                <button class="btn btn-register btn-block py-2 px-4" type="submit" id="sendMessageButton">
                    DAFTAR SEKARANG
                </button>
            </div>
        </form>

        <div class="text-center mt-4">
            <p class="small text-muted">Sudah punya akun? 
                <a href="<?= base_url('login') ?>" class="text-orange font-weight-bold">Login di sini</a>
            </p>
        </div>
    </div>
</div>