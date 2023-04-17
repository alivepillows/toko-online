<?php
    if($_POST){
        $nama_barang=$_POST['nama_barang'];
        $deskripsi=$_POST['deskripsi'];
        $kategori=$_POST['kategori'];
        $harga_barang=$_POST['harga_barang'];
        $file_tmp = $_FILES['foto_barang']['tmp_name'];
        $file_name=rand(0,9999).$_FILES['foto_barang']['name'];
        $file_size= $_FILES['foto_barang']['size'];
        $file_type= $_FILES['foto_barang']['type'];

        include "../koneksi.php";
        if($file_size < 2048000 and ($file_type == "image/jpeg" or $file_type== "image/png" or $file_type == "image/jpg")){
            $move = move_uploaded_file($file_tmp, '../foto_barang/'.$file_name);
            // if($move){
            //     echo "<script>alert('Sukses menambahkan foto');location.href='data_barang.php';</script>";
            // } else {
            //     echo "<script>alert('Gagal menambahkan foto');location.href='tambah_produk.php';</script>";
            // } 
            $insert=mysqli_query($conn,"insert into barang (nama_barang, deskripsi, kategori, harga_barang, foto_barang) value ('".$nama_barang."', '".$deskripsi."', '".$kategori."', '".$harga_barang."', '".$file_name."')") or die(mysqli_error($conn));
            if($insert){
                echo "<script>alert('Sukses menambahkan produk');location.href='data_barang.php';</script>";
            } else {
                echo "<script>alert('Gagal menambahkan produk');location.href='tambah_produk.php';</script>";
            } 
        }else{
            echo "<script>alert('file tidak sesuai : file foto format jpeg, jpg and png');location.href='tambah_produk.php';</script>";
        }  
    }
    
?>