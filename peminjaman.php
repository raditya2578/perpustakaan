<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Buku yang sedang dipinjam</h4>
                    <p class="card-description">List buku</p>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> Nama Peminjam </th>
                          <th> Judul </th>
                          <th> Tanggal Peminjaman </th>
                          <th> Tanggal Pengembalian </th>
                          <th> Status Peminjaman </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $sql = mysqli_query($conn, "SELECT * FROM peminjaman LEFT JOIN user ON peminjaman.userid = user.userid LEFT JOIN buku ON peminjaman.bukuid = buku.bukuid");
                        while ($data = mysqli_fetch_array($sql)) {
                        ?>
                        <tr>
                          <td class="py-1">
                            <?= $data['username'] ?>
                          </td>
                          <td><?= $data['judul'] ?></td>
                          <td><?= '<label class="badge badge-gradient-info">' . $data['tanggalpeminjaman'] .  '</label>' ?></td>
                          <td><?php
                          if($data['tanggalpengembalian'] == ''){
                            echo '<label class="badge badge-gradient-danger">Belum Dikembalikan</label>';
                          }else{
                            echo '<label class="badge badge-gradient-info">' . $data['tanggalpengembalian'] .  '</label>';
                          }
                          ?></td>
                          <td><?php 
                          if($data['statuspeminjaman'] == 'Dikembalikan'){
                            echo '<label class="badge badge-gradient-success">Dikembalikan</label>';
                          }else{
                            echo '<label class="badge badge-gradient-success">Dipinjam</label>';
                          }
                          ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                      </tbody>
                    </table>
                       <a href="generate.php" class="btn btn-primary btn-fw mt-3">Generate Peminjaman</a>
                  </div>
                </div>
              </div>
              