<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Menu</title>
    <script src="<?= base_url('js/Mitra/manajemenMenu.js') ?>"></script>
    <script src="<?= base_url('js/Mitra/manajemenOrder.js') ?>"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/Mitra/manajemenMenu.css') ?>">
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
                            <td><img src="<?= base_url('images/menu/' . esc($menu['Nama_Gambar'])) ?>" class="img-thumbnail" width="100"></td>
                            <td>
                                <div class="d-flex flex-column gap-2">
                                    <button class="btn btn-outline-success btn-sm" onclick='openEditMenu(<?= json_encode($menu) ?>)'>Edit</button>
                                    <form action="<?= base_url('Mitra/controllerManajemenMenu/deleteMenu/' . $menu['ID_Menu']) ?>" method="post" onsubmit="return confirm('Yakin ingin menghapus menu ini?')">
                                        <input type="hidden" name="deleteMenu" value="deleted">
                                        <button class="btn btn-outline-danger btn-sm" type="submit">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach;
                else: ?>
                    <tr><td colspan="6" class="text-muted">Belum ada menu dalam kategori ini.</td></tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php endforeach; ?>
</div>
</body>
</html>