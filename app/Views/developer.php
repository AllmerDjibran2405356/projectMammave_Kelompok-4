<!DOCTYPE html>
<html>
    <head>
        <title>Menu Developer</title>
        <script src="<?= base_url('js/menuDeveloper.js') ?>"></script>
        <link rel="stylesheet" href="<?= base_url('css/menuDeveloper.css') ?>">
    </head>
    <body>
        <h1>web untuk mitra</h1><br>
        <button onclick="window.location.href='<?= base_url('Mitra/viewHomepageManajemen') ?>'">homepage manajemen</button>
        <button onclick="window.location.href='<?= base_url('Mitra/controllerManajemenMenu') ?>'">manajemen menu</button>
        <button onclick="window.location.href='<?= base_url('Mitra/controllerManajemenOrder') ?>'">manajemen order</button><br>
        <h1>web untuk pelanggan</h1><br>
        <button onclick="window.location.href='<?= site_url('Pelanggan/controllerHomepage') ?>'">homepage</button>
        <button onclick="window.location.href='<?= site_url('Pelanggan/controllerPemesanan') ?>'">pemesanan</button>
        <button onclick="window.location.href='<?= site_url('Pelanggan/controllerRegisterAkunPelanggan') ?>'">register akun</button>
        <button onclick="window.location.href='<?= site_url('Pelanggan/controllerLoginAkunPelanggan') ?>'">login akun</button>
        <button onclick="window.location.href='<?= site_url('Pelanggan/controllerRiwayatPemesanan') ?> '">riwayat order</button>
    </body>
</html>