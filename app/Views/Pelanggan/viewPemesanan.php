<!DOCTYPE html>
<html>
    <head>
        <title>Pemesanan</title>
        <script src="<?= base_url('js/Pelanggan/pemesanan.js') ?>"></script>
        <link rel="stylesheet" href="<?= base_url('css/Pelanggan/pemesanan.css') ?>">
    </head>
    <body>
        <div class="listMenu">
            <h1>List Menu</h1>
                <?php if(session()->getFlashdata('success')): ?>
                <p style="color: green;"><?= session()->getFlashdata('success') ?></p>
                <?php endif; ?>
            <table>
                <?php foreach($menu_list as $menu): ?>
                    <tr>
                        <td><?= esc($menu['Nama_Menu']) ?></td>
                        <td><?= esc($menu['Nama_Kategori']) ?></td>
                        <td><?= esc($menu['Harga']) ?></td>
                        <td>
                            <form action="<?= site_url('/Pelanggan/controllerPemesanan/tambahKeranjang') ?>" method="post">
                            <input type="hidden" name="ID_Menu" value="<?= esc($menu['ID_Menu']) ?>">
                            <input type="number" name="jumlah" value="1" min="1" style="width: 60px;">
                        </td>
                        <td>
                            <button type="submit">Tambah ke Keranjang</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>

        <div class="keranjang">
            <h2>Keranjang</h2>
            <?php if(!empty($keranjang)): ?>
                <ul>
                    <?php foreach ($keranjang as $id_menu => $jumlah): ?>
                        <li>
                            ID Menu: <?= esc($nama_menu_keranjang[$id_menu]) ?> | Jumlah: <?= esc($jumlah) ?>
                            <form action="<?= site_url('/Pelanggan/controllerPemesanan/kurangiKeranjang') ?>" method="post" style="display:inline;">
                                <input type="hidden" name="ID_Menu" value="<?= esc($id_menu) ?>">
                                <button type="submit">Kurangi</button>
                            </form>
                        </li>
                    <?php endforeach ?>
                </ul>
                <form action="<?= site_url('/Pelanggan/controllerPemesanan/checkout') ?>" method="post">
                    <button type="submit">Checkout</button>
                </form>
            <?php else: ?>
                <p>Keranjang masih kosong.</p>
            <?php endif ?>
        </div>
    </body>
</html>