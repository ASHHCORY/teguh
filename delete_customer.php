
<?php
include('testdb.php');
$id = $_GET['id'];
$query = oci_parse($dbconn, "DELETE FROM CUSTOMER WHERE CUSTOMER_ID=$id");
$result = oci_execute($query, OCI_DEFAULT);
if ($result) {
    oci_commit($dbconn); //*** Commit Transaction ***// 
    echo "Data Deleted Successfully.";
    header('location: customer.php');
} else {
    echo "Error.";
}
