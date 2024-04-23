<!-- Fungsi untuk menambahkan buku ke tabel dari basis data -->
<?php
if (isset($_POST['simpan'])) {
  $judul = $_POST['judul'];
  $penulis = $_POST['penulis'];
  $penerbit = $_POST['penerbit'];
  $tahunterbit = $_POST['tahunterbit'];

  $sql = mysqli_query($conn, "INSERT INTO buku (judul,penulis,penerbit,tahunterbit) VALUES ('$judul','$penulis','$penerbit','$tahunterbit')");
  if ($sql) {
    echo "<script>alert('Tambah Buku Berhasil'); location.href='?page=pendataan'</script>";
  } else {
    echo "<script>alert('Tambah Buku Gagal'); location.href='?page=pendataan'</script>";
  }
}
?>
<!-- end -->
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Tambah Buku</h4>
      <p class="card-description">Isi data dibawah ini</p>
      <form class="forms-sample" method="post">
        <div class="form-group">
          <label for="exampleInputName1">Judul</label>
          <input type="text" class="form-control" id="exampleInputName1" placeholder="Judul" name="judul">
        </div>
        <div class="form-group">
          <label for="exampleInputName1">Penulis</label>
          <input type="text" class="form-control" id="exampleInputName1" placeholder="Penulis" name="penulis">
        </div>
        <div class="form-group">
          <label for="exampleInputName1">Penerbit</label>
          <input type="text" class="form-control" id="exampleInputName1" placeholder="Penerbit" name="penerbit">
        </div>
        <div class="form-group">
          <label for="exampleInputName1">Tahun Terbit</label>
          <input type="number" class="form-control" id="exampleInputName1" placeholder="Tahun Terbit" name="tahunterbit">
        </div>
        <button type="submit" class="btn btn-gradient-primary me-2" name="simpan">Tambah</button>
        <a href="?page=pendataan" class="btn btn-light">Kembali</a>
      </form>
    </div>
  </div>
</div>