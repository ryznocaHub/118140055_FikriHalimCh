<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tugas2</title>
</head>
<body>
    <form method="post">
        <label>masukkan nama</label><br>
        <input type="text" name="nama"><br>
        <label>masukkan warna</label><br>
        <input type="text" name="warna"><br>
        <button type="submit" name="submit">HARGA</button>
    </form>
    <?php
        //fungsi menghitung banyaknya huruf
        if(isset($_POST['submit'])){
            require_once("sumhuruf.php");
            $data = $_POST['nama'];
            $panjang = Hpanjang($data);

            if ($panjang >= 10) {
                $panjang = $panjang * 300;

            } else if($panjang >= 20){
                $panjang = $panjang * 500;
            }else{
                $panjang = $panjang * 700;
            }
            require_once('fontwarna.php');
            warna($_POST['warna'],$data,$panjang);
        }
    ?>
</body>
</html>