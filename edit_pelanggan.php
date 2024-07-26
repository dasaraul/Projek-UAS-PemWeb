<?php
session_start();
require_once("bwatkonek.php");

 = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM customers WHERE customer_id=$id");
$res = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $first_name = mysqli_real_escape_string($mysqli, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($mysqli, $_POST['last_name']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $phone_number = mysqli_real_escape_string($mysqli, $_POST['phone_number']);

    if (empty($first_name) || empty($last_name) || empty($email) || empty($phone_number)) {
        echo "<font color='red'>Semua field harus diisi.</font><br/>";
        echo "<a href='javascript:self.history.back();'>Kembali</a>";
    } else {
        $result = mysqli_query($mysqli, "UPDATE customers SET first_name='$first_name', last_name='$last_name', email='$email', phone_number='$phone_number' WHERE customer_id=$id");
        echo "<p><font color='green'>Data berhasil diupdate!</font></p>";
        echo "<a href='list_pelanggan.php'>Lihat Daftar Pelanggan</a>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Pelanggan</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css">
</head>
<body>
    <div class="container">
        <h2>Edit Pelanggan</h2>
        <form action="edit_pelanggan.php?id=<?php echo $id; ?>" method="post">
            <table border="0">
                <tr> 
                    <td>First Name</td>
                    <td><input type="text" name="first_name" value="<?php echo $res['first_name']; ?>" required></td>
                </tr>
                <tr> 
                    <td>Last Name</td>
                    <td><input type="text" name="last_name" value="<?php echo $res['last_name']; ?>" required></td>
                </tr>
                <tr> 
                    <td>Email</td>
                    <td><input type="email" name="email" value="<?php echo $res['email']; ?>" required></td>
                </tr>
                <tr> 
                    <td>Phone Number</td>
                    <td><input type="text" name="phone_number" value="<?php echo $res['phone_number']; ?>" required></td>
                </tr>
                <tr> 
                    <td></td>
                    <td><input type="submit" name="update" value="Update"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
