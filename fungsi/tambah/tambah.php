
<?php
require '../../config.php';

if (!empty($_GET['kategori'])) {
	$nama = $_POST['kategori'];
	$tgl = date("j F Y, G:i");
	$data[] = $nama;
	$data[] = $tgl;
	$sql = 'INSERT INTO kategori (nama_kategori,tgl_input) VALUES(?,?)';
	$row = $config->prepare($sql);
	$row->execute($data);
	echo '<script>window.location="../../index.php?page=kategori&&success=tambah-data"</script>';
}
if (!empty($_GET['barang'])) {
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$merk = $_POST['merk'];
	$beli = $_POST['beli'];
	$jual = $_POST['jual'];
	$satuan = $_POST['satuan'];
	$stok = $_POST['stok'];
	$tgl = $_POST['tgl'];

	$data[] = $id;
	$data[] = $nama;
	$data[] = $merk;
	$data[] = $beli;
	$data[] = $jual;
	$data[] = $satuan;
	$data[] = $stok;
	$data[] = $tgl;
	$sql = 'INSERT INTO barang (id_barang,nama_barang,merk,harga_beli,harga_jual,satuan_barang,stok,tgl_input) 
			    VALUES (?,?,?,?,?,?,?,?) ';
	$row = $config->prepare($sql);
	$row->execute($data);
	echo '<script>window.location="../../index.php?page=barang&success=tambah-data"</script>';
}
if (!empty($_GET['customer'])) {
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$no_hp = $_POST['no_hp'];

	$data[] = $id;
	$data[] = $nama;
	$data[] = $alamat;
	$data[] = $no_hp;
	$sql = 'INSERT INTO customer (id_customer,nama,alamat,no_hp) 
			    VALUES (?,?,?,?) ';
	$row = $config->prepare($sql);
	$row->execute($data);
	echo '<script>window.location="../../index.php?page=customer&success=tambah-data"</script>';
}
if (!empty($_GET['kasir'])) {
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$no_hp = $_POST['no_hp'];

	$data[] = $user;
	$data[] = $pass;
	$data[] = $no_hp;
	$sql = 'INSERT INTO kasir (username,password,no_hp) 
			    VALUES (?,?,?) ';
	$row = $config->prepare($sql);
	$row->execute($data);
	echo '<script>window.location="../../index.php?page=user&tambah=tambah-data"</script>';
}
if (!empty($_GET['jual'])) {
	$id = $_GET['id'];
	$kasir =  $_GET['id_kasir'];
	$jumlah = '0';
	$total = '0';
	$tgl = date("j F Y, G:i");

	$data1[] = $id;
	$data1[] = $kasir;
	$data1[] = $jumlah;
	$data1[] = $total;
	$sql1 = 'INSERT INTO pembayaran (id_barang,id_customer,jumlah,total) VALUES (?,?,?,?)';
	$row1 = $config->prepare($sql1);
	$row1->execute($data1);
	echo '<script>window.location="../../index.php?page=jual&success=tambah-data"</script>';
}
?>

