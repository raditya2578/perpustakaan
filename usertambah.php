<?php
    if(isset($_POST['simpan'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $email = $_POST['email'];
        $namalengkap = $_POST['namalengkap'];
        $alamat = $_POST['alamat'];
        $role = $_POST['role'];

        $sql = mysqli_query($conn, "INSERT INTO user (username,password,email,namalengkap,alamat,role) VALUES ('$username','$password','$email','$namalengkap','$alamat','$role')");
        if($sql){
            echo "<script>alert('Tambah User Berhasil'); location.href='?page=user'</script>";
        }else{
            echo "<script>alert('Tambah User Gagal'); location.href='?page=usertambah'</script>";
        }
    }
?>
<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Tambah User</h4>
                    <p class="card-description">Isi data dibawah ini</p>
                    <form class="forms-sample" method="post">
                      <div class="form-group">
                        <label for="exampleInputName1">Username</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Username" name="username">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Password</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Password" name="password">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Email</label>
                        <input type="email" class="form-control" id="exampleInputName1" placeholder="Email" name="email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Nama Lengkap</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Nama Lengkap" name="namalengkap">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Alamat</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Alamat" name="alamat">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Role</label>
                        <select name="role" class="form-control">
                            <option value="admin">Admin</option>
                            <option value="petugas">Petugas</option>
                            <option value="user">User</option>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-gradient-primary me-2" name="simpan">Tambah</button>
                      <a href="?page=user" class="btn btn-light">Kembali</a>
                    </form>
                  </div>
                </div>
              </div>