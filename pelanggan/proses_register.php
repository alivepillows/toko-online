<?php
if($_POST){
    require "../koneksi.php";

    $nama = strtolower(stripslashes($_POST["nama_pembeli"]));
    $alamat = strtolower(stripslashes($_POST["alamat"]));
    $no_telp = strtolower(stripslashes($_POST["no_telp"]));
    $username = strtolower(stripslashes($_POST["username"]));
    /* 
       stripslashes : menghapus slas
       strtolower   : merubah huruf besar ke kecil
    */
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $password2 = mysqli_real_escape_string($conn, $_POST["password2"]);
    /* 
        mysqli_real_escape_string() : Memungkinakan user bisa memasukan tanda kutip 
    */

    /* Cek username sudah adda atau belum */
    $result = mysqli_query($conn, "SELECT username FROM pembeli WHERE username = '$username'");

    if( mysqli_fetch_assoc($result)){
        echo "<script>
            alert('username sudah terdaftar!');
            location.href='register.php';
            </script>";
            return false;
    }



    /* cek konfirmasi password */
    if($password !== $password2){
        echo "<script>
                alert('konfirmasi password tidak sesuai');
                location.href='register.php';
              </script>";
              return false;
    }

    /* enkripsi password */
    $password = password_hash($password, PASSWORD_DEFAULT);


    $insert=mysqli_query($conn,"insert into pembeli (nama_pembeli, alamat, no_telp, username, password) value ('".$nama."','".$alamat."','".$no_telp."','".$username."','".md5($password)."')") or die(mysqli_error($conn));
    
    if($insert){
        echo "<script>alert('Sukses Menambahkan Akun');location.href='login.php';</script>";
    } else {
        echo "<script>alert('Gagal Menambahkan Akun');location.href='register.php';</script>";
    }
}
?>