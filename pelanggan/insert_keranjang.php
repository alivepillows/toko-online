<?php
    session_start();
    if ($_POST) {
        include "../koneksi.php";

        $query_get_barang=mysqli_query($conn, "SELECT * FROM barang where id_barang = '".$_POST['id_barang']."'");
        $data_barang = mysqli_fetch_array($query_get_barang);

        $_SESSION['cart'][]=array(
            'id_barang' => $data_barang['id_barang'],
            'nama_barang' => $data_barang['nama_barang'],
            'harga_barang' => $data_barang['harga_barang'],
            'qty' => $_POST['jumlah_beli']
        );
    }
    header('location: cart.php');
?>