<?php
$id = $_GET['id'];
$sql = mysqli_query($conn, "DELETE FROM user WHERE userid = '$id'");
if($sql) {
    echo "<script>alert('User Berhasil Dihapus');</script>";
    echo "<script>location='?page=user';</script>";
}else{
    echo "<script>alert('User Gagal Dihapus');</script>";
    echo "<script>location='?page=user';</script>";
}