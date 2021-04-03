<?php
include('koneksi.php');


?>
<!DOCTYPE html>
<html>
<head>
	  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS --> <link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l"
crossorigin="anonymous"> </head> <body> <h2
class="text-center">tambah_pembayaran</h2> <form method="POST"
action="proses_tambahpembayaran.php" enctype="multipart/form-data" > <section
class="base"> <div> <label for="text">id_pembayaran</label> <input type="text"
name="id_pembayaran" class="form-control"  id="id_pembayaran"> </div> <div> <label
for="text">id_petugas</label> <input type="text" name="id_petugas" class="form-control" 
id="id_petugas"> </div> <div class="form-group"> <label for="text">nisn</label>
<input type="text" class="form-control" name="nisn"required="" id="nisn"> 
</div> <div class="form-group"> <label for="text">tgl_bayar</label> <input
type="text" class="form-control" name="tgl_bayar"required="" id="tgl_bayar"> 
</div> <div class="form-group"> <label for="text">bulan_dibayar</label> <input
type="text" class="form-control" name="bulan_dibayar"required="" id="bulan_dibayar">  </div>
<div class="form-group"> <label for="text">  tahun_dibayar</label> <input
type="text" class="form-control" name="tahun_dibayar"required="" id="tahun_dibayar"> 
</div> <div class="form-group"> <label for="text">id_spp</label> <input
type="text" class="form-control" name="id_spp" required="" id="id_spp "> 
</div>
<div class="form-group"> <label for="text">jumlah_bayar</label> <input
type="text" class="form-control" name="jumlah_bayar" required="" id="jumlah_bayar "> 
</div>
<div class="form-group"> <label for="text">ket</label> <input
type="text" class="form-control" name="ket" required="" id="ket"> 
</div>
    

     <button type="submit" class="btn btn-primary">Submit</button>
 </div>
</body>
</html>