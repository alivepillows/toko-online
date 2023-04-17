<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembelian</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link  rel="stylesheet" href="./css/navbarUser.css">
    <link  rel="stylesheet" href="./css/pembelian.css">

       <!-- Kit Font Awesome -->
       <script src="https://kit.fontawesome.com/1a01d4b743.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        include "navbar.php";
    ?>
    <section class="vh-100" style="background-color: #f4f5f7;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-6 mb-4 mb-lg-0">
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center text-white"
              style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
              <h5>Marie Horwitz</h5>
              <p>Web Designer</p>
              <i class="far fa-edit mb-5"></i>
            </div>
            <div class="col-md-8">
            <?php 
                include "../koneksi.php";
            ?>
              <div class="card-body p-4">
                <h6>Information <?=$_SESSION['username']?></h6>
                <hr class="mt-0 mb-4">
                  <div class="col-6 mb-3">
                    <h6>Alamat</h6>
                    <p class="text-muted"><?=$_SESSION['alamat']?></p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Telephone</h6>
                    <p class="text-muted"><?=$_SESSION['no_telp']?></p>
                  </div>
                  
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section>
<br><br>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>History Pembelian barang</h3>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal Transaksi</th>
                    <th scope="col">Tanggal Datang</th>
                    <th scope="col">Nama barang</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Harga Satuan</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col">Total Bayar</th>
                    <th scope="col" width="250px">Status</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include "../koneksi.php";
                global $conn;
                $query_pembelian = mysqli_query($conn, "SELECT * FROM transaksi 
                    where id_pembeli = '" . $_SESSION['id_pembeli'] . "' ORDER BY id_transaksi ASC");
                $no = 0;
                while ($data_pembelian = mysqli_fetch_array($query_pembelian)) {
                    $no++;
                    ?>
                    <tr>
                    <td><?= $no ?></td>
                    <td><?= $data_pembelian['tgl_transaksi'] ?></td>
                    <td><?= $data_pembelian['tgl_tiba'] ?></td>
                    <td>
                        <ol>
                            <?php
                            include "../koneksi.php";
                            $query_detail = mysqli_query($conn, "SELECT * FROM detail_transaksi d 
                                            JOIN barang p ON p.id_barang = d.id_barang WHERE
                                            id_transaksi = '" . $data_pembelian['id_transaksi'] . "'");
                            while ($data_detail = mysqli_fetch_array($query_detail)) {
                                echo "<li>" . $data_detail['nama_barang'] . "</li>";
                            }
                            ?>
                        </ol>
                    </td>
                    <td>
                        <ul style="list-style: none;">
                            <?php
                            include "../koneksi.php";
                            $query_detail = mysqli_query($conn, "SELECT * FROM detail_transaksi d
                                            JOIN barang p ON p.id_barang = d.id_barang WHERE
                                            id_transaksi = '" . $data_pembelian['id_transaksi'] . "'");
                            while ($data_detail = mysqli_fetch_array($query_detail)) {
                                echo "<li>" . $data_detail['qty'] . "<li>";
                            }
                            ?>
                        </ul>
                    </td>
                    <td>
                        <ul style="list-style: none;">
                            <?php
                            include "../koneksi.php";
                            $query_detail = mysqli_query($conn, "SELECT * FROM detail_transaksi d
                                            JOIN barang p ON p.id_barang = d.id_barang WHERE
                                            id_transaksi = '" . $data_pembelian['id_transaksi'] . "'");
                            while ($data_detail = mysqli_fetch_array($query_detail)) {
                                echo "<li>" . ($data_detail['subtotal'] / $data_detail['qty']) . "<li>";
                            }
                            ?>
                        </ul>
                    </td>
                    <td>
                        <ul style="list-style: none;">
                            <?php
                            include "../koneksi.php";
                            $query_detail = mysqli_query($conn, "SELECT * FROM detail_transaksi d
                                            JOIN barang p ON p.id_barang = d.id_barang WHERE
                                            id_transaksi = '" . $data_pembelian['id_transaksi'] . "'");
                            while ($data_detail = mysqli_fetch_array($query_detail)) {
                                echo "<li>" . $data_detail['subtotal'] . "</li>";
                            }
                            ?>
                        </ul>
                    </td>
                    <td>
                        <?php
                        include "../koneksi.php";
                        $query_bayar = mysqli_query($conn, "SELECT SUM(subtotal) AS total FROM detail_transaksi
                            WHERE id_transaksi = '" . $data_pembelian['id_transaksi'] . "'");
                        $data_bayar = mysqli_fetch_array($query_bayar);
                        echo "<label class='alert alert-secondary'>Rp. " . $data_bayar['total'] . "</label>";
                        ?>
                    </td>
                    <td>
                    <td>
                          <?php 
                          echo "<label class='alert alert-success'>".$data_pembelian['status']."</label>";
                          ?>
                          </td>
                                <td><a href="acc.php?id_transaksi=<?=$data_pembelian ['id_transaksi']?>" class="btn btn-outline-danger">
                                    <?= $data_pembelian['status'] ?></a>
                                </td>

                        </td>

                        </tr>
                        <?php 
                      } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</section>
<?php
include "footer.php";
?>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>
</body>
</html>