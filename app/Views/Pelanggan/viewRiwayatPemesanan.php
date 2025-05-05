<!DOCTYPE html>
<html>
    <head>
        <title>Riwayat Pemesanan</title>
        <script src="<?= base_url('js/Pelanggan/riwayatPemesanan.js') ?>"></script>
        <link rel="stylesheet" href="<?= base_url('css/Pelanggan/riwayatPemesanan.css') ?>">
        <link rel="stylesheet" href="<?= base_url('css/Pelanggan/header.css') ?>">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    </head>
    <body>
        <?= view('layout/header') ?>
        <div class="main-layout">
            <div class="order-area">
                <h1 class="section-title">Order Dalam Proses</h1>
                <?php foreach($orderDiproses as $data): ?>
                <div class="order-card">
                    <div class="order-info">
                        <div class="order-field"><?= esc($data['Waktu_Order']) ?></div>
                        <div class="order-field"><?= esc($data['Total_Harga']) ?></div>
                        <div class="order-field"><?= esc($data['Alamat']) ?></div>
                    </div>
                        <div class="order-info">
                            <div class="order-field"><?= esc($data['Order_Status']) ?></div>
                            <div class="order-action">
                                <form method="POST" action="<?= base_url('Pelanggan/controllerRiwayatPemesanan/isiOrder') ?>">
                                    <input type="hidden" name="ID_User" value="<?= esc($data['ID_User']) ?>">
                                    <input type="hidden" name="Waktu_Order" value="<?= esc($data['Waktu_Order']) ?>">
                                    <button type="submit">Isi Order</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <h1 class="section-title">Order Yang Sudah Selesai</h1>
                <?php foreach($orderSelesai as $data): ?>
                    <div class="order-card">
                        <div class="order-info">
                            <div class="order-field"><?= esc($data['Waktu_Order']) ?></div>
                            <div class="order-field"><?= esc($data['Total_Harga']) ?></div>
                            <div class="order-field"><?= esc($data['Alamat']) ?></div>
                        </div>
                        <div class="order-info">
                            <div class="order-field"><?= esc($data['Order_Status']) ?></div>
                            <div class="order-action">
                                <form method="POST" action="<?= base_url('Pelanggan/controllerRiwayatPemesanan/isiOrder') ?>">
                                    <input type="hidden" name="ID_User" value="<?= esc($data['ID_User']) ?>">
                                    <input type="hidden" name="Waktu_Order" value="<?= esc($data['Waktu_Order']) ?>">
                                    <button type="submit">Isi Order</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="order-content">
                <h2>Isi Order</h2>
                <ul>
                    <?php if(!empty($isi_order)): ?>
                        <?php foreach($isi_order as $item): ?>
                            <li>
                                <span><?= esc($item['Nama_Menu']) ?></span>
                                <span>x<?= esc($item['Jumlah']) ?></span>
                                <span><?= esc($item['Total_Harga']) ?></span>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li><span>Tidak ada order</span></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </body>
</html>