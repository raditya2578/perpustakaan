<!-- Fungsi ketika peminjam ingin meminjamkan buku -->
<?php
$id = $_GET['id'];
$userid = $_GET['user'];
$tglpeminjaman = date('Y-m-d H:i:s');
$status = 'Dipinjam';
$sql = mysqli_query($conn, "INSERT INTO peminjaman (userid,bukuid,tanggalpeminjaman,statuspeminjaman) VALUES ('$userid','$id','$tglpeminjaman','$status')");
if ($sql) {
    echo "<script>alert('Peminjaman Berhasil'); location.href='?page=buku'</script>";
} else {
    echo "<script>alert('Peminjaman Gagal'); location.href='?page=buku'</script>";
}
?>
<!-- end -->