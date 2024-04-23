<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Buku</h4>
                    <p class="card-description">List buku</p>
                    <a href="?page=pendataantambah" class="btn btn-gradient-danger btn-fw">Tambah Buku</a>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> Judul </th>
                          <th> Penulis </th>
                          <th> Penerbit </th>
                          <th> Tahun Terbit </th>
                          <th> Aksi </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $sql = mysqli_query($conn, "SELECT * FROM buku");
                        while ($data = mysqli_fetch_array($sql)) {
                        ?>
                        <tr>
                          <td class="py-1">
                            <?= $data['judul'] ?>
                          </td>
                          <td><?= $data['penulis'] ?></td>
                          <td><?=  $data['penerbit'] ?></td>
                          <td><?= $data['tahunterbit'] ?></td>
                          <td>
                            <a href="?page=pendataanedit&id=<?= $data['bukuid'] ?>" class="btn btn-gradient-primary">Edit Buku</a>
                            <a href="?page=pendataanhapus&id=<?= $data['bukuid'] ?>" class="btn btn-gradient-danger btn-fw">Hapus Buku</a>
                         </td>
                        </tr>
                        <?php
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>