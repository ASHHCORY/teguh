<?php
include_once('header.php');

if (count($_POST) > 0) {
    $cusid = $_POST['cus_id'];
    $cusname = $_POST['cus_name'];
    $cusphone = $_POST['cus_phone'];
    $cusemail = $_POST['cus_email'];
    $query = oci_parse($dbconn, "UPDATE CUSTOMER SET CUTOMER_NAME = '$cusname', CUSTOMER_PHONE='$cusphone', CUSTOMER_EMAIL='$cusemail'  WHERE CUSTOMER_ID=$cusid");
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
                    <a href="customer.php" class="btn btn-primary">Staff List</a>
                </div>
            </div>
            <?php
            $id = $_GET['id'];
            $stmt = "SELECT * FROM CUSTOMER WHERE CUSTOMER_ID=$id";
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
                                    <input type="text" class="form-control" name="cus_name" value="<?php echo $row['CUTOMER_NAME']; ?>">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-th-large"></i>
                                    </span>
                                    <input type="text" class="form-control" name="cus_phone" value="<?php echo $row['CUSTOMER_PHONE']; ?>">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-th-large"></i>
                                    </span>
                                    <input type="text" class="form-control" name="cus_email" value="<?php echo $row['CUSTOMER_EMAIL']; ?>">
                                </div>
                            </div>
                            <button type="submit" name="submit" value="submit" class=" btn btn-danger">Update Customer Details</button>
                            <input type="hidden" name="cus_id" class="txtField" value="<?php echo $row['CUSTOMER_ID']; ?>">
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