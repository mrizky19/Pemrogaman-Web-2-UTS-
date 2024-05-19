<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "rizky");

// FUNGSI QUERY DATA
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// FUNGSI TAMBAH DATA
function tambah($data)
{
    global $conn;
    // ambil data dari tiap element dalam form
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $tanggalLahir = htmlspecialchars($data["tanggalLahir"]);
    $tempatLahir = htmlspecialchars($data["tempatLahir"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $email = htmlspecialchars($data["email"]);
    $noTelpon = htmlspecialchars($data["noTelpon"]);
    $agama = htmlspecialchars($data["agama"]);
    $jenisKelamin = htmlspecialchars($data["jenisKelamin"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    // upload gambar
    $foto = upload();
    if (!$foto) {
        return false;
    }



    // query insert data
    $query = "INSERT INTO rizky VALUES ('$nim', '$nama', '$tanggalLahir', '$tempatLahir', '$alamat', '$email', '$noTelpon', '$agama', '$jenisKelamin', '$jurusan', '$foto')";

    mysqli_query($conn, $query);

    return (mysqli_affected_rows($conn));
}

// FUNGSI HAPUS DATA 
function hapus($nim)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM rizky WHERE nim = $nim");
    return (mysqli_affected_rows($conn));
}

// FUNGSI UBAH DATA
function ubah($data)
{
    global $conn;
    $nim = $data["nim"];
    $nama = htmlspecialchars($data["nama"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $tugas = htmlspecialchars($data["tugas"]);
    $uts = htmlspecialchars($data["uts"]);
    $uas = htmlspecialchars($data["uas"]);
    $nilaiAkhir = htmlspecialchars($tugas + $uts + $uas) / 3;

    // query update data
    $query = "UPDATE datamhs SET nama ='$nama', kelas = '$kelas', tugas = '$tugas', uts = '$uts', uas = '$uas', nilaiAkhir = '$nilaiAkhir' WHERE nim = $nim";


    mysqli_query($conn, $query);

    return (mysqli_affected_rows($conn));
}

// FUNGSI CARI DATA
function cari($keyword)
{
    $query = "SELECT * FROM rizky WHERE nim LIKE '%$keyword%' OR nama LIKE '%$keyword%' OR jurusan LIKE '%$keyword%'";
    return query($query);
}

function upload()
{
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];


    // cek apakah ada gambar yg di upload
    if ($error === 4) {
        echo "
        <script>
        alert('pilih gambar terlebih dahulu');
        </script>";
        return false;
    }

    // cek apakah yang di upload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
        <script>
        alert('yang anda upload bukan gambar');
        </script>";
        return false;
    }

    // cek ukuran gambar
    $ekstensiFile = ['> 1000000'];
    if (in_array($ukuranFile, $ekstensiFile)) {
        echo "<script>
            alert('ukuran gambar terlalu besar !');
        </script>";
        return false;
    }
    // generate nama baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    // lolos pengecekan, gambar siap di upload
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;
}
