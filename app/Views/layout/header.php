<nav class="navbar">
    <div class="navbar-container">
        <div class="navbar-left">
            <img src="<?= base_url('images/homepage/logo.jpg') ?>" alt="Logo" class="nav-logo">
            <span class="brand-name">Mammave Italian Kitchen</span>
        </div>
        <div class="navbar-right">
            <a href="<?= site_url('Pelanggan/controllerHomepage') ?>" class="nav-link">Home</a>
            <a href="#about-us" class="nav-link">About Us</a>
            
            <?php if (session()->get('isLoggedIn')): ?>
                <div class="dropDown">
                    <button class="btn-drop"><i class="bi bi-cart"></i></button>
                    <div class="dropdown-content">
                        <a href="<?= site_url('Pelanggan/controllerPemesanan') ?>">Pesan/Order</a>
                        <a href="<?= site_url('Pelanggan/controllerRiwayatPemesanan') ?>">Riwayat Order</a>
                    </div>
                </div>
                <form action="<?= site_url('Pelanggan/controllerLogoutAkunPelanggan') ?>" method="post" style="display:inline;">
                    <button type="submit" class="btn-logout">Logout</button>
                </form>
                <span class="nav-user">Halo, <?= session()->get('Nama_Depan') ?></span>
            <?php else: ?>
                <button class="btn-login" onclick="window.location.href='<?= site_url('/Pelanggan/controllerLoginAkunPelanggan') ?>'">Login</button>
                <button class="btn-register" onclick="window.location.href='<?= site_url('/Pelanggan/controllerRegisterAkunPelanggan') ?>'">Register</button>
            <?php endif; ?>

        </div>
    </div>
</nav>
