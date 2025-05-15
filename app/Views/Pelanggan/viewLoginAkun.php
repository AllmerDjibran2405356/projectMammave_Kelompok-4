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
                    <img src="<?= base_url('/images/eye/eye-on.png') ?>" alt="Show Password" class="toggle-password" onclick="togglePassword(this)">
                </div>

                <button type="submit" class="btn-signup">Login</button>
            </form>
        </div>

        <small>Belum punya akun?  <a class="btn-masuk" href="<?= site_url('/Pelanggan/controllerRegisterAkunPelanggan') ?>">  Daftar sekarang</a></small>
    </body>
</html>