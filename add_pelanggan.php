<!-- add_pelanggan.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pelanggan</title>
    <link rel="stylesheet" type="text/css" href="cssnich/style.css"> <!-- Tautkan ke file CSS -->
    <style>
        /* CSS untuk navbar */
        .navbar {
            overflow: hidden;
            background-color: #333;
        }
        .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
        /* CSS untuk container */
        .container {
            width: 50%;
            margin: 0 auto;
            background-color: #f2f2f2;
            padding: 20px;
            box-shadow: 0px 0px 10px 0px #000;
        }
        h1 {
            text-align: center;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input[type="text"],
        input[type="email"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="index.php">Beranda</a>
        <a href="list_pelanggan.php">Daftar Pelanggan</a>
        <a href="list_order.php">Daftar Order</a>
        <a href="list_reservasi.php">Daftar Reservasi</a>
        <a href="list_menu.php">Daftar Menu</a>
        <?php if (isset($_SESSION['loggedin'])): ?>
            <a href="logout.php">Keluar</a>
        <?php else: ?>
            <a href="login.php">Masuk</a>
        <?php endif; ?>
    </div>
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
