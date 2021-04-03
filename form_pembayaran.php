<?php
	include('koneksi.php');
		include('header.php');
		?>

    <body>
      <div class="col-md-10 p-5 pt-4">
            <h3><i class="fas fa-cash-register mr-2"></i>TRANSAKSI PEMBAYARAN</h3> 
              <form action="proses_tambahpembayaran.php" method="post">
             <div class="input-group mb-3">
             <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">id Pembayaran</span>
               </div>
                <input type="text" name="id_pembayaran" class="form-control" placeholder="id pembayaran" aria-label="masukkan id pembayaran" aria-describedby="basic-addon1">
                </div>
            <div class="input-group mb-3">
             <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">id Petugas</span>
               </div>
                <input type="text" name="id_petugas" class="form-control" placeholder="id_petugas" aria-label="masukkan id petugas" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
             <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">NISN</span>
               </div>
                <input type="text" name="nisn" class="form-control" placeholder="nisn" aria-label="masukkan nisn" aria-describedby="basic-addon1">
                </div>

               <div class="input-group mb-3">
             <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Tanggal Bayar</span>
               </div>
                <input type="date" name="Tgl_bayar" class="form-control" placeholder="Tgl_bayar" aria-label="tanggal" aria-describedby="basic-addon1">
                </div> 

              <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Bulan Bayar</label>
              </div>
              <select class="custom-select" name= "Bulan_dibayar" id="inputGroupSelect01">
                <option selected>--pilih bulan--</option>
                <option value="januari">Januari</option>
                <option value="februari">Februari</option>
                <option value="maret">Maret</option>
                <option value="januari">April</option>
                <option value="februari">Mei</option>
                <option value="maret">Juni</option>
                <option value="januari">Juli</option>
                <option value="februari">Agustus</option>
                <option value="maret">September</option>
                <option value="januari">Oktober</option>
                <option value="februari">November</option>
                <option value="maret">Desember</option>
              </select>
            </div>  

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Tahun Bayar</label>
                </div>
                <select class="custom-select" name="tahun_dibayar" id="inputGroupSelect01">
                  <option selected>--Pilih Tahun--</option>
                  <option value="2019">2019</option>
                  <option value="2020">2020</option>
                  <option value="2021">2021</option>
                </select>
              </div>

              <div class="input-group mb-3">
             <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">ID SPP</span>
               </div>
                <input type="text" name="id_spp" class="form-control" placeholder="id spp" aria-label="masukkan id" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
             <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Jumlah</span>
               </div>
                <input type="text" name="jumlah_bayar" class="form-control" placeholder="jumlah bayar" aria-label="masukkan nominal" aria-describedby="basic-addon1">
                </div>
            

            <div class="d-flex justify-content-center">
              <button type="submit" class="btn btn-success">Bayar</button>


            </form>
            </div>
    <center><h2>CARI SISWA BERDASARKAN NISN</h2></center>
		
    <form action="" method="get">
  <table class="table">
    <tr>
      <td>NISN</td>
      <td>:</td>
      <td>
        <input class="form-control" type="text" name="nisn">
      </td>
      <td>
        <button class="btn btn-primary" type="submit" name="cari">Cari</button></td>
</tr>
    </table> 
  </form>
    
    
    
     
<?php 
if (isset($_GET['nisn']) && $_GET['nisn'] != ''){
  $query= mysqli_query ($koneksi,"SELECT * FROM tb_siswa WHERE nisn = '$_GET[nisn]'");
  $data = mysqli_fetch_array($query);
  $nisn = $data['nisn'];

?>
<div class="panel panel-info"></div>
  <div class="panel-heading">
  </div>
<center><h3>Biodata Siswa</h3></center>
<div class="panel panel-body"></div>
<thead>
    <table class="table table-bordered table-striped">  
    <tr>
      <th scope="col"><b>NISN</b></th>
      <td scope="col"><b>NAMA</b></td>
      <th scope="col"><b>ID KELAS</b></th>
      </tr>
      
      <tbody>
      <td><?php echo $data['nisn']; ?></td>
      <td><?php echo $data['nama']; ?></td>
      <td><?php echo $data['id_kelas']; ?></td>
      </table>  
      </thead>
      </tbody>
      
    
    <div>
    </div>

      <div class="panel panel-info">
      </div>
      <div class="panel-heading">
      <center><h3>Tagihan SPP Siswa</h3></center>
      </div>
      <div class="panel-body "></div>
      <table class="table table-bordered table-striped">
        <thead>
      <tr>
      <th scope="col">id_pembayaran</th>
      <th scope="col">id_petugas</th>
      <th scope="col">nisn</th>
      <th scope="col">Tgl_bayar</th>
      <th scope="col">bulan_dibayar</th>
      <th scope="col">tahun_dibayar</th>
      <th scope="col">id_spp</th>
      <th scope="col">jumlah_bayar</th>
      
        </tr>
        </thead>
          
    
  <tbody>
  	<?php
  	$query= mysqli_query($koneksi ," SELECT * FROM tb_pembayaran WHERE nisn = '$data[nisn]' ORDER BY jumlah_bayar ASC ");
  	
  while($data= mysqli_fetch_assoc($query))
  {
  echo" 
      
       <tr>
          <td>{$data['id_pembayaran']}</td>
           <td>{$data['id_petugas']}</td>
          <td>{$data['nisn']}</td>
          <td>{$data['tgl_bayar']}</td>
          <td>{$data['bulan_bayar']}</td>
          <td>{$data['tahun_bayar']}</td>
          <td>{$data['id_spp']}</td>
          <td>{$data['jumlah_bayar']}</td>
          </tr>";
        }
          
         ?>
       </table>
       </tbody>
<?php
}
?>

</body>