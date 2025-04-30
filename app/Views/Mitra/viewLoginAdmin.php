<!DOCTYPE html>
<html>
    <head>
        <title>Login Admin</title>
        <script src="<?= base_url('js/Mitra/loginAdmin.js') ?>"></script>
        <link rel="stylesheet" href="<?= base_url('css/Mitra/loginAdmin.css') ?>">
    </head>
    <body>
        <?php if(session()->getFlashdata('error')): ?>
            <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
        <?php endif; ?>

        <div class="login-container">
            <h1>Login Admin</h1>
            <form action="<?= site_url('/Mitra/controllerLoginAdmin/loginAkunAdmin') ?>" method="post" enctype="multipart/form-data">
                <div>
                    <input required type="text" placeholder="username">
                    <input required type="password" placeholder="password">
                </div>
                <button type="submit" class="btn-login">Masuk</button>
            </form>
        </div>
    </body>
</html>