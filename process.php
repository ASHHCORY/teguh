<?php
include('testdb.php');

if (isset($_POST['add_staff'])) 
{
    $sid = $_POST["staff_id"];
    $sname = $_POST['staff_name'];
    $sphoneno = $_POST['staff_phone'];
    $semail = $_POST['staff_email'];
    $query = oci_parse($dbconn, "INSERT INTO STAFF(staff_id, staff_name, staff_phone, staff_email) values ('$sid','$sname', '$sphoneno', '$semail')");
    $result = oci_execute($query);
    if ($result) {
        echo "Data added Successfully !";
        header('location: staff.php');
        exit();
    } else {
        echo "Error !";
        exit();
    }
}

if (isset($_POST['add_customer'])) 
{
    $cid = $_POST["customer_id"];
    $cname = $_POST['cutomer_name'];
    $cphoneno = $_POST['customer_phone'];
    $cemail = $_POST['customer_email'];
    $query = oci_parse($dbconn, "INSERT INTO CUSTOMER(customer_id, cutomer_name, customer_phone, customer_email) values ('$cid','$cname', '$cphoneno', '$cemail')");
    $result = oci_execute($query);
    if ($result) {
        echo "Data added Successfully !";
        header('location: customer.php');
        exit();
    } else {
        echo "Error !";
        exit();
    }
}

if (isset($_POST['add_product'])) 
{
    $icode = $_POST["item_code"];
    $iname = $_POST['item_name'];
    $iquantity = $_POST['item_quantity'];
    $iprice = $_POST['item_price'];
    $query = oci_parse($dbconn, "INSERT INTO ITEM(item_code, item_name, item_quantity, item_price) values ('$icode','$iname', '$iquantity', '$iprice')");
    $result = oci_execute($query);
    if ($result) {
        echo "Data added Successfully !";
        header('location: product.php');
        exit();
    } else {
        echo "Error !";
        exit();
    }
}

