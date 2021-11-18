<?php
require 'config.php';
include $view;
$lihat = new view($config);
// $toko = $lihat->toko();
// $hsl = $lihat->penjualan();
if (!empty($_GET['bulan'])) {
	$result = $lihat->laporan_periode_pembayaran($_GET['bulan'], $_GET['tahun']);
} else {
	$result = $lihat->laporan_pembayaran();
}
?>
<html>

<head>
	<title>print</title>
	<link rel="stylesheet" href="assets/css/bootstrap.css">
</head>

<body>
	<script>
		window.print();
	</script>
	<div class="container-fluid">
		<h1 class="text-center">Laporan Pembayaran <br>Toko Amanda </h1>
		<hr>
		<?php if (!empty($_GET['bulan'])) :  ?>
			<h3 class="text-center">Periode <?= $_GET['bulan']; ?>/<?= $_GET['tahun']; ?></h3>
		<?php endif ?>
		<div class="modal-view">
			<table class="table table-bordered" id="example1">
				<thead>
					<tr>
						<td> No</td>
						<td> Nama Barang</td>
						<td> Nama Customer</td>
						<td style="width:10%;"> Jumlah</td>
						<td style="width:20%;"> Total</td>
						<td> Tanggal Input</td>
						<td> Status</td>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					$hasil = $lihat->laporan_penjualan(); ?>
					<?php
					$bayar = 0;
					foreach ($result as $isi) {
						$bayar += $isi['total'];
					?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $isi['nama_barang']; ?></td>
							<td><?php echo $isi['nama']; ?></td>
							<td><?php echo $isi['jumlah']; ?> </td>
							<td>Rp.<?php echo number_format($isi['total']); ?>,-</td>
							<td><?php echo $isi['tanggal_input']; ?></td>
							<td><?php echo $isi['status']; ?></td>
						</tr>
					<?php $no++;
					} ?>
				</tbody>
			</table>
			<h4>
				Pemasukan : Rp.<?php echo number_format($bayar); ?>,-
			</h4>
			<p>
				Duri, <?= date('d F Y'); ?>
			</p>
			<div class="row">
				<div class="col-md-6" style="float: left;">
					<div class="">
						<p class="text-center">Dibuat Oleh:</p>
					</div>
					<div class="ttd" style="margin-bottom: 10rem;">
					</div>
					<p class="text-center">(Admin)</p>
				</div>
				<div class="col-md-6" style="float: right;">
					<div class="">
						<p class="text-center">Ditanda tangani Oleh:</p>
					</div>
					<div class="ttd" style="margin-bottom: 10rem;">
					</div>
					<p class="text-center">(Owner)</p>
				</div>
			</div>
			<div class="clearfix" style="padding-top:27%;">
			</div>
		</div>
	</div>
</body>

</html>