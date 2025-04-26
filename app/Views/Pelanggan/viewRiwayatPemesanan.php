<!DOCTYPE html>
<html>
    <head>
        <title>Riwayat Pemesanan</title>
        <script src="<?= base_url('js/Pelanggan/riwayatPemesanan.js') ?>"></script>
        <link rel="stylesheet" href="<?= base_url('css/Pelanggan/riwayatPemesanan.css') ?>">
    </head>
    <body>
        <?php $session = session(); ?>
        <?php if($session->get('isLoggedIn')): ?>
            <p>Riwayat Pemesanan <?= esc($session->get('Nama_Depan')) ?></p>
        <?php endif; ?>
        <table>
            <thead>
                <tr>
                    <th>Nama Depan</th>
                    <th>Waktu Order</th>
                    <th>Status Order</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($riwayatPemesanan as $data): ?>
                    <tr>
                        <td><?= esc($data['Nama_Depan']) ?></td>
                        <td><?= esc($data['Waktu_Order']) ?></td>
                        <td><?= esc($data['Order_Status']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>