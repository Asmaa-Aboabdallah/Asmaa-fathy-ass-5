<?php
$numOrders = $_GET['num'];
$conn = mysqli_connect("localhost", "root", "" , "test");
$query = "SELECT orderNumber, orderDate FROM orders ORDER BY orderDate DESC LIMIT $numOrders";
$result = mysqli_query($conn, $query);
$orders = mysqli_fetch_all($result , MYSQLI_ASSOC);

?>

<form action="latest-orders.php" method="get">
    <input type="number" name="num">
    <input type="submit" value="submit">
</form>
<table border="1">
    <caption> <strong>Latest <?= $numOrders ?> Orders </strong> </caption>
    <thead>
        <tr>
            <th>Order Number</th>
            <th>Order Date</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($orders as $order){?>
            <tr>
                <td><?= $order['orderNumber'] ?></td>
                <td><?= $order['orderDate'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>


