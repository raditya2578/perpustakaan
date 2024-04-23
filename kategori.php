<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Pendataan Kategori</h4>
                    <p class="card-description">List Kategori</p>
                    <a href="?page=kategoritambah" class="btn btn-gradient-danger btn-fw">Tambah Kategori</a>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> No </th>
                          <th> Nama Kategori </th>
                          <th> Aksi </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $sql = mysqli_query($conn, "SELECT * FROM kategoribuku");
                        while ($data = mysqli_fetch_array($sql)) {
                            $i = 1;
                        ?>
                        <tr>
                          <td class="py-1">
                            <?= $i ?>
                          </td>
                          <td><?= $data['namakategori'] ?></td>
                          <td>
                            <a href="?page=kategoriedit&id=<?= $data['kategoriid'] ?>" class="btn btn-gradient-primary">Edit Kategori</a>
                            <a href="?page=kategorihapus&id=<?= $data['kategoriid'] ?>" class="btn btn-gradient-danger btn-fw">Hapus</a>
                         </td>
                        </tr>
                        <?php
                        $i++;
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>