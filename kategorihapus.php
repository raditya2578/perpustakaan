<!-- Fungsi untuk menghapus kategori -->
<?php
$id = $_GET['id'];
$sql = mysqli_query($conn, "DELETE FROM kategoribuku WHERE kategoriid = '$id'");
if ($sql) {
    echo "<script>alert('Data Berhasil Dihapus');</script>";
    echo "<script>location='?page=kategori';</script>";
} else {
    echo "<script>alert('Data Gagal Dihapus');</script>";
    echo "<script>location='?page=kategori';</script>";
}
?>
<!-- end -->