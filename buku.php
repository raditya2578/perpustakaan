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
          <!-- Fungsi untuk mengambil semua data dari basis data -->
          <?php
          $sql = mysqli_query($conn, "SELECT * FROM buku");
          while ($data = mysqli_fetch_array($sql)) {
          ?>
            <!-- Melakukan perulangan untuk menampilkan semua data -->
            <tr>
              <td class="py-1">
                <?= $data['judul'] ?>
              </td>
              <td><?= $data['penulis'] ?></td>
              <td><?= $data['penerbit'] ?></td>
              <td><?= $data['tahunterbit'] ?></td>
              <td>
                <a href="?page=bukupinjam&id=<?= $data['bukuid'] ?>" class="btn btn-gradient-primary">Pinjam</a>
                <a href="?page=bukukoleksi&id=<?= $data['bukuid'] ?>" class="btn btn-gradient-success btn-fw">Tambah Ke Koleksi</a>
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