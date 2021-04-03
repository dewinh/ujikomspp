<?php
include 'koneksi.php';

$id_petugas = $_POST['id_petugas'];
$username = $_POST['username'];
$password = $_POST['password'];
$nama_petugas = $_POST['nama_petugas'];
$level = $_POST ['level'];

 $query = " UPDATE tb_petugas SET id_petugas = '$id_petugas' , username = '$username' , password = '$password' , nama_petugas = '$nama_petugas' , level = '$level'";
 $result = mysqli_query($koneksi , $query);

 if(!$result){
  die("Query gagal dijalankan: " .mysqli_errno($koneksi). " - " .mysqli_error($koneksi));
 } else {
  echo "<script>alert('Data berhasil diubah.');window.location='petugas.php';</script>";
 }

 ?>