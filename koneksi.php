<?php 
$koneksi = mysqli_connect("localhost","root","","db_spp_d");
 
// mengecek koneksi dari database
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
?>