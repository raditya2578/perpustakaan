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
                    <!-- Fungsi untuk mengambil data buku yang ditambahkan ke koleksi sesuai dari siapa pengguna yang login -->
                    <?php
                    $userid = $_SESSION['user']['userid'];
                    $sql = mysqli_query($conn, "SELECT * FROM koleksipribadi LEFT JOIN user ON koleksipribadi.userid = user.userid LEFT JOIN buku ON koleksipribadi.bukuid = buku.bukuid WHERE koleksipribadi.userid = $userid");
                    while ($data = mysqli_fetch_array($sql)) {
                    ?>
                        <!-- Memulai perulangan untuk menampilkan semua buku yang telah ditambahkan ke koleksi -->
                        <tr>
                            <td class="py-1"><?= $data['judul'] ?></td>
                            <td><?= $data['penulis'] ?></td>
                            <td><?= $data['penerbit'] ?></td>
                            <td><?= $data['tahunterbit'] ?></td>
                            <td>
                                <a href="?page=koleksihapus&id=<?= $data['koleksiid'] ?>" class="btn btn-gradient-success btn-fw">Hapus Dari Koleksi</a>
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