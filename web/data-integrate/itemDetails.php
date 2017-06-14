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
        <div class="container">
            <div class="content-wrapper">
                <section class="content">
                    <div class="box">
                        <?php
                        if (isset($_REQUEST['site']) && !empty($_REQUEST['site']) && isset($_REQUEST['OrderId']) && !empty($_REQUEST['OrderId'])) {
                            if ($_REQUEST['site'] == 'Amazon' || $_REQUEST['site'] == 'Ebay') {
                                $site = $_REQUEST['site'];
                                $orderDetailsId = $_REQUEST['OrderId'];
                            } else {
                                echo '<h1>Invalid Parameters</h1>';
                                exit();
                            }
                            ?>
                            <div class = "box-header">
                                <div class = "row" style = "margin-top: 45px;margin-bottom: 30px;">
                                    <div class = "col-md-6">
                                        <h3 class = "box-title">Item Details</h3>
                                    </div>
                                    <div class = "col-md-6">
                                        <a class = "btn btn-primary pull-right" style = "margin-top: 15px;" href = "index.php?site=<?= $site ?>">Back To Home</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if ($site == 'Amazon') {
                                $datas = $pm->fetchResult("SELECT * FROM AmazonItemDetails where AmazonOrderDetailsId=$orderDetailsId");
                            } else {
                                $datas = $pm->fetchResult("SELECT * FROM EbayItemDetails where itemOrderDetailsId=$orderDetailsId");
                            }
                            ?>
                            <div class="box-body no-padding">
                                <?php
                                foreach ($datas as $data) {
                                    if ($site == 'Amazon') {
                                        unset($data['AmazonItemDataId']);
                                        unset($data['AmazonOrderDetailsId']);
                                    } else {
                                        unset($data['ItemDatasId']);
                                        unset($data['itemOrderDetailsId']);
                                    }
                                    ?>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><?= $data['Title']; ?></div>
                                        <div class="panel-body">
                                            <?php
                                            foreach ($data as $key => $val) {
                                                ?>
                                                <b><?= $key ?> :</b>&nbsp;&nbsp;<?php echo $val; ?><br>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <?php
                        } else {
                            echo '<h1>Invalid Parameters</h1>';
                            exit();
                        }
                        ?>

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