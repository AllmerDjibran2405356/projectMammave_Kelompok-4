<!DOCTYPE html>
<html>
    <head>
        <title>Manajemen Order</title>
        <script src="<?= base_url('js/Mitra/manajemenOrder.js') ?>"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
        <link rel="stylesheet" href="<?= base_url('css/Mitra/manajemenOrder.css') ?>">
    </head>
    <body>
        <button onclick="window.location.href='<?= base_url('Mitra/viewHomepageManajemen') ?>'" class="btn-back">back</button>
        <div class="orderList">
        <h1 id="judul">List Order</h1>
            <table>
                <h1>Dalam Proses</h1>
                <thead>
                    <tr>
                        <th>Nama Pelanggan</th>
                        <th>Alamat</th>
                        <th>Waktu Order</th>
                        <th>Status Order</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($orderDiproses as $order): ?>
                        <tr>
                            <td><?= esc($order['Nama_Depan']) ?></td>
                            <td><?= esc($order['Alamat']) ?></td>
                            <td><?= esc($order['Waktu_Order']) ?></td>
                            <td><?= esc($order['Order_Status']) ?></td>
                            <td>
                                <form class="tombolManajemen" method="POST" action="<?= base_url('Mitra/controllerManajemenOrder/orderContent') ?>">
                                    <input type="hidden" name="ID_User" value="<?= esc($order['ID_User']) ?>">
                                    <input type="hidden" name="Waktu_Order" value="<?= esc($order['Waktu_Order']) ?>">
                                    <button type="submit" class="btn btn-outline-success">Isi Order</button>
                                </form>
                                <form class="tombolManajemen" method="POST" action="<?= base_url('Mitra/controllerManajemenOrder/updateStatus') ?>">
                                    <input type="hidden" name="ID_User" value="<?= esc($order['ID_User']) ?>">
                                    <input type="hidden" name="Waktu_Order" value="<?= esc($order['Waktu_Order']) ?>">
                                    <input type="hidden" name="Nama_Depan" value="<?= esc($order['Nama_Depan']) ?>">
                                    <button type="submit" class="btn btn-outline-success">Update Status</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <table>
                <h1>Order yang Sudah Selesai</h1>
                <thead>
                    <th>Nama Pelanggan</th>
                    <th>Alamat</th>
                    <th>Waktu Order</th>
                    <th>Status Order</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    <?php foreach($orderSelesai as $order): ?>
                        <tr>
                            <td><?= esc($order['Nama_Depan']) ?></td>
                            <td><?= esc($order['Alamat']) ?></td>
                            <td><?= esc($order['Waktu_Order']) ?></td>
                            <td><?= esc($order['Order_Status']) ?></td>
                            <td>
                                <form class="tombolManajemen" method="POST" action="<?= base_url('Mitra/controllerManajemenOrder/orderContent') ?>">
                                    <input type="hidden" name="ID_User" value="<?= esc($order['ID_User']) ?>">
                                    <input type="hidden" name="Waktu_Order" value="<?= esc($order['Waktu_Order']) ?>">
                                    <button type="submit" class="btn btn-outline-success">Isi Order</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="orderContent <?= isset($show_order_content) && $show_order_content ? 'active' : '' ?>">
            <div id="modal-content">
            <h1>Isi Order</h1><button id="close" onclick="closeOrderContent()">&times;</button>
                <table>
                    <thead>
                        <tr>
                            <th><strong>Nama Pelanggan</strong></th>
                            <th><strong>Nama Menu</strong></th>
                            <th><strong>Jumlah</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($isi_order)): ?>
                            <?php foreach($isi_order as $item): ?>
                                <tr>
                                    <td><?= esc($item->Nama_Depan) ?></td>
                                    <td><?= esc($item->Nama_Menu) ?></td>
                                    <td><?= esc($item->Jumlah) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3">Tidak ada order</td>
                            </tr>
                        <?php endif;?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="updateStatus <?= isset($show_update_status) && $show_update_status ? 'active' : '' ?>">
            <div id="modal-content">
                <h2>Update Status Pemesanan</h2><button id="close" onclick="closeUpdateStatus()">&times;</button>
                <form action="<?= base_url('Mitra/controllerManajemenOrder/updateStatus') ?>" method="post">
                <input type="hidden" name="ID_User" value="<?= esc($selected_user ?? '') ?>">
                <input type="hidden" name="Waktu_Order" value="<?= esc($selected_waktu_order ?? '') ?>">
                    <table>
                        <thead>
                            <tr>
                                <td>Nama Pelanggan</td>
                                <td>Status Order</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= esc($selected_nama ?? 'Tidak diketahui') ?> <br>
                                <small><?= esc($selected_waktu_order ?? '') ?></small></td>
                                <td>
                                    <select name="Order_Status">
                                        <option value="Diproses">Diproses</option>
                                        <option value="Dikirim">Dikirim</option>
                                        <option value="Selesai">Selesai</option>
                                        <option value="Dibatalkan">Dibatalkan</option>
                                    </select>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-outline-danger">Update Status</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>