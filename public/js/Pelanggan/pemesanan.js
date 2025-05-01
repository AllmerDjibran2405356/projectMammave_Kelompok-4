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