<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pasien</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        h1 {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Data Pasien</h1>
        <?php
            // Memanggil file model yang diperlukan
            include("../model/TabelPasien.class.php");

            // Membuat objek ProsesPasien untuk memproses data
            $prosesPasien = new TabelPasien();

            // Mendapatkan ID yang akan diedit
            $edit_id = $_GET['id'];

            // Mendapatkan data pasien berdasarkan ID
            $pasien = $prosesPasien->getDataById($edit_id);

            // Memeriksa apakah data ditemukan
            if ($pasien) {
                $nik = $pasien['nik'];
                $nama = $pasien['nama'];
                $tempat_lahir = $pasien['tempat'];
                $tanggal_lahir = $pasien['tl'];
                $gender = $pasien['gender'];
                $email = $pasien['email'];
                $telepon = $pasien['telp'];
        ?>
        <form action="../presenter/process_edit.php" method="post">
            <div class="form-group">
                <label for="nik">NIK:</label>
                <input type="text" class="form-control" id="nik" name="nik" value="<?php echo $nik; ?>" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" required>
            </div>
            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir:</label>
                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?php echo $tempat_lahir; ?>" required>
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir:</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $tanggal_lahir; ?>" required>
            </div>
            <div class="form-group">
                <label for="gender">Jenis Kelamin:</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="Laki-laki" <?php if($gender == "Laki-laki") echo "selected"; ?>>Laki-laki</option>
                    <option value="Perempuan" <?php if($gender == "Perempuan") echo "selected"; ?>>Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="form-group">
                <label for="telepon">Telepon:</label>
                <input type="tel" class="form-control" id="telepon" name="telepon" value="<?php echo $telepon; ?>">
            </div>
            <!-- Menambahkan input hidden untuk menyimpan ID -->
            <input type="hidden" name="edit_id" value="<?php echo $edit_id; ?>">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
        <?php
            } else {
                echo "Data pasien tidak ditemukan.";
            }
        ?>
    </div>

    <!-- Bootstrap JS and jQuery (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
