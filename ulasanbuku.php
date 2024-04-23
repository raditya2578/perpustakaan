<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Buku</h4>
            <p class="card-description">List buku</p>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th> Nama User </th>
                        <th> Judul </th>
                        <th> Ulasan </th>
                        <th> Rating </th>
                        <th> Aksi </th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Fungsi untuk mengambil data dari ulasan buku -->
                    <?php
                    $sql = mysqli_query($conn, "SELECT * FROM ulasanbuku LEFT JOIN buku ON ulasanbuku.bukuid = buku.bukuid LEFT JOIN user ON ulasanbuku.userid = user.userid");
                    while ($data = mysqli_fetch_array($sql)) {
                    ?>
                    <!-- Memulai perulangan untuk menampilkan semua data -->
                        <tr>
                            <td class="py-1">
                                <?= $data['username'] ?>
                            </td>
                            <td><?= $data['judul'] ?></td>
                            <td><?= $data['ulasan'] ?></td>
                            <td><?= $data['rating'] ?></td>
                            <td>
                                <a href="?page=ulasanbukuhapus&id=<?= $data['ulasanid'] ?>" class="btn btn-gradient-danger btn-fw">Hapus</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    <!-- end -->
                </tbody>
            </table>
        </div>
    </div>
</div>