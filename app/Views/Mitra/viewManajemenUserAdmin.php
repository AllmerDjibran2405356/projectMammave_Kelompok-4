<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen User Web Admin</title>
    <link rel="stylesheet" href="<?= base_url('css/Mitra/manajemenAkunAdmin.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body class="bg-light">

    <div class="container py-5">
        <div class="d-flex justify-content-center mb-4">
            <a href="<?= base_url('Mitra/viewHomepageManajemen') ?>" class="btn btn-secondary">🔙 Kembali</a>
        </div>
        <h5 class="mb-0 text-center">Manajemen User Web Admin</h5>
        <table class="table table-bordered table-hover text-center">
            <thead class="table-warning">
                <tr>
                    <th>Nama User</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($list_akun as $user): ?>
                    <tr>
                        <td><?= esc($user['Username']) ?></td>
                        <td>
                            <form action="<?= base_url('/Mitra/controllerManajemenUserAdmin/deleteAkun/' . $user['ID_Admin']) ?>" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus admin ini?')">
                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>
</html>
