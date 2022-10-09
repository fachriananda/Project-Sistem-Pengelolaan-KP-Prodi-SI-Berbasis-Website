<?php
require_once __DIR__ . "/../../config/koneksi.php";
require_once __DIR__ . '/../../vendor/autoload.php';

session_start();
if ($_SESSION['login'] !== 'dosen') {
    echo "<script>alert('Anda harus login dahulu sebagai Dosen')</script>";
    echo "<script>document.location='../index.php'</script>";
}

setlocale(LC_ALL, 'IND');

$nama = $_GET['nama'];
$no = 1;
$query2 = mysql_query("SELECT * FROM bimbingankp WHERE nama_lengkap = '$nama'");
$data2 = mysql_fetch_assoc($query2);
$query3 = mysql_query("SELECT * FROM bimbingankp WHERE nama_lengkap = '$nama'");
?>
<?php

$html = '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table tr td {
            padding-top: 5px;
            padding-bottom: 5px;
            padding-right: 10px;
        }

        .tabel {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }
        h1{
            text-align: center;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <img width="100%" src="../foto/kop.png">
    <h1>Laporan Bimbingan Kerja Praktek</h1>
    <table>
        <tr>
            <td>Nama Dosen</td>
            <td>:</td>
            <td>' . $data2['dosen_pembimbing'] . '</td>
            <td width="100px">&nbsp;</td>
            <td>Program Studi</td>
            <td>:</td>
            <td>' . $data2['program_studi'] . '</td>
        </tr>
        <tr>
            <td>Nama Mahasiswa</td>
            <td>:</td>
            <td>' . $data2['nama_lengkap'] . '</td>
            <td width="100px">&nbsp;</td>
            <td>Semester</td>
            <td>:</td>
            <td>' . $data2['semester_mulai_kp'] . '</td>
        </tr>
        <tr>
            <td>NIM</td>
            <td>:</td>
            <td>' . $data2['nim'] . '</td>
        </tr>
    </table><br><br>
    <table autosize="2.4" class="tabel" style="width:100%">
        <tr class="tabel">
            <th class="tabel">No</th>
            <th class="tabel">Tangal Input</th>
            <th class="tabel">Tanggal Koreksi</th>
            <th class="tabel">Aktivitas</th>
            <th class="tabel">Status</th>
            <th class="tabel">Uraian</th>
        </tr>';
while ($data3 = mysql_fetch_assoc($query3)) {
    if ($data3['tgl_koreksi'] == null) {
        $html .= '<tr class="tabel">
                <td class="tabel">' . $no . '</td>
                <td class="tabel">' . strftime('%d %B %Y', $data3['tgl_input']) . '</td>
                <td class="tabel"></td>
                <td class="tabel">' . $data3['aktivitas'] . '</td>
                <td class="tabel">' . $data3['status'] . '</td>
                <td class="tabel">' . $data3['uraian'] . '</td>
            </tr>';
    } else {
        $html .= '<tr class="tabel">
                <td class="tabel">' . $no . '</td>
                <td class="tabel">' . strftime('%d %B %Y', $data3['tgl_input']) . '</td>
                <td class="tabel">' . strftime('%d %B %Y', $data3['tgl_koreksi']) . '</td>
                <td class="tabel">' . $data3['aktivitas'] . '</td>
                <td class="tabel">' . $data3['status'] . '</td>
                <td class="tabel">' . $data3['uraian'] . '</td>
            </tr>';
    }

    $no++;
}
$html .= '</table>
</body>
</html>';
$mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
$mpdf->WriteHTML($html);
$mpdf->Output();
?>