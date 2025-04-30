<!DOCTYPE html>
<html>
    <head>
        <title>Homepage Manajemen</title>
        <script src="<?= base_url('js/Mitra/homepageManajemen.js') ?>"></script>
        <link rel="stylesheet" href="<?= base_url('css/Mitra/homepageManajemen.css') ?>">
    </head>
    <body>
        <button onclick="window.location.href='<?= base_url('Mitra/controllerManajemenMenu') ?>'">Manajemen Menu</button>
        <button onclick="window.location.href='<?= base_url('Mitra/controllerManajemenOrder') ?>'">Manajemen Order</button>
    </body>
</html>