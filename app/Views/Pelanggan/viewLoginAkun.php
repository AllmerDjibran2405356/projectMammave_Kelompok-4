<!DOCTYPE html>
<html>
    <head>
        <title>Login Akun</title>
        <script src="<?= base_url('js/Pelanggan/loginAkun.js') ?>"></script>
        <link rel="stylesheet" href="<?= base_url('css/Pelanggan/loginAkun.css') ?>">
        <link rel="stylesheet" href="<?= base_url('css/Pelanggan/homepage.css') ?>">
        <link rel="stylesheet" href="<?= base_url('css/Pelanggan/header.css') ?>">
        <link rel="stylesheet" href="<?= base_url('css/Pelanggan/footer.css') ?>">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    </head>
    <body>
        <div class="page-content">
            <?= view('layout/header') ?>

            <?php if(session()->getFlashdata('error')): ?>
                <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
            <?php endif; ?>
        
            <div class="login-container">
                <h1>Masuk</h1>
            
                <form action="<?= site_url('/Pelanggan/controllerLoginAkunPelanggan/loginAkun') ?>" method="post" enctype="multipart/form-data">
                    <input required type="email" name="Email" placeholder="Email">

                    <div class="password-wrapper">
                        <input required type="password" name="Password_User" placeholder="password" id="password">
                        <span class="toggle-password" onclick='togglePassword()'>👁️</span>
                    </div>

                    <button type="submit" class="btn-register">Masuk</button>
                </form>
            </div>
        </div>

        <?= view('layout/footer') ?>
    </body>
</html>