<?php
$id = $_GET['id'];

if(isset($_POST['simpan'])){
    $getbuku = mysqli_query($conn, "SELECT * FROM peminjaman LEFT JOIN buku ON peminjaman.bukuid = buku.bukuid WHERE peminjamanid = $id");
    $bukus = mysqli_fetch_array($getbuku);
    $tglpengembalian = date("Y-m-d H:i:s");
    $userid = $_SESSION['user']['userid'];
    $ulasan = $_POST['ulasan'];
    $rating = $_POST['rating'];
    $bukuid = $bukus['bukuid'];

    
    if($ulasan == '' || $rating == ''){
        $sql = mysqli_query($conn, "UPDATE peminjaman SET statuspeminjaman = 'Dikembalikan',tanggalpengembalian = '$tglpengembalian' WHERE peminjamanid = $id");
        if($sql){
            echo "<script>alert('Buku berhasil dikembalikan');</script>";
            echo "<script>location='?page=dipinjam';</script>";
        }else{
            echo "<script>alert('Buku gagal dikembalikan');</script>";
            echo "<script>location='?page=dipinjam';</script>";
        }

    }else{
        $sql = mysqli_query($conn, "UPDATE peminjaman SET statuspeminjaman = 'Dikembalikan',tanggalpengembalian = '$tglpengembalian' WHERE peminjamanid = $id");
        $insert = mysqli_query($conn, "INSERT INTO ulasanbuku (userid,bukuid,ulasan,rating) VALUES ('$userid','$bukuid','$ulasan','$rating')");
        if($sql){
            if($insert){
                echo "<script>alert('Buku berhasil dikembalikan');</script>";
                echo "<script>location='?page=dipinjam';</script>";
            }else{
                echo "<script>alert('Buku gagal dikembalikan');</script>";
                echo "<script>location='?page=dipinjam';</script>";
            }
        }else{
            echo "<script>alert('Buku gagal dikembalikan');</script>";
            echo "<script>location='?page=dipinjam';</script>";
        }
    }
    
}
?>
<div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">Info Buku</h4>
        </p>
        <form method="post">
            <table class="table">
                <?php
                $sql = mysqli_query($conn, "SELECT * FROM peminjaman LEFT JOIN buku ON peminjaman.bukuid = buku.bukuid WHERE peminjamanid = $id");
                $data = mysqli_fetch_array($sql);
                ?>
                <thead>
                <tr>
                    <th>Judul</th>
                    <th>:</th>
                    <th><?= $data['judul'] ?></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Penulis</td>
                    <td>:</td>
                    <td><?= $data['penulis'] ?></td>
                </tr>
                <tr>
                    <td>Penerbit</td>
                    <td>:</td>
                    <td><?= $data['penerbit'] ?></td>
                </tr>
                <tr>
                    <td>Tahun Terbit</td>
                    <td>:</td>
                    <td><?= $data['tahunterbit'] ?></td>
                </tr>
                <tr>
                    <td>Tanggal Peminjaman</td>
                    <td>:</td>
                    <td><?= date('Y-m-d H:i:s'); ?></td>
                </tr>
                <tr>
                    <td><input type="text" class="form-control" id="exampleInputName1" placeholder="Ulasan" name="ulasan"></td>
                </tr>
                <tr>
                    <td><input type="number" class="form-control" id="exampleInputName1" placeholder="Rating" name="rating"></td>
                </tr>
                </tbody>
                
            </table>
            <button class="btn btn-gradient-primary btn-fw mt-4" name="simpan">Kembalikan Buku</button>
        </form>
        </div>
    </div>
</div>