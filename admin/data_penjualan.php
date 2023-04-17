
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Pembelian</title>
     <!-- CSS only -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- Kit Font Awesome -->
    <script src="https://kit.fontawesome.com/1a01d4b743.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/data_penjualan.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="icon" type="image/png" href="../admin/images/Asset%202.png" />
</head>
<body>
<?php
include "navbar.php";
?>

<br></br>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="mt-2 mb-3 text-center">Data Pembelian<h3>
                    <form action="tampil_pembelian.php" method="post">
                        <input type="text" name="cari" class="form-control mb-3" placeholder="Masukkan keyword pencarian">
                    </form>
        </div>
        <div class='card-body'>
            <table class="table table-bordered fs-5 fw-light text-center">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama pembeli</th>
                    <th scope="col">Foto Produk</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Tanggal Beli</th>
                    <th scope="col">Tanggal Tiba</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include "../koneksi.php";
                global $conn;
                if (isset($_POST["cari"])) {
                    // jika ada keyword pencarian
                    $cari=$_POST['cari'];
                    $query_transaksi= mysqli_query($conn,"select * from transaksi where id_transaksi like '%$cari%' or id_pembeli like '%$cari%' or tgl_transaksi like '%$cari%'");
                }else{
                    //jika tidak ada keyword pencarian
                    $query_transaksi= mysqli_query($conn,"select * from transaksi join pembeli on pembeli.id_pembeli= transaksi. id_pembeli join detail_transaksi on detail_transaksi. id_transaksi=transaksi . id_transaksi join barang on barang. id_barang= detail_transaksi.id_barang  ORDER BY id_detail_transaksi DESC ") or die (mysqli_error($conn));
                }
                $no=0;
                while($data_transaksi= mysqli_fetch_array($query_transaksi)) {
                    $no++;?>
                    <tr>
                        <td><?=$no?></td>
                        <td><?= $data_transaksi["nama_pembeli"]; ?></td>
                        <td><img src="../foto_barang/<?=$data_transaksi['foto_barang']?>" class="img-fluid rounded-start" width="150px" height="150px" alt="..." ></td>
                        <td><?= $data_transaksi["nama_barang"]; ?></td>
                        <td><?= $data_transaksi["qty"]; ?></td>
                        <td><?= $data_transaksi["tgl_transaksi"]; ?></td>
                        <td><?= $data_transaksi["tgl_tiba"]; ?></td>
                        <!-- <td></td> -->
                        <td><?= $data_transaksi["alamat"]; ?></td>
                        <td> <a href="acc.php?id_transaksi=<?=$data_transaksi['id_transaksi']?>"><?=$data_transaksi['status']?></a> | <a href="hapus_penjualan.php?id_transaksi=<?=$data_transaksi['id_transaksi']?>" onclick="return confirm ('Apakah anda yakin menghapus data ini?')" ><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/1a01d4b743.js" crossorigin="anonymous"></script>

</body>
</html>



