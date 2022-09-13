<?php
$productName = $_GET['product_name'];
$conn = mysqli_connect("localhost", "root", "" , "test");
$query = "SELECT productName, SUM(quantityOrdered) AS totalQuantityOrdered FROM products JOIN orderdetails 
          ON products.productCode = orderdetails.productCode 
          WHERE productName =  '$productName' 
          GROUP BY productName";
$result = mysqli_query($conn, $query);
$products = mysqli_fetch_all($result , MYSQLI_ASSOC);
?>

<form action="product-quantity-orderded.php" method="get">
    Product Name:
    <br>
    <input type="text" name="product_name">
    <input type="submit" value="submit">
</form>
<p><strong>The Total Number of Pieces Ordered of <?= $productName ?> :  <?php foreach ($products as $product){ echo $product['totalQuantityOrdered']; }?></strong></p>



