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
        <div>
            <h2>Dalam Proses</h2>
            <table>
                <thead>
                    <tr>
                        <th>Waktu Order</th>
                        <th>Status Order</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($orderDiproses as $data): ?>
                        <tr>
                            <td><?= esc($data['Waktu_Order']) ?></td>
                            <td><?= esc($data['Order_Status']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div>
            <h2>Order yang Sudah Selesai</h2>
            <table>
                <thead>
                    <tr>
                        <th>Waktu Order</th>
                        <th>Status Order</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($orderSelesai as $data): ?>
                        <tr>
                            <td><?= esc($data['Waktu_Order']) ?></td>
                            <td><?= esc($data['Order_Status']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </body>
</html>