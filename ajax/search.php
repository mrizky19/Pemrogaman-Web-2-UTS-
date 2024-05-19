<?php 
usleep(500000);
require '../functions.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM allmesin WHERE nomerId LIKE '%$keyword%' OR namaMesin LIKE '%$keyword%' OR lokasi LIKE '%$keyword%'";
$allmesin = query($query);
?>

<table border="1" cellpadding="10" cellspacing="0">

    <tr>
        <th>No.</th>
        <th>Nomer ID</th>
        <th>Tgl Datang</th>
        <th>Nama Mesin</th>
        <th>Merk</th>
        <th>Type</th>
        <th>Tahun Pembuatan</th>
        <th>Umur Mesin</th>
        <th>Line</th>
        <th>Lokasi</th>
        <th>Detail</th>
    </tr>
    
    <?php $i = 1; ?>
    <?php foreach( $allmesin as $row) : ?>
    <tr>
        <td><?= $i; ?></td>
        <td><?= $row["nomerId"]; ?></td>
        <td><?= $row["tglDatang"]; ?></td>
        <td><?= $row["namaMesin"]; ?></td>
        <td><?= $row["merk"]; ?></td>
        <td><?= $row["type"]; ?></td>
        <td><?= $row["tahunPembuatan"]; ?></td>
        <td><?= $row["umurMesin"]; ?></td>
        <td><?= $row["line"]; ?></td>
        <td><?= $row["lokasi"]; ?></td>
        <td> 
            <!-- <a href="ubah.php?id=<?= $row["nomorId"]; ?>">edit</a> |
            <a href="hapus.php?id=<?= $row["nomorId"]; ?>" onclick="return confirm('yakin?')">delete</a>  -->
            <a href="">detail</a>
        </td>
    </tr>
    <?php $i++ ?>
    <?php endforeach; ?>


</table>