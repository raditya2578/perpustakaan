<!-- Fungsi untuk menambahkan buku ke koleksi sesuai dari pengguna yang login -->
<?php
$id = $_GET['id'];
$userid = $_SESSION['user']['userid'];
$cek = mysqli_query($conn, "SELECT * FROM koleksipribadi WHERE userid = '$userid' AND bukuid = '$id'");
if (mysqli_num_rows($cek) > 0) {
    echo "<script>alert('Buku Sudah Ditambahkan Ke Koleksi'); location.href='?page=buku'</script>";
} else {
    $sql = mysqli_query($conn, "INSERT INTO koleksipribadi (userid,bukuid) VALUES ('$userid','$id')");
    if ($sql) {
        echo "<script>alert('Tambah Koleksi Berhasil'); location.href='?page=buku'</script>";
    } else {
        echo "<script>alert('Tambah Koleksi Gagal'); location.href='?page=buku'</script>";
    }
}
?>
<!-- end -->