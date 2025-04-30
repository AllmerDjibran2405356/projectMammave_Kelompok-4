<!DOCTYPE html>
<html>
    <head>
        <title>Manajemen Menu</title>
        <script src="<?= base_url('js/Mitra/manajemenMenu.js') ?>"></script>
        <link rel="stylesheet" href="<?= base_url('css/Mitra/manajemenMenu.css') ?>">
    </head>
    <body>
        <div class="menuList">
            <h1>Manajemen Menu</h1>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Menu</th>
                        <th>Nama Kategori</th>
                        <th>Harga</th>
                        <th>Deskripsi Menu</th>
                        <th>Gambar Menu</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1; foreach($menu_list as $menu): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= esc($menu['Nama_Menu']) ?></td>
                        <td><?= esc($menu['Nama_Kategori']) ?></td>
                        <td><?= esc($menu['Harga']) ?></td>
                        <td><?= esc($menu['Deskripsi_Menu']) ?></td>
                        <td><img src="<?= base_url('images/menu/' . esc($menu['Nama_Gambar'])) ?>"></td>
                        <td>
                            <button type="button" onclick='openEditMenu(<?= json_encode($menu) ?>)'>Edit</button>
                            <button href="<?= base_url('Mitra/controllerManajemenMenu/deleteMenu/' . $menu['ID_Menu']) ?>">Hapus</button>
                        </td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <div class="editMenu">
            <h1>Edit Menu</h1><button onclick="closeEditMenu()">x</button><br>
            <form action="<?= site_url('Mitra/controllerManajemenMenu/editMenu') ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="ID_Menu" id="edit-ID_Menu">
                <input type="hidden" name="Nama_Gambar" id="edit-Nama_Gambar">
                <table>
                    <tr>
                        <td><strong>Nama Menu</strong><br></td>
                        <td><strong>ID Kategori</strong><br></td>
                        <td><strong>Harga</strong><br></td>
                        <td><strong>Deskripsi Menu</strong></td>
                        <td><strong>Gambar</strong></td>
                    </tr>
                    <tr>
                        <td><input required type="text" name="Nama_Menu" id="edit-Nama_Menu"></td>
                        <td><input required type="number" name="ID_Kategori" id="edit-ID_Kategori"></td>
                        <td><input required type="number" name="Harga" id="edit-Harga"></td>
                        <td><input required type="text" name="Deskripsi_Menu" maxlength="255" id="edit-Deskripsi_Menu"></td>
                        <td><input type="file" id="myFile" name="Gambar"></td>
                    </tr>
                </table>
                <button type="submit">Simpan Perubahan</button>
            </form>
        </div>

        <button onclick="openTambahMenu()">Tambah Menu</button>
        <button onclick="openKategori()">List Kategori</button>

        <div class="kategori">
            <h1>List Kategori</h1><button onclick="closeKategori()">x</button>
            <table>
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
                        <button href="<?= base_url('Mitra/controllerManajemenMenu/deleteKategori/' . $kategori['ID_Kategori']) ?>">Hapus</button>
                    </td>
                </tr>
                <?php endforeach ?>
            </table>
            <button onclick="openKategoriManagement()">Tambah Kategori</button>
        </div>

        <div class="manageKategori">
            <form action="<?= site_url('Mitra/controllerManajemenMenu/addKategori') ?>" method="post">
                <h1>Tambahkan Kategori Baru</h1><button onclick="closeKategoriManagement()">x</button><br>
                <input required type="text" name="Nama_Kategori">
                <button type="submit">Tambah Kategori</button>
            </form>
        </div>

        <div class="addMenu">
        <h1>Tambahkan Menu Baru</h1><button onclick="closeTambahMenu()">x</button><br>
            <form action="<?= site_url('Mitra/controllerManajemenMenu/addMenu') ?>" method="post">
                <strong>Nama Menu</strong><br>
                <input required type="text" name="Nama_Menu"><br>
                <strong>ID Kategori</strong><br>
                <input required type="number" name="ID_Kategori"><br>
                <strong>Harga</strong><br>
                <input required type="number" name="Harga"><br>
                <button type="submit">Tambah Menu</button>
            </form>
        </div>
    </body>
</html>