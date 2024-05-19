<?php
session_start();

// Koneksi ke file function
require 'functions.php';

// ambil data di url
$nim = $_GET["nim"];

// query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM datamhs WHERE nim = $nim")[0];

// cek apakah tombol submit sudah di pencet
if (isset($_POST["submit"])) {

    // cek apakah 2 berhasil di ubah atau tidak
    if (ubah($_POST) > 0) {
        echo "
            <script>
            alert('Data berhasil diubah!');
            document.location.href = 'index.php';
            </script>
            ";
    } else {
        echo "<script>
        alert('Data gagal diubah!');
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/gaya.css">
    <title>Edit Data Mahasiswa</title>
</head>

<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="row d-flex align-items-center justify-content-center" style="height: 100vh;">
            <div class="col"></div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Edit Data Mahasiswa</h1>
                    </div>
                    <div class="card-body">
                        <P>*gunakan huruf besar</P>
                        <form class="row" action="" method="POST" id="dataInput">
                            <div class="col">
                                <label for="nim" class="form-label">NIM</label>
                                <br><strong><?= $mhs["nim"]; ?></strong>
                                <input type="hidden" name="nim" class="form-control" id="inputnim" required autofocus value="<?= $mhs["nim"]; ?>">
                            </div>
                            <div class="col">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="nama" class="form-control" id="inputnama" required value="<?= $mhs["nama"]; ?>">
                            </div>
                            <div class="col">
                                <label for="kelas" class="form-label">Kelas</label>
                                <input type="text" name="kelas" class="form-control" id="inputkelas" placeholder="TI.22.B2" required value="<?= $mhs["kelas"]; ?>">
                            </div>
                            <div class="row m-4">
                                <div class="col-md-4">
                                    <label for="tugas" class="form-label">Nilai Tugas</label>
                                    <input type="text" name="tugas" class="form-control" placeholder="Masukkan Angka" id="tugas" required value="<?= $mhs["tugas"]; ?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="uts" class="form-label">Nilai UTS</label>
                                    <input type="text" name="uts" class="form-control" placeholder="Masukkan Angka" id="uts" required value="<?= $mhs["uts"]; ?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="uas" class="form-label">Nilai UAS</label>
                                    <input type="text" name="uas" class="form-control" placeholder="Masukkan Angka" id="uas" required value="<?= $mhs["uas"]; ?>">
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-secondary" href="index.php">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </form>


    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>