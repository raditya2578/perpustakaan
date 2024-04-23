<?php
$id = $_SESSION['user']['userid'];
?>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Buku</h4>
            <p class="card-description">List buku</p>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th> Judul </th>
                        <th> Penulis </th>
                        <th> Penerbit </th>
                        <th> Tahun Terbit </th>
                        <th> Aksi </th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Fungsi untuk mengambil data dari buku yang telah dipinjam oleh pengguna -->
                    <?php
                    $sql = mysqli_query($conn, "SELECT * FROM peminjaman LEFT JOIN user ON peminjaman.userid=user.userid LEFT JOIN buku ON peminjaman.bukuid = buku.bukuid WHERE peminjaman.userid = $id AND peminjaman.statuspeminjaman = 'Dipinjam'");
                    while ($data = mysqli_fetch_array($sql)) {
                    ?>
                    <!-- end -->
                        <tr>
                            <td class="py-1">
                                <?= $data['judul'] ?>
                            </td>
                            <td><?= $data['penulis'] ?></td>
                            <td><?= $data['penerbit'] ?></td>
                            <td><?= $data['tahunterbit'] ?></td>
                            <td>
                                <a href="?page=kembalikan&id=<?= $data['peminjamanid'] ?>" class="btn btn-gradient-primary">Kembalikan</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>