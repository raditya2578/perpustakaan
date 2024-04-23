<?php
$id = $_GET['id'];
$sql = mysqli_query($conn, "DELETE FROM ulasanbuku WHERE ulasanid = '$id'");
if($sql) {
    echo "<script>alert('Ulasan Berhasil Dihapus');</script>";
    echo "<script>location='?page=ulasanbuku';</script>";
}else{
    echo "<script>alert('Ulasan Gagal Dihapus');</script>";
    echo "<script>location='?page=ulasanbuku';</script>";
}