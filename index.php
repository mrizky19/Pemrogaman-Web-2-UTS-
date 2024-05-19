<?php
session_start();

require 'functions.php';
$datamhs = query("SELECT * FROM rizky");

if (isset($_POST["cari"])) {
  $datamhs = cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="theme-color" content="#adff2f">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Program Nilai Mahasiswa</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/gaya.css">
  <style>
    img {
      height: 70px;
      display: block;
      margin: 0 auto;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand logo">Data<span>Mahasiswa</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>

  <form class="row mt-3" role="search" action="" method="POST">
    <div class="col-lg-9"></div>
    <div class="col-lg-2">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword" id="keyword" autocomplete="off">
    </div>
    <div class="col-lg-1">
      <button class="btn btn-outline-success" type="submit" name="cari" id="tombol-cari">Search</button>
    </div>
  </form>

  <main class="d-flex flex-column">
    <a class="btn btn-warning mb-3" href="tambah.php">Input Data</a>
  </main>

  <aside>
    <div class="datamhs">
      <table>

        <tr id="thead">
          <th width="8px">No.</th>
          <th width="20px">NIM</th>
          <th width="20px">FOTO</th>
          <th width="140px">NAMA</th>
          <th width="100px">JURUSAN</th>
          <th width="200px">ALAMAT</th>
          <th width="50px">EMAIL</th>
          <th width="150px">NO TELPON</th>
          <th width="150px">AKSI</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($datamhs as $row) : ?>
          <tr>
            <td><?= $i; ?></td>
            <td><?= $row["nim"]; ?></td>
            <td><img src="img/<?= $row["foto"]; ?>"></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["jurusan"]; ?></td>
            <td><?= $row["alamat"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td><?= $row["noTelpon"]; ?></td>
            <td>
              <a href="ubah.php?nim=<?= $row["nim"]; ?>">Edit</a> |
              <a href="hapus.php?nim=<?= $row["nim"]; ?>" onclick="return confirm('yakin?')">Delete</a> |
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailModal" data-nim="<?= $row["nim"]; ?>" data-foto="<?= $row["foto"]; ?>" data-nama="<?= $row["nama"]; ?>" data-jurusan="<?= $row["jurusan"]; ?>" data-alamat="<?= $row["alamat"]; ?>" data-email="<?= $row["email"]; ?>" data-notelpon="<?= $row["noTelpon"]; ?>" data-tanggallahir="<?= $row["tanggalLahir"]; ?>" data-tempatlahir="<?= $row["tempatLahir"]; ?>" data-agama="<?= $row["agama"]; ?>" data-jeniskelamin="<?= $row["jenisKelamin"]; ?>">Lihat Detail Mahasiswa</button>
            </td>
          </tr>
          <?php $i++ ?>
        <?php endforeach; ?>

      </table>
    </div>
  </aside>

  <!-- Modal Detail Data -->
  <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="detailModalLabel">Detail Mahasiswa</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="card">
            <img id="modal-foto" src="" class="card-img-top" alt="Foto Mahasiswa">
            <div class="card-body">
              <h5 class="card-title">Data Mahasiswa</h5>
              <table class="table table-striped">
                <tbody>
                  <tr>
                    <th scope="row">NIM</th>
                    <td id="modal-nim"></td>
                  </tr>
                  <tr>
                    <th scope="row">Nama</th>
                    <td id="modal-nama"></td>
                  </tr>
                  <tr>
                    <th scope="row">Tanggal Lahir</th>
                    <td id="modal-tanggallahir"></td>
                  </tr>
                  <tr>
                    <th scope="row">Tempat Lahir</th>
                    <td id="modal-tempatlahir"></td>
                  </tr>
                  <tr>
                    <th scope="row">Alamat</th>
                    <td id="modal-alamat"></td>
                  </tr>
                  <tr>
                    <th scope="row">Email</th>
                    <td id="modal-email"></td>
                  </tr>
                  <tr>
                    <th scope="row">Agama</th>
                    <td id="modal-agama"></td>
                  </tr>
                  <tr>
                    <th scope="row">Jenis Kelamin</th>
                    <td id="modal-jeniskelamin"></td>
                  </tr>
                  <tr>
                    <th scope="row">Jurusan</th>
                    <td id="modal-jurusan"></td>
                  </tr>
                  <tr>
                    <th scope="row">No Telpon</th>
                    <td id="modal-notelpon"></td>
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
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var detailModal = document.getElementById('detailModal');
      detailModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget;
        var nim = button.getAttribute('data-nim');
        var foto = button.getAttribute('data-foto');
        var nama = button.getAttribute('data-nama');
        var jurusan = button.getAttribute('data-jurusan');
        var alamat = button.getAttribute('data-alamat');
        var email = button.getAttribute('data-email');
        var notelpon = button.getAttribute('data-notelpon');
        var tanggallahir = button.getAttribute('data-tanggallahir');
        var tempatlahir = button.getAttribute('data-tempatlahir');
        var agama = button.getAttribute('data-agama');
        var jeniskelamin = button.getAttribute('data-jeniskelamin');

        var modalFoto = detailModal.querySelector('#modal-foto');
        var modalNim = detailModal.querySelector('#modal-nim');
        var modalNama = detailModal.querySelector('#modal-nama');
        var modalJurusan = detailModal.querySelector('#modal-jurusan');
        var modalAlamat = detailModal.querySelector('#modal-alamat');
        var modalEmail = detailModal.querySelector('#modal-email');
        var modalNotelpon = detailModal.querySelector('#modal-notelpon');
        var modalTanggallahir = detailModal.querySelector('#modal-tanggallahir');
        var modalTempatlahir = detailModal.querySelector('#modal-tempatlahir');
        var modalAgama = detailModal.querySelector('#modal-agama');
        var modalJeniskelamin = detailModal.querySelector('#modal-jeniskelamin');

        modalFoto.src = 'img/' + foto;
        modalNim.textContent = nim;
        modalNama.textContent = nama;
        modalJurusan.textContent = jurusan;
        modalAlamat.textContent = alamat;
        modalEmail.textContent = email;
        modalNotelpon.textContent = notelpon;
        modalTanggallahir.textContent = tanggallahir;
        modalTempatlahir.textContent = tempatlahir;
        modalAgama.textContent = agama;
        modalJeniskelamin.textContent = jeniskelamin;
      });
    });
  </script>
</body>

</html>