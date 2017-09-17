<?php
$menu_index = 0;
$page_title = 'Phone orders';
require('partials/header.php');
require('partials/navigation.php');
require('functions.php');

$isValidCustomerEmail = true;
$isValidProductId = true;
$productIsSaved = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customerEmail = $_POST['customerEmail'];
    $productId = $_POST['productId'];

    $isValidCustomerEmail = isValidPhoneName($customerEmail);
    $isValidProductId = isValidProductId($productId);
    if ($isValidCustomerEmail && $isValidProductId) {
        require('mysql.php');
        $stmt = $conn->prepare('INSERT INTO orders (customer_email, product_id) VALUES (?, ?)');
        $stmt->bind_param('ss', $customerEmail, $productId);
        $stmt->execute();
        $stmt->close();
        $productIsSaved = true;
    }
}

?>
    <div class="page-header">
        <h1>Place order</h1>
    </div>

<?php if (!$isValidCustomerEmail) { ?>
    <div class="alert alert-danger" role="alert">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span class="sr-only">Error:</span>
        Customer email is not valid
    </div>
<?php } ?>

<?php if (!$isValidProductId) { ?>
    <div class="alert alert-danger" role="alert">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span class="sr-only">Error:</span>
        Product id is not valid
    </div>
<?php } ?>
<?php if ($productIsSaved) { ?>
    <div class="alert alert-success" role="alert">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span class="sr-only">Success!:</span>
        New order has been saved
    </div>
<?php } ?>


    <form class="form-horizontal" method="post" action="/">
        <div class="form-group">
            <label for="inputEmail" class="col-sm-2 control-label">Customer email</label>
            <div class="col-sm-6">
                <input type="email" name="customerEmail" class="form-control" id="inputEmail"
                       placeholder="Customer email" value="<?= $_POST['customerEmail'] ?>" required/>
            </div>
        </div>

        <div class="form-group">
            <label for="products" class="col-sm-2 control-label">Select product:</label>
            <div class="col-sm-6">
                <select class="form-control" name="productId" id="products" required>
                    <?php foreach (getProducts() as $product) { ?>
                        <option value="<?= $product['id']; ?>"><?= $product['title'] ?> - <?= $product['price'] ?> EUR
                        </option>
                    <? } ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Save</button>
            </div>
        </div>
    </form>


<?php require('partials/footer.php'); ?>