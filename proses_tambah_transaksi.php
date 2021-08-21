<?php 
include 'connect.php';
if (isset($_POST['simpan'])) {
    $kodeTransaksi = htmlspecialchars($_POST['kode_transaksi']);
    $tglTransaksi = htmlspecialchars($_POST['tanggal_transaksi']);
    $waktuTransaksi = htmlspecialchars($_POST['waktu_transaksi']);

    $query = mysqli_query($conn, "INSERT INTO transaksi (kode_transaksi, tanggal_transaksi, waktu_transaksi) VALUES ('$kodeTransaksi','$tglTransaksi','$waktuTransaksi')");

    if ($query) {
        echo "
    <script>
        alert('data berhasil ditambahkan');
        document.location.href = 'transaksi.php';
    </script>";
    } else {
        echo "
    <script>
        alert('data gagal ditambahkan');
        document.location.href = 'transaksi.php';
    </script>";
    }
}
?>