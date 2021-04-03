<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = ($_GET["id"]);
    $query = "SELECT * FROM tb_petugas WHERE id_petugas='$id'";
    $result = mysqli_query($koneksi, $query);
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    $data = mysqli_fetch_assoc($result);
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='petugas.php';</script>";
       }
  } else {
    echo "<script>alert('Masukkan data id.');window.location='petugas.php';</script>";
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
  
        <h2>Edit Data Petugas</h2>
      <center>
      <form method="POST" action="proses_editpetugas.php" enctype="multipart/form-data" >
      <section class="base">
          <input name="id" value="<?php echo $data['id_petugas']; ?>"  hidden />
          <div>
          <label>ID Petugas</label>
         <input type="text" name="id_petugas" value="<?php echo $data['id_petugas']; ?>" required=""/>
        </div>
        <div>
          <label>Username</label>
         <input type="text" name="username" value="<?php echo $data['username']; ?>" required=""/>
        </div>
         <div>
          <label>Password</label>
         <input type="text" name="password" value="<?php echo $data['password']; ?>" required=""/>
        </div>
         <div>
          <label>Nama Petugas</label>
         <input type="text" name="nama_petugas" value="<?php echo $data['nama_petugas']; ?>" required=""/>
        </div>
        <div>
         <label>Level</label>
          <select name="level">
           <option value="not_option"> Silahkan Pilih Level</option>
            <?php
                $levelygdipilih=$data['level']; 
                $query = "SELECT * FROM tb_petugas ORDER BY level ASC";
                $result = mysqli_query($koneksi, $query);
                if(!$result){
                  die ("Query Error: ".mysqli_errno($koneksi).
                     " - ".mysqli_error($koneksi));
                }
                $no = 1; 
                while($row = mysqli_fetch_assoc($result))
                {
                ?>
           <option value="<?php echo $row['level']; ?>" <?php if($row['level']=="$levelygdipilih"){?> selected="selected" <?php } ?>><?php echo $row['level']; ?></option>
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
