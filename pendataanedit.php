<!-- Fungsi untuk mengubah data buku yang telah dibuat -->
<?php
$id = $_GET['id'];
if (isset($_POST['simpan'])) {
  $judul = $_POST['judul'];
  $penulis = $_POST['penulis'];
  $penerbit = $_POST['penerbit'];
  $tahunterbit = $_POST['tahunterbit'];
  $kategori = $_POST['kategori'];

  $sql = mysqli_query($conn, "UPDATE buku SET judul='$judul', penulis='$penulis', penerbit='$penerbit', tahunterbit='$tahunterbit' WHERE bukuid='$id'");
  $kategorid = mysqli_query($conn, "INSERT INTO kategoribuku_relasi (bukuid,kategoriid) VALUES ('$id','$kategori')");
  if ($sql) {
    if ($kategorid) {
      echo "<script>alert('Buku berhasil diubah');</script>";
      echo "<script>location='?page=pendataan';</script>";
    } else {
      echo "<script>alert('Buku gagal diubah');</script>";
      echo "<script>location='?page=pendataan';</script>";
    }
  } else {
    echo "<script>alert('Buku gagal diubah');</script>";
    echo "<script>location='?page=pendataan';</script>";
  }
}
?>
<!-- end -->
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Edit Buku</h4>
      <p class="card-description">Ubah data dibawah yang diinginkan</p>
      <?php
      $data = mysqli_query($conn, "SELECT * FROM buku WHERE bukuid = '$id'");
      $d = mysqli_fetch_array($data);
      ?>
      <form class="forms-sample" method="post">
        <div class="form-group">
          <label for="exampleInputName1">Judul</label>
          <input type="text" class="form-control" id="exampleInputName1" value="<?= $d['judul'] ?>" name="judul">
        </div>
        <div class="form-group">
          <label for="exampleInputName1">Penulis</label>
          <input type="text" class="form-control" id="exampleInputName1" value="<?= $d['penulis'] ?>" name="penulis">
        </div>
        <div class="form-group">
          <label for="exampleInputName1">Penerbit</label>
          <input type="text" class="form-control" id="exampleInputName1" value="<?= $d['penerbit'] ?>" name="penerbit">
        </div>
        <div class="form-group">
          <label for="exampleInputName1">Tahun Terbit</label>
          <input type="number" class="form-control" id="exampleInputName1" value="<?= $d['tahunterbit'] ?>" name="tahunterbit">
        </div>
        <div class="form-group">
          <label for="exampleInputName1">Kategori</label>
          <select class="form-control" name="kategori">
            <?php
            $list = mysqli_query($conn, "SELECT * FROM kategoribuku");
            while ($nama = mysqli_fetch_array($list)) {
            ?>
              <option value="<?= $nama['kategoriid'] ?>"><?= $nama['namakategori'] ?></option>
            <?php
            }
            ?>
          </select>
        </div>
        <button type="submit" class="btn btn-gradient-primary me-2" name="simpan">Ubah</button>
        <a href="?page=pendataan" class="btn btn-light">Kembali</a>
      </form>
    </div>
  </div>
</div>