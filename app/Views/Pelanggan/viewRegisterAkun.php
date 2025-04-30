<!DOCTYPE html>
<html>
    <head>
        <title>Register Akun</title>
        <script src="<?= base_url('js/Pelanggan/registerAkun.js') ?>"></script>
        <link rel="stylesheet" href="<?= base_url('css/Pelanggan/registerAkun.css') ?>">
        <link rel="stylesheet" href="<?= base_url('css/Pelanggan/header.css') ?>">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    </head>
    <body>
        <?= view('layout/header') ?>
        <?php if(session()->getFlashdata('error')): ?>
            <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
        <?php endif; ?>
        <?php if(session()->getFlashdata('success')): ?>
            <p style="color: green;"><?= session()->getFlashdata('success') ?></p>
        <?php endif; ?>
        <form action="<?= site_url('Pelanggan/controllerRegisterAkunPelanggan/registerAkun') ?>" method="post" enctype="multipart/form-data" class="registerForm">
            <div class="Name">
                <input required type="text" name="Nama_Depan" placeholder="Masukkan Nama Depan">
                <input required type="text" name="Nama_Belakang" placeholder="Masukkan Nama Belakang"><br>
            </div>
            <input required type="text" name="Nomor_Telepon" placeholder="Masukkan Nomor Hp"><br>
            <textarea required name="Alamat" placeholder="Masukkan Alamat" oninput="autoresize(this)"></textarea><br>
            <input required type="text" name="Email" placeholder="Masukkan Email"><br>
            <input required type="password" name="Password_User" placeholder="Masukkan Password"><br>
            <input required type="password" name="Password_Confirm" placeholder="Masukkan Ulang password"><br>
            <input type="date" name="Tanggal_Lahir" placeholder="Masukkan Tanggal Lahir (optional)"><br>
            <button class="btn-signup">Sign Up</button>
        </form>
    </body>
</html>