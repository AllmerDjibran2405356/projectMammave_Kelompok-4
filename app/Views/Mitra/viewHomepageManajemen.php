<!DOCTYPE html>
<html>
    <head>
        <title>Homepage Manajemen</title>
        <script src="<?= base_url('js/Mitra/homepageManajemen.js') ?>"></script>
        <link rel="stylesheet" href="<?= base_url('css/Mitra/homepageManajemen.css') ?>">
    </head>
    <body>
        <button class="btn-login" onclick="window.location.href='<?= site_url('/Mitra/controllerRegisterAdmin') ?>'">Tambahkan Admin</button>
        <button onclick="window.location.href='<?= base_url('/Mitra/controllerManajemenUserAdmin') ?>'">Manajemen Akun Admin</button>
        <form action="<?= site_url('Mitra/controllerLogoutAdmin') ?>" method="post" style="display:inline;">
            <button type="submit" class="btn-logout">Logout</button>
        </form><br>
        <button onclick="window.location.href='<?= base_url('Mitra/controllerManajemenMenu') ?>'">Manajemen Menu</button>
        <button onclick="window.location.href='<?= base_url('Mitra/controllerManajemenOrder') ?>'">Manajemen Order</button>
    </body>
</html>