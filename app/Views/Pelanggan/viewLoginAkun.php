<!DOCTYPE html>
<html>
    <head>
        <title>Login Akun</title>
        <script src="<?= base_url('js/Pelanggan/loginAkun.js') ?>"></script>
        <link rel="stylesheet" href="<?= base_url('css/Pelanggan/loginAkun.css') ?>">
    </head>
    <body>
        <?php if(session()->getFlashdata('error')): ?>
        <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
        <?php endif; ?>
        <form action="<?= site_url('/Pelanggan/controllerLoginAkunPelanggan/loginAkun') ?>" method="post" enctype="multipart/form-data">
            <input required type="text" name="Email" placeholder="Masukkan Email"><br>
            <input required type="password" name="Password_User" placeholder="Masukkan Password"><br>
            <button>Login</button>
        </form>
    </body>
</html>