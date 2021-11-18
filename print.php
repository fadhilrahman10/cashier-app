<?php
require 'config.php';
include $view;
$lihat = new view($config);
// $toko = $lihat->toko();
// $hsl = $lihat->penjualan();
$result = $lihat->print($_GET['length']);
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
		<p> TOKO Amanda</p>
		<p>Jl. Duri-Dumai KM-16</p>
		<p>Tanggal : <?php echo date("j F Y, G:i"); ?></p>
		<p>Customer : <?php echo $result[0]['nama']; ?></p>
		<table class="table table-bordered" style="width:20%;font-size:13px;">
			<tr>
				<td>No.</td>
				<td>Barang</td>
				<td>Jumlah</td>
				<td>Total</td>
			</tr>
			<?php $no = 1;
			$total_bayar = 0;
			foreach ($result as $isi) { ?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $isi['nama_barang']; ?></td>
					<td><?php echo $isi['jumlah']; ?></td>
					<td><?php echo $isi['total']; ?></td>
				</tr>
			<?php $no++;
				$total_bayar += $isi['total'];
			} ?>
		</table>
		Total : Rp.<?php echo number_format($total_bayar); ?>,-
		<br />
		Bayar : Rp.<?php echo number_format($_GET['bayar']); ?>,-
		<br />
		<?php $kembali =   $_GET['bayar'] - $total_bayar; ?>
		Kembali : Rp.<?php echo number_format($kembali); ?>,-
	</div>
</body>

</html>