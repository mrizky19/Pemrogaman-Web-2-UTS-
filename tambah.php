<?php
session_start();


// Koneksi ke file function
require 'functions.php';
// cek apakah tombol submit sudah di pencet
if (isset($_POST["submit"])) {

    // cek apakah 2 berhasil di tambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "
            <script>
            alert('Data berhasil ditambahkan!');
            document.location.href = 'index.php';
            </script>
            ";
    } else {
        echo "
            <script>
            alert('Data gagal ditambahkan!');
            document.location.href = 'index.php';
            </script>
            ";
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
    <!-- <link rel="stylesheet" href="css/gaya.css"> -->
    <title>Tambah Data Mesin</title>
</head>

<body>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="row d-flex align-items-center justify-content-center" style="height: 100vh;">
            <div class="col"></div>
            <div class="col-10">
                <div class="card">
                    <div class="card-header">
                        <h1>Input Data Mahasiswa</h1>
                    </div>
                    <div class="card-body">
                        <p>*gunakan huruf besar</p>
                        <div class="row m-4">
                            <div class="col-md-4">
                                <label for="nim" class="form-label">NIM</label>
                                <input type="text" class="form-control" id="inputnim" name="nim" autofocus required />
                            </div>
                            <div class="col-md-4">
                                <label for="nama" class="form-label">NAMA</label>
                                <input type="text" class="form-control" id="nama" name="nama" required />
                            </div>
                            <div class="col-md-4">
                                <label for="jurusan" class="form-label">JURUSAN</label>
                                <input type="text" class="form-control" id="jurusan" name="jurusan" required />
                            </div>
                            <div class="col-md-4">
                                <label for="tempatlahir" class="form-label">TEMPAT LAHIR</label>
                                <input type="text" class="form-control" id="tempatLahir" name="tempatLahir" required />
                            </div>
                            <div class="col-md-4">
                                <label for="tanggalLahir" class="form-label">TANGGAL LAHIR</label>
                                <input type="date" class="form-control" id="tanggalLahir" name="tanggalLahir" required />
                            </div>
                            <div class="col-md-4">
                                <label for="alamat" class="form-label">ALAMAT</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" required />
                            </div>
                            <div class="col-md-4">
                                <label for="noTelpon" class="form-label">NO TELEPON</label>
                                <input type="tel" class="form-control" id="noTelpon" name="noTelpon" required />
                            </div>
                            <div class="col-md-4">
                                <label for="email" class="form-label">EMAIL</label>
                                <input type="email" class="form-control" id="email" name="email" required />
                            </div>
                            <div class="col-md-4">
                                <label for="agama" class="form-label">AGAMA</label>
                                <select class="form-select" id="agama" name="agama" required>
                                    <option value="islam">Islam</option>
                                    <option value="kristen">Kristen</option>
                                    <option value="budha">Budha</option>
                                    <option value="konghucu">Konghucu</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="jeniskelamin" class="form-label">JENIS KELAMIN</label>
                                <select class="form-select" id="jeniskelamin" name="jenisKelamin" required>
                                    <option value="laki-laki">Laki-laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="foto" class="form-label">FOTO</label>
                                <input type="file" class="form-control" id="inputfoto" name="foto" />
                            </div>

                            <div class="col-12 mt-3">
                                <button class="btn btn-primary" name="submit" type="submit">Submit</button>
                                <a class="btn btn-secondary" href="index.php">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </form>


    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>