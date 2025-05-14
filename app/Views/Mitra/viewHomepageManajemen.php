<!DOCTYPE html>
<html>
<head>
    <title>Homepage Manajemen</title>
    <script src="<?= base_url('js/Mitra/homepageManajemen.js') ?>"></script>
    <link rel="stylesheet" href="<?= base_url('css/Mitra/homepageManajemen.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .dashboard-card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            cursor: pointer;
        }
        .dashboard-card:hover {
            transform: scale(1.03);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }
        .logout-card {
            background-color: #dc3545;
            color: white;
        }
        .logout-card:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <h1 class="text-center mb-5">Panel Manajemen Admin</h1>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card dashboard-card h-100" onclick="window.location.href='<?= site_url('/Mitra/controllerRegisterAdmin') ?>'">
                    <div class="card-body text-center">
                        <h2 class="card-title">👤 Tambahkan Admin</h2>
                        <p class="card-text">Buat akun admin baru untuk sistem.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card dashboard-card h-100" onclick="window.location.href='<?= base_url('/Mitra/controllerManajemenUserAdmin') ?>'">
                    <div class="card-body text-center">
                        <h2 class="card-title">🧑‍💼 Manajemen Admin</h2>
                        <p class="card-text">Kelola, edit, atau hapus akun admin.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card dashboard-card h-100" onclick="window.location.href='<?= base_url('Mitra/controllerManajemenMenu') ?>'">
                    <div class="card-body text-center">
                        <h2 class="card-title">📋 Manajemen Menu</h2>
                        <p class="card-text">Tambah atau ubah menu makanan/minuman.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card dashboard-card h-100" onclick="window.location.href='<?= base_url('Mitra/controllerManajemenOrder') ?>'">
                    <div class="card-body text-center">
                        <h2 class="card-title">🛒 Manajemen Order</h2>
                        <p class="card-text">Lihat dan kelola pesanan pelanggan.</p>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <form action="<?= site_url('Mitra/controllerLogoutAdmin') ?>" method="post">
                    <div class="card dashboard-card logout-card text-center">
                        <div class="card-body">
                            <h2 class="card-title">🚪 Logout</h2>
                            <p class="card-text">Keluar dari akun admin.</p>
                            <button type="submit" class="btn btn-light mt-2">Logout Sekarang</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
