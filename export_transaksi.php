<?php 
include 'connect.php';
$query = mysqli_query($conn,"SELECT * FROM transaksi");
 ?>
 <?php
  header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attachment; filename=Data Transaksi.xls");
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
          Kode Transaksi
        </th>
        <th>
          Tanggal Transaksi
        </th>
        <th>
          Waktu Transaksi
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
          <?php echo $data['kode_transaksi']; ?>
        </td>
        <td>
          <?php echo $data['tanggal_transaksi']; ?>
        </td>
        <td>
          <?php echo $data['waktu_transaksi']; ?>
        </td>
      </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</body>

</html>

