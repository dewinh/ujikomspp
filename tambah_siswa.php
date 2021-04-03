<?php
  include('koneksi.php'); 
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
        <h2>Tambah Siswa</h2>
      <center>
      <form method="POST" action="proses_tambahsiswa.php" enctype="multipart/form-data" >
      <section class="base">
          <div>
          <label>nisn</label>
         <input type="text" name="nisn" required=""/>
        </div>
        <div>
          <label>nis</label>
         <input type="text" name="nis" required=""/>
        </div>
        <div>
          <label>nama</label>
         <input type="text" name="nama" required=""/>
        </div>

     <div>
         <label>kelas</label>
          <select name="id_kelas">
           <option value="not_option"> pilih id kelas </option>
            <?php
                $query = "SELECT * FROM tb_kelas ORDER BY id_kelas ASC";
                $result = mysqli_query($koneksi, $query);
                if(!$result){
                  die ("Query Error: ".mysqli_errno($koneksi).
                     " - ".mysqli_error($koneksi));
                }
                $no = 1; 
                while($row = mysqli_fetch_assoc($result))
                {
                ?>
           <option value="<?php echo $row['id_kelas']; ?>"><?php echo $row['id_kelas']; ?></option>
           <?php
                  $no++; 
                }
                ?>
           </select>
          
      </div>

        <div>
          <label>alamat</label>
         <input type="text" name="alamat" required=""/>
        </div>
        <div>
          <label>no_telp</label>
         <input type="text" name="no_telp" required=""/>
        </div>

          
        <div>
         <label>spp</label>
          <select name="id_spp">
           <option value="not_option"> Pilih ID SPP </option>
            <?php
                $query = "SELECT * FROM tb_spp ORDER BY id_spp ASC";
                $result = mysqli_query($koneksi, $query);
                if(!$result){
                  die ("Query Error: ".mysqli_errno($koneksi).
                     " - ".mysqli_error($koneksi));
                }
                $no = 1; 
                while($row = mysqli_fetch_assoc($result))
                {
                ?>
           <option value="<?php echo $row['id_spp']; ?>"><?php echo $row['id_spp']; ?></option>
           <?php
                  $no++; 
                }
                ?>
           </select>
          
      </div>
        
        <div>
         <button type="submit">Simpan Siswa</button>
        </div>
        </section>
      </form>
</body>
</html>
