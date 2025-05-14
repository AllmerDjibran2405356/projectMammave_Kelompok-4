<!DOCTYPE html>
<html>
    <head>
        <title>Register Akun Admin</title>
        <link rel="stylesheet" href="<?= base_url('css/Mitra/registerAdmin.css') ?>">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="d-flex justify-content-center gap-3 mb-4 flex-wrap">
            <a href="<?= base_url('Mitra/viewHomepageManajemen') ?>" class="btn btn-secondary">🔙 Kembali</a>
        </div>
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