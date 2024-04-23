<?php
$id = $_GET['id'];
$tglpengembalian = date("Y-m-d H:i:s");
$sql = mysqli_query($conn, "UPDATE peminjaman SET statuspeminjaman = 'Dikembalikan',tanggalpengembalian = '$tglpengembalian' WHERE peminjamanid = $id");
if($sql){
    echo "<script>alert('Buku berhasil dikembalikan');</script>";
    echo "<script>location='?page=dipinjam';</script>";
}else{
    echo "<script>alert('Buku gagal dikembalikan');</script>";
    echo "<script>location='?page=dipinjam';</script>";
}