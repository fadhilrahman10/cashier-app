<?php
require 'config.php';
include $view;
$lihat = new view($config);
// $toko = $lihat->toko();
// $hsl = $lihat->penjualan();
if (!empty($_GET['bulan'])) {
	$result = $lihat->laporan_periode_penjualan($_GET['bulan'], $_GET['tahun']);
} else {
	$result = $lihat->customer();
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
		<h1 class="text-center">Laporan Customer <br>Toko Amanda </h1>
		<hr>
		<?php if (!empty($_GET['bulan'])) :  ?>
			<h3 class="text-center">Periode <?= $_GET['bulan']; ?>/<?= $_GET['tahun']; ?></h3>
		<?php endif ?>
		<div class="modal-view">
			<table class="table table-bordered" id="example1">
				<thead>
					<tr>
						<td> No</td>
						<td> ID Customer</td>
						<td> Nama Customer</td>
						<td> Alamat</td>
						<td> No Hp</td>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					$hasil = $lihat->laporan_penjualan(); ?>
					<?php
					$bayar = 0;
					foreach ($result as $isi) {
					?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $isi['id_customer']; ?></td>
							<td><?php echo $isi['nama']; ?></td>
							<td><?php echo $isi['alamat']; ?> </td>
							<td><?php echo $isi['no_hp']; ?> </td>
						</tr>
					<?php $no++;
					} ?>
				</tbody>
			</table>
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