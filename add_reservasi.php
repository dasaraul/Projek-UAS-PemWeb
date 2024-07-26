<?php
require_once("bwatkonek.php");

if (isset($_POST['submit'])) {
    $reservation_date = $_POST['reservation_date'];
    $reservation_time = $_POST['reservation_time'];
    $number_of_guests = $_POST['number_of_guests'];
    $special_requests = $_POST['special_requests'];

    $query = "INSERT INTO reservations (reservation_date, reservation_time, number_of_guests, special_requests) VALUES ('$reservation_date', '$reservation_time', '$number_of_guests', '$special_requests')";
    mysqli_query($mysqli, $query);

    header("Location: list_reservasi.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Reservasi</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css">
</head>
<body>
    <div class="container">
        <h1>Tambah Reservasi</h1>
        <form method="POST" action="">
            <label for="reservation_date">Reservation Date:</label>
            <input type="date" name="reservation_date" required>
            <br>

            <label for="reservation_time">Reservation Time:</label>
            <input type="time" name="reservation_time" required>
            <br>

            <label for="number_of_guests">Number of Guests:</label>
            <input type="number" name="number_of_guests" required>
            <br>

            <label for="special_requests">Special Requests:</label>
            <textarea name="special_requests"></textarea>
            <br>

            <input type="submit" name="submit" value="Tambah">
        </form>
    </div>
</body>
</html>
