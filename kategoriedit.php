<?php
$id = $_GET['id'];
    if(isset($_POST['simpan'])){
        $namakategori = $_POST['namakategori'];

        $sql = mysqli_query($conn, "UPDATE kategoribuku SET namakategori='$namakategori' WHERE kategoriid = $id");
        if($sql){
            echo "<script>alert('Ubah Kategori Berhasil'); location.href='?page=kategori'</script>";
        }else{
            echo "<script>alert('Ubah Kategori Gagal'); location.href='?page=kategori'</script>";
        }
    }
?>
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Tambah Kategori</h4>
      <p class="card-description">Isi data dibawah ini</p>
      <?php
      $data = mysqli_query($conn, "SELECT * FROM kategoribuku WHERE kategoriid = '$id'");
      $d = mysqli_fetch_array($data);
      ?>
      <form class="forms-sample" method="post">
        <div class="form-group">
          <label for="exampleInputName1">Nama Kategori</label>
          <input type="text" class="form-control" id="exampleInputName1" value="<?= $d['namakategori'] ?>" name="namakategori">
        </div>
        <button type="submit" class="btn btn-gradient-primary me-2" name="simpan">Tambah</button>
        <a href="?page=kategori" class="btn btn-light">Kembali</a>
      </form>
    </div>
  </div>
</div>