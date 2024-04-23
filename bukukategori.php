<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Kategori</h4>
                    <p class="card-description">List Kategori</p>
                    <div class="template-demo">
                        <?php
                        $sql = mysqli_query($conn, "SELECT * FROM kategoribuku");
                        while ($data = mysqli_fetch_array($sql)) {
                        ?>
                      <a href="?page=bukukategorisort&id=<?= $data['kategoriid'] ?>" class="btn btn-gradient-primary btn-rounded btn-fw"><?= $data['namakategori'] ?></a>
                      <?php
                        }
                      ?>
                    </div>
                  </div>
                </div>
              </div>