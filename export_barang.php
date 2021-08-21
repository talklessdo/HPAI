<?php 
include 'connect.php';
$query = mysqli_query($conn,"SELECT * FROM barang");
 ?>
 <?php
  header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attachment; filename=Data Barang.xls");
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Export EXCEL</title>
</head>
<body>
  


  <table border="1">
    <thead>
      <tr>
        <th>
          No
        </th>
        <th>
          Kode Barang
        </th>
        <th>
          Nama Barang
        </th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
       foreach ($query as $data): ?>
      <tr>
        <td>
          <?php echo $no++; ?>
        </td>
        <td>
          <?php echo $data['kode_barang']; ?>
        </td>
        <td>
          <?php echo $data['nama_barang']; ?>
        </td>
      </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</body>

</html>

