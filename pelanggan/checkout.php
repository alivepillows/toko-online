<?php
    session_start();
    include "../koneksi.php";
    global $koneksi;
    $cart = @$_SESSION['cart'];
    if (count($cart) > 0) {
        $lama_pengiriman = 3;
        $tgl_tiba = date('Y-m-d', mktime(0,0,0,date('m'),date('d')+$lama_pengiriman,date('Y')));

        $tgl_transaksi = date('Y-m-d');
        $query_transaksi = mysqli_query($conn, "INSERT INTO transaksi (id_pembeli, tgl_transaksi ,tgl_tiba)
            VALUES ('".$_SESSION['id_pembeli']."','".$tgl_transaksi."','".$tgl_tiba."')") or die (mysqli_error($conn));

        if ($query_transaksi) {
            $id = mysqli_insert_id($conn);
            foreach ($cart as $key => $value) {
                $qty = $value['qty'];
                $harga = $value['harga_barang'];
                $subtotal = $qty*$harga += 15000;
                mysqli_query($conn, "INSERT INTO detail_transaksi (id_transaksi, id_barang, qty, subtotal)
                VALUES ('".$id."', '".$value['id_barang']."', '".$qty."', '".$subtotal."')");
            }
            unset($_SESSION['cart']);
            echo "<script>alert('Anda Berhasil Membeli barang');location.href='profile.php'</script>";
        }
        else{
            echo "<script>alert('Gagal Membeli barang');location.href='cart.php'</script>";
        }
    }
?>