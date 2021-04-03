<?php
include 'koneksi.php';
  $nisn   = $_POST['nisn'];
  $nis     = $_POST['nis'];
  $nama   = $_POST['nama'];
  $id_kelas     = $_POST['id_kelas'];
  $alamat   = $_POST['alamat'];
  $no_telp     = $_POST['no_telp'];
  $id_spp   = $_POST['id_spp'];

                  $query = "INSERT INTO tb_siswa VALUES ('$nisn', '$nis', '$nama', '$id_kelas', '$alamat', '$no_telp', '$id_spp')";
                  $result = mysqli_query($koneksi, $query);
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    echo "<script>alert('Data berhasil ditambah.');window.location='siswa.php';</script>";
                  }

            ?>