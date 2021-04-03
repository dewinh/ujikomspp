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
	  h4 {
        text-transform: uppercase;
        color:#999999;
      }
	   h5 {
        text-transform: uppercase;
        color:#999999;
      }
    table {
      border: solid 1px #DDEEEE;
      border-collapse: collapse;
      border-spacing: 0;
      width: 70%;
      margin: 10px auto 10px auto;
    }
    table thead th {
        background-color: #DDEFEF;
        border: solid 1px #DDEEEE;
        color: #336B6B;
        padding: 10px;
        text-align: left;
        text-shadow: 1px 1px 1px #fff;
        text-decoration: none;
    }
    table tbody td {
        border: solid 1px #DDEEEE;
        color: #333;
        padding: 10px;
        text-shadow: 1px 1px 1px #fff;
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


    <center><h2>Data SPP</h2><center>
    <center><a href="tambah_spp.php">+ &nbsp; Tambah SPP</a><center>
    <br/>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Tahun</th>
          <th>Nominal</th>
          
          <th>Action</th>
        </tr>
    </thead>
    <tbody>
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
       <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row['tahun']; ?></td>
          <td><?php echo substr($row['nominal'], 0, 20); ?></td>
          <td>
              <a href="edit_spp.php?id=<?php echo $row['id_spp']; ?>">Edit</a> |
              <a href="proses_hapusspp.php?id=<?php echo $row['id_spp']; ?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</a>
          </td>
      </tr>
         
      <?php
        $no++; 
    }
      ?>
    </tbody>
    </table>
</body>
</html>