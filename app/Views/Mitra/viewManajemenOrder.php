<!DOCTYPE html>
<html>
    <head>
        <title>Manajemen Order</title>
        <script src="<?= base_url('js/Mitra/manajemenOrder.js') ?>"></script>
        <link rel="stylesheet" href="<?= base_url('css/Mitra/manajemenOrder.css') ?>">
    </head>
    <body>
        <div class="orderList">
        <h1>List Order</h1>
            <table>
                <thead>
                    <tr>
                        <th>Nama Pelanggan</th>
                        <th>Waktu Order</th>
                        <th>Status Order</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $grouped_orders = [];

                    foreach($order_list as $order){
                        $grouping = $order['Nama_Depan'] . '_' . $order['Waktu_Order'] . '_' . $order['Order_Status'];
                    
                        if(!isset($grouped_orders[$grouping])){
                            $grouped_orders[$grouping] = [
                                'Nama_Depan' => $order['Nama_Depan'],
                                'Waktu_Order' => $order['Waktu_Order'],
                                'Order_Status' => $order['Order_Status'],
                                'ID_User' => $order['ID_User'],
                                'ID_Order' => []
                            ];
                        }

                        $grouped_orders[$grouping]['ID_Order_List'][] = $order['ID_Order'];
                    }                    
                    ?>
                    <?php foreach($grouped_orders as $order): ?>
                        <tr>
                            <td><?= esc($order['Nama_Depan']) ?></td>
                            <td><?= esc($order['Waktu_Order']) ?></td>
                            <td><?= esc($order['Order_Status']) ?></td>
                            <td>
                                <form method="POST" action="<?= base_url('Mitra/controllerManajemenOrder/orderContent') ?>">
                                    <input type="hidden" name="ID_User" value="<?= esc($order['ID_User']) ?>">
                                    <input type="hidden" name="Waktu_Order" value="<?= esc($order['Waktu_Order']) ?>">
                                    <button type="submit">Isi Order</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="orderContent">
            <h1>Isi Order</h1>
            <button onclick="closeOrderContent()">x</button>
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

        <div class="updateStatus">
            <h2>Update Status Pemesanan</h2>
            <form>
                <table>
                    <thead>
                        <tr>
                            <td>Nama Pelanggan</td>
                            <td>Status Order</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= esc($item->Nama_Depan) ?></td>
                            <td>
                                <select>
                                    <option>Diproses</option>
                                    <option>Dikirim</option>
                                    <option>Selesai</option>
                                    <option>Dibatalkan</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </body>
</html>