<!-- add_reservasi.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Reservasi</title>
    <link rel="stylesheet" type="text/css" href="cssnich/style.css"> <!-- Tautkan ke file CSS -->
</head>
<body>
    <div class="container"> <!-- Kontainer utama -->
        <h1>Tambah Reservasi</h1> <!-- Judul halaman -->
        <form action="add_reservasi_action.php" method="POST"> <!-- Formulir tambah reservasi -->
            <label for="reservation_date">Tanggal Reservasi:</label>
            <input type="text" id="reservation_date" name="reservation_date" required> <!-- Input tanggal reservasi -->

            <label for="reservation_time">Waktu Reservasi:</label>
            <input type="text" id="reservation_time" name="reservation_time" required> <!-- Input waktu reservasi -->

            <label for="number_of_guests">Jumlah Tamu:</label>
            <input type="text" id="number_of_guests" name="number_of_guests" required> <!-- Input jumlah tamu -->

            <label for="special_requests">Permintaan Khusus:</label>
            <input type="text" id="special_requests" name="special_requests" required> <!-- Input permintaan khusus -->

            <input type="submit" value="Tambah"> <!-- Tombol kirim -->
        </form>
        <a href="list_reservasi.php">Kembali ke Daftar Reservasi</a> <!-- Tautan kembali -->
    </div>
</body>
</html>
