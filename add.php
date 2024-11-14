<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css">
</head>
<body>
    <?php include 'layout/nav.php'; ?> <!-- Memuat navigasi -->

    <div class="container">
        <center>
            <h2>Tambah Data</h2>
            <!-- Form untuk menambahkan data pengguna -->
            <form action="add_action.php" method="post">
                <table width="50%" border="0">
                    <tr>
                        <td>Username</td>
                        <td><input type="text" name="username" required></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password" required></td>
                    </tr>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td><input type="text" name="namalengkap" required></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="email" name="email" required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="submit" value="Tambah"></td>
                    </tr>
                </table>
            </form>
        </center>
    </div>
</body>
</html>
