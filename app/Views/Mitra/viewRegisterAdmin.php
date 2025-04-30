<!DOCTYPE html>
<html>
    <head>
        <title>Register Akun Admin</title>
    </head>
    <body>
        <?php if(session()->getFlashdata('error')): ?>
            <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
        <?php endif; ?>
        <?php if(session()->getFlashdata('success')): ?>
            <p style="color: green;"><?= session()->getFlashdata('success') ?></p>
        <?php endif; ?>

        <form action="<?= site_url('/Mitra/controllerRegisterAdmin/registerAkunAdmin') ?>" method="post" enctype="multipart/form-data" class="registerFormAdmin">
            <input required type="text" name="Username" placeholder="Masukkan Username"><br>
            <input required type="password" name="Password_Admin" placeholder="Masukkan Password"><br>
            <input required type="password" name="Password_Confirm" placeholder="Masukkan Ulang Password"><br>
            <button class="btn-signup">daftar</button>
        </form>
    </body>
</html>