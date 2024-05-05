<?php

/******************************************
Asisten Pemrogaman 13
 ******************************************/
require_once 'DB.class.php';

$db = new DB('localhost', 'root', '', 'mvp_php');
class TabelPasien extends DB
{
    function getPasien()
    {
        // Query mysql select data pasien
        $query = "SELECT * FROM pasien";
        // Mengeksekusi query
        return $this->execute($query);
    }

    function deletePasien($id)
    {
        // Query mysql delete data pasien
        $query = "DELETE FROM pasien WHERE id = $id";
        // Mengeksekusi query
        return $this->execute($query);
    }

    function getDataById($id)
{
    // Query mysql select data pasien by ID
    $query = "SELECT * FROM pasien WHERE id = $id";
    // Mengeksekusi query
    $result = $this->execute($query);

    // Memeriksa apakah ada hasil yang ditemukan
    if ($result && mysqli_num_rows($result) > 0) {
        // Mengambil baris data sebagai array asosiatif
        return mysqli_fetch_assoc($result);
    } else {
        // Jika tidak ada data yang ditemukan, kembalikan null
        return null;
    }
}

    function simpanDataPasien( $nik,$nama, $tempat_lahir, $tanggal_lahir, $gender, $email, $telepon)
    {

            $query = "INSERT INTO pasien (nik, nama, tempat, tl, gender, email, telp) VALUES ('$nik', '$nama', '$tempat_lahir', '$tanggal_lahir', '$gender', '$email', '$telepon')";
           return $this->execute($query);


    }

	function updateDataPasien($id, $nik, $nama, $tempat_lahir, $tanggal_lahir, $gender, $email, $telepon)
    {
        // Query mysql update data pasien
        $query = "UPDATE pasien SET nik='$nik', nama='$nama', tempat='$tempat_lahir', tl='$tanggal_lahir', gender='$gender', email='$email', telp='$telepon' WHERE id=$id";
        // Mengeksekusi query
        return $this->execute($query);
    }
}


