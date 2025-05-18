<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Riwayat Pemesanan</title>
<link rel="stylesheet" href="<?= base_url('css/Pelanggan/riwayatPemesanan.css') ?>">
<link rel="stylesheet" href="<?= base_url('css/Pelanggan/header.css') ?>">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
<?= view('layout/header') ?>

<div class="main-layout">
    <div class="order-area">
        <h1 class="section-title">Order Dalam Proses</h1>
        <?php foreach($orderDiproses as $data): ?>
        <div class="order-card">
            <div class="order-info">
                <div class="order-field"><?= esc($data['Waktu_Order']) ?></div>
                <div class="order-field">Rp <?= number_format($data['Total_Harga'], 0, ',', '.') ?></div>
                <div class="order-field"><?= esc($data['Alamat']) ?></div>
            </div>
            <div class="order-info">
                <div class="order-field"><?= esc($data['Order_Status']) ?></div>
                <div class="order-action">
                    <button class="btn-show-order" data-order-id="<?= esc($data['ID_Order']) ?>">Lihat Isi Order</button>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

        <h1 class="section-title">Order Yang Sudah Selesai</h1>
        <?php foreach($orderSelesai as $data): ?>
        <div class="order-card">
            <div class="order-info">
                <div class="order-field"><?= esc($data['Waktu_Order']) ?></div>
                <div class="order-field">Rp <?= number_format($data['Total_Harga'], 0, ',', '.') ?></div>
                <div class="order-field"><?= esc($data['Alamat']) ?></div>
            </div>
            <div class="order-info">
                <div class="order-field"><?= esc($data['Order_Status']) ?></div>
                <div class="order-action">
                    <button class="btn-show-order" data-order-id="<?= esc($data['ID_Order']) ?>">Lihat Isi Order</button>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Modal Isi Order -->
<div id="orderModal" class="modal">
    <div class="modal-content">
        <span class="close-button">&times;</span>
        <h2>Isi Order</h2>
        <ul id="modalOrderList">
            <li><span>Memuat...</span></li>
        </ul>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('orderModal');
    const modalList = document.getElementById('modalOrderList');
    const closeBtn = modal.querySelector('.close-button');

    function showModal() {
        modal.style.display = 'block';
    }

    function closeModal() {
        modal.style.display = 'none';
        modalList.innerHTML = '';
    }

    closeBtn.onclick = closeModal;
    window.onclick = (event) => {
        if(event.target == modal){
            closeModal();
        }
    };

    async function loadOrderItems(orderId) {
        modalList.innerHTML = '<li><span>Memuat...</span></li>';
        try {
            const response = await fetch(`<?= base_url('Pelanggan/controllerRiwayatOrder/ajaxIsiOrder') ?>?ID_Order=${orderId}`, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            });
            if (!response.ok) throw new Error('Gagal mengambil data');

            const data = await response.json();
            modalList.innerHTML = '';
            if(data.length === 0){
                modalList.innerHTML = '<li><span>Tidak ada item dalam order ini</span></li>';
                return;
            }
            data.forEach(item => {
                const li = document.createElement('li');
                li.innerHTML = `<span>${item.Nama_Menu}</span><span>x${item.Jumlah}</span><span>Rp ${Number(item.Total_Harga).toLocaleString('id-ID')}</span>`;
                modalList.appendChild(li);
            });
        } catch(err) {
            modalList.innerHTML = `<li><span>Error: ${err.message}</span></li>`;
        }
    }

    document.querySelectorAll('.btn-show-order').forEach(btn => {
        btn.addEventListener('click', () => {
            const orderId = btn.getAttribute('data-order-id');
            showModal();
            loadOrderItems(orderId);
        });
    });
});
</script>
</body>
</html>