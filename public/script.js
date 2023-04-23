
let namas = document.querySelector('.namapeminjam');
let barangs = document.querySelector('.barangdipinjam');

this.nama = namas;
this.barang = barangs;

function onoverlay() {
    document.getElementById("Overlay").style.display = "block";
    let namas = document.querySelector('.namapeminjam');
    let barangs = document.querySelector('.barangdipinjam');

}

function offoverlay() {
    document.getElementById("Overlay").style.display = "none";

}


function hidepw() {
    var x = document.getElementById("formGroupExampleInput2");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function nama(){
    return nama;
}


function barang(){
    return barang;
}