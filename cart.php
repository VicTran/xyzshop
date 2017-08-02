<!DOCTYPE html>
<html>
    <head>
        <title>XYZ WEAR</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="resources/css/bootstrap-material-design.min.css" rel="stylesheet"/>
        <link href="resources/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="resources/css/icon.css" rel="stylesheet"/>
        <link href="resources/css/ripples.min.css" rel="stylesheet"/>
        <link href="resources/css/roboto.css" rel="stylesheet"/>
        <link href="resources/css/sidebar.css" rel="stylesheet"/>
        <link href="resources/css/_custom.css" rel="stylesheet"/>


        <script src="resources/js/jquery-1.10.2.min.js"></script>
        <script src="resources/js/bootstrap.min.js"></script>
        <!--<script src="resources/js/jquery.dropdown.js"></script>
        <script src="resources/js/jquery.nouislider.min.js"></script>-->
        <script src="resources/js/material.min.js"></script>
        <script src="resources/js/ripples.min.js"></script>
        <script>
            $.material.init();
        </script>
    </head>
    <?php
    include_once 'services/db_user.php';
    include_once 'services/consume_curl.php';
    include_once 'shared_html/_header.php';
    include_once 'functions/cart-function.php';
//        session_start();
    ?>
    <body>
        <div class="container">
            <form class="" action="manage-cart.php" method="post">
                <table class="table table-striped table-responsive ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Size</th>
                            <th>Quantity</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <?php
                    $cart = getCart();
                    $count = 1;
                    if (!empty($cart)) {
                        foreach ($cart as $key => $item) {
                            ?>
                            <tr>
                                <td><?php echo $count ?></td>
                                <td><?php echo $item['name'] ?></td>
                                <td><?php echo $item['size'] ?></td>
                                <td><input type="number" name="quantity<?php echo $key ?>" required="" min="1" value="<?php echo $item['quantity'] ?>"  /></td>
                                <td><a href="manage-cart.php?index=<?php echo $key ?>" id="general-button" class="btn btn-danger">Remove</a></td>
                            </tr>
                            <?php
                            $count++;
                        }
                        ?>
                        <tr>
                            <td colspan="5">
                        <center>
                            <input id="general-button" type="submit" class="btn btn-success" value="Order" name="order" />
                        </center>
                        </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </form>
        </div>
    </body>
</html>
