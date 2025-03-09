<?php

session_start();
require '../koneksi.php';

$aksi = $_GET['aksi'] ? $_GET['aksi'] : '';

switch ($aksi) {
	case 'simpan':
		$nm = mysqli_escape_string($con, $_POST['nm']);
		$almt = mysqli_escape_string($con, $_POST['almt']);
		$cp = mysqli_escape_string($con, $_POST['cp']);
		$tlp = mysqli_escape_string($con, $_POST['tlp']);
 		$id = $_SESSION['user']['company_id'];

 		$save = $con->query("INSERT INTO branches VALUES(NULL,'$nm','$almt','$id','$cp','$tlp')");
 		if($save){
 			echo 'success';
 		} else {
 			echo 'gagal';
 		}
		break;

	case 'edit':
		$id = mysqli_escape_string($con, $_POST['id']);
		$nm = mysqli_escape_string($con, $_POST['nm']);
		$almt = mysqli_escape_string($con, $_POST['almt']);
		$cp = mysqli_escape_string($con, $_POST['cp']);
		$tlp = mysqli_escape_string($con, $_POST['tlp']);

 		$save = $con->query("UPDATE branches SET name='$nm', address='$almt', company_id='$id', contact_person='$cp', no_telp='$tlp' WHERE id = '$id'");
 		if($save){
 			echo 'success';
 		} else {
 			echo 'gagal';
 		}
 		break;

 	case 'hapus':
 		$id = mysqli_escape_string($con, $_GET['id']);
 		$del = $con->query("DELETE FROM branches WHERE id='$id'");
 		if($del){
 			echo 'success';
 		} else {
 			echo 'gagal';
 		}
	
	default:
		// code...
		break;
}