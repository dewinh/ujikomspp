<?php 
include 'koneksi.php';
include 'header.php';

 ?>
 <div class="container">
  <div class="page-header">
<center> <h2>CARI SISWA BERDASARKAN NISN</h2> </center>
  </div>
 <form action="" method="get">
  <table class="table">
    <tr>
      <td>NISN</td>
      <td>:</td>
      <td>
        <input class="form-control" type="text" name="nisn">
      </td>
      <td>
        <button class="btn btn-success" type="submit" name="cari">Cari</button>
      </td>
    </tr>
    
  </table>
 </form>
<?php 
if (isset($_GET['nisn']) && $_GET['nisn'] != ''){
  $data = $koneksi->query("SELECT * FROM tb_siswa WHERE nisn = '$_GET[nisn]'");
  $dta = mysqli_fetch_assoc($data);
  $nisn = $dta['nisn'];

?>
<div class="panel panel-info">
  <div class="panel-heading">
<h3>Biodata siswa</h3>
</div>
<div class="panel panel-body">
  <table class="table table-bordered table-striped">
    <tr>
      <td>NISN</td>
      <td><?=$dta['nisn'] ?></td>
    </tr>
    <tr>
      <td>NIS</td>
      <td><?= $dta['nis'] ?></td>
    </tr>
    <tr>
      <td>Nama</td>
      <td><?= $dta['nama'] ?></td>
    </tr>
    <tr>
      <td>ID Kelas</td>
      <td><?= $dta['id_kelas'] ?></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td><?= $dta['alamat'] ?></td>
    </tr>
    <tr>
      <td>No Telepon</td>
      <td><?= $dta['no_telp'] ?></td>
    </tr>
    <tr>
      <td>ID SPP</td>
      <td><?= $dta['id_spp'] ?></td>
    </tr>
  </table>
</div>
</div>

<div class="panel panel-info">
  <div class="panel-heading">
<h3>Tagihan SPP Siswa</h3>
</div>
<div class="panel-body ">
  <table class="table table-bordered table-striped">
<tr>
  <th>NO</th>
  <th>ID Pembayaran</th>
  <th>ID Petugas</th>
  <th>NISN</th>
  <th>Tanggal Bayar</th>
  <th>Bulan Bayar</th>
  <th>Tahun Bayar</th>
  <th>ID SPP</th>
  <th>Jumlah Bayar</th>
  <th>Bayar</th>
</tr>
<?php 
$sql= mysqli_query($koneksi ," SELECT * FROM tb_pembayaran WHERE nisn = '$data[nisn]' ORDER BY jumlah_bayar ASC ");
$i=1;
while($sql= mysqli_fetch_assoc($sq)){
  echo "

    <tr>
      <td>$i</td>
      <td>$sq[id_pembayaran]</td>
      <td>$sq[id_petugas]</td>
      <td>$sq[nisn]</td>
      <td>$sq[tgl_bayar]</td>
      <td>$sq[bulan_dibayar]</td>
      <td>$sq[tahun_dibayar]</td>
      <td>$sq[id_spp]</td>
      <td>$sq[jumlah_bayar]</td>
      
      <td align='center'";
        if ($sq['id_pembayaran'] == ''){
          echo "<a href='proses_pembayaran.php?nisn=$nisn&act=bayar&id=$sq[id_pembayaran]'></a> ";
          echo "<a class='btn btn-primary btn-sm' href='proses_pembayaran.php?nisn=$nisn&act=bayar&id=$sq[id_pembayaran]>Bayar</a> ";
        }else {
          echo "</a>";
          echo "<a class='btn btn-danger btn-sm' href='proses_pembayaran.php?nisn=$nisn&act=batal&id=$sq[id_pembayaran]'>Batal</a> ";
          echo "<a class='btn btn-success btn-sm' href='cetak_slip_pembayaran.php?nisn=$nisn&act=bayar&id=$sq[id_pembayaran]' target='_blank'>Cetak</a> ";
          
        }
      echo "</td>
    </tr>

    ";
    $i++;
}
 ?>
</table>
</div>
</div>
<?php 
}
?>
<p style="color: grey;">Pembayaran dilakukan dengan cara mencari tagihan siswa berdasarkan NISN </p>