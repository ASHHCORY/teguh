<?php include_once('header.php'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>
                    <span class="glyphicon glyphicon-th"></span>
                    <span>Staff Details</span>
                </strong>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">#</th>
                            <th class="text-center" style="width: 10%;"> ID </th>
                            <th class="text-center" style="width: 10%;"> name </th>
                            <th class="text-center" style="width: 10%;"> Phone Number </th>
                            <th class="text-center" style="width: 10%;"> Email </th>
                            <th class="text-center" style="width: 100px;"> Actions </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $stmt = "SELECT * FROM STAFF";
                        $stid = oci_parse($dbconn, $stmt);
                        oci_execute($stid);
                        while (($row = oci_fetch_array($stid, OCI_ASSOC)) != false) {
                        ?>
                            <tr>
                                <td class="text-center"> <?php echo $i ?></td>
                                <td class="text-center"> <?php echo $row["STAFF_ID"]; ?></td>
                                <td class="text-center"> <?php echo $row["STAFF_NAME"]; ?></td>
                                <td class="text-center"> <?php echo $row["STAFF_PHONE"]; ?></td>
                                <td class="text-center"> <?php echo $row["STAFF_EMAIL"]; ?></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="update_staff.php?id=<?php echo $row['STAFF_ID']; ?>" class="btn btn-info btn-xs" title="Edit" data-toggle="tooltip">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                        <a href="delete_staff.php?id=<?php echo $row['STAFF_ID']; ?>" class="btn btn-danger btn-xs" title="Delete" data-toggle="tooltip">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php
                            $i++;
                        }
                        ?>
                    </tbody>
                    </tabel>
            </div>
        </div>
    </div>
</div>
<?php include_once('footer.php'); ?>
<?php
// if (isset($_GET['delid'])) {
//     $id = $_GET['delid'];
//     $query = oci_parse($dbconn, "DELETE FROM STAFF WHERE STAFF_ID=$id");
//     $result = oci_execute($query, OCI_DEFAULT);
//     if ($result) {
//         oci_commit($dbconn); //*** Commit Transaction ***// 
//         echo "Data Deleted Successfully.";
//     } else {
//         echo "Error.";
//     }
// }

?>