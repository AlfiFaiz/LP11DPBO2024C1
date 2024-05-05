<?php
// TampilPasien.php

include("KontrakView.php");
include("presenter/ProsesPasien.php");

class TampilPasien implements KontrakView
{
    private $prosespasien; // presenter yang dapat berinteraksi langsung dengan view
    private $tpl;

    function __construct()
    {
        // konstruktor
        $this->prosespasien = new ProsesPasien();
    }

    function tampil()
    {
        // Handle delete action
        if (isset($_POST['delete_button'])) {
            $idToDelete = $_POST['delete_index'];
            $this->prosespasien->hapusDataPasien($idToDelete);
            // Anda mungkin ingin menambahkan pesan keberhasilan atau mengalihkan pengguna setelah penghapusan
        }
        if (isset($_POST['edit_button'])) {
            $editId = $_POST['edit_id'];
            // Redirect to edit page with editId as parameter
            header("Location: view/edit_form.php?id=$editId");
            exit; // Ensure script stops executing after redirect
        }

        // Handle create button action
        if (isset($_POST['create_button'])) {
            // Redirect to create page
            header("Location: view/create_form.php");
            exit; // Ensure script stops executing after redirect
        }

        $this->prosespasien->prosesDataPasien();
        $data = null;

        $data .= "<form action='' method='post'> 
        <button type='submit' name='create_button' class='btn btn-primary'>Create</button>
    </form><br><br>";
        // semua terkait tampilan adalah tanggung jawab view
        for ($i = 0; $i < $this->prosespasien->getSize(); $i++) {
            $no = $i + 1;
            $data .= "
			<tr>
                <td>" . $no . "</td>
                <td>" . $this->prosespasien->getNik($i) . "</td>
                <td>" . $this->prosespasien->getNama($i) . "</td>
                <td>" . $this->prosespasien->getTempat($i) . "</td>
                <td>" . $this->prosespasien->getTl($i) . "</td>
                <td>" . $this->prosespasien->getGender($i) . "</td>
                <td>" . $this->prosespasien->getEmail($i) . "</td>
                <td>" . $this->prosespasien->getTelepon($i) . "</td>
                <td>
                <form action='' method='post'> <!-- Change action to point to edit_form.php -->
                <input type='hidden' name='edit_id' value='" . $this->prosespasien->getId($i) . "'>
                <button type='submit' name='edit_button' class='btn btn-warning'>Edit</button>
            </form><br>
            <form action='' method='post'>
                <input type='hidden' name='delete_index' value='" . $this->prosespasien->getId($i) . "'>
                <button type='submit' name='delete_button' class='btn btn-danger'>Delete</button>
            </form>
                </td>
            </tr>";
        }

        // Membaca template skin.html
        $this->tpl = new Template("templates/skin.html");

        // Mengganti kode Data_Tabel dengan data yang sudah diproses
        $this->tpl->replace("DATA_TABEL", $data);

        // Menampilkan tombol Create
        $this->tpl->replace("TOMBOL_CREATE", "<form action='' method='post'><button type='submit' name='create_button'>Tambah Data Baru</button></form>");

        // Menampilkan ke layar
        $this->tpl->write();
    }
}
?>
