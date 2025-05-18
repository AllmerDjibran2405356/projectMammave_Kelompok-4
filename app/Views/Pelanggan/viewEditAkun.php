<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width-device=width, initial-scale=1.0">
        <title>Edit Akun</title>
        <link rel="stylesheet" href="<?= base_url('css/Pelanggan/editAkun.css') ?>">
        <link rel="stylesheet" href="<?= base_url('css/Pelanggan/header.css') ?>">
        <link rel="stylesheet" href="<?= base_url('css/Pelanggan/footer.css') ?>">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    </head>
    <body>
        <?= view('layout/header') ?>
        <div>
            <h1>Edit Akun</h1>
            <form action="<?= site_url('Pelanggan/controllerEditAkun/editAkun') ?>" method="post" enctype="multipart/form-data" class="editForm">
                <input type="text" name="Nama_Depan" value="<?= session()->get('Nama_Depan') ?>"><br>
                <input type="text" name="Nama_Belakang" value="<?= session()->get('Nama_Belakang') ?>"><br>
                <input type="date" name="Tanggal_Lahir" value="<?= session()->get('Tanggal_Lahir') ?? '' ?>"><br>
                <input type="text" name="Nomor_Telepon" value="<?= session()->get('Nomor_Telepon') ?>"><br>
                <textarea name="Alamat" oninput="autoresize(this)"><?= esc(session()->get('Alamat')) ?></textarea><br>
                <input type="text" name="Email" value="<?= session()->get('Email') ?>"><br>
                <button class="btn-signup">Confirm</button>
            </form>
        </div>
    </body>
</html>