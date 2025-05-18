function goBack(){
    window.history.back();
}

function changeJumlah(idMenu, delta) {
    const input = document.getElementById('jumlahInput_' + idMenu);
    let value = parseInt(input.value) || 1;
    value += delta;
    if (value < 1) value = 1;
    input.value = value;
}

function scrollMenu(button, direction) {
    const targetId = button.getAttribute('data-target');
    const container = document.getElementById(targetId);
    const scrollAmount = 300;

    if (container) {
        container.scrollBy({
            left: direction === 'left' ? -scrollAmount : scrollAmount,
            behavior: 'smooth'
        });
    }
}

// Fungsi untuk update padding-top main-layout mengikuti tinggi navbar
function updateNavbarHeight() {
    const navbar = document.getElementById('navbar');
    if (!navbar) return;

    const height = navbar.offsetHeight;
    document.documentElement.style.setProperty('--navbar-height', height + 'px');
}

// Jalankan saat halaman selesai dimuat dan saat ukuran jendela berubah
window.addEventListener('load', updateNavbarHeight);
window.addEventListener('resize', updateNavbarHeight);
