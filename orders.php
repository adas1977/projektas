<?php
$menu_index = 1;
require('partials/header.php');
require('partials/navigation.php');
require('functions.php');
?>
    <div class="page-header">
        <h1> Orders </h1>
    </div>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>Id</th>
            <th>Customer email</th>
            <th>Product title</th>
            <th>Product price</th>
        </tr>
        </thead>
        <tbody>
        <? foreach (getOrders() as $order) { ?>
            <tr>
                <td><?=$order['id']?></td>
                <td><?=$order['customer_email']?></td>
                <td><?=$order['title']?></td>
                <td><?=$order['price']?></td>
            </tr>
        <? } ?>
        </tbody>
    </table>
<?php require('partials/footer.php'); ?>