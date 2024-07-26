<!-- add_order.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Order</title>
    <link rel="stylesheet" type="text/css" href="cssnich/style.css"> <!-- Tautkan ke file CSS -->
</head>
<body>
    <div class="container"> <!-- Kontainer utama -->
        <h1>Tambah Order</h1> <!-- Judul halaman -->
        <form action="add_order_action.php" method="POST"> <!-- Formulir tambah order -->
            <label for="order_date">Tanggal Order:</label>
            <input type="text" id="order_date" name="order_date" required> <!-- Input tanggal order -->

            <label for="order_time">Waktu Order:</label>
            <input type="text" id="order_time" name="order_time" required> <!-- Input waktu order -->

            <label for="total_amount">Jumlah Total:</label>
            <input type="text" id="total_amount" name="total_amount" required> <!-- Input jumlah total -->

            <label for="status">Status:</label>
            <input type="text" id="status" name="status" required> <!-- Input status -->

            <input type="submit" value="Tambah"> <!-- Tombol kirim -->
        </form>
        <a href="list_order.php">Kembali ke Daftar Order</a> <!-- Tautan kembali -->
    </div>
</body>
</html>
