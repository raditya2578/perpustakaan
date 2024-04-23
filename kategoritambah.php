<!-- Fungsi untuk menambahkan kategori -->
<?php
if (isset($_POST['simpan'])) {
  $namakategori = $_POST['namakategori'];

  $sql = mysqli_query($conn, "INSERT INTO kategoribuku (namakategori) VALUES ('$namakategori')");
  if ($sql) {
    echo "<script>alert('Tambah Kategori Berhasil'); location.href='?page=kategori'</script>";
  } else {
    echo "<script>alert('Tambah Kategori Gagal'); location.href='?page=kategori'</script>";
  }
}
?>
<!-- end -->
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Tambah Kategori</h4>
      <p class="card-description">Isi data dibawah ini</p>
      <form class="forms-sample" method="post">
        <div class="form-group">
          <label for="exampleInputName1">Nama Kategori</label>
          <input type="text" class="form-control" id="exampleInputName1" placeholder="Nama Kategori" name="namakategori">
        </div>
        <button type="submit" class="btn btn-gradient-primary me-2" name="simpan">Tambah</button>
        <a href="?page=kategori" class="btn btn-light">Kembali</a>
      </form>
    </div>
  </div>
</div>