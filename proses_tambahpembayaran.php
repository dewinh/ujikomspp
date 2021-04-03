<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

  // membuat variabel untuk menampung data dari form
    
    $id_petugas    = $_POST['id_petugas'];
    $nisn          = $_POST['nisn'];
    $tgl_bayar     = $_POST['tgl_bayar'];
    $bulan_bayar   = $_POST['bulan_bayar'];
    $tahun_bayar   = $_POST['tahun_bayar'];
    $id_spp        = $_POST['id_spp'];
    $jumlah_bayar  = $_POST['jumlah_bayar'];
     
    
 


                  $query = "INSERT INTO tb_pembayaran VALUES ('','$id_petugas', '$nisn', '$tgl_bayar', '$bulan_bayar', '$tahun_bayar
                  ', '$id_spp', '$jumlah_bayar')";
                  $result = mysqli_query($koneksi, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                     echo "<script>alert('Data berhasil ditambah.');window.location='form_pembayaran.php';</script>";

                    
                  }

                  ?>