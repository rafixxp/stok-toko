<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require '../koneksi.php';

$aksi = $_GET['aksi'] ? $_GET['aksi'] : '';

switch ($aksi) {
	case 'simpan':
		$kd = mysqli_escape_string($con, $_POST['kd']);
		$nm = mysqli_escape_string($con, $_POST['nm']);
		$kel = mysqli_escape_string($con, $_POST['kel']);
		$kat = mysqli_escape_string($con, $_POST['kat']);
		$sat = mysqli_escape_string($con, $_POST['sat']);
		$bel = mysqli_escape_string($con, $_POST['beli']);
		$jul = mysqli_escape_string($con, $_POST['jual']);
		$branch = $_SESSION['user']['branch_id'];
		$company = $_SESSION['user']['company_id'];

 		$save = mysqli_query($con, "INSERT INTO master_barang VALUES(NULL,'$kd','$nm','$kel','$kat','$sat','$bel','$jul','$branch','$company')");
 		if($save){
 			echo "success";
 		}
 		else{
 			echo "gagal $con->error $save";
 		}

		break;

	case 'edit':
		$id = mysqli_escape_string($con, $_POST['id']);
		$kd = mysqli_escape_string($con, $_POST['kd']);
		$nm = mysqli_escape_string($con, $_POST['nm']);
		$kel = mysqli_escape_string($con, $_POST['kel']);
		$kat = mysqli_escape_string($con, $_POST['kat']);
		$sat = mysqli_escape_string($con, $_POST['sat']);
		$bel = mysqli_escape_string($con, $_POST['beli']);
		$jul = mysqli_escape_string($con, $_POST['jual']);
		$branch = $_SESSION['user']['branch_id'];
		$company = $_SESSION['user']['company_id'];

 		$save = mysqli_query($con, "UPDATE master_barang SET kd_brg='$kd', nm_brg='$nm', kelompok='$kel', kategori='$kat', satuan='$sat', harga_beli='$bel', harga_jual='$jul', branch_id='$branch', company_id='$company' WHERE id = '$id'");
 		if($save){
 			echo "success";
 		}
 		else{
 			echo "gagal $con->error $save";
 		}

		break;
	
	case 'hapus':
		$id = mysqli_escape_string($con, $_GET['id']);
		$del = mysqli_query($con, "DELETE FROM master_barang WHERE id='$id'");

		if($del){
			echo 'success';
		}
		else{
			echo 'gagal';
		}

	default:
		// code...
		break;
}