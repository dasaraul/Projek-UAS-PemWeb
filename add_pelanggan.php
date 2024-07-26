<!-- add_pelanggan.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pelanggan</title>
    <link rel="stylesheet" type="text/css" href="cssnich/style.css"> <!-- Tautkan ke file CSS -->
</head>
<body>
    <div class="container"> <!-- Kontainer utama -->
        <h1>Tambah Pelanggan</h1> <!-- Judul halaman -->
        <form action="add_pelanggan_action.php" method="POST"> <!-- Formulir tambah pelanggan -->
            <label for="first_name">Nama Depan:</label>
            <input type="text" id="first_name" name="first_name" required> <!-- Input nama depan -->

            <label for="last_name">Nama Belakang:</label>
            <input type="text" id="last_name" name="last_name" required> <!-- Input nama belakang -->

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required> <!-- Input email -->

            <label for="phone_number">Nomor Telepon:</label>
            <input type="text" id="phone_number" name="phone_number" required> <!-- Input nomor telepon -->

            <input type="submit" value="Tambah"> <!-- Tombol kirim -->
        </form>
        <a href="list_pelanggan.php">Kembali ke Daftar Pelanggan</a> <!-- Tautan kembali -->
    </div>
</body>
</html>
