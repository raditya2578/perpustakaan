<!-- Fungsi untuk mengubah data dari user yang telah dibuat -->
<?php
$id = $_GET['id'];
if (isset($_POST['simpan'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];
    $namalengkap = $_POST['namalengkap'];
    $alamat = $_POST['alamat'];
    $role = $_POST['role'];

    if ($_POST['password'] != '') {
        $sql = mysqli_query($conn, "UPDATE user SET username = '$username', password = '$password', email = '$email', namalengkap = '$namalengkap', alamat = '$alamat', role = '$role' WHERE userid = $id");
        if ($sql) {
            echo "<script>alert('Ubah User Berhasil'); location.href='?page=user'</script>";
        } else {
            echo "<script>alert('Ubah User Gagal'); location.href='?page=usertambah'</script>";
        }
    } else {
        $sql = mysqli_query($conn, "UPDATE user SET username = '$username', email = '$email', namalengkap = '$namalengkap', alamat = '$alamat', role = '$role' WHERE userid = $id");
        if ($sql) {
            echo "<script>alert('Ubah User Berhasil'); location.href='?page=user'</script>";
        } else {
            echo "<script>alert('Ubah User Gagal'); location.href='?page=usertambah'</script>";
        }
    }
}
?>
<!-- end -->
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah User</h4>
            <p class="card-description">Isi data dibawah ini</p>
            <form class="forms-sample" method="post">
                <!-- Fungsi untuk mengambil data user yang ingin diubah -->
                <?php
                $data = mysqli_query($conn, "SELECT * FROM user WHERE userid = '$id'");
                $d = mysqli_fetch_array($data);
                ?>
                <!-- end -->
                <div class="form-group">
                    <label for="exampleInputName1">Username</label>
                    <input type="text" class="form-control" id="exampleInputName1" value="<?= $d['username'] ?>" name="username">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Password</label>
                    <p class="text-muted">//kosongkan jika tidak diubah</p>
                    <input type="text" class="form-control" id="exampleInputName1" name="password">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Email</label>
                    <input type="email" class="form-control" id="exampleInputName1" value="<?= $d['email'] ?>" name="email">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Nama Lengkap</label>
                    <input type="text" class="form-control" id="exampleInputName1" value="<?= $d['namalengkap'] ?>" name="namalengkap">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Alamat</label>
                    <input type="text" class="form-control" id="exampleInputName1" value="<?= $d['alamat'] ?>" name="alamat">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Role</label>
                    <select name="role" class="form-control">
                        <option value="admin">Admin</option>
                        <option value="petugas">Petugas</option>
                        <option value="user">User</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-gradient-primary me-2" name="simpan">Ubah</button>
                <a href="?page=user" class="btn btn-light">Kembali</a>
            </form>
        </div>
    </div>
</div>