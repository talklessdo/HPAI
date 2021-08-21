<?php 
include 'connect.php';
if (isset($_POST['simpan'])) {
    $namaBarang = htmlspecialchars($_POST['nama_barang']);
    $kodeBarang = htmlspecialchars($_POST['kode_barang']);

    $query = mysqli_query($conn, "INSERT INTO barang (kode_barang, nama_barang) VALUES ('$kodeBarang','$namaBarang')");

    if ($query) {
        echo "
    <script>
        alert('data berhasil ditambahkan');
        document.location.href = 'barang.php';
    </script>";
    } else {
        echo "
    <script>
        alert('data gagal ditambahkan');
        document.location.href = 'barang.php';
    </script>";
    }
}
?>