       <?php
				$id = $_SESSION['admin'];
				$hasil = $lihat->admin_edit($id);
				?>
       <section id="main-content">
       	<section class="wrapper">
       		<div class="row">
       			<div class="col-lg-12 main-chart">

       				<?php if (isset($_GET['success'])) { ?>
       					<div class="alert alert-success">
       						<p>Edit Data Berhasil !</p>
       					</div>
       				<?php } ?>
       				<?php if (isset($_GET['tambah'])) { ?>
       					<div class="alert alert-success">
       						<p>Tambah Data Berhasil !</p>
       					</div>
       				<?php } ?>
       				<?php if (isset($_GET['remove'])) { ?>
       					<div class="alert alert-danger">
       						<p>Hapus Data Berhasil !</p>
       					</div>
       				<?php } ?>



       				<div class="col-sm-4">
       					<button type="button" id="add" onclick="tambahUser()" class="btn btn-primary" style="margin-bottom: 3rem;">Tambah Data Admin</button>
       					<a href="" id="back" class="btn btn-default" style="margin-bottom: 3rem;">Kembali</a>
       					<div class="panel panel-primary" id="gantiPw">
       						<div class="panel-heading">
       							<h4><i class="fa fa-lock"></i> Ganti Password</h4>
       						</div>
       						<div class="panel-body">
       							<div class="box-content">
       								<form class="form-horizontal" method="POST" action="fungsi/edit/edit.php?pass=ganti-pas">

       									<fieldset>
       										<div class="control-group">
       											<label class="control-label" for="typeahead">Username </label>
       											<div class="input-group">
       												<div class="input-group-addon">
       													<i class="fa fa-user"></i>
       												</div>
       												<input type="text" class="form-control" style="border-radius:0px;" name="user" data-items="4" value="<?php echo $hasil['username']; ?>" />
       											</div>
       										</div>
       										<div class="control-group">
       											<label class="control-label" for="typeahead">No Hp</label>
       											<div class="input-group">
       												<div class="input-group-addon">
       													<i class="fa fa-phone"></i>
       												</div>
       												<input type="number" class="form-control" placeholder="Enter Your New Phone" style="border-radius:0px;" id="no_hp" name="no_hp" data-items="4" value="<?= $hasil['no_hp']; ?>" required="required" />
       											</div>
       										</div>
       										<div class="control-group">
       											<label class="control-label" for="typeahead">Password Baru</label>
       											<div class="input-group">
       												<div class="input-group-addon">
       													<i class="fa fa-lock"></i>
       												</div>
       												<input type="password" class="form-control" placeholder="Enter Your New Password" style="border-radius:0px;" id="pass" name="pass" data-items="4" value="" required="required" />
       											</div>
       										</div>
       										<br>
       										<div class="pull-right">
       											<input type="hidden" class="form-control" style="border-radius:0px;" name="id" value="<?php echo $hasil['id_kasir']; ?>" required="required" />
       											<button type="submit" class="btn btn-primary" value="Tambah" style="border-radius:0px;" name="proses"><i class="fa fa-pencil"></i> Ubah Password</button>
       										</div>
       									</fieldset>
       								</form>
       							</div>
       						</div>
       					</div>
       					<div class="panel panel-primary" id="tambahUser">
       						<div class="panel-heading">
       							<h4><i class="fa fa-lock"></i> Tambah User</h4>
       						</div>
       						<div class="panel-body">
       							<div class="box-content">
       								<form class="form-horizontal" method="POST" action="fungsi/tambah/tambah.php?kasir=tambah">

       									<fieldset>
       										<div class="control-group">
       											<label class="control-label" for="typeahead">Username </label>
       											<div class="input-group">
       												<div class="input-group-addon">
       													<i class="fa fa-user"></i>
       												</div>
       												<input type="text" class="form-control" style="border-radius:0px;" name="user" data-items="4" placeholder="Username" />
       											</div>
       										</div>
       										<div class="control-group">
       											<label class="control-label" for="typeahead">No Hp</label>
       											<div class="input-group">
       												<div class="input-group-addon">
       													<i class="fa fa-phone"></i>
       												</div>
       												<input type="number" class="form-control" placeholder="Enter Your New Phone" style="border-radius:0px;" id="no_hp" name="no_hp" data-items="4" value="" required="required" />
       											</div>
       										</div>
       										<div class="control-group">
       											<label class="control-label" for="typeahead">Password</label>
       											<div class="input-group">
       												<div class="input-group-addon">
       													<i class="fa fa-lock"></i>
       												</div>
       												<input type="password" class="form-control" placeholder="Enter Your Password" style="border-radius:0px;" id="pass" name="pass" data-items="4" value="" required="required" />
       											</div>
       										</div>
       										<br>
       										<div class="pull-right">
       											<button type="submit" class="btn btn-primary" value="Tambah" style="border-radius:0px;" name="proses"><i class="fa fa-pencil"></i> Tambah User</button>
       										</div>
       									</fieldset>
       								</form>
       							</div>
       						</div>
       					</div>
       				</div>
       			</div>
       		</div>
       		<div class="clearfix" style="padding-top:5%;"></div>
       		</div>
       		</div>
       	</section>
       </section>

       <script>
       	$(document).ready(function() {
       		$('#tambahUser').css('display', 'none');
       		$('#back').css('display', 'none');
       	})

       	function tambahUser() {
       		$('#tambahUser').css('display', 'block');
       		$('#gantiPw').css('display', 'none');
       		$('#add').css('display', 'none');
       		$('#back').css('display', '');
       	}
       </script>