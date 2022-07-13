<?php include_once('header.php'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>
                    <span class="glyphicon glyphicon-th"></span>
                    <span>order Details</span>
                </strong>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">#</th>
                            <th class="text-center" style="width: 10%;"> Code </th>
                            <th class="text-center" style="width: 10%;"> Customer ID </th>
                            <th class="text-center" style="width: 10%;"> Staff ID </th>
                            <th class="text-center" style="width: 10%;"> Product </th>
                            <th class="text-center" style="width: 10%;"> Price </th>
                            <th class="text-center" style="width: 10%;"> Quantity </th>
                            <th class="text-center" style="width: 10%;"> Total Price </th>
                            <th class="text-center" style="width: 10%;"> Date </th>
                            <th class="text-center" style="width: 100px;"> Actions </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $stmt = "SELECT ORDERS.ORDER_ID, ORDERS.TOTAL_PAYMENT, ORDERS.ORDER_DATE, ORDERS.CUSTOMER_ID, ORDERS.STAFF_ID,
                                ORDERITEM.ORDER_ID,ORDERITEM.ORDER_QUANTITY, ORDERITEM.ORDER_PRICE,
                                ITEM.ITEM_CODE, ITEM.ITEM_NAME, ITEM.ITEM_SELLING_PRICE
                        FROM ORDERS
                        INNER JOIN ORDERITEM ON ORDERS.ORDER_ID = ORDERITEM.ORDER_ID
                        INNER JOIN ITEM ON ORDERITEM.ITEM_CODE = ITEM.ITEM_CODE";
                        $stid = oci_parse($dbconn, $stmt);
                        oci_execute($stid);
                        while (($row = oci_fetch_array($stid, OCI_ASSOC)) != false) {
                        ?>
                            <tr>
                                <td class="text-center"> <?php echo $i ?></td>
                                <td class="text-center"> <?php echo $row["ORDER_ID"]; ?></td>
                                <td class="text-center"> <?php echo $row["CUSTOMER_ID"]; ?></td>
                                <td class="text-center"> <?php echo $row["STAFF_ID"]; ?></td>
                                <td class="text-center"> <?php echo $row["ITEM_NAME"]; ?></td>
                                <td class="text-center"> <?php echo $row["ITEM_SELLING_PRICE"]; ?></td>
                                <td class="text-center"> <?php echo $row["ORDER_QUANTITY"]; ?></td>
                                <td class="text-center"> <?php echo $row["TOTAL_PAYMENT"]; ?></td>
                                <td class="text-center"> <?php echo $row["ORDER_DATE"]; ?></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="update_order.php?id=<?php echo $row['ITEM_CODE'];  ?>" class="btn btn-info btn-xs" title="Edit" data-toggle="tooltip">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                        <a href="delete_product.php?id=<?php echo $row['ITEM_CODE'];  ?>" class="btn btn-danger btn-xs" title="Delete" data-toggle="tooltip">
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