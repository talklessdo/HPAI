<?php 
require 'connect.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $hapus = $_GET['hapus'];
    $alert = "<script>
alert('Data berhasil di hapus');
document.location.href = 'transaksi.php';
</script>";
    $delete = mysqli_query($conn, "DELETE FROM transaksi WHERE id = $id");

    if ($delete) {
        echo $alert;
    } else {
        echo mysqli_error($conn);
    }
}
?>