<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="<?= base_url('css/pelanggan/homepage.css') ?>"> 
  <link rel="stylesheet" href="<?= base_url('css/pelanggan/animasi.css') ?>">
  <link rel="stylesheet" href="<?= base_url('css/Pelanggan/header.css') ?>">
  <link rel="stylesheet" href="<?= base_url('css/Pelanggan/footer.css') ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
  <?= view('layout/header') ?>

  <div class="banner">
  <div class="menu-overlay">
    <div class="menu-images">
      <div class="menu-card">
        <img src="<?= base_url('images/homepage/gambar 1.png') ?>" alt="Pizza">
        <h3>Pizza</h3>
      </div>
      <div class="menu-card">
        <img src="<?= base_url('images/homepage/gambar 2.png') ?>" alt="Calzone">
        <h3>Calzone</h3>
      </div>
      <div class="menu-card">
        <img src="<?= base_url('images/homepage/gambar 3.png') ?>" alt="Spaghetti">
        <h3>Spaghetti</h3>
      </div>
      <div class="menu-card">
        <img src="<?= base_url('images/homepage/gambar 4.png') ?>" alt="Ravioli">
        <h3>Ravioli</h3>
      </div>
      <div class="menu-card">
        <img src="<?= base_url('images/homepage/gambar 5.png') ?>" alt="Mac & Cheese">
        <h3>Mac & Cheese</h3>
      </div>
    </div>
    <a href="<?= site_url('/Pelanggan/controllerPemesanan') ?>">
      <button class="btn-order">Order Sekarang</button>
    </a>
  </div>
</div>

  <section class="promo">
    <h2>Get more bites, pay less!</h2>
    <div class="promo-cards">
      <img src="<?= base_url('images/homepage/poster 1 1.png') ?>" alt="Promo Weekend">
      <img src="<?= base_url('images/homepage/poster 2 1.png') ?>" alt="Promo 50%">
    </div>
  </section>

  <section class="divider">
    <div class="marquee-wrapper">
        <div class="marquee marquee-left">
            <span>ITALIAN FOOD ITALIAN FOOD ITALIAN FOOD ITALIAN FOOD ITALIAN FOOD ITALIAN FOOD ITALIAN FOOD ITALIAN FOOD ITALIAN FOOD ITALIAN FOOD ITALIAN FOOD ITALIAN FOOD ITALIAN FOOD ITALIAN FOOD ITALIAN FOOD ITALIAN FOOD </span>
        </div>
    </div>
    <div class="marquee-wrapper">
        <div class="marquee marquee-left">
            <span>--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</span>
        </div>
    </div>
    <div class="marquee-wrapper">
        <div class="marquee marquee-right">
            <span>SMALL MEDIUM LARGE SMALL MEDIUM LARGE SMALL MEDIUM LARGE SMALL MEDIUM LARGE SMALL MEDIUM LARGE SMALL MEDIUM SMALL MEDIUM LARGE SMALL MEDIUM LARGE SMALL MEDIUM LARGE SMALL MEDIUM LARGE SMALL MEDIUM LARGE SMALL MEDIUM </span>
        </div>
    </div>
    <div class="marquee-wrapper">
        <div class="marquee marquee-right">
            <span>--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</span>
        </div>
    </div>
    <div class="marquee-wrapper">
        <div class="marquee marquee-left">
            <span>ITALIAN FOOD ITALIAN FOOD ITALIAN FOOD ITALIAN FOOD ITALIAN FOOD ITALIAN FOOD ITALIAN FOOD ITALIAN FOOD ITALIAN FOOD ITALIAN FOOD ITALIAN FOOD ITALIAN FOOD ITALIAN FOOD ITALIAN FOOD ITALIAN FOOD ITALIAN FOOD </span>
        </div>
    </div>
</section>

  <?= view('layout/footer') ?>
</body>
</html>
