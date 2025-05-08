<!DOCTYPE html>
<html>
    <head>
        <title>Manajemen User Web Admin</title>
        <link rel="stylesheet" href="<?= base_url('css/Mitra/manajemenAkunAdmin.css') ?>">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    </head>
    <body>
        <button onclick="window.location.href='<?= base_url('Mitra/viewHomepageManajemen') ?>'" class="btn-back">back</button>
        <table class="tabelAkun">
            <thead>
                <tr>
                    <th>Nama User</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($list_akun as $user): ?>
                    <tr>
                        <td><?= esc($user['Username']) ?></td>
                        <td class="tombolAksi">
                            <form action="<?= base_url('/Mitra/controllerManajemenUserAdmin/deleteAkun/' . $user['ID_Admin']) ?>" method="post" onsubmit="return confirm('Apakah anda yaking ingi menghapus admin ini?')">
                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>