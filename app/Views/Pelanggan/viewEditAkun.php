<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <!-- Perbaikan meta viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Akun</title>
    <script src="<?= base_url('js/Pelanggan/editAkun.js') ?>"></script>
    <link rel="stylesheet" href="<?= base_url('css/Pelanggan/editAkun.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('css/Pelanggan/header.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('css/Pelanggan/footer.css') ?>" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
</head>
<body>
    <?= view('layout/header') ?>

    <main>
        <section class="container">
            <h1>Edit Akun</h1>
            <form action="<?= site_url('Pelanggan/controllerEditAkun/editAkun') ?>" method="post" enctype="multipart/form-data" class="editForm">
                <input type="text" name="Nama_Depan" value="<?= session()->get('Nama_Depan') ?>" placeholder="Nama Depan" />
                <input type="text" name="Nama_Belakang" value="<?= session()->get('Nama_Belakang') ?>" placeholder="Nama Belakang" />
                <input type="date" name="Tanggal_Lahir" value="<?= session()->get('Tanggal_Lahir') ?? '' ?>" />
                <input type="text" name="Nomor_Telepon" value="<?= session()->get('Nomor_Telepon') ?>" placeholder="Nomor Telepon" />
                <textarea name="Alamat" oninput="autoresize(this)" placeholder="Alamat"><?= esc(session()->get('Alamat')) ?></textarea>
                <input type="text" name="Email" value="<?= session()->get('Email') ?>" placeholder="Email" />
                <button class="btn-signup" type="submit">Confirm</button>
            </form>
        </section>
    </main>

    <?= view('layout/footer') ?>
</body>
</html>