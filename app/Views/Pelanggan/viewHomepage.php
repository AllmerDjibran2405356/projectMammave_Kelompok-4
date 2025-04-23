<!DOCTYPE html>
<html>
    <head>
        <title>Homepage</title>
        <script src="<?= base_url('js/Pelanggan/homepage.js') ?>"></script>
        <link rel="stylesheet" href="<?= base_url('css/Pelanggan/homepage.css') ?>">
    </head>
    <body>
    <?php $session = session(); ?>
        <?php if ($session->get('isLoggedIn')): ?>
        <p>Selamat datang, <?= esc($session->get('Email')) ?>!</p>
        <button onclick="window.location.href='<?= site_url('Pelanggan/controllerLogoutAkunPelanggan') ?>'">Logout</button>
        <button onclick="window.location.href='<?= site_url('Pelanggan/controllerPemesanan') ?>'">Pemesanan</button>
    <?php else: ?>
        <button onclick="window.location.href='<?= site_url('Pelanggan/controllerRegisterAkunPelanggan') ?>'">Register Akun</button>
        <button onclick="window.location.href='<?= site_url('Pelanggan/controllerLoginAkunPelanggan') ?>'">Login Akun</button>
    <?php endif; ?>
    </body>
</html>