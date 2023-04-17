<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah barang</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/tambah_produk.css">
    <link rel="stylesheet" href="./css/navbar.css">

     <!-- Kit Font Awesome -->  
     <script src="https://kit.fontawesome.com/1a01d4b743.js" crossorigin="anonymous"></script>

</head>
<body>
    <?php
        include "navbar.php";
    ?>

    <div class="container">
        <div class="content my-3">
            <h3 class=" mb-2 text-center">Tambah barang</h3>
            <form action="proses_tambah_produk.php" method="POST" enctype="multipart/form-data">
                <!-- Nama barang -->
                <div class="mb-2">
                    <label class="form-label">Nama barang :</label>
                    <input type="text" name="nama_barang" class="form-control" placeholder="Masukkan Nama barang" required>
                </div>
                <!-- deskripsi barang -->
                <div class="mb-2">
                    <label class="form-label">Deskripsi barang :</label>
                    <textarea name="deskripsi" class="form-control textarea" rows="4" placeholder="Masukkan Deskripsi barang" required></textarea>
                </div>
                <!-- kategori -->
                <div class="mb-2">
                    <label class="form-label">Kategori barang :</label>
                    <select name="kategori" class="form-control" required>
                        <option></option>
                        <option>Makanan Instant</option>
                    </select>
                </div>
                <!-- Harga barang -->
                <div class="mb-2">
                    <label class="form-label">Harga barang :</label>
                    <input type="number" name="harga_barang" class="form-control" placeholder="Masukkan Harga barang" required>
                </div>
                <!-- Foto barang -->
                <div class="mb-4">
                    <label for="formFile" class="form-label">Foto barang :</label>
                    <input class="form-control" type="file" name="foto_barang">
                </div>
                <input type = "submit" name ="simpan" value ="Tambah barang" class = "btn1 mb-2">
            </form>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>




