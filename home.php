<div class="page-header">
    <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-home"></i>
    </span> Home
    </h3>
    <nav aria-label="breadcrumb">
    <ul class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
        <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
        </li>
    </ul>
    </nav>
</div>
<?php
if($_SESSION['user']['role'] == 'user'){
?>
<div class="row">
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
            <div class="card-body">
            <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Buku dipinjam <i class="mdi mdi-chart-line mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5"><?php
            $userid = $_SESSION['user']['userid'];
            $dipinjam = mysqli_query($conn, "SELECT COUNT(*) FROM peminjaman WHERE userid = '$userid' AND statuspeminjaman = 'Dipinjam'");
            $d = mysqli_fetch_array($dipinjam);
            echo $d['COUNT(*)'];
            ?></h2>
            <h6 class="card-text">Increased by 60%</h6>
            </div>
        </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
            <div class="card-body">
            <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Buku dikembalikan <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5"><?php
            $dikembalikan = mysqli_query($conn, "SELECT COUNT(*) FROM peminjaman WHERE userid = '$userid' AND statuspeminjaman = 'Dikembalikan'");
            $k = mysqli_fetch_array($dikembalikan);
            echo $k['COUNT(*)'];
            ?></h2>
            <h6 class="card-text">Decreased by 10%</h6>
            </div>
        </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
            <div class="card-body">
            <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Buku dikoleksi <i class="mdi mdi-diamond mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5"><?php
            $favorit = mysqli_query($conn, "SELECT COUNT(*) FROM koleksipribadi WHERE userid = '$userid'");
            $f = mysqli_fetch_array($favorit);
            echo $f['COUNT(*)'];
            ?></h2>
            <h6 class="card-text">Increased by 5%</h6>
            </div>
        </div>
        </div>
</div>
<?php
}
?>
<div class="row">
    <div class="col-8 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Statistik</h4>
                <div class="table-responsive">
                    <table class="table">
                    <thead>
                        <tr>
                        <th> Menu </th>
                        <th></th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                Username
                            </td>
                            <td>:</td>
                            <td><?= $_SESSION['user']['username'] ?></td>
                        </tr>
                        <tr>
                            <td>
                                Nama Lengkap
                            </td>
                            <td>:</td>
                            <td><?= $_SESSION['user']['namalengkap'] ?></td>
                        </tr>
                        <tr>
                            <td>
                                Login Pada
                            </td>
                            <td>:</td>
                            <td><?= date('m-d H:i:s') ?></td>
                        </tr>
                        <tr>
                            <td>
                                email
                            </td>
                            <td>:</td>
                            <td><?= $_SESSION['user']['email'] ?></td>
                        </tr>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <img src="assets\images\dashboard\img_1.jpg" class="m-2" width="97%" height="100%" border="2" style="border-color: white; border-radius:4px" alt="">
        </div>
    </div>
</div>