<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/product.css">
    <link rel="stylesheet" href="./css/navbarUser.css">


</head>
<body>
    <?php
        include "navbar.php";
    ?>
    <div class="album py-5">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-md-4 g-3">
            <?php
            include "../koneksi.php";
            if (isset($_POST['cari'])) {
                $cari = $_POST['cari'];
                $query_barang = mysqli_query($conn, "select * from barang where nama_barang like '%$cari%' or kategori like '%$cari%' or gender like '%$cari%'");
            }
            else{
                $query_barang = mysqli_query($conn, "select * from barang");
            }
            while($data_barang = mysqli_fetch_array($query_barang)){
            ?>  
            <div class="col mb-3">
                <div class="card shadow-sm">
                    <img src="../foto_barang/<?=$data_barang['foto_barang']?>" class="card-img-top" width="231px" height="259px" ><title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#55595c"/></img>
                        <div class="card-body">
                            <p class="card-text judul-barang"><b><?=$data_barang['nama_barang']?></b></p>
                            <p class="card-text harga-barang"> <?= "RP.".number_format( $data_barang['harga_barang'])?></p>
                            
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="beli_produk.php?id_barang=<?=$data_barang['id_barang']?>"><button type="submit" class="btn1">Beli</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
            </div>
        </div>
    </div>
    <?php
        include "footer.php";
    ?>
        <!-- Kit Font Awesome -->
        <script src="https://kit.fontawesome.com/1a01d4b743.js" crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>