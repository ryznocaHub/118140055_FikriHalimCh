<table border="1">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Prodi</th>
        <th>Angkatan</th>
        <th>Prodi</th>
        <th>Aksi</th>
    </tr>

    <?php
        include "koneksi.php";

        $hasil = mysqli_query($koneksi,"select * from mahasiswa order by nim asc");
        $no = 0;
        while ($data = mysqli_fetch_array($hasil)) : 
            $no++;
    ?>

    <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $data['nim']; ?></td>
        <td><?php echo $data['nama']; ?></td>
        <td><?php echo $data['angkatan']; ?></td>
        <td><?php echo $data['prodi']; ?></td>
        <td><button id="<?php echo $data['nim']; ?>" class="edit">Edit</button>  <button id="<?php echo $data['nim']; ?>" class="hapus">Hapus</button></td>
    </tr>
    
    <?php endwhile ?>
</table>