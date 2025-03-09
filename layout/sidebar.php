<style>
	.sidebar {
		position: fixed;
		width: 17%;
		top: 0;
		bottom: 0;
	}
	.sidebar a{
		display: block;
		text-decoration: none;
		color: black;
		padding: 15px;
		margin-top: 5px;
		transition: 0.2s ease;
	}
	.sidebar a:hover{
		background: #0d6efd;
		color: white;
	}
</style>
<div class="container d-none d-md-block bg-white shadow sidebar p-4">
	<div class="text-center mb-4 mt-2">
		<?php
			$id = $_SESSION['user']['company_id'];
			$info = $con->query("SELECT logo,name FROM companies WHERE id = '$id'");
			foreach($info as $items):
		?>
		<img src="./assets/img/<?= $items['logo'] ?>" width="40%" class="rounded-pill mb-2">
		<h6><?= $items['name'] ?></h6>
		<?php endforeach; ?>
	</div>
	<a href="?view=home" class="rounded"><span class="bi bi-house"></span> Home</a>
	<a href="?view=setting" class="rounded"><span class="bi bi-gear"></span> Setting Aplikasi</a>
	<div class="dropdown">
      <a href="#" class="dropdown-toggle rounded" data-bs-toggle="collapse" data-bs-target="#submenu-master" aria-expanded="false">
        <span class="bi bi-folder"></span> Master Data
      </a>
      <div id="submenu-master" class="collapse">
        <a href="?view=master-barang" class="dropdown-item">Data Barang</a>
        <a href="?view=master-supplier" class="dropdown-item">Data Supplier</a>
        <a href="?view=master-cabang" class="dropdown-item">Data Gudang</a>
      </div>
    </div>
    <div class="dropdown">
      <a href="#" class="dropdown-toggle rounded" data-bs-toggle="collapse" data-bs-target="#submenu-transaksi" aria-expanded="false">
        <span class="bi bi-wallet"></span> Transaksi
      </a>
      <div id="submenu-transaksi" class="collapse">
        <a href="?view=input-penjualan" class="dropdown-item">Input Pembelian</a>
        <a href="#" class="dropdown-item">Input Penjualan</a>
        <a href="#" class="dropdown-item">Cek Stok</a>
      </div>
    </div>
    <div class="dropdown">
      <a href="#" class="dropdown-toggle rounded" data-bs-toggle="collapse" data-bs-target="#submenu-laporan" aria-expanded="false">
        <span class="bi bi-clipboard-check"></span> Laporan
      </a>
      <div id="submenu-laporan" class="collapse">
        <a href="#" class="dropdown-item">Option 1</a>
        <a href="#" class="dropdown-item">Option 2</a>
        <a href="#" class="dropdown-item">Option 3</a>
      </div>
    </div>
	<a href="" class="rounded bg-primary text-white text-center p-2">Logout</a>
</div>