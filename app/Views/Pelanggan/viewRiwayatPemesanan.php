<!DOCTYPE html>
<html>
    <head>
        <title>Riwayat Pemesanan</title>
        <script src="<?= base_url('js/Pelanggan/riwayatPemesanan.js') ?>"></script>
        <link rel="stylesheet" href="<?= base_url('css/Pelanggan/riwayatPemesanan.css') ?>">
        <link rel="stylesheet" href="<?= base_url('css/Pelanggan/header.css') ?>">
    </head>
    <body>
        <?= view('layout/header') ?>
        <?php $session = session(); ?>
        <?php if($session->get('isLoggedIn')): ?>
            <p>Riwayat Pemesanan <?= esc($session->get('Nama_Depan')) ?></p>
        <?php endif; ?>
        <div class="orderDalamProses">
            <h1>Dalam Proses</h1>
            <table>
                <thead>
                    <tr>
                        <th>Waktu Order</th>
                        <th>Status Order</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($orderDiproses as $data): ?>
                        <tr>
                            <td><?= esc($data['Waktu_Order']) ?></td>
                            <td><?= esc($data['Order_Status']) ?></td>
                            <td>
                                <form class="tombolManajemen" method="POST" action="<?= base_url('Pelanggan/controllerRiwayatPemesanan/isiOrder') ?>">
                                    <input type="hidden" name="ID_User" value="<?= esc($data['ID_User']) ?>">
                                    <input type="hidden" name="Waktu_Order" value="<?= esc($data['Waktu_Order']) ?>">
                                    <button type="submit">Isi Order</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="orderSelesai">
            <h1>Order yang Sudah Selesai</h1>
            <table>
                <thead>
                    <tr>
                        <th>Waktu Order</th>
                        <th>Status Order</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($orderSelesai as $data): ?>
                        <tr>
                            <td><?= esc($data['Waktu_Order']) ?></td>
                            <td><?= esc($data['Order_Status']) ?></td>
                            <td>
                                <form class="tombolManajemen" method="POST" action="<?= base_url('Pelanggan/controllerRiwayatPemesanan/isiOrder') ?>">
                                    <input type="hidden" name="ID_User" value="<?= esc($data['ID_User']) ?>">
                                    <input type="hidden" name="Waktu_Order" value="<?= esc($data['Waktu_Order']) ?>">
                                    <button type="submit">Isi Order</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div>
            <h1>Isi Order</h1>
            <table>
                <thead>
                    <tr>
                        <th>Nama Menu</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($isi_order)): ?>
                        <?php foreach($isi_order as $item): ?>
                            <tr>
                                <td><?= esc($item->Nama_Menu) ?></td>
                                <td><?= esc($item->Jumlah) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="2">Tidak ada order</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </body>
</html>