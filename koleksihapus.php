<?php
$id = $_GET['id'];
$sql = mysqli_query($conn, "DELETE FROM koleksipribadi WHERE koleksiid = '$id'");
if($sql) {
    echo "<script>alert('Buku Berhasil Dihapus');</script>";
    echo "<script>location='?page=koleksi';</script>";
}else{
    echo "<script>alert('Buku Gagal Dihapus');</script>";
    echo "<script>location='?page=koleksi';</script>";
}