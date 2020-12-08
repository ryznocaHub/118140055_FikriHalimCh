var num=0;
function tambah(){
    document.getElementById("judul").innerText = "Tambah Data";
    var nama = document.getElementById("alat").value;
    var list = document.getElementById("list").innerHTML;
    var newlist = document.getElementById("list").innerHTML = list + "<li id='" +num+ "'><span id='text"+num+"'>" +nama+ "</span> [<a onclick='edit(" +num+ ")'>Edit</a> | <a href='#' onclick='hapus("+num+")'>Hapus</a>]</li>"; 
    num++;
}

function hapus(id){
    document.getElementById("judul").innerText = "Hapus Data";
    document.querySelector
    document.getElementById(id).remove();
}

function edit(id){
    document.getElementById("judul").innerText = "Edit Data";
    var newlist = prompt("Edit");
document.getElementById("text"+id).innerHTML = newlist;
}