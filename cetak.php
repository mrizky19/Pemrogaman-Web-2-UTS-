<?php

require_once __DIR__ . '/vendor/autoload.php';
require 'functions.php';
$datamhs = query("SELECT * FROM datamhs");

$mpdf = new \Mpdf\Mpdf();
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <link rel="stylesheet" href="css/print.css">
</head>
<body>
    <h1>Daftar Nilai Mahasiswa</h1>
      <table border="1" cellpadding="10" cellspacing="0">

        <tr>
          <th width="8px">No.</th>
          <th width="20px">NIM</th>
          <th width="140px">NAMA</th>
          <th width="100px">KELAS</th>
          <th width="20px">TUGAS</th>
          <th width="30px">UTS</th>
          <th width="30px">UAS</th>
          <th width="100px">RATA - RATA</th>
        </tr>';

$i = 1;
foreach ($datamhs as $row) {
    $html .= '<tr>
            <td>' . $i++ . '</td>
            <td>' . $row["nim"] . '</td>
            <td>' . $row["nama"] . '</td>
            <td>' . $row["kelas"] . '</td>
            <td>' . $row["tugas"] . '</td>
            <td>' . $row["uts"] . '</td>
            <td>' . $row["uas"] . '</td>
            <td>' . $row["nilaiAkhir"] . '</td>
        </tr>';
}

$html .= '</table>
</body>
</html>';
$mpdf->WriteHTML($html);
$mpdf->Output('daftaranime.pdf', \Mpdf\Output\Destination::INLINE);
