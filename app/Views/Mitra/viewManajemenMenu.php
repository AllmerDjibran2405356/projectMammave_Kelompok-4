<!DOCTYPE html>
<html>
    <head>
        <title>Manajemen Menu</title>
        <script src="<?= base_url('js/Mitra/manajemenMenu.js') ?>"></script>
        <script src="<?= base_url('js?Mitra/manajemenOrder.js') ?>"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
        <link rel="stylesheet" href="<?= base_url('css/Mitra/manajemenMenu.css') ?>">
    </head>
    <body>
        <button onclick="window.location.href='<?= base_url('Mitra/viewHomepageManajemen') ?>'" class="btn-back">back</button><br>
        <?php foreach($menu_kategori as $kategori): ?>
            <div class="kategoriTable">
                <h2><?= esc($kategori['Nama_Kategori']) ?></h2>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Menu</th>
                            <th>Harga</th>
                            <th>Deskripsi Menu</th>
                            <th>Gambar Menu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $menus = $menu_by_kategori[$kategori['ID_Kategori']] ?? [];
                        if (count($menus) > 0):
                            $no = 1;
                            foreach($menus as $menu): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= esc($menu['Nama_Menu']) ?></td>
                                    <td><?= esc($menu['Harga']) ?></td>
                                    <td><?= esc($menu['Deskripsi_Menu']) ?></td>
                                    <td><img src="<?= base_url('images/menu/' . esc($menu['Nama_Gambar'])) ?>" width="100"></td>
                                    <td class="tombolAksi">
                                        <button type="button" onclick='openEditMenu(<?= json_encode($menu) ?>)' class="btn btn-outline-success">Edit</button>
                                        <form action="<?= base_url('Mitra/controllerManajemenMenu/deleteMenu/' . $menu['ID_Menu']) ?>" method="post" onsubmit="return confirm('Apakah anda yaking ingi menghapus menu ini?')">
                                            <input type="hidden" name="deleteMenu" value="deleted">
                                            <button type="submit" class="btn btn-outline-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="6" style="text-align:center;">Data masih kosong</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <br>
        <?php endforeach; ?>

        <div class="editMenu" id="modal">
            <div id="modal-content-menu">
                <h1>Edit Menu</h1><button id="close" onclick="closeEditMenu()">&times;</button>
                <form action="<?= site_url('Mitra/controllerManajemenMenu/editMenu') ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="ID_Menu" id="edit-ID_Menu">
                    <input type="hidden" name="Nama_Gambar" id="edit-Nama_Gambar">
                    <table class="popup-table">
                        <tr>
                            <td><strong>Nama Menu</strong><br></td>
                            <td><strong>ID Kategori</strong><br></td>
                            <td><strong>Harga</strong><br></td>
                            <td><strong>Deskripsi Menu</strong></td>
                            <td><strong>Gambar</strong></td>
                        </tr>
                        <tr>
                            <td><input required type="text" name="Nama_Menu" id="edit-Nama_Menu"></td>
                            <td>
                                <select required name="ID_Kategori" id="edit-ID_Kategori">
                                    <option value="">Pilih Kategori</option>
                                    <?php foreach($menu_kategori as $kategori): ?>
                                        <option value="<?= esc($kategori['ID_Kategori']) ?>" <?= ($menu['ID_Kategori'] == $kategori['ID_Kategori']) ? 'selected' : '' ?>>
                                            <?= esc($kategori['Nama_Kategori']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td><input required type="number" name="Harga" id="edit-Harga"></td>
                            <td><input required type="text" name="Deskripsi_Menu" maxlength="255" id="edit-Deskripsi_Menu"></td>
                            <td><input type="file" id="myFile" name="Gambar"></td>
                        </tr>
                    </table>
                    <button type="submit">Simpan Perubahan</button>
                </form>
            </div>
        </div>

        <button onclick="openTambahMenu()" type="button" class="btn btn-primary">Tambah Menu</button>
        <button onclick="openKategori()" type="button" class="btn btn-primary">List Kategori</button>

        <div class="kategori" id="modal">
            <div id="modal-content-kategori">
                <h1>List Kategori</h1><button id="close" onclick="closeKategori()">&times;</button>
                <table class="popup-table">
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                    <?php $no = 1; foreach($menu_kategori as $kategori): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= esc($kategori['Nama_Kategori']) ?></td>
                        <td>
                            <button href="<?= base_url('Mitra/controllerManajemenMenu/deleteKategori/' . $kategori['ID_Kategori']) ?>" class="btn btn-outline-danger">Hapus</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <button onclick="openKategoriManagement()" type="button" class="btn btn-primary">Tambah Kategori</button>
            </div>
        </div>

        <div class="manageKategori" id="modal">
            <div id="modal-content-kategori">
                <h1>Tambahkan Kategori Baru</h1><button id="close" onclick="closeKategoriManagement()">&times;</button>
                <form action="<?= site_url('Mitra/controllerManajemenMenu/addKategori') ?>" method="post" class="form-group">
                    <input required type="text" name="Nama_Kategori">
                    <button type="submit" class="btn btn-primary">Tambah Kategori</button>
                </form>
            </div>
        </div>

        <div class="addMenu" id="modal">
            <div id="modal-content">
                <div id="modal-container">
                    <div id="modal-form">
                        <button id="close" onclick="closeTambahMenu()">&times;</button>
                        <h2>Tambahkan Menu Baru</h2>
                        <form action="<?= site_url('Mitra/controllerManajemenMenu/addMenu') ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <strong>Nama Menu</strong><br>
                                <input required type="text" name="Nama_Menu"><br>
                            </div>

                            <div class="form-group">
                            <strong>Kategori Menu</strong><br>
                                <select required name="ID_Kategori" id="edit-ID_Kategori">
                                    <option value="">Pilih Kategori</option>
                                        <?php foreach($menu_kategori as $kategori): ?>
                                        <option value="<?= esc($kategori['ID_Kategori']) ?>" <?= ($menu['ID_Kategori'] == $kategori['ID_Kategori']) ? 'selected' : '' ?>>
                                            <?= esc($kategori['Nama_Kategori']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select><br>
                            </div>

                            <div class="form-group">
                                <strong>Harga</strong><br>
                                <input required type="number" name="Harga"><br>
                            </div>

                            <div class="form-group">
                                <strong>Deskripsi Menu</strong><br>
                                <input required type="text" name="Deskripsi_Menu" maxlength="255"><br>
                            </div>

                            <div class="form-group">
                                <strong>Gambar Menu</strong><br>
                                <input type="file" id="myFile" name="Gambar"><br>
                            </div>

                            <button type="submit" class="btn btn-primary">Tambah Menu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>