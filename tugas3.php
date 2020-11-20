<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tugas3</title>
</head>
<body>
    <h1>DATA MAHASISWA PENS</h1>
    ============================
    <H1>TAMBAH DATA</H1>

    <form method="POST" enctype="multipart/form-data">
        <label><b>NRP  :</b></label>
        <input type="text" name="nrp"><br>
        <label><b>Nama : </b></label>
        <input type="text" name="nama"><br>
        <label><b>Foto : </b></label>
        <input type="file" name="foto">
        <br>
        <label><b>Jurusan : </b></label>
        <select name="jur">
            <?php
                $koneksi = mysqli_connect("localhost","root","","mahasiswa") or die ("koneksi gagal");
                $data = mysqli_query($koneksi,"select * from jurusan");
                while ($hasil = mysqli_fetch_array($data)) {
                    echo "<option value=".$hasil['nama'].">".$hasil['nama']."</option>" ;                    
                }
            ?>
        </select>
        <br>
        <button type="submit" name="submit">SIMPAN</button>
    </form >
        <?php
            if(isset($_POST['submit'])){
                $nrp=$_POST['nrp'];
                $nama=$_POST['nama'];
                $foto=$_FILES['foto'];
                $namafoto=$foto['name'];
                $tempat=$foto['tmp_name'];
                move_uploaded_file($tempat,"foto/$namafoto");
                $jurusan= $_POST['jur'];

                $tes=mysqli_query($koneksi,"insert into mahasiswa (NRP,nama,foto,ID_Jur) values ('$nrp','$nama','$namafoto','$jurusan')");
                if (!$tes) {
                    die('Query Error : '.mysqli_errno($koneksi). 
                    ' - '.mysqli_error($koneksi));
                 }else{
                     echo "penambahan data berhasil<br>";
                 }
            }
        ?>
    ============================
    <H1>SEARCH DATA</H1>

    <form method="post">
        <label><b>NAMA : </b></label>
        <input type="text" name="search">
        <button type="submit" name="cari">Cari Data</button>
    </form>
    <?php
        if(isset($_POST['cari'])){
            $cari=$_POST['search'];
            $data_search=mysqli_query($koneksi,"select * from mahasiswa");
            $status=1;
            while ($hasil_search = mysqli_fetch_array($data_search)) {
                if ($hasil_search['nama']==$cari) {
                    echo "NRP : ".$hasil_search['NRP']."<br>";
                    echo "Nama : ".$hasil_search['nama']."<br>";
                    echo "Jurusan : ".$hasil_search['ID_Jur']."<br>";
                    ?>
                    <img src="foto/<?php echo $hasil_search['foto'] ?>" width="300px" height="300px">
                    <?php
                }else{
                    $status=0;
                }      
            }
            if (!$status) {
                echo "data tidak ditemukan <br>";
            }
        }
    ?>
    ============================
    <H1>HAPUS DATA</H1>
    <form method="post">
        <label><b>NRP : </b></label>
        <input type="text" name="delete">
        <button type="submit" name="hapus">Hapus Data</button>
    </form>
    <?php
        if(isset($_POST['hapus'])){
            $hapus=$_POST['delete'];
            $data_search=mysqli_query($koneksi,"delete from mahasiswa where NRP = $hapus");
            if (!$data_search) {
                die('Query Error : '.mysqli_errno($koneksi). 
                ' - '.mysqli_error($koneksi));
             }else{
                 echo "penghapusan data berhasil<br>";
             }
        }
    ?>
</body>
</html>