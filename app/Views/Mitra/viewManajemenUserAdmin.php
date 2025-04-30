<!DOCTYPE html>
<html>
    <head>
        <title>Manajemen User Web Admin</title>
    </head>
    <body>
        <button onclick="window.location.href='<?= base_url('Mitra/viewHomepageManajemen') ?>'">back</button>
        <table>
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
                        <td>
                            <form action="<?= base_url('/Mitra/controllerManajemenUserAdmin/deleteAkun/' . $user['ID_Admin']) ?>" method="post" onsubmit="return confirm('Apakah anda yaking ingi menghapus admin ini?')">
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>