<!DOCTYPE html>
<html>
<head>
    <title>Register Akun</title>
    <script src="<?= base_url('js/Pelanggan/registerAkun.js') ?>" defer></script>
    <link rel="stylesheet" href="<?= base_url('css/Pelanggan/registerAkun.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/Pelanggan/header.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
    <?= view('layout/header') ?>
    
    <?php if(session()->getFlashdata('error')): ?>
        <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>
    
    <?php if(session()->getFlashdata('success')): ?>
        <p style="color: green;"><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>
    
    <form action="<?= site_url('Pelanggan/controllerRegisterAkunPelanggan/registerAkun') ?>" method="post" enctype="multipart/form-data" class="registerForm">
        <div class="Name">
            <input required type="text" name="Nama_Depan" placeholder="Masukkan Nama Depan">
            <input required type="text" name="Nama_Belakang" placeholder="Masukkan Nama Belakang"><br>
        </div>
        
        <input required type="text" name="Nomor_Telepon" placeholder="Masukkan Nomor Hp"><br>
        
        <textarea required name="Alamat" placeholder="Masukkan Alamat" oninput="autoresize(this)"></textarea><br>
        
        <input required type="text" name="Email" placeholder="Masukkan Email"><br>
        
        <div class="password-wrapper">
            <input required type="password" name="Password_User" placeholder="Masukkan Password" class="password-input">
            <span class="toggle-password" onclick="togglePassword(this)">
                <img src="<?= base_url('/images/eye/eye-on.png') ?>" alt="Show Password">
            </span>
        </div>
        
        <div class="password-wrapper">
            <input required type="password" name="Password_Confirm" placeholder="Masukkan Ulang password" class="password-input">
            <span class="toggle-password" onclick="togglePassword(this)">
                <img src="<?= base_url('/images/eye/eye-on.png') ?>" alt="Show Password">
            </span>
        </div>
        
        <input type="date" name="Tanggal_Lahir" placeholder="Masukkan Tanggal Lahir (optional)"><br>
        
        <button class="btn-signup" type="submit">Sign Up</button>
    </form>
</body>
</html>
