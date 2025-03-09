<?php

session_start();
require '../koneksi.php';

if (isset($_POST['update'])) {
    $nama = mysqli_escape_string($con, $_POST['nama']);
    $email = mysqli_escape_string($con, $_POST['email']);
    $phone = mysqli_escape_string($con, $_POST['phone']);
    $address = mysqli_escape_string($con, $_POST['address']);
    $id = $_SESSION['user']['company_id'];

    // Inisialisasi logo menjadi null jika tidak ada file yang diupload
    $logo = NULL;

    // Periksa apakah ada logo yang diupload
    if (isset($_FILES['logo']) && $_FILES['logo']['error'] == 0) {
        $logo = $_FILES['logo']['name'];
        $target = '../assets/img/';
        $targetFile = $target . basename($logo);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Validasi file logo
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Maaf, hanya file JPG, JPEG, PNG, atau GIF yang diperbolehkan.<br>";
            exit;
        }

        // Hapus file lama jika ada file baru yang diupload
        if (file_exists($targetFile)) {
            unlink($targetFile);
        }

        // Cek dan upload file
        if (!move_uploaded_file($_FILES["logo"]["tmp_name"], $targetFile)) {
            echo "Terjadi kesalahan saat mengunggah file logo.";
            exit;
        }
    }

    // Update data perusahaan
    if ($logo) {
        // Jika ada logo, update dengan logo baru
        $update = $con->query("UPDATE companies SET name='$nama', email='$email', phone='$phone', address='$address', logo='$logo' WHERE id = '$id'");
    } else {
        // Jika tidak ada logo, update tanpa menyentuh kolom logo
        $update = $con->query("UPDATE companies SET name='$nama', email='$email', phone='$phone', address='$address' WHERE id = '$id'");
    }

    if ($update) {
        header('Location: ../?view=setting&status=success');
    } else {
        echo "Terjadi kesalahan saat memperbarui data perusahaan.";
    }
} else {
    echo "Data tidak lengkap.";
}

?>
