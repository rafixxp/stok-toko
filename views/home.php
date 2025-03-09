<?php

// count
$company = $_SESSION['user']['company_id'];
$branch = $_SESSION['user']['branch_id'];

$barang = $con->query("SELECT COUNT(*) as total_barang FROM master_barang WHERE branch_id = '$branch' AND company_id = '$company'");
$barang = $barang->fetch_assoc();
?>
<style>
	.fs-21{
		font-size: 12px;
	}
</style>
<div class="container p-4">
	<span class="fs-21">Selamat Datang</span>
	<h5><?= $_SESSION['user']['name'] ?></h5>

	<div class="row mt-3">
		<div class="col bg-primary rounded p-3 mx-1 text-center text-white">
			<h2><?= $barang['total_barang'] ?? 0 ?></h2>
			<span class="fs-21">Barang</span>
		</div>
		<div class="col bg-primary rounded p-3 mx-1 text-center text-white">
			<h2>20</h2>
			<span class="fs-21">Transaksi Masuk</span>
		</div>
		<div class="col bg-primary rounded p-3 mx-1 text-center text-white">
			<h2>20</h2>
			<span class="fs-21">Transaksi Keluar</span>
		</div>
	</div>
</div>