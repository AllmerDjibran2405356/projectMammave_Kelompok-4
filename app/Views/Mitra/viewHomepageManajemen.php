<!DOCTYPE html>
<html>
    <head>
        <title>Homepage Manajemen</title>
        <script src="<?= base_url('js/Mitra/homepageManajemen.js') ?>"></script>
        <link rel="stylesheet" href="<?= base_url('css/Mitra/homepageManajemen.css') ?>">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    </head>
    <body>
        <div class="top">
            <button class="btn btn-primary btn-lg" onclick="window.location.href='<?= site_url('/Mitra/controllerRegisterAdmin') ?>'">Tambahkan Admin</button>
            <button class="btn btn-primary btn-lg" onclick="window.location.href='<?= base_url('/Mitra/controllerManajemenUserAdmin') ?>'">Manajemen Akun Admin</button>
            <form action="<?= site_url('Mitra/controllerLogoutAdmin') ?>" method="post" style="display:inline;">
                <button class="btn btn-primary btn-lg" type="submit" class="btn-logout">Logout</button>
            </form><br>
        </div>
        <div class="bottom">
            <button type="button" class="btn btn-primary btn-lg" onclick="window.location.href='<?= base_url('Mitra/controllerManajemenMenu') ?>'">Manajemen Menu</button>
            <button type="button" class="btn btn-primary btn-lg" onclick="window.location.href='<?= base_url('Mitra/controllerManajemenOrder') ?>'">Manajemen Order</button>
        </div>
    </body>
</html>