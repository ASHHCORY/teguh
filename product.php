<?php include_once('header.php'); ?>

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Product Details</span>
        </strong>
      </div>
      <div class="panel-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th class="text-center" style="width: 50px;">#</th>
              <th class="text-center" style="width: 10%;"> Code </th>
              <th class="text-center" style="width: 10%;"> name </th>
              <th class="text-center" style="width: 10%;"> In-Stock </th>
              <th class="text-center" style="width: 10%;"> Buying Price </th>
              <th class="text-center" style="width: 10%;"> Selling Price </th>
              <th class="text-center" style="width: 100px;"> Actions </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 1;
            $stmt = "SELECT * FROM ITEM";
            $stid = oci_parse($dbconn, $stmt);
            oci_execute($stid);
            while (($row = oci_fetch_array($stid, OCI_ASSOC)) != false) {
            ?>
              <tr>
                <td class="text-center"> <?php echo $i ?></td>
                <td class="text-center"> <?php echo $row["ITEM_CODE"]; ?></td>
                <td class="text-center"> <?php echo $row["ITEM_NAME"]; ?></td>
                <td class="text-center"> <?php echo $row["ITEM_QUANTITY"]; ?></td>
                <td class="text-center"> <?php echo $row["ITEM_BUYING_PRICE"]; ?></td>
                <td class="text-center"> <?php echo $row["ITEM_SELLING_PRICE"]; ?></td>
                <td class="text-center">
                  <div class="btn-group">
                    <a href="update_product.php?id=<?php echo $row['ITEM_CODE'];  ?>" class="btn btn-info btn-xs" title="Edit" data-toggle="tooltip">
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