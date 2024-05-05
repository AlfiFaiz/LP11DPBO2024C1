<?php
// Memeriksa apakah metode yang digunakan adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Memeriksa apakah edit_id tersedia di $_POST
    if(isset($_POST['edit_id'])) {
        // Memanggil file model yang diperlukan
        include("../model/TabelPasien.class.php");

        // Membuat objek TabelPasien untuk memproses data
        $prosesPasien = new TabelPasien();

        // Mendapatkan data yang dikirimkan melalui formulir
        $edit_id = $_POST['edit_id'];
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $telepon = $_POST['telepon'];

        // Memanggil fungsi untuk menyimpan perubahan data pasien
        $result = $prosesPasien->updateDataPasien($edit_id, $nik, $nama, $tempat_lahir, $tanggal_lahir, $gender, $email, $telepon);

        // Memeriksa apakah data berhasil diperbarui
      
    }
}
header("Location: ../index.php");
exit; // Pastikan script berhenti setelah redirect
?>
