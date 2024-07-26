<?php
require_once("bwatkonek.php");

$id = $_GET['id'];

$query = "DELETE FROM order_items WHERE order_item_id=$id";
mysqli_query($mysqli, $query);

header("Location: list_item_order.php");
?>
