<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Kategori</h4>
      <p class="card-description">List Kategori</p>
      <div class="template-demo">
        <!-- Fungsi untuk mengambil data kategori -->
        <?php
        $sql = mysqli_query($conn, "SELECT * FROM kategoribuku");
        while ($data = mysqli_fetch_array($sql)) {
        ?>
          <!-- Memulai perulangan untuk menampilkan semua data -->
          <a href="?page=bukukategorisort&id=<?= $data['kategoriid'] ?>" class="btn btn-gradient-primary btn-rounded btn-fw"><?= $data['namakategori'] ?></a>
        <?php
        }
        ?>
        <!-- end -->
      </div>
    </div>
  </div>
</div>