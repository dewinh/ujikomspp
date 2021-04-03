<?php
include 'koneksi.php';


$nisn = $_POST['nisn'];
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$id_kelas = $_POST['id_kelas'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];
$id_spp = $_POST['id_spp'];

                  $query = "UPDATE tb_siswa SET nis = '$nis', nama = '$nama' , id_kelas = '$id_kelas' , alamat = '$alamat' , no_telp = 'no_telp' , id_spp = '$id_spp' WHERE nisn = '$nisn' ";

                  $result = mysqli_query($koneksi, $query);

                  if(!result){
                    die ("Query gagal dijalankan: " .mysqli_errno($koneksi). " - " .mysqli_error($koneksi));
                  } else {
                    echo "<script>alert('Data Berhasil Diubah');window.location='siswa.php';</script>";
                  }
        
        ?>