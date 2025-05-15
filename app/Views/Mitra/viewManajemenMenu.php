<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <title>Manajemen Menu</title>
        
        <link rel="stylesheet" href="<?= base_url('css/Mitra/manajemenMenu.css') ?>">
        
        <script src="<?= base_url('js/Mitra/manajemenMenu.js') ?>"></script>
        <script src="<?= base_url('js/Mitra/manajemenOrder.js') ?>"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    </head>
    <body style="background-color: #f8f9fa;">
        <div class="container py-4">
            <h1 class="text-center mb-4">Manajemen Menu</h1>

            <div class="d-flex justify-content-center gap-3 mb-4 flex-wrap">
                <button onclick="openTambahMenu()" class="btn btn-success">➕ Tambah Menu</button>
                <button onclick="openKategori()" class="btn btn-info text-white">📂 List Kategori</button>
                <a href="<?= base_url('Mitra/viewHomepageManajemen') ?>" class="btn btn-secondary">🔙 Kembali</a>
            </div>

            <?php foreach($menu_kategori as $kategori): ?>
            <div class="card mb-4 shadow">
                <div class="card-header bg-warning text-white">
                    <h5 class="mb-0"><?= esc($kategori['Nama_Kategori']) ?></h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover text-center table-kategori">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Menu</th>
                                <th>Harga</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $menus = $menu_by_kategori[$kategori['ID_Kategori']] ?? [];
                            if (count($menus) > 0):
                                $no = 1;
                                foreach ($menus as $menu): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= esc($menu['Nama_Menu']) ?></td>
                                    <td>Rp<?= number_format($menu['Harga'], 0, ',', '.') ?></td>
                                    <td><?= esc($menu['Deskripsi_Menu']) ?></td>
                                    <td>
                                        <img src="<?= base_url('images/menu/' . esc($menu['Nama_Gambar'])) ?>" class="img-thumbnail" width="100">
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column gap-2">
                                            <button class="btn btn-outline-success btn-sm w-100" onclick='openEditMenu(<?= json_encode($menu) ?>)'>Edit</button>
                                            <form action="<?= base_url('Mitra/controllerManajemenMenu/deleteMenu/' . $menu['ID_Menu']) ?>" method="post" onsubmit="return confirm('Yakin ingin menghapus menu ini?')">
                                                <input type="hidden" name="deleteMenu" value="deleted">
                                                <button class="btn btn-outline-danger btn-sm w-100" type="submit">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; else: ?>
                                <tr><td colspan="6" class="text-muted">Belum ada menu dalam kategori ini.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="editMenu" id="modal">
            <div id="modal-content-menu">
                <h1>Edit Menu</h1><button id="close" onclick="closeEditMenu()">&times;</button>
                <form action="<?= site_url('Mitra/controllerManajemenMenu/editMenu') ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="ID_Menu" id="edit-ID_Menu">
                    <input type="hidden" name="Nama_Gambar" id="edit-Nama_Gambar">
                    <input required type="text" name="Nama_Menu" id="edit-Nama_Menu">
                    <select required name="ID_Kategori" id="edit-ID_Kategori">
                        <option value="">Pilih Kategori</option>
                        <?php foreach($menu_kategori as $kategori): ?>
                            <option value="<?= esc($kategori['ID_Kategori']) ?>" <?= ($menu['ID_Kategori'] == $kategori['ID_Kategori']) ? 'selected' : '' ?>>
                                <?= esc($kategori['Nama_Kategori']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <input required type="number" name="Harga" id="edit-Harga">
                    <input required type="text" name="Deskripsi_Menu" maxlength="255" id="edit-Deskripsi_Menu">
                    <input type="file" id="myFile" name="Gambar">
                    <button type="submit">Simpan Perubahan</button>
                </form>
            </div>
        </div>


        <div class="kategori" id="modal">
            <div id="modal-content-kategori">
                <h1>List Kategori</h1>
                <button id="close" onclick="closeKategori()">&times;</button>
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
                        <td class="text-center align-middle">
                            <form action="<?= base_url('Mitra/controllerManajemenMenu/deleteKategori/' . $kategori['ID_Kategori']) ?>" method="post" onsubmit="return confirm('Apakah anda yakin ingin menghapus kategori ini?')">
                                <input type="hidden" name="deleteKategori" value="deleted">
                                <button type="submit" class="btn btn-sm text-white fw-bold" style="background-color: #dc3545;">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <button onclick="openKategoriManagement()" type="button" class="btn btn-primary mt-3">Tambah Kategori</button>
            </div>
        </div>

        <div class="manageKategori" id="modal">
            <div id="modal-content-kategori">
                <h1>Tambahkan Kategori Baru</h1>
                <button id="close" onclick="closeKategoriManagement()">&times;</button>
                <form action="<?= site_url('Mitra/controllerManajemenMenu/addKategori') ?>" method="post" class="form-group">
                    <input required type="text" name="Nama_Kategori" class="form-control mb-2">
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
                                <input required type="text" name="Nama_Menu" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <strong>Kategori Menu</strong><br>
                                <select required name="ID_Kategori" class="form-control">
                                    <option value="">Pilih Kategori</option>
                                    <?php foreach($menu_kategori as $kategori): ?>
                                    <option value="<?= esc($kategori['ID_Kategori']) ?>">
                                        <?= esc($kategori['Nama_Kategori']) ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <strong>Harga</strong><br>
                                <input required type="number" name="Harga" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <strong>Deskripsi Menu</strong><br>
                                <input required type="text" name="Deskripsi_Menu" maxlength="255" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <strong>Gambar Menu</strong><br>
                                <input required type="file" name="Gambar" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Tambah Menu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>