 <!--sidebar end-->

 <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
 <!--main content start-->
 <?php
	$id = $_GET['customer'];
	$hasil = $lihat->customer_edit($id);
	?>
 <section id="main-content">
 	<section class="wrapper">

 		<div class="row">
 			<div class="col-lg-12 main-chart">
 				<a href="index.php?page=customer"><button class="btn btn-primary"><i class="fa fa-angle-left"></i> Balik </button></a>
 				<h3>Details Customer</h3>
 				<?php if (isset($_GET['success'])) { ?>
 					<div class="alert alert-success">
 						<p>Edit Data Berhasil !</p>
 					</div>
 				<?php } ?>
 				<?php if (isset($_GET['remove'])) { ?>
 					<div class="alert alert-danger">
 						<p>Hapus Data Berhasil !</p>
 					</div>
 				<?php } ?>
 				<table class="table table-striped">
 					<form action="fungsi/edit/edit.php?customer=edit" method="POST">
 						<tr>
 							<td>ID Customer</td>
 							<td><input type="text" readonly="readonly" class="form-control" value="<?php echo $hasil['id_customer']; ?>" name="id"></td>
 						</tr>
 						<tr>
 							<td>Nama</td>
 							<td><input type="text" class="form-control" value="<?php echo $hasil['nama']; ?>" name="nama"></td>
 						</tr>
 						<tr>
 							<td>Alamat</td>
 							<td><input type="text" class="form-control" value="<?php echo $hasil['alamat']; ?>" name="alamat"></td>
 						</tr>
 						<tr>
 							<td>No. Hp</td>
 							<td><input type="text" class="form-control" value="<?php echo $hasil['no_hp']; ?>" name="no_hp"></td>
 						</tr>
 						<tr>
 							<td></td>
 							<td><button class="btn btn-primary"><i class="fa fa-edit"></i> Update Data</button></td>
 						</tr>
 					</form>
 				</table>
 				<div class="clearfix" style="padding-top:16%;"></div>
 			</div>
 		</div>
 	</section>
 </section>