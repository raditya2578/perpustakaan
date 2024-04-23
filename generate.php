<?php
include "connect.php";
?>

<table class="table table-striped" border="1" cellspacing="0" cellpadding="5" width="100%">
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

<script>
    window.print();
    window.close();
</script>