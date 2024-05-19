<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="theme-color" content="#adff2f" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Program Nilai Mahasiswa</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="bootstrap/css/style.css" />
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <h1>INPUT DATA MAHASISWA</h1>
  <div class="container-sm mt-5">
    <form class="row g-3" action="" method="POST" enctype="multipart/form-data" id="dataInput">
      <div class="col-md-4">
        <label for="nim" class="form-label">NIM</label>
        <input type="text" class="form-control" id="inputnim" autofocus required />
      </div>
      <div class="col-md-4">
        <label for="nama" class="form-label">NAMA</label>
        <input type="text" class="form-control" id="nama" required />
      </div>
      <div class="col-md-4">
        <label for="jurusan" class="form-label">JURUSAN</label>
        <input type="text" class="form-control" id="jurusan" required />
      </div>
      <div class="col-md-4">
        <label for="tempatlahir" class="form-label">TEMPAT LAHIR</label>
        <input type="text" class="form-control" id="tempatlahir" required />
      </div>
      <div class="col-md-4">
        <label for="ttl" class="form-label">TANGGAL LAHIR</label>
        <input type="date" class="form-control" id="tanggallahir" required placeholder="Masukkan Angka" />
      </div>
      <div class="col-md-4">
        <label for="alamat" class="form-label">ALAMAT</label>
        <input type="text" class="form-control" id="alamat" required />
      </div>
      <div class="col-md-4">
        <label for="noTelepon" class="form-label">NO TELEPON</label>
        <input type="number" class="form-control" id="notelpon" required placeholder="Masukkan Angka" />
      </div>
      <div class="col-md-4">
        <label for="email" class="form-label">EMAIL</label>
        <input type="email" class="form-control" id="email" required placeholder="contoh@gmail.com" />
      </div>
      <div class="col-md-4">
        <label for="agama" class="form-label">AGAMA</label>
        <select class="form-select" id="agama" required>
          <option value="islam">Islam</option>
          <option value="kristen">Kristen</option>
          <option value="budha">Budha</option>
          <option value="konghucu">Konghucu</option>
        </select>
      </div>
      <div class="col-md-4">
        <label for="jeniskelamin" class="form-label">JENIS KELAMIN</label>
        <select class="form-select" id="jeniskelamin" required>
          <option value="laki-laki">Laki-laki</option>
          <option value="perempuan">Perempuan</option>
        </select>
      </div>
      <div class="col-md-4">
        <label for="foto" class="form-label">FOTO</label>
        <input type="file" class="form-control" id="inputfoto" placeholder="Masukkan Angka" />
      </div>

      <div class="col-12">
        <button class="btn btn-primary" name="submit" type="submit">Submit form</button>
      </div>
    </form>
  </div>


  <div class="container-sm mt-1 tbody">
    <form class="row mb-2" role="search" action="" method="POST">
      <div class="col-lg-8"></div>
      <div class="col-lg-3">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" type="text" name="keyword" id="keyword" autocomplete="off">
      </div>
      <div class="col-lg-1">
        <button class="btn btn-outline-success" type="submit" name="cari" id="tombol-cari">Search</button>
      </div>
    </form>
    <table class="table table-warning" id="data-table">
      <thead class="table-primary">
        <tr>
          <th>NO</th>
          <th>NIM</th>
          <th>NAMA</th>
          <th>JURUSAN</th>
          <th>ALAMAT</th>
          <th>EMAIL</th>
          <th>NO TELPON</th>
          <th></th>
        </tr>
      </thead>
      <!-- <tbody>
          <?php $i = 1; ?>
          <?php foreach ($datamhs as $row) : ?>
            <tr>
              <td><?= $i; ?></td>
              <td><?= $row["nim"]; ?></td>
              <td><?= $row["nama"]; ?></td>
              <td><?= $row["jurusan"]; ?></td>
              <td><?= $row["alamat"]; ?></td>
              <td><?= $row["email"]; ?></td>
              <td><?= $row["no telpon"]; ?></td>
              <td>
                <a href="edit.php?nim=<?= $row["nim"]; ?>">Edit</a> |
                <a href="delete.php?nim=<?= $row["nim"]; ?>" onclick="return confirm('yakin?')">Delete</a> |
                <a href="detail.php?nim=<?= $row["nim"]; ?>" target="_blank">Show</a>
              </td>
            </tr>
            <?php $i++ ?>
          <?php endforeach; ?>
        </tbody> -->
    </table>
  </div>
  <script src="script.js"></script>
</body>

</html>