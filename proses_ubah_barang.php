<?php 
include 'connect.php';
if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $namaBarang = $_POST['nama_barang'];
    $kodeBarang = $_POST['kode_barang'];
    $alert = "<script>
alert('Data berhasil diubah');
document.location.href = 'barang.php';
</script>";


    $query = mysqli_query($conn, "UPDATE barang SET kode_barang = '$kodeBarang', nama_barang = '$namaBarang' WHERE id = $id");

    if ($query) {
        echo $alert;
    } else {
        echo mysqli_error($query);
    }
}


?>