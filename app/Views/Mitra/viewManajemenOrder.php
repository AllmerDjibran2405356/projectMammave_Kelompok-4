<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Order</title>
    <script src="<?= base_url('js/Mitra/manajemenOrder.js') ?>"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/Mitra/manajemenOrder.css') ?>">
</head>
<body style="background-color: #f8f9fa;">
<div class="container py-4">
    <h1 class="text-center mb-4">Manajemen Order</h1>

    <div class="d-flex justify-content-center gap-3 mb-4 flex-wrap">
        <a href="<?= base_url('Mitra/viewHomepageManajemen') ?>" class="btn btn-secondary">🔙 Kembali</a>
    </div>

    <div class="orderList">
        <div class="mb-5">
            <h2 class="text-center mb-4">Order dalam Proses</h2>
            <table class="table table-bordered table-hover text-center order-table">
                <thead class="table-danger">
                    <tr>
                        <th>Nama Pelanggan</th>
                        <th>Alamat</th>
                        <th>Waktu Order</th>
                        <th>Status Order</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orderDiproses as $order): ?>
                        <tr>
                            <td><?= esc($order['Nama_Depan']) ?></td>
                            <td><?= esc($order['Alamat']) ?></td>
                            <td><?= esc($order['Waktu_Order']) ?></td>
                            <td><?= esc($order['Order_Status']) ?></td>
                            <td>
                                <div class="d-flex flex-column gap-2">
                                    <form method="POST" action="<?= base_url('Mitra/controllerManajemenOrder/orderContent') ?>">
                                        <input type="hidden" name="ID_User" value="<?= esc($order['ID_User']) ?>">
                                        <input type="hidden" name="Waktu_Order" value="<?= esc($order['Waktu_Order']) ?>">
                                        <button type="submit" class="btn btn-outline-success btn-sm">Isi Order</button>
                                    </form>
                                    <form method="POST" action="<?= base_url('Mitra/controllerManajemenOrder/updateStatus') ?>">
                                        <input type="hidden" name="ID_User" value="<?= esc($order['ID_User']) ?>">
                                        <input type="hidden" name="Waktu_Order" value="<?= esc($order['Waktu_Order']) ?>">
                                        <input type="hidden" name="Nama_Depan" value="<?= esc($order['Nama_Depan']) ?>">
                                        <button type="submit" class="btn btn-outline-success btn-sm">Update Status</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="mb-5">
            <h2 class="text-center mb-4">Order yang Sudah Selesai</h2>
            <table class="table table-bordered table-hover text-center order-table">
                <thead class="table-success">
                    <tr>
                        <th>Nama Pelanggan</th>
                        <th>Alamat</th>
                        <th>Waktu Order</th>
                        <th>Status Order</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orderSelesai as $order): ?>
                        <tr>
                            <td><?= esc($order['Nama_Depan']) ?></td>
                            <td><?= esc($order['Alamat']) ?></td>
                            <td><?= esc($order['Waktu_Order']) ?></td>
                            <td><?= esc($order['Order_Status']) ?></td>
                            <td>
                                <form method="POST" action="<?= base_url('Mitra/controllerManajemenOrder/orderContent') ?>">
                                    <input type="hidden" name="ID_User" value="<?= esc($order['ID_User']) ?>">
                                    <input type="hidden" name="Waktu_Order" value="<?= esc($order['Waktu_Order']) ?>">
                                    <button type="submit" class="btn btn-outline-success btn-sm">Isi Order</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="orderContent <?= isset($show_order_content) && $show_order_content ? 'active' : '' ?>">
        <div id="modal-content">
            <h1 class="text-center mb-4">Isi Order</h1>
            <button id="close" onclick="closeOrderContent()" class="btn-close">&times;</button>
            <table class="table table-bordered table-hover text-center">
                <thead class="table-info">
                    <tr>
                        <th>Nama Pelanggan</th>
                        <th>Nama Menu</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($isi_order)): ?>
                        <?php foreach ($isi_order as $item): ?>
                            <tr>
                                <td><?= esc($item->Nama_Depan) ?></td>
                                <td><?= esc($item->Nama_Menu) ?></td>
                                <td><?= esc($item->Jumlah) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="3" class="text-muted">Tidak ada order</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="updateStatus <?= isset($show_update_status) && $show_update_status ? 'active' : '' ?>">
        <div id="modal-content">
            <h2 class="text-center mb-4">Update Status Pemesanan</h2>
            <button id="close" onclick="closeUpdateStatus()" class="btn-close">&times;</button>
            <form action="<?= base_url('Mitra/controllerManajemenOrder/updateStatus') ?>" method="post">
                <input type="hidden" name="ID_User" value="<?= esc($selected_user ?? '') ?>">
                <input type="hidden" name="Waktu_Order" value="<?= esc($selected_waktu_order ?? '') ?>">
                <table class="table table-bordered table-hover text-center">
                    <thead class="table-warning">
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
                                <select name="Order_Status" class="form-select">
                                    <option value="Diproses">Diproses</option>
                                    <option value="Dikirim">Dikirim</option>
                                    <option value="Selesai">Selesai</option>
                                    <option value="Dibatalkan">Dibatalkan</option>
                                </select>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-outline-danger btn-sm">Update Status</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
</body>
</html>
