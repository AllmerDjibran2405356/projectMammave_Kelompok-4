<nav class="navbar">
    <div class="navbar-container">
        <div class="navbar-left">
            <img src="<?= base_url('images/logo.jpg') ?>" alt="Logo" class="nav-logo">
            <span class="brand-name">Mammave Italian Kitchen</span>
        </div>
        <div class="navbar-right">
            <a href="<?= base_url('/') ?>" class="nav-link">Home</a>
            <a href="<?= base_url('/menu') ?>" class="nav-link">Menu</a>
            <a href="#about-us" class="nav-link">About Us</a>
            
            <?php if (session()->get('isLoggedIn')): ?>
                <span class="nav-user">Halo, <?= session()->get('Nama_Depan') ?></span>
                <form action="<?= site_url('Pelanggan/controllerLogoutAkunPelanggan') ?>" method="post" style="display:inline;">
                    <button type="submit" class="btn-logout">Logout</button>
                </form>
            <?php else: ?>
                <button class="btn-login" onclick="window.location.href='<?= site_url('/Pelanggan/controllerLoginAkunPelanggan') ?>'">Login</button>
                <button class="btn-register" onclick="window.location.href='<?= site_url('/Pelanggan/controllerRegisterAkunPelanggan') ?>'">Register</button>
            <?php endif; ?>

        </div>
    </div>
</nav>
