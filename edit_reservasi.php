<?php
require_once("bwatkonek.php");

$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $reservation_date = $_POST['reservation_date'];
    $reservation_time = $_POST['reservation_time'];
    $number_of_guests = $_POST['number_of_guests'];
    $special_requests = $_POST['special_requests'];

    $query = "UPDATE reservations SET reservation_date='$reservation_date', reservation_time='$reservation_time', number_of_guests='$number_of_guests', special_requests='$special_requests' WHERE reservation_id=$id";
    mysqli_query($mysqli, $query);

    header("Location: list_reservasi.php");
}

$result = mysqli_query($mysqli, "SELECT * FROM reservations WHERE reservation_id=$id");
$reservation = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Reservasi</title>
    <link rel="stylesheet" type="text/css" href="cssnich/cssnya.css">
</head>
<body>
    <div class="container">
        <h1>Edit Reservasi</h1>
        <form method="POST" action="">
            <label for="reservation_date">Reservation Date:</label>
            <input type="date" name="reservation_date" value="<?php echo $reservation['reservation_date']; ?>" required>
            <br>

            <label for="reservation_time">Reservation Time:</label>
            <input type="time" name="reservation_time" value="<?php echo $reservation['reservation_time']; ?>" required>
            <br>

            <label for="number_of_guests">Number of Guests:</label>
            <input type="number" name="number_of_guests" value="<?php echo $reservation['number_of_guests']; ?>" required>
            <br>

            <label for="special_requests">Special Requests:</label>
            <textarea name="special_requests"><?php echo $reservation['special_requests']; ?></textarea>
            <br>

            <input type="submit" name="submit" value="Update">
        </form>
    </div>
</body>
</html>
