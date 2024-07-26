<!-- add_menu.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Menu</title>
    <link rel="stylesheet" type="text/css" href="cssnich/style.css"> <!-- Tautkan ke file CSS -->
</head>
<body>
    <div class="container"> <!-- Kontainer utama -->
        <h1>Tambah Menu</h1> <!-- Judul halaman -->
        <form action="add_menu_action.php" method="POST"> <!-- Formulir tambah menu -->
            <label for="item_name">Nama Item:</label>
            <input type="text" id="item_name" name="item_name" required> <!-- Input nama item -->

            <label for="description">Deskripsi:</label>
            <input type="text" id="description" name="description" required> <!-- Input deskripsi -->

            <label for="price">Harga:</label>
            <input type="text" id="price" name="price" required> <!-- Input harga -->

            <label for="category">Kategori:</label>
            <input type="text" id="category" name="category" required> <!-- Input kategori -->

            <label for="available">Tersedia:</label>
            <input type="text" id="available" name="available" required> <!-- Input ketersediaan -->

            <input type="submit" value="Tambah"> <!-- Tombol kirim -->
        </form>
        <a href="list_menu.php">Kembali ke Daftar Menu</a> <!-- Tautan kembali -->
    </div>
</body>
</html>
