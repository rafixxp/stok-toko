<?php
session_start();

if(!$_SESSION['user']){
	header('Location: ./login.php');
	exit;
}

require './koneksi.php';
error_reporting(1);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard - Stok Toko</title>
	<link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./assets/css/bootstrap-icons.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
	<script type="text/javascript" src="./assets/js/popper.min.js"></script>
	<script type="text/javascript" src="./assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="./assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="./assets/js/sweetalert.js"></script>
	<style>
		*{
			font-family: 'Rubik';
		}
		.form-control{
			border: 0.01px solid #a49de3;
		}
		.form-select{
			border: 0.01px solid #a49de3;
		}
		.hide{
			display: none;
		}
	</style>
</head>
<body class="bg-light">
	<div class="row">
		<div class="col-2 d-none d-lg-block ">
			<?php include('./layout/sidebar.php'); ?>
		</div>
		<div class="col">
			<?php include('./layout/topbar.php'); ?>
			<?php
				$view = $_GET['view'] ?  $_GET['view'] :  '';

				switch ($view) {
					case '':
						include('./views/home.php');
						break;
					
					case 'master-barang':
						include('./views/master-barang.php');
						break;

					case 'setting':
						include('./views/setting.php');
						break;

					case 'master-supplier':
						include('./views/master-supplier.php');
						break;

					case 'master-cabang':
						include('./views/master-cabang.php');
						break;

					case 'input-penjualan':
						include('./views/input-penjualan.php');
						break;

					default:
						include('./views/home.php');
						break;
				}
			?>
		</div>
	</div>
</body>
</html>