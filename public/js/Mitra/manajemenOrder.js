function openOrderContent(){
    const modal = document.getElementById("modal");
    document.getElementsByClassName("orderContent")[0].style.display = "block";
}
function openUpdateStatus(){
    document.getElementsByClassName("updateStatus")[0].style.display = "block";
    const modal = document.getElementById("modal");
}
function closeOrderContent(){
    document.getElementsByClassName("orderContent")[0].style.display = "none";
}
function closeUpdateStatus(){
    document.getElementsByClassName("updateStatus")[0].style.display = "none";
}

const btn = document.getElementsByClassName("btn");

btn.onclick = function() {
    modal.style.display = "block";

}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}