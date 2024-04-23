<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Buku</h4>
      <p class="card-description">List buku</p>
      <a href="?page=usertambah" class="btn btn-gradient-danger btn-fw">Tambah User</a>
      <table class="table table-striped mt-3">
        <thead>
          <tr>
            <th> No </th>
            <th> Username </th>
            <th> Email </th>
            <th> Nama Lengkap </th>
            <th> Alamat </th>
            <th> Role </th>
            <th> Aksi </th>
          </tr>
        </thead>
        <tbody>
          <!-- Fungsi untuk mengambil data dari tabel basis data -->
          <?php
          $sql = mysqli_query($conn, "SELECT * FROM user");
          while ($data = mysqli_fetch_array($sql)) {
            $i = 1
          ?>
          <!-- Memulai perulangan untuk menampilkan semua data -->
            <tr>
              <td class="py-1">
                <?= $i ?>
              </td>
              <td><?= $data['username'] ?></td>
              <td><?= $data['email'] ?></td>
              <td><?= $data['namalengkap'] ?></td>
              <td><?= $data['alamat'] ?></td>
              <td><?= $data['role'] ?></td>
              <td>
                <a href="?page=userubah&id=<?= $data['userid'] ?>" class="btn btn-gradient-primary">Ubah</a>
                <a href="?page=userhapus&id=<?= $data['userid'] ?>" class="btn btn-gradient-success btn-fw">Hapus User</a>
              </td>
            </tr>
          <?php
            $i++;
          }
          ?>
          <!-- end -->
        </tbody>
      </table>
    </div>
  </div>
</div>