<!-- Fungsi untuk mengambil data buku yang ingin dipinjam dari basis data -->
<?php
$id = $_GET['id'];
$sql = mysqli_query($conn, "SELECT * FROM buku WHERE bukuid = $id");
$data = mysqli_fetch_array($sql);
?>
<!-- end -->
<div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Info Buku</h4>
            </p>
            <table class="table">
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
                </tbody>
            </table>
            <a href="?page=pinjam&id=<?= $data['bukuid'] ?>&user=<?= $_SESSION['user']['userid'] ?>" class="btn btn-gradient-primary btn-fw mt-4">Pinjam Buku</a>
        </div>
    </div>
</div>