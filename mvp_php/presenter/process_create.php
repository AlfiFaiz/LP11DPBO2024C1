<?php
// Memanggil file model dan presenter yang diperlukan
include("../model/TabelPasien.class.php");

// Memeriksa apakah data yang dibutuhkan telah disediakan
if(isset( $_POST['nik'],$_POST['nama'], $_POST['tempat_lahir'], $_POST['tanggal_lahir'], $_POST['gender'])) {
    // Menyimpan data yang diterima dari form
    
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];

    // Membuat objek ProsesPasien untuk memproses data
    $prosesPasien = new TabelPasien();

    // Memanggil fungsi untuk menyimpan data pasien baru
    $result = $prosesPasien->simpanDataPasien($nik, $nama, $tempat_lahir, $tanggal_lahir, $gender, $email, $telepon);
}
header("Location: ../index.php");
exit; //

