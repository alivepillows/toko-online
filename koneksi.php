<?php 
$conn = mysqli_connect('localhost', 'root', '','toko_online');

if(mysqli_connect_errno()){
    printf("Connect failed: %n", mysqli_connect_error());
}  

?>