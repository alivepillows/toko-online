<?php
    if ($_GET['id_pembeli']) {
        include "../koneksi.php";
        $qry_hapus=mysqli_query($conn, "delete from pembeli where id_pembeli='".$_GET['id_pembeli']."'");
        if ($qry_hapus) {
            echo "<script>alert ('Sukses hapus pembeli'); location.href='data_pembeli.php';</script>";
        }else {
            echo "<script>alert ('Gagal hapus pembeli'); location.href='data_pembeli.php';</script>";
        }
    }
?> 