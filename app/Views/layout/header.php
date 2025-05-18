<nav class="navbar">
    <div class="navbar-container" style="display: flex; justify-content: space-between; align-items: center; padding: 10px 20px;">
        <div class="navbar-left" style="display: flex; align-items: center;">
            <img src="<?= base_url('images/homepage/logo.jpg') ?>" alt="Logo" class="nav-logo" style="height: 40px;">
            <span class="brand-name" style="margin-left: 10px;">Mammave Italian Kitchen</span>
        </div>

        <div class="navbar-right" style="display: flex; align-items: center; gap: 20px;">
            <a href="<?= site_url('Pelanggan/controllerHomepage') ?>" class="nav-link">Home</a>
            <a href="<?= site_url('Pelanggan/controllerRiwayatPemesanan') ?>" class="nav-link">Riwayat Order</a>
            <a href="<?= site_url('Pelanggan/controllerPemesanan') ?>" class="nav-link">Order <i class="bi bi-cart"></i></a>

            <?php if (session()->get('isLoggedIn')): ?>
                <div class="dropDown" style="text-align: center; position: relative;">
                    <img src="<?= base_url('images/homepage/' . session()->get('Profile_Picture')) ?>"
                         alt="Profile Picture" 
                         class="btn-drop"
                         onclick="toggleDropdown()" 
                         style="width: 40px; height: 40px; border-radius: 50%; cursor: pointer; object-fit: cover;">

                    <span class="nav-user" style="display: block; margin-top: 4px; font-size: 14px; font-family: Arial, sans-serif; font-weight: 500;">
                        <?= session()->get('Nama_Depan') ?>
                    </span>


                    <div class="dropdown-content" id="dropdownMenu" style="display: none; position: absolute; right: 0; top: 100%; background: white; box-shadow: 0 2px 8px rgba(0,0,0,0.15);">
                        <a href="<?= site_url(' Pelanggan/controllerEditAkun') ?>">Edit Akun</a>
                        <a href="#" onclick="document.getElementById('logout-form').submit(); return false;">Logout</a>
                    </div>

                    <form id="logout-form" action="<?= site_url('Pelanggan/controllerLogoutAkunPelanggan') ?>" method="post" style="display: none;"></form>
                </div>

                <script>
                    function toggleDropdown() {
                        const menu = document.getElementById('dropdownMenu');
                        menu.style.display = (menu.style.display === 'none' || menu.style.display === '') ? 'block' : 'none';
                    }

                    window.onclick = function(event) {
                        if (!event.target.matches('.btn-drop')) {
                            const dropdown = document.getElementById('dropdownMenu');
                            if (dropdown && dropdown.style.display === 'block') {
                                dropdown.style.display = 'none';
                            }
                        }
                    }
                </script>
            <?php else: ?>
                <button class="btn-login" onclick="window.location.href='<?= site_url('/Pelanggan/controllerLoginAkunPelanggan') ?>'">Login</button>
                <button class="btn-register" onclick="window.location.href='<?= site_url('/Pelanggan/controllerRegisterAkunPelanggan') ?>'">Register</button>
            <?php endif; ?>
        </div>
    </div>
</nav>
