<?php
session_start();

require 'functions.php';

$id = $_GET["nim"];

if (hapus($id) > 0) {
    echo "
    <script>
    alert('Data berhasil dihapus!');
    document.location.href = 'index.php';
    </script>
    ";
} else {
    echo "
    <script>
    alert('Data gagal dihapus!');
    document.location.href = 'index.php';
    </script>
    ";
}
