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
                            <button>edit</button>
                            <button>delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>