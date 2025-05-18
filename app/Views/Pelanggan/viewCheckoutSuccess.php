<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pesanan Berhasil</title>
    <link rel="stylesheet" href="<?= base_url('css/Pelanggan/checkout.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/Pelanggan/header.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/Pelanggan/footer.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
    <?= view('layout/header') ?>

    <h1>✅ Pesanan Berhasil Dibuat!</h1>

    <p>Silakan konfirmasi pesanan Anda melalui WhatsApp sebelum kembali ke beranda:</p>
    <a href="<?= $linkWA ?>" target="_blank" rel="noopener noreferrer" class="button-wa">
        Buka WhatsApp
    </a>

    <p class="warning-text">⚠️ Peringatan: Berikan catatan tambahan bila butuh</p>

    <p><a href="<?= site_url('Pelanggan/controllerHomepage') ?>" class="link-home">Kembali ke Beranda</a></p>
</body>
</html>