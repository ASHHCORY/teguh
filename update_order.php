<?php
include_once('header.php');

if (count($_POST) > 0) {
    $itcode = $_POST['item_code'];
    $itname = $_POST['item_name'];
    $itquantity = $_POST['item_quantity'];
    $itbprice = $_POST['item_buying_price'];
    $itsprice = $_POST['item_selling_price'];
    $query = oci_parse($dbconn, "UPDATE ITEM SET ITEM_NAME = '$itname', ITEM_QUANTITY='$itquantity', ITEM_BUYING_PRICE='$itbprice', ITEM_SELLING_PRICE='$itsprice'  WHERE ITEM_CODE=$itcode");
    $result = oci_execute($query, OCI_DEFAULT);
    if ($result) {
        oci_commit($dbconn);
        echo "Data Updated Successfully !";
    } else {
        echo "Error.";
    }
}
?>
<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>
                    <span class="glyphicon glyphicon-th"></span>
                    <span>Update Staff Details</span>
                </strong>
                <div class="pull-right">
                    <a href="product.php" class="btn btn-primary">Product List</a>
                </div>
            </div>
            <?php
            $id = $_GET['id'];
            $stmt = "SELECT * FROM ITEM WHERE ITEM_CODE=$id";
            $stid = oci_parse($dbconn, $stmt);
            oci_execute($stid);
            while (($row = oci_fetch_array($stid, OCI_ASSOC)) != false) {
            ?>
                <div class="panel-body">
                    <div class="col-md-12">
                        <form method="post" action="" class="clearfix">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-th-large"></i>
                                    </span>
                                    <input type="text" class="form-control" name="item_name" value="<?php echo $row['ITEM_NAME']; ?>">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-th-large"></i>
                                    </span>
                                    <input type="number" class="form-control" name="item_quantity" value="<?php echo $row['ITEM_QUANTITY']; ?>">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-th-large"></i>
                                    </span>
                                    <input type="number" class="form-control" name="item_buying_price" value="<?php echo $row['ITEM_BUYING_PRICE']; ?>">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-th-large"></i>
                                    </span>
                                    <input type="number" class="form-control" name="item_selling_price" value="<?php echo $row['ITEM_SELLING_PRICE']; ?>">
                                </div>
                            </div>
                            <button type="submit" name="submit" value="submit" class=" btn btn-danger">Update Product Details</button>
                            <input type="hidden" name="item_code" class="txtField" value="<?php echo $row['ITEM_CODE']; ?>">
                        </form>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
</div>
</div>

<?php include_once('footer.php'); ?>