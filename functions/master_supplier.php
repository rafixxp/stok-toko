<?php

session_start();
require '../koneksi.php';

$aksi = $_GET['aksi'] ? $_GET['aksi'] : '';

switch ($aksi) {
	case 'simpan':
		$kd = mysqli_escape_string($con, $_POST['kd']);
		$nm = mysqli_escape_string($con, $_POST['nm']);
		$cp = mysqli_escape_string($con, $_POST['cp']);
		$tlp = mysqli_escape_string($con, $_POST['tlp']);
		$almt = mysqli_escape_string($con, $_POST['almt']);

		$save = $con->query("INSERT INTO master_supplier VALUES(NULL,'$kd','$nm','$cp','$tlp','$almt')");
		if($save){
			echo 'success';
		}
		else{
			echo 'gagal';
		}
		break;
	
	case 'edit':
		$id = mysqli_escape_string($con, $_POST['id']);
		$kd = mysqli_escape_string($con, $_POST['kd']);
		$nm = mysqli_escape_string($con, $_POST['nm']);
		$cp = mysqli_escape_string($con, $_POST['cp']);
		$tlp = mysqli_escape_string($con, $_POST['tlp']);
		$almt = mysqli_escape_string($con, $_POST['almt']);

		$up = $con->query("UPDATE master_supplier SET kd_sup='$kd', nm_sup='$nm', contact_person='$cp', no_tlp='$tlp', alamat='$almt' WHERE id='$id'");

		if($up){
			echo 'success';
		}
		else{
			echo 'gagal';
		}
		break;

	case 'hapus':
		$id = mysqli_escape_string($con, $_GET['id']);
		$del = $con->query("DELETE FROM master_supplier WHERE id='$id'");
		if($del){
			echo 'success';
		}
		else{
			echo 'gagal';
		}
		break;

	default:
		// code...
		break;
}