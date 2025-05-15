<!DOCTYPE html>
<html>
    <head>
        <title>Login Admin</title>
        <script src="<?= base_url('js/Mitra/loginAdmin.js') ?>"></script>
        <link rel="stylesheet" href="<?= base_url('css/Mitra/loginAdmin.css') ?>">
    </head>
    <body>
        <div class="login-container">
            <h1>Login Admin</h1>
            <form action="<?= site_url('/Mitra/controllerLoginAdmin/loginAkunAdmin') ?>" method="post" enctype="multipart/form-data">
                <div>
                    <input required type="text" name="Username" placeholder="username">
                    <div class="password-wrapper">
                    <input required type="password" name="Password_Admin" placeholder="password">
                    <img src="<?= base_url('/images/eye/eye-on.png') ?>" alt="Show Password" class="toggle-password" onclick="togglePassword(this)">
                    </div>
                </div>
                <button type="submit" class="btn-signup">Masuk</button>
            </form>
        </div>
    </body>
</html>