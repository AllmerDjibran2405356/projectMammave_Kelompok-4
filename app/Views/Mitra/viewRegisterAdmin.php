<!DOCTYPE html>
<html>
    <head>
        <title>Register Akun Admin</title>
        <link rel="stylesheet" href="<?= base_url('css/Mitra/registerAdmin.css') ?>">
    </head>
    <body>
        <button onclick="window.location.href='<?= base_url('Mitra/viewHomepageManajemen') ?>'" class="btn-back">back</button>
        <?php if(session()->getFlashdata('error')): ?>
            <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
        <?php endif; ?>
        <?php if(session()->getFlashdata('success')): ?>
            <p style="color: green;"><?= session()->getFlashdata('success') ?></p>
        <?php endif; ?>

        <form action="<?= site_url('/Mitra/controllerRegisterAdmin/registerAkunAdmin') ?>" method="post" enctype="multipart/form-data" class="registerForm">
            <input required type="text" name="Username" placeholder="Masukkan Username"><br>
            <input required type="password" name="Password_Admin" placeholder="Masukkan Password"><br>
            <input required type="password" name="Password_Confirm" placeholder="Masukkan Ulang Password"><br>
            <button class="btn-signup">daftar</button>
        </form>
    </body>
</html>