<?php
require_once('./config/AppManager.php');
$pm = AppManager::getPM();
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
    </head>
    <body>
        <?php
        $site = (isset($_REQUEST['site']) && !empty($_REQUEST['site'])) ? $_REQUEST['site'] : 'Amazon';
        ?>
        <div class="container">
            <div class="content-wrapper">
                <section class="content">
                    <div class="box">
                        <div class="row" style="margin-top: 45px;margin-bottom: 30px;">
                            <div class="col-md-6">
                                <h3 class="box-title">
                                    <?php
                                    if ($site == 'Amazon') {
                                        echo 'Amazon Orders';
                                    } else {
                                        echo 'Ebay Orders';
                                    }
                                    ?>

                                </h3>
                            </div>
                            <div class="col-md-6" style="margin-top: 15px;">
                                <a href="?site=<?= ($site == 'Amazon') ? 'Ebay' : 'Amazon' ?>" class="btn btn-primary">
                                    <?= ($site == 'Amazon') ? 'View Ebay Orders' : 'View Amazon Orders' ?>
                                </a>
                                <div class="dropdown" style="margin-top: -33px">
                                    <button class="btn btn-primary dropdown-toggle pull-right" type="button" data-toggle="dropdown">
                                        Download Orders
                                        <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right" style="margin-top: 34px;">
                                        <li><a href="amazon/downloadOrders.php">Download Amazon Orders</a></li>
                                        <li><a href="ebay/downloadOrders.php">Download Ebay Orders</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php
                        if ($site == 'Amazon') {
                            $datas = $pm->fetchResult("SELECT * FROM AmazonOrderDetails ORDER BY `AmazonOrderDatasId` DESC");
                        } else {
                            $datas = $pm->fetchResult("SELECT EbayOrderDetails.*,EbayItemDetails.site FROM EbayOrderDetails,EbayItemDetails"
                                    . " where EbayOrderDetails.EbayOrderDatasId=EbayItemDetails.itemOrderDetailsId ORDER BY EbayOrderDetails.`EbayOrderDatasId` DESC");
                        }
//                        print_r($datas);
//                        die;
                        ?>
                        <div class="box-body no-padding">
                            <table class="table table-bordered" id="orderDetails">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Order id</th>
                                        <th>payment</th>
                                        <th>site</th> 
                                        <th>Shipping Details</th>
                                        <th>Item Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($datas as $rows) {
                                        ?>
                                        <?php
                                        if ($site == 'Amazon') {
                                            ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?php echo $rows['AmazonOrderId']; ?></td>
                                                <td><?php echo $rows['PaymentMethod']; ?></td>
                                                <td><?php echo $rows['SalesChannel']; ?></td>
                                                <td>
                                                    <a class="btn btn-info" data-toggle="modal" data-target="#ShippingDetailsModal<?= $i ?>">View Shipping Details</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-primary" href="itemDetails.php?site=<?= $site ?>&OrderId=<?= $rows['AmazonOrderDatasId']; ?>">View Item Details</a>
                                                </td>
                                            </tr>
                                        <div class="modal fade" id="ShippingDetailsModal<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Shipping Details</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <b>Purchase Date :</b><?php
                                                        $pdate = explode('T', $rows['PurchaseDate']);
                                                        echo $pdate[0];
                                                        ?><br>
                                                        <b>Shipping Status :</b><?php echo $rows['OrderStatus']; ?><br>
                                                        <b>Service :</b><?php echo $rows['ShipmentServiceLevelCategory']; ?><br>
                                                        <b>Name :</b><?php echo $rows['Name']; ?><br>
                                                        <b>Address :</b><?php echo $rows['AddressLine1'] . ' ' . $rows['AddressLine2']; ?> <br>
                                                        <b>City :</b><?php echo $rows['City']; ?><br>
                                                        <b>Province :</b><?php echo $rows['StateOrRegion']; ?><br>
                                                        <b>Postal Code :</b><?php echo $rows['PostalCode']; ?><br>
                                                        <b>Country :</b><?php echo $rows['CountryCode']; ?><br>
                                                        <b>Phone :</b><?php echo $rows['Phone']; ?><br>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?php echo $rows['OrderID']; ?></td>
                                            <td><?php echo $rows['PaymentMethods']; ?></td>
                                            <td><?php echo $rows['site']; ?></td>
                                            <td>
                                                <a class="btn btn-info" data-toggle="modal" data-target="#ShippingDetailsModal<?= $i ?>">View Shipping Details</a>
                                            </td>
                                            <td>
                                                <a class="btn btn-primary" href="itemDetails.php?site=<?= $site ?>&OrderId=<?= $rows['EbayOrderDatasId']; ?>">View Item Details</a>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="ShippingDetailsModal<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Shipping Details</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <b>Purchase Date :</b><?php
                                                        $pdate = explode('T', $rows['CreatedTime']);
                                                        echo $pdate[0];
                                                        ?><br>
                                                        <b>Shipping Status :</b><?php echo $rows['OrderStatus']; ?><br>
                                                        <b>Service :</b><?php echo $rows['ShippingService']; ?><br>
                                                        <b>Name :</b><?php echo $rows['Name']; ?><br>
                                                        <b>Address :</b><?php echo $rows['Street1'] . ' ' . $rows['Street2']; ?> <br>
                                                        <b>City :</b><?php echo $rows['CityName']; ?><br>
                                                        <b>Province :</b><?php echo $rows['StateOrProvince']; ?><br>
                                                        <b>Postal Code :</b><?php echo $rows['PostalCode']; ?><br>
                                                        <b>Country :</b><?php echo $rows['CountryName']; ?><br>
                                                        <b>Phone :</b><?php echo $rows['Phone']; ?><br>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>


                                    <?php
                                    $i++;
                                }
                                ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </body>

    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#orderDetails').DataTable();
        });
    </script>
</html>