<?php
$id = $_GET['id'];
$sql = mysqli_query($conn, "DELETE FROM buku WHERE bukuid = '$id'");
if($sql) {
    echo "<script>alert('Data Berhasil Dihapus');</script>";
    echo "<script>location='?page=pendataan';</script>";
}else{
    echo "<script>alert('Data Gagal Dihapus');</script>";
    echo "<script>location='?page=pendataan';</script>";
}