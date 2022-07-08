<?php

include('testdb.php');
$cid = $_POST["customer_id"];
$cname = $_POST["customer_name"];
$cphoneno = $_POST["customer_phone"];
$cemail = $_POST["customer_email"];

$sql = "SELECT CUSTOMER_ID FROM CUSTOMER WHERE CUSTOMER_ID='$cid'";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
if (mysqli_num_rows($result) == 1) {
    echo "<script>alert('Sorry, This ID already registered.');
        window.location='signup.html'</script>";
} else {
    $query = mysqli_query($connection, "INSERT INTO user_data (username,fullname, phoneNo, email, password, 
        confirmpassword)
        VALUES ('$username','$fullname','$phoneNo','$email', '$password', '$confirmpassword')");
    if ($query) {
        echo "<script>alert('Thank You. You have been registered.');
            window.location='index.php'</script>";
    }
}
?>
ggg

?>
<?php include_once('header.php'); ?>
<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>
                    <span class="glyphicon glyphicon-th"></span>
                    <span>Add New Product</span>
                </strong>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <form method="post" action="add_product.php" class="clearfix">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-th-large"></i>
                                </span>
                                <input type="text" class="form-control" name="product-title" placeholder="Product Title">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <select class="form-control" name="product-categorie">
                                        <option value="">Select Product Category</option>
                                        <?php foreach ($all_categories as $cat) : ?>
                                            <option value="<?php echo (int)$cat['id'] ?>">
                                                <?php echo $cat['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control" name="product-photo">
                                        <option value="">Select Product Photo</option>
                                        <?php foreach ($all_photo as $photo) : ?>
                                            <option value="<?php echo (int)$photo['id'] ?>">
                                                <?php echo $photo['file_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-shopping-cart"></i>
                                        </span>
                                        <input type="number" class="form-control" name="product-quantity" placeholder="Product Quantity">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-usd"></i>
                                        </span>
                                        <input type="number" class="form-control" name="buying-price" placeholder="Buying Price">
                                        <span class="input-group-addon">.00</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-usd"></i>
                                        </span>
                                        <input type="number" class="form-control" name="saleing-price" placeholder="Selling Price">
                                        <span class="input-group-addon">.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="add_product" class="btn btn-danger">Add product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once('layouts/footer.php'); ?>