<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="jquery-3.5.1.min.js"></script>
    <title>Belajar Ajax</title>
</head>
<body>
    <form method="POST" id="form-mhs"></form>
    <button id="btn">Tambah</button>
    <div>------------------------------------------------</div>
    <div id="tabel-mhs"></div>
    <script>
        $(document).ready(function(){
            //initial work
            $('#form-mhs').load('reset-form.php');
            $('#tabel-mhs').load('tampil.php');

            // =================================================
            // penambahan data
            $('#btn').click(function(){
                var data = $('#form-mhs').serialize();
                $.ajax({
                    type    :'POST',
                    url     : "tambah.php",
                    data    : data,
                    cache   : false,
                    success     : function(data){
                        $('#form-mhs').load('reset-form.php');
                        $('#tabel-mhs').load("tampil.php");
                    }
                });
            });
            // =================================================
            // edit data
            $(document).on('click', '.edit', function(){
                var id = $(this).attr('id');
                $('#form-mhs').load('reset-form.php');
                $.ajax({
                    type: 'GET',
                    url :"ambil-data.php",
                    data: {
                        nim:id
                    },
                    cache   : false,
                    success : function(data){
                        var hasil = JSON.parse(data);
                        document.getElementById("nim").setAttribute("value",hasil.nim);
                        document.getElementById("nim").setAttribute("readonly","readonly");
                        document.getElementById("nama").setAttribute("value",hasil.nama);
                        document.getElementById(hasil.prodi).setAttribute("selected","selected");
                        document.getElementById(hasil.angkatan).setAttribute("selected","selected");
                        document.getElementById("btn").outerHTML = "<button id='edit'>Edit</button>  <button id='batal'>Batal</button>";
                    }, error: function(response){
                        console.log(response.responseText);
                    }
                });
            });
            $(document).on('click', '#edit', function(){
                // $('#tabel-mhs').load('tampil.php');
                var isi = $('#form-mhs').serialize();
                $.ajax({
                    type    :'POST',
                    url     : "edit.php",
                    data    : isi,
                    cache   : false,
                    success     : function(isi){ 
                        $('#form-mhs').load('reset-form.php');
                        $('#tabel-mhs').load("tampil.php");
                        document.getElementById("edit").outerHTML = "<button id='btn'>Tambah</button>";
                        document.getElementById("batal").remove();
                    }
                });
            });
            // =================================================
            // hapus data
            $(document).on('click', '.hapus', function(){
                // $('#tabel-mhs').load('tampil.php');
                var isi = $(this).attr('id');
                $.ajax({
                    type    :'POST',
                    url     : "hapus.php",
                    data    : {
                        isi : isi
                    },
                    cache   : false,
                    success     : function(isi){
                        $('#form-mhs').load('reset-form.php');
                        $('#tabel-mhs').load("tampil.php");
                    }
                });
            });
            // =================================================
            //menghilangkan button batal
            $(document).on('click', '#batal', function(){
                $('#form-mhs').load('reset-form.php');
                document.getElementById("edit").outerHTML = "<button id='btn'>Tambah</button>";
                document.getElementById("batal").remove();
            });
        });

    </script>
</body>

</html>