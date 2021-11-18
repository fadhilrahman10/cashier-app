<?php
/*
	 * PROSES TAMPIL  
	 */
class view
{
	protected $db;
	function __construct($db)
	{
		$this->db = $db;
	}

	function member()
	{
		$sql = "select member.*, login.*
						from member inner join login on member.id_member = login.id_member";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetchAll();
		return $hasil;
	}

	function admin_edit($id)
	{
		$sql = "select * from kasir";
		$row = $this->db->prepare($sql);
		$row->execute(array($id));
		$hasil = $row->fetch();
		return $hasil;
	}

	function toko()
	{
		$sql = "select*from toko where id_toko='1'";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetch();
		return $hasil;
	}

	function kategori()
	{
		$sql = "select*from kategori";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetchAll();
		return $hasil;
	}

	function barang()
	{
		$sql = "select * from barang";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetchAll();
		return $hasil;
	}

	function customer()
	{
		$sql = "select * from customer";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetchAll();
		return $hasil;
	}

	function barang_edit($id)
	{
		$sql = "select * from barang where id_barang=?";
		$row = $this->db->prepare($sql);
		$row->execute(array($id));
		$hasil = $row->fetch();
		return $hasil;
	}

	function customer_edit($id)
	{
		$sql = "select * from customer where id_customer=?";
		$row = $this->db->prepare($sql);
		$row->execute(array($id));
		$hasil = $row->fetch();
		return $hasil;
	}

	function barang_cari($cari)
	{
		$sql = "select * from barang where id_barang like '%$cari%' or nama_barang like '%$cari%' or merk like '%$cari%'";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetchAll();
		return $hasil;
	}

	function barang_id()
	{
		$sql = 'SELECT * FROM barang ORDER BY id_barang DESC';
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetch();

		$urut = substr($hasil['id_barang'], 2, 3);
		$tambah = (int) $urut + 1;
		if (strlen($tambah) == 1) {
			$format = 'BR00' . $tambah . '';
		} else if (strlen($tambah) == 2) {
			$format = 'BR0' . $tambah . '';
		} else {
			$format = 'BR' . $tambah . '';
		}
		return $format;
	}

	function customer_id()
	{
		$sql = 'SELECT * FROM customer ORDER BY id_customer DESC';
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetch();

		$urut = substr($hasil['id_customer'], 2, 3);
		$tambah = (int) $urut + 1;
		if (strlen($tambah) == 1) {
			$format = 'CS00' . $tambah . '';
		} else if (strlen($tambah) == 2) {
			$format = 'CS0' . $tambah . '';
		} else {
			$format = 'CS' . $tambah . '';
		}
		return $format;
	}

	function kategori_edit($id)
	{
		$sql = "select*from kategori where id_kategori=?";
		$row = $this->db->prepare($sql);
		$row->execute(array($id));
		$hasil = $row->fetch();
		return $hasil;
	}

	function kategori_row()
	{
		$sql = "select*from kategori";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->rowCount();
		return $hasil;
	}

	function barang_row()
	{
		$sql = "select*from barang";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->rowCount();
		return $hasil;
	}

	function customer_row()
	{
		$sql = "select*from customer";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->rowCount();
		return $hasil;
	}

	function barang_stok_row()
	{
		$sql = "SELECT SUM(stok) as jml FROM barang";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetch();
		return $hasil;
	}

	function barang_beli_row()
	{
		$sql = "SELECT SUM(harga_beli) as beli FROM barang";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetch();
		return $hasil;
	}

	function jual_row()
	{
		$sql = "SELECT SUM(jumlah) as stok FROM penjualan";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetch();
		return $hasil;
	}

	function jual()
	{
		$sql = "SELECT nota.* , barang.id_barang, barang.nama_barang, member.id_member,
						member.nm_member from nota 
					   left join barang on barang.id_barang=nota.id_barang 
					   left join member on member.id_member=nota.id_member";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetchAll();
		return $hasil;
	}

	function print($length)
	{
		$sql = "SELECT pembayaran.*, barang.nama_barang, customer.nama
						from pembayaran 
					   left join barang on barang.id_barang=pembayaran.id_barang 
					   left join customer on customer.id_customer=pembayaran.id_customer ORDER BY tanggal_input DESC LIMIT $length";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetchAll();
		return $hasil;
	}


	function periode_jual($periode)
	{
		$sql = "SELECT nota.* , barang.id_barang, barang.nama_barang from nota 
					   left join barang on barang.id_barang=nota.id_barang 
					   WHERE nota.periode = ?";
		$row = $this->db->prepare($sql);
		$row->execute(array($periode));
		$hasil = $row->fetchAll();
		return $hasil;
	}

	function laporan_periode_penjualan($bulan, $tahun)
	{
		$sql = "SELECT penjualan.* ,barang.nama_barang from penjualan 
					   left join barang on barang.id_barang=penjualan.id_barang 
					   WHERE MONTH(penjualan.periode) = ? AND YEAR(penjualan.periode) = ?";
		$row = $this->db->prepare($sql);
		$row->execute(array($bulan, $tahun));
		$hasil = $row->fetchAll();
		return $hasil;
	}

	function laporan_penjualan()
	{
		$sql = "SELECT penjualan.* ,barang.nama_barang from penjualan 
					   left join barang on barang.id_barang=penjualan.id_barang";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetchAll();
		return $hasil;
	}

	function laporan_pembayaran()
	{
		$sql = "SELECT pembayaran.* ,barang.nama_barang, customer.nama from pembayaran 
					   left join barang on barang.id_barang=pembayaran.id_barang
						 left join customer on customer.id_customer=pembayaran.id_customer";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetchAll();
		return $hasil;
	}

	function laporan_periode_pembayaran($bulan, $tahun)
	{
		$sql = "SELECT pembayaran.* ,barang.nama_barang, customer.nama from pembayaran 
					   left join barang on barang.id_barang=pembayaran.id_barang
						 left join customer on customer.id_customer=pembayaran.id_customer 
					   WHERE MONTH(pembayaran.tanggal_input) = ? AND YEAR(pembayaran.tanggal_input) = ?";
		$row = $this->db->prepare($sql);
		$row->execute(array($bulan, $tahun));
		$hasil = $row->fetchAll();
		return $hasil;
	}

	function bayar($id)
	{
		$sql = "UPDATE pembayaran SET status='SUCCESS' WHERE no_pembayaran='$id'";
		$row = $this->db->prepare($sql);
		$row->execute();
	}


	function penjualan()
	{
		$sql = "SELECT penjualan.* , barang.id_barang, barang.nama_barang from penjualan 
					   left join barang on barang.id_barang=penjualan.id_barang 
					   ORDER BY id_penjualan";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetchAll();
		return $hasil;
	}

	function pembayaran()
	{
		$sql = "SELECT pembayaran.* , barang.id_barang, barang.nama_barang from pembayaran 
					   left join barang on barang.id_barang=pembayaran.id_barang 
					   WHERE pembayaran.status='PENDING' ORDER BY no_pembayaran";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetchAll();
		return $hasil;
	}

	function jumlah()
	{
		$sql = "SELECT SUM(total) as bayar FROM penjualan";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetch();
		return $hasil;
	}

	function jumlah_nota()
	{
		$sql = "SELECT SUM(total) as bayar FROM nota";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetch();
		return $hasil;
	}

	function jml()
	{
		$sql = "SELECT SUM(harga_beli*stok) as byr FROM barang";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetch();
		return $hasil;
	}
}
