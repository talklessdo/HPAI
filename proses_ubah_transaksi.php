<?php 
include 'connect.php';
if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $kodeTransaksi = htmlspecialchars($_POST['kode_transaksi']);
    $tglTransaksi = htmlspecialchars($_POST['tanggal_transaksi']);
    $waktuTransaksi = htmlspecialchars($_POST['waktu_transaksi']);
    $alert = "<script>
alert('Data berhasil diubah');
document.location.href = 'transaksi.php';
</script>";


    $query = mysqli_query($conn, "UPDATE transaksi SET kode_transaksi = '$kodeTransaksi', tanggal_transaksi = '$tglTransaksi', waktu_transaksi = '$waktuTransaksi' WHERE id = $id");

    if ($query) {
        echo $alert;
    } else {
        echo mysqli_error($query);
    }
}


?>