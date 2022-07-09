<?php
include_once('header.php');

if (count($_POST) > 0) {
    $staffid = $_POST['staff_id'];
    $staffname = $_POST['staff_name'];
    $staffphone = $_POST['staff_phone'];
    $staffemail = $_POST['staff_email'];
    $query = oci_parse($dbconn, "UPDATE STAFF SET STAFF_NAME = '$staffname', STAFF_EMAIL='$staffemail', STAFF_PHONE='$staffphone'  WHERE STAFF_ID=$staffid");
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
                    <a href="staff.php" class="btn btn-primary">Staff List</a>
                </div>
            </div>
            <?php
            $id = $_GET['id'];
            $stmt = "SELECT * FROM STAFF WHERE STAFF_ID=$id";
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
                                    <input type="text" class="form-control" name="staff_name" value="<?php echo $row['STAFF_NAME']; ?>">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-th-large"></i>
                                    </span>
                                    <input type="text" class="form-control" name="staff_phone" value="<?php echo $row['STAFF_PHONE']; ?>">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-th-large"></i>
                                    </span>
                                    <input type="text" class="form-control" name="staff_email" value="<?php echo $row['STAFF_EMAIL']; ?>">
                                </div>
                            </div>
                            <button type="submit" name="submit" value="submit" class=" btn btn-danger">Update Customer Details</button>
                            <input type="hidden" name="staff_id" class="txtField" value="<?php echo $row['STAFF_ID']; ?>">
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