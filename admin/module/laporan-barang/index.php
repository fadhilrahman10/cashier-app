 <!--sidebar end-->

 <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
 <!--main content start-->
 <section id="main-content">
 	<section class="wrapper">

 		<div class="row">
 			<div class="col-lg-12 main-chart">
 				<h3>Data Laporan Barang
 					<!--<a  style="padding-left:2pc;" href="fungsi/hapus/hapus.php?laporan=jual" onclick="javascript:return confirm('Data Laporan akan di Hapus ?');">
								<button class="btn btn-danger">RESET</button>
							</a>-->
 					<?php if (!empty($_GET['cari'])) {
							echo 'Periode Bulan ke - ' . $_POST['bln'] . '/' . $_POST['thn'];
						}
						?>

 					<a style="padding-left:2pc;" href="index.php?page=laporan-barang">
 						<button class="btn btn-warning">Refresh</button></a>
 					<a style="padding-left:2pc;" href="print_barang.php?bulan=<?= $laporan_bulan; ?>&tahun=<?= $laporan_tahun; ?>" target="_blank">
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
 									<td> ID Barang</td>
 									<td> Nama Barang</td>
 									<td style="width:10%;"> Jumlah</td>
 									<td style="width:20%;"> Total</td>
 									<td> Tanggal Input</td>
 								</tr>
 							</thead>
 							<tbody>
 								<?php
									$periode = $_POST['bln'] . '-' . $_POST['thn'];
									$no = 1;
									$bayar = 0;
									$hasil = $lihat->periode_jual($periode);
									foreach ($hasil as $isi) {
										$bayar += $isi['total'];
									?>
 									<tr>
 										<td><?php echo $no; ?></td>
 										<td><?php echo $isi['id_barang']; ?></td>
 										<td><?php echo $isi['nama_barang']; ?></td>
 										<td><?php echo $isi['jumlah']; ?> </td>
 										<td>Rp.<?php echo number_format($isi['total']); ?>,-</td>
 										<td><?php echo $isi['tanggal_input']; ?></td>
 									</tr>
 								<?php $no++;
									} ?>
 							</tbody>
 						</table>
 						<h3>
 							<?php $hasil = $lihat->jumlah_nota(); ?>
 							Pemasukan : Rp.<?php echo number_format($bayar); ?>,-
 						</h3>
 						<div class="clearfix" style="padding-top:27%;"></div>
 					</div>
 				<?php } else { ?>
 					<!-- view barang -->
 					<div class="modal-view">
 						<table class="table table-bordered" id="example1">
 							<thead>
 								<tr>
 									<td> No</td>
 									<td> ID Barang</td>
 									<td> Nama Barang</td>
 									<td> Merk</td>
 									<td style="width:10%;"> Harga Beli</td>
 									<td style="width:10%;"> Harga Jual</td>
 									<td style="width:10%;"> Satuan</td>
 									<td style="width:10%;"> Stok</td>
 									<td> Tanggal Input</td>
 									<td> Tanggal Update</td>
 								</tr>
 							</thead>
 							<tbody>
 								<?php $no = 1;
									$hasil = $lihat->barang(); ?>
 								<?php
									$bayar = 0;
									foreach ($hasil as $isi) {
									?>
 									<tr>
 										<td><?php echo $no; ?></td>
 										<td><?php echo $isi['id_barang']; ?></td>
 										<td><?php echo $isi['nama_barang']; ?></td>
 										<td><?php echo $isi['merk']; ?></td>
 										<td>Rp.<?php echo number_format($isi['harga_beli']); ?>,- </td>
 										<td>Rp.<?php echo number_format($isi['harga_jual']); ?>,- </td>
 										<td><?php echo $isi['satuan_barang']; ?> </td>
 										<td><?php echo $isi['stok']; ?> </td>
 										<td><?php echo $isi['tgl_input']; ?></td>
 										<td><?php echo $isi['tgl_update']; ?></td>
 									</tr>
 								<?php $no++;
									} ?>
 							</tbody>
 						</table>
 						<h3>
 							<?php $hasil = $lihat->barang_row(); ?>
 							Total Barang : <?= $hasil; ?>
 						</h3>
 						<div class="clearfix" style="padding-top:27%;"></div>
 					</div>
 				<?php } ?>
 			</div>
 		</div>
 		</div>
 	</section>
 </section>