<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pemesanan</title>
        <script src="<?= base_url('js/Pelanggan/pemesanan.js') ?>"></script>
        <link rel="stylesheet" href="<?= base_url('css/Pelanggan/pemesanan.css') ?>">
        <link rel="stylesheet" href="<?= base_url('css/pelanggan/homepage.css') ?>">
        <link rel="stylesheet" href="<?= base_url('css/Pelanggan/header.css') ?>">
        <link rel="stylesheet" href="<?= base_url('css/Pelanggan/footer.css') ?>">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    </head>
    <body>
        <?= view('layout/header') ?>

        <div class="main-layout">
            <div class="menu-area">
                <h1 class="judulListMenu">List Menu</h1>
                <div class="listMenu">
                    <?php if(session()->getFlashdata('success')): ?>
                        <p style="color: green;"><?= session()->getFlashdata('success') ?></p>
                    <?php endif; ?>

                    <?php foreach($menu_list as $kategori => $menus): ?>
                        <div class="kategori-menu">
                            <h2><?= esc($kategori) ?></h2>

                            <div class="menu-scroll-controls">
                                <button onclick="scrollMenu(this, 'left')" class="scroll-btn" data-target="<?= esc(url_title($kategori, '_', true)) ?>"><i class="bi bi-chevron-left"></i></button>
                                <button onclick="scrollMenu(this, 'right')" class="scroll-btn" data-target="<?= esc(url_title($kategori, '_', true)) ?>"><i class="bi bi-chevron-right"></i></button>
                            </div>

                            <div class="menuRow" id="<?= esc(url_title($kategori, '_', true)) ?>">
                                <?php foreach($menus as $menu): ?>
                                    <div class="menuItem">
                                        <?php if (!empty($menu['Nama_Gambar']) && file_exists(FCPATH . 'images/menu/' . $menu['Nama_Gambar'])): ?>
                                            <img src="<?= base_url('images/menu/' . esc($menu['Nama_Gambar'])) ?>" alt="<?= esc($menu['Nama_Menu']) ?>">
                                        <?php endif; ?>
                                        <div><strong><?= esc($menu['Nama_Menu']) ?></strong></div>
                                        <div><?= esc($menu['Deskripsi_Menu']) ?></div>
                                        <div>Rp <?= number_format($menu['Harga'], 0, ',', '.') ?></div>

                                        <form action="<?= site_url('/Pelanggan/controllerPemesanan/tambahKeranjang') ?>" method="post">
                                            <input type="hidden" name="ID_Menu" value="<?= esc($menu['ID_Menu']) ?>">
                                            <div class="jumlahItem">
                                                <button type="button" onclick="changeJumlah(<?= esc($menu['ID_Menu']) ?>, -1)">-</button>
                                                <input type="number" id="jumlahInput_<?= esc($menu['ID_Menu']) ?>" name="jumlah" value="1" min="1">
                                                <button type="button" onclick="changeJumlah(<?= esc($menu['ID_Menu']) ?>, 1)">+</button>
                                            </div>
                                            <button type="submit">Tambah ke Keranjang</button>
                                        </form>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>


            <div class="keranjang">
                <h2>Keranjang</h2>
                <?php if(!empty($keranjang)): ?>
                    <ul>
                        <?php foreach ($keranjang as $id_menu => $jumlah): ?>
                            <li>
                                <?= esc($nama_menu_keranjang[$id_menu]) ?> | Jumlah: <?= esc($jumlah) ?>
                                <form action="<?= site_url('/Pelanggan/controllerPemesanan/kurangiKeranjang') ?>" method="post" style="display:inline;">
                                    <input type="hidden" name="ID_Menu" value="<?= esc($id_menu) ?>">
                                    <button type="submit">Kurangi</button>
                                </form>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <button type="button" class="btn-confirm" onclick="showPopup()">✔ Checkout</button>
                <?php else: ?>
                    <p>Keranjang masih kosong.</p>
                <?php endif; ?>
            </div>
        </div>
        
        <div id="checkoutPopup" class="checkout-popup">
            <div class="checkout-content">
                <h3>Konfirmasi Pemesanan</h3>
                <ul id="checkoutList">
                    <script>
                        const keranjang = <?= json_encode($keranjang) ?>;
                        const namaMenu = <?= json_encode($nama_menu_keranjang) ?>;

                        function showPopup() {
                            const listElement = document.getElementById('checkoutList');
                            listElement.innerHTML = '';

                            for (const id in keranjang) {
                                const li = document.createElement('li');
                                li.textContent = `${namaMenu[id]} - Jumlah: ${keranjang[id]}`;
                                listElement.appendChild(li);
                            }

                            document.getElementById('checkoutPopup').style.display = 'block';
                        }

                        function closePopup() {
                            document.getElementById('checkoutPopup').style.display = 'none';
                        }
                    </script>
                </ul>
                <form id="checkoutForm" action="<?= site_url('/Pelanggan/controllerPemesanan/checkout') ?>" method="post">
                    <div class="button-group">
                        <button type="submit" class="btn-confirm">✔ Konfirmasi</button>
                        <button type="button" class="btn-cancel" onclick="closePopup()">✖ Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>