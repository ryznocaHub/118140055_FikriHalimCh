<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas PHP lanjut</title>
</head>
<body>
    <form method="POST">
        <label>Masukkan angka</label>
        <br>
        <input type="text" name="angka">
        <button type="submit" name="submit">CARI FAKTORIAL</button>
    </form>
    <?php
        //fungsi menghitung faktorial dari suatu bilangan
        if(isset($_POST['submit'])){
            require_once("faktorial.php");
            $data = $_POST['angka'];
            $hasil = faktorial($data);
            echo "hasil dari $data! adalah $hasil";
        }
    ?>
</body>
</html>