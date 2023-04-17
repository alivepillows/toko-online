<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah barang</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/tambahbarang.css">
    <link rel="stylesheet" href="./css/navbar.css">

</head>
<body>
    <?php
        include "navbar.php";
        include "../koneksi.php";
        $qry_get_barang=mysqli_query($conn, "select * from barang where id_barang ='".$_GET['id_barang']."'");
        $dt_barang=mysqli_fetch_array($qry_get_barang);
    ?>

    <div class="container">
        <div class="content my-3">
            <h3 class=" mb-2 text-center">Ubah barang</h3>
            <form action="proses_ubah_produk.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_barang" value="<?=$dt_barang['id_barang']?>">
                <!-- Nama barang -->
                <div class="mb-2">
                    <label class="form-label">Nama barang :</label>
                    <input type="text" name="nama_barang" class="form-control"  value="<?=$dt_barang['nama_barang']?>" placeholder="Masukkan Nama barang" required>
                </div>
                <!-- deskripsi barang -->
                <div class="mb-2">
                    <label class="form-label">Deskripsi barang :</label>
                    <textarea name="deskripsi" class="form-control textarea" rows="4" placeholder="Masukkan Deskripsi barang" required><?=$dt_barang['deskripsi']?></textarea>
                </div>
                <!-- kategori -->
                <div class="mb-2">
                    <label class="form-label">Kategori barang :</label>
                    <select name="kategori" class="form-control" required>
                        <option><?=$dt_barang['kategori']?></option> 
                        <option>makanan instan</option>
                    </select>
                </div>
                <!-- Harga barang -->
                <div class="mb-2">
                    <label class="form-label">Harga barang :</label>
                    <input type="number" name="harga_barang" class="form-control" value="<?=$dt_barang['harga_barang']?>" placeholder="Masukkan Harga barang" required>
                </div>
                <div class="mb-2">
                    <label for="formFile" class="form-label">Foto barang :</label>
                    <div>
                        <img src=."./foto_barang/<?php echo $dt_barang['foto_barang']; ?>" width="100px">
                    </div>
                </div>
                <!-- Foto barang -->
                <div class="mb-4">
                    <label for="formFile" class="form-label">Ubah Foto barang :</label>
                    <input class="form-control" type="file" name="foto_barang">
                </div>
                <input type = "submit" name ="simpan" value ="Ubah barang" class = "btn1 mb-2">
            </form>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>





