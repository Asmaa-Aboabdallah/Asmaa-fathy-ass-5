<?php
$searchKeyword = $_GET['search_keyword'];
$conn = mysqli_connect("localhost", "root", "" , "test");
$query = "SELECT customerName FROM `customers` WHERE customerName LIKE '%$searchKeyword%';";
$result = mysqli_query($conn, $query);
$customers = mysqli_fetch_all($result , MYSQLI_ASSOC);

?>

<form action="search-customers.php" method="get">
    Search Keyword:
    <br>
    <input type="text" name="search_keyword">
    <input type="submit" value="submit">
</form>
<table border="1">
    <caption> <strong> Customer Names That Contain Keyword (<?= $searchKeyword ?>) : </strong> </caption>
    <thead>
        <tr>
            <th>Customer Names</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($customers as $customer){?>
            <tr>
                <td><?= $customer['customerName'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>