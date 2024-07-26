<?php
require_once("bwatkonek.php");

$id = $_GET['id'];

$query = "DELETE FROM reservations WHERE reservation_id=$id";
mysqli_query($mysqli, $query);

header("Location: list_reservasi.php");
?>
