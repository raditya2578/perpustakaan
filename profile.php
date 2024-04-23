<?php
    $id = $_SESSION['user']['userid'];
    if(isset($_POST['simpan'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $email = $_POST['email'];
        $namalengkap = $_POST['namalengkap'];
        $alamat = $_POST['alamat'];
        $role = $_POST['role'];
        $sql = mysqli_query($conn, "UPDATE user SET username = '$username', password = '$password', email = '$email', namalengkap = '$namalengkap', alamat = '$alamat', role = '$role' WHERE userid = $id");
        if($sql){
            echo "<script>alert('Ubah User Berhasil'); location.href='?page=user'</script>";
        }else{
            echo "<script>alert('Ubah User Gagal'); location.href='?page=usertambah'</script>";
        }
    }
?>
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">Profile</h4>
        <p class="card-description"></p>
        <form class="forms-sample" method="post">
            <?php
                $data = mysqli_query($conn, "SELECT * FROM user WHERE userid = '$id'");
                $d = mysqli_fetch_array($data);
            ?>
            <div class="form-group">
            <label for="exampleInputName1">Username</label>
            <input type="text" class="form-control" id="exampleInputName1" value="<?= $d['username'] ?>" name="username">
            </div>
            <div class="form-group">
            <label for="exampleInputName1">Password</label>
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