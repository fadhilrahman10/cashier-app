 <!--sidebar end-->

 <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
 <!--main content start-->
 <section id="main-content">
 	<section class="wrapper">

 		<div class="row">
 			<div class="col-lg-12 main-chart">
 				<h3>Data Laporan Customer
 					<!--<a  style="padding-left:2pc;" href="fungsi/hapus/hapus.php?laporan=jual" onclick="javascript:return confirm('Data Laporan akan di Hapus ?');">
								<button class="btn btn-danger">RESET</button>
							</a>-->
 					<?php if (!empty($_GET['cari'])) {
							echo 'Periode Bulan ke - ' . $_POST['bln'] . '/' . $_POST['thn'];
						}
						?>

 					<a style="padding-left:2pc;" href="index.php?page=laporan-customer">
 						<button class="btn btn-warning">Refresh</button></a>
 					<a style="padding-left:2pc;" href="print_customer.php?bulan=<?= $laporan_bulan; ?>&tahun=<?= $laporan_tahun; ?>" target="_blank">
 						<button class="btn btn-success">Print</button></a>
 				</h3>
 				<br />
 				<br />
 				<?php if (isset($_GET['remove'])) { ?>
 					<div class="alert alert-danger">
 						<p>Hapus Data Berhasil !</p>
 					</div>
 				<?php } ?>

 				<?php if (!empty($_GET['cari'])) { ?>
 					<!-- view barang -->
 					<div class="modal-view">
 						<table class="table table-bordered" id="example1">
 							<thead>
 								<tr>
 									<td> No</td>
 									<td> ID Customer</td>
 									<td> Nama Customer</td>
 									<td> Alamat</td>
 									<td> NO Hp</td>
 								</tr>
 							</thead>
 							<tbody>
 								<?php
									$bulan = $_POST['bln'];
									$tahun = $_POST['thn'];
									$no = 1;
									$bayar = 0;
									$hasil = $lihat->periode_jual($periode);
									foreach ($hasil as $isi) {
										$bayar += $isi['total'];
									?>
 									<tr>
 										<td><?php echo $no; ?></td>
 										<td><?php echo $isi['id_customer']; ?></td>
 										<td><?php echo $isi['nama']; ?></td>
 										<td><?php echo $isi['alamat']; ?> </td>
 										<td><?php echo $isi['no_hp']; ?></td>
 									</tr>
 								<?php $no++;
									} ?>
 							</tbody>
 						</table>
 						<div class="clearfix" style="padding-top:27%;"></div>
 					</div>
 				<?php } else { ?>
 					<!-- view barang -->
 					<div class="modal-view">
 						<table class="table table-bordered" id="example1">
 							<thead>
 								<tr>
 									<td> No</td>
 									<td> ID Customer</td>
 									<td> Nama Customer</td>
 									<td> Alamat</td>
 									<td> NO Hp</td>
 								</tr>
 							</thead>
 							<tbody>
 								<?php $no = 1;
									$hasil = $lihat->customer(); ?>
 								<?php
									$bayar = 0;
									foreach ($hasil as $isi) {
									?>
 									<tr>
 										<td><?php echo $no; ?></td>
 										<td><?php echo $isi['id_customer']; ?></td>
 										<td><?php echo $isi['nama']; ?></td>
 										<td><?php echo $isi['alamat']; ?> </td>
 										<td><?php echo $isi['no_hp']; ?></td>
 									</tr>
 								<?php $no++;
									} ?>
 							</tbody>
 						</table>
 						<h3>
 							<?php $count = $lihat->customer_row(); ?>
 							Total Customer : <?php echo $count; ?>
 						</h3>
 						<div class="clearfix" style="padding-top:27%;"></div>
 					</div>
 				<?php } ?>
 			</div>
 		</div>
 		</div>
 	</section>
 </section>