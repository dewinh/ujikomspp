<?php
include 'koneksi.php';

  $id = $_POST['id'];

  $nama_kelas    = $_POST['nama_kelas'];
  $kompetensi_keahlian	= $_POST['kompetensi_keahlian'];

                   $query  = "UPDATE tb_kelas SET nama_kelas = '$nama_kelas' , kompetensi_keahlian = '$kompetensi_keahlian' WHERE id_kelas = '$id'";
                    $result = mysqli_query($koneksi, $query);
                    
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
                    } else {
                      
                      echo "<script>alert('Data berhasil diubah.');window.location='kelas.php';</script>";
                    }
              
			  
			  ?>
