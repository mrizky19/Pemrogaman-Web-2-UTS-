<?php
session_start();

// Koneksi ke file function
require 'functions.php';

// ambil data di url
$nim = $_GET["nim"];

// query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM rizky WHERE nim = $nim")[0];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>Detail Mahasiswa</title>
  <style>
    body,
    html {
      height: 100%;
      margin: 0;
      background-color: #f8f9fa;
    }

    .centered-button {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .card-img-top {
      height: 200px;
      object-fit: cover;
    }

    .card-title {
      margin-bottom: 20px;
      font-size: 1.5rem;
    }

    .table th,
    .table td {
      vertical-align: middle;
    }
  </style>
</head>

<body>
  <div class="centered-button">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailModal">
      Lihat Detail Mahasiswa
    </button>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="detailModalLabel">Detail Mahasiswa</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="card">
            <img src="img/<?= htmlspecialchars($mhs['foto']); ?>" class="card-img-top" alt="Foto Mahasiswa">
            <div class="card-body">
              <h5 class="card-title">Data Mahasiswa</h5>
              <table class="table table-striped">
                <tbody>
                  <tr>
                    <th scope="row">NIM</th>
                    <td><?= htmlspecialchars($mhs['nim']); ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Nama</th>
                    <td><?= htmlspecialchars($mhs['nama']); ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tanggal Lahir</th>
                    <td><?= htmlspecialchars($mhs['tanggalLahir']); ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tempat Lahir</th>
                    <td><?= htmlspecialchars($mhs['tempatLahir']); ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Alamat</th>
                    <td><?= htmlspecialchars($mhs['alamat']); ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Email</th>
                    <td><?= htmlspecialchars($mhs['email']); ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Agama</th>
                    <td><?= htmlspecialchars($mhs['agama']); ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Jenis Kelamin</th>
                    <td><?= htmlspecialchars($mhs['jenisKelamin']); ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Jurusan</th>
                    <td><?= htmlspecialchars($mhs['jurusan']); ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>