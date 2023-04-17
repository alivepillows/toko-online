<?php
    if ($_GET['id_transaksi']) {
        include "../koneksi.php";
        $id = $_GET['id_transaksi'];
        $cek = mysqli_query($conn, "SELECT * FROM transaksi WHERE id_transaksi = '".$id."'");
        $data = mysqli_fetch_array($cek);
        if ($data['status'] == "new") {
            $newstatus = 'confirm';
        } elseif ($data['status'] == "confirm") {
            $newstatus = 'process'; 
        } elseif ($data['status'] == "process") {
            $newstatus = 'done';
        } elseif ($data['status'] == "done"){
            echo "<script>alert('Hooh Tenan');</script>";
        }
        
        $acc= mysqli_query ($conn, "UPDATE transaksi set status='".$newstatus."' where id_transaksi = '".$id."'") or die (mysqli_error($conn));

        if ($acc && $newstatus == "confirm") {
            echo "<script>alert('Berhasil Confirm Produk');location.href='data_penjualan.php';</script>";
        } elseif ($acc && $newstatus == "process") {
            echo "<script>alert('Berhasil Process Produk');location.href='data_penjualan.php';</script>";   
        } elseif ($acc && $newstatus == "done") {
            echo "<script>alert('Produk Terkirim');location.href='data_penjualan.php';</script>";   
        }else{
                echo "<script>alert('Pengiriman Produk Gagal');location.href='data_penjualan.php';</script>";
        }
    }
?>