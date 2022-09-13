<?php
$orderNumber = $_GET['order_number'];
$conn = mysqli_connect("localhost", "root", "" , "test");
$query = "SELECT * FROM orders WHERE orderNumber = '$orderNumber';";
$result = mysqli_query($conn, $query);
$orders = mysqli_fetch_assoc($result);
?>

<form action="show-order-api.php" method="get">
    Order Number:
    <br>
    <input type="number" name="order_number">
    <input type="submit" value="submit">
</form>

<?=  json_encode($orders); ?>