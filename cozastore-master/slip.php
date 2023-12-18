<?php
session_start();
include('header.php');

?>
<div class="container mt-3">
    <h1 class="texte-capitalize px-3 py-5 mt-3">
        invoice slips
    </h1>
    <div class="row mt-5">
        <div class="col-lg-5 my-5">
            <div class="card">
                <?php
                if (isset($_SESSION['useremail'])) {
                    $userId = $_SESSION['userId'];
                    $query = $pdo->prepare("select * from invoice where user_id =:uid");
                    $query->bindParam("uid", $userId);
                    $query->execute();
                    $row = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($row as $invoiceDetails) {
                        ?>
                        <h1 class="texte-capitalize px-3 py-3">order id:
                            <?php echo $invoiceDetails['user_id']; ?>
                        </h1>
                        <h2 class="texte-capitalize px-3 py-3">user name:
                            <?php echo $invoiceDetails['user_name']; ?>
                        </h2>
                        <h2 class="texte-capitalize px-3 py-3">total products:
                            <?php echo $invoiceDetails['total_products_count']; ?>
                        </h2>
                        <h2 class="texte-capitalize px-3 py-3">total ammount:
                            <?php echo $invoiceDetails['sum_of_total_products']; ?>
                        </h2>
                        <?php
                        date_default_timezone_set('Asia/Karachi');
                        $currentTime = time();
                        $dbTimestatus = strtotime($invoiceDetails['time']);
                        echo $dbTimestatus . "<br>";
                        echo " current time" . $currentTime;
                        $timeDifference = $currentTime - $dbTimestatus;
                        $timeDifferenceMintus = round($timeDifference / 60);
                        echo $timeDifferenceMintus;
                        ?>
                        <div class="mx-3 py-3">
                            <form action="" method="post">
                                <button type="submit" class="btn btn-primary" name="canxelOrder">cancel order</button>
                            </form>
                        </div>
                        <?php
                    }

                }
                ?>

            </div>
        </div>
    </div>
</div>

<?php
include('footer.php');

?>