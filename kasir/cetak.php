<!DOCTYPE html>
<html lang="en">

<head>
<title>LaundryKu</title>
<link href="../css/tabelc.css?version=<?= filemtime("../css/tabelc.css")?>" rel="stylesheet">
</head>
<body>
<?php
$title = 'laporan';
require 'functions.php';
$bulan = ambilsatubaris($conn,"SELECT SUM(total_harga) AS total FROM detail_transaksi INNER JOIN transaksi ON transaksi.id_transaksi = detail_transaksi.transaksi_id WHERE status_bayar = 'dibayar' AND MONTH(tgl_pembayaran) = MONTH(NOW())");
$tahun = ambilsatubaris($conn,"SELECT SUM(total_harga) AS total FROM detail_transaksi INNER JOIN transaksi ON transaksi.id_transaksi = detail_transaksi.transaksi_id WHERE status_bayar = 'dibayar' AND YEAR(tgl_pembayaran) = YEAR(NOW())");
$minggu = ambilsatubaris($conn,"SELECT SUM(total_harga) AS total FROM detail_transaksi INNER JOIN transaksi ON transaksi.id_transaksi = detail_transaksi.transaksi_id WHERE status_bayar = 'dibayar' AND WEEK(tgl_pembayaran) = WEEK(NOW())");


$penjualan = ambildata($conn,"SELECT SUM(detail_transaksi.total_harga) AS total,COUNT(detail_transaksi.paket_id) as jumlah_paket,paket.nama_paket,transaksi.tgl_pembayaran FROM detail_transaksi
INNER JOIN transaksi ON transaksi.id_transaksi = detail_transaksi.transaksi_id
INNER JOIN paket ON paket.id_paket = detail_transaksi.paket_id
WHERE transaksi.status_bayar = 'dibayar' GROUP BY detail_transaksi.paket_id");
?>

<center>
		<h2>Data Laporan Transaksi LaundryKu</h2>
</center>
<table>
     <thead>
        <tr>
        <th><label>No </label></th>
          <th><label>Nama Paket</label></th>
          <th><label>Jumlah Transaksi</label></th>
          <th><label>Tanggal Transaksi</label></th>
          <th><label>Total Hasil</label></th>
          
        </tr>
      </thead>
      <tbody>
      <?php $no=1; foreach($penjualan as $transaksi): ?>
        <tr class="data-label">
             <td><?= $no++ ?></td>
            <td><?= $transaksi['nama_paket'] ?></td>
            <td><?= $transaksi['jumlah_paket'] ?></td>
            <td class="tgl"><?= $transaksi['tgl_pembayaran'] ?></td>
            <td><?= $transaksi['total'] ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
<script>window.print();</script>    
</body>
                  
    
                  