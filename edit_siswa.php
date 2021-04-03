<?php
include 'koneksi.php';
  if (isset($_GET['id'])) {
    $id = ($_GET["id"]);
    $query = "SELECT * FROM tb_siswa,tb_kelas,tb_spp WHERE tb_siswa.nisn='$id' AND tb_siswa.id_kelas=tb_kelas.id_kelas AND tb_siswa.id_spp=tb_spp.id_spp";
    $result = mysqli_query($koneksi, $query);
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    $data = mysqli_fetch_assoc($result);
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='siswa.php';</script>";
       }
  } else {
    echo "<script>alert('Masukkan data id.');window.location='siswa.php';</script>";
  }         
  ?>
<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
      h1 {
        text-transform: uppercase;
        color: grey;
      }
	  h2 {
        text-transform: uppercase;
        color: grey;
      }
	  h3 {
        text-transform: uppercase;
        color: grey;
      }
	  h5 {
        text-transform: uppercase;
        color:#999999;
      }
    button {
          background-color: grey;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border: 0px;
          margin-top: 20px;
    }
    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
    }
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: grey;
    }
    div {
      width: 100%;
      height: auto;
    }
    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #ededed;
    }
	  a {
          background-color: grey;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
    }
    </style>
  </head>
<body>
 
  <?php
  
  include ('header.php');
?>
      <center>
  
        <h2>Edit Siswa</h2>
      <center>
      <form method="POST" action="proses_editsiswa.php" enctype="multipart/form-data" >
      <section class="base">
        <div>
         <label>NISN</label>
        <input name="nisn" value="<?php echo $data['nisn']; ?>"/>
        </div>
        <div>
           <label>NIS</label>
        <input name="nis" value="<?php echo $data['nis']; ?>"/>
        </div>
        <div>
           <label>Nama</label>
        <input name="nis" value="<?php echo $data['nama']; ?>"/>
        </div>
       <div>
         <label>Kelas</label>
          <select name="id_kelas">
           <option value="not_option"> Silahkan Pilih Petugas Ekspedisi</option>
            <?php
                $idkelasygdipilih=$data['id_kelas']; 
                $query = "SELECT * FROM tb_kelas ORDER BY nama_kelas ASC";
                $result = mysqli_query($koneksi, $query);
                if(!$result){
                  die ("Query Error: ".mysqli_errno($koneksi).
                     " - ".mysqli_error($koneksi));
                }

                $no = 1; 
                while($row = mysqli_fetch_assoc($result))
                {
                ?>
           <option value="<?php echo $row['id_kelas']; ?>" <?php if($row['id_kelas']=="$idkelasygdipilih"){?> selected="selected" <?php } ?>><?php echo $row['nama_kelas']; ?></option>
           <?php
                  $no++;
                }
                ?>
           </select>
          
      </div>
        <div>
           <label>Alamat</label>
        <input name="alamat" value="<?php echo $data['alamat']; ?>"/>
      </div>
        <div>
           <label>No Telp</label>
        <input name="no_telp" value="<?php echo $data['no_telp']; ?>"/>
      </div>
         
        <div>
         <label>SPP</label>
          <select name="id_spp">
           <option value="not_option"> Silahkan Pilih Petugas Ekspedisi</option>
            <?php
             $idsppygdipilih=$data['id_spp']; 
                $query = "SELECT * FROM tb_spp ORDER BY nominal ASC";
                $result = mysqli_query($koneksi, $query);
                if(!$result){
                  die ("Query Error: ".mysqli_errno($koneksi).
                     " - ".mysqli_error($koneksi));
                }

                $no = 1; 
                while($row = mysqli_fetch_assoc($result))
                {
                ?>
            <option value="<?php echo $row['id_spp']; ?>" <?php if($row['id_spp']=="$idsppygdipilih"){?> selected="selected" <?php } ?>><?php echo $row['tahun']; ?></option>
           <?php
                  $no++; 
                }
                ?>
           </select>
          
      </div>
        
        <div>
         <button type="submit">Simpan Perubahan</button>
        </div>
        </section>
      </form>
	
	
</body>
</html>