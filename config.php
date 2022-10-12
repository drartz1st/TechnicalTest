<?php 
//mysql_connect('localhost','root','');

$con = mysqli_connect('localhost','root','','myproject');

//cek koneksi
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }
//mysql_select_db('myproject');
?>