      <section id="main-content">
      	<section class="wrapper">

      		<div class="row">
      			<div class="col-lg-9">
      				<div class="row" style="margin-left:1pc;margin-right:1pc;">
      					<h1>DASHBOARD</h1>
      					<hr>
      					<?php
								$sql = "select * from barang where stok <=5";
								$row = $config->prepare($sql);
								$row->execute();
								$q = $row->rowCount();
								$jual = $lihat->jual_row();
								?>

      					<div class="row">
      						<!--STATUS PANELS -->
      						<div class="col-md-3">
      							<div class="panel panel-primary">
      								<div class="panel-heading">
      									<?php $hasil = $lihat->customer_row(); ?>
      									<h5><i class="fa fa-desktop"></i> Customer</h5>
      								</div>
      								<div class="panel-body">
      									<center>
      										<h1><?php echo number_format($hasil); ?></h1>
      									</center>
      								</div>
      								<div class="panel-footer">
      									<h4 style="font-size:15px;"><a href='index.php?page=laporan-customer'> <i class='fa fa-arrow-right'></i></a></h4>
      								</div>
      							</div>
      							<!--/grey-panel -->
      						</div><!-- /col-md-3-->
      						<!-- STATUS PANELS -->
      						<div class="col-md-3">
      							<div class="panel panel-success">
      								<div class="panel-heading">
      									<?php $c = $lihat->barang_row(); ?>
      									<h5><i class="fa fa-desktop"></i> Barang</h5>
      								</div>
      								<div class="panel-body">
      									<center>
      										<h1><?php echo number_format($c); ?></h1>
      									</center>
      								</div>
      								<div class="panel-footer">
      									<h4 style="font-size:15px;"><a href='index.php?page=barang'><i class='fa fa-arrow-right'></i></a></h4>
      								</div>
      							</div>
      							<!--/grey-panel -->
      						</div><!-- /col-md-3-->
      						<!-- STATUS PANELS -->
      						<div class="col-md-3">
      							<div class="panel panel-info">
      								<div class="panel-heading">
      									<h5><i class="fa fa-desktop"></i> Total Penjualan</h5>
      								</div>
      								<div class="panel-body">
      									<?php $d = $lihat->jual_row(); ?>
      									<center>
      										<h1><?php echo number_format($d['stok']); ?></h1>
      									</center>
      								</div>
      								<div class="panel-footer">
      									<h4 style="font-size:15px;"><a href='index.php?page=laporan-penjualan'> <i class='fa fa-arrow-right'></i></a></h4>
      								</div>
      							</div>
      							<!--/grey-panel -->
      						</div><!-- /col-md-3-->
      						<div class="col-md-3">
      							<div class="panel panel-danger">
      								<div class="panel-heading">
      									<h5><i class="fa fa-desktop"></i> Barang Habis</h5>
      								</div>
      								<div class="panel-body">
      									<center>
      										<h1><?php echo $q; ?></h1>
      									</center>
      								</div>
      								<div class="panel-footer">
      									<h4 style="font-size:15px;"><a href='index.php?page=barang'> <i class='fa fa-arrow-right'></i></a></h4>
      								</div>
      							</div>
      							<!--/grey-panel -->
      						</div><!-- /col-md-3-->
      					</div>
      				</div>
      			</div><!-- /col-lg-9 END SECTION MIDDLE -->

      	</section>
      	<div class="panel-footer">
      		<h4 style="font-size:15px;"><a href='index.php?page=jual'>Pergi ke Kasir <i class='fa fa-arrow-right'></i></a></h4>
      	</div>
      </section>