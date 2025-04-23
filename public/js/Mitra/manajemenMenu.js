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
}
function closeEditMenu(){
    document.querySelector(".editMenu").style.display = "none";
}
