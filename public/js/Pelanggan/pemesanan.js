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