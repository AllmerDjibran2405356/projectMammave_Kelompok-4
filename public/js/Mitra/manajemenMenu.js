function openTambahMenu(){
    document.getElementsByClassName("addMenu")[0].style.display = "block";
}
function openKategori(){
    document.getElementsByClassName("kategori")[0].style.display = "block";
}
function openKategoriManagement(){
    document.getElementsByClassName("manageKategori")[0].style.display = "block";
}
function closeTambahMenu(){
    document.getElementsByClassName("addMenu")[0].style.display = "none";
}
function closeKategori(){
    document.getElementsByClassName("kategori")[0].style.display = "none";
}
function closeKategoriManagement(){
    document.getElementsByClassName("manageKategori")[0].style.display = "none";
}
function openEditMenu(menu){
    document.querySelector(".editMenu").style.display = "block";

    document.getElementById("edit-ID_Menu").value = menu.ID_Menu;
    document.getElementById("edit-Nama_Menu").value = menu.Nama_Menu;
    document.getElementById("edit-ID_Kategori").value = menu.ID_Kategori;
    document.getElementById("edit-Harga").value = menu.Harga;
    document.getElementById("edit-Deskripsi_Menu").value = menu.Deskripsi_Menu;
    document.getElementById("edit-Nama_Gambar").value = menu.Nama_Gambar;
}
function closeEditMenu(){
    document.querySelector(".editMenu").style.display = "none";
}

const modal = document.getElementById('modal');
const span = document.getElementsByClassName('close')[0];

function openModal() {
    modal.classList.add('show');
    document.body.style.overflow = 'hidden';
}

function closeModal() {
    modal.classList.remove('show');
}

document.getElementById('btn-popup').addEventListener('click', openModal);

button.onclick = function closeTambahMenu(){
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}