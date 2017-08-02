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
    <body>
        <div class="container">

            <?php
            include_once './services/db_user.php';
            include_once './services/consume_curl.php';
            include_once './functions/cart-function.php';

            include_once './services/conn.php';
            include_once 'shared_html/_header.php';

            if (!empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['address'])) {
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $email = $_POST['email'];

                $order = array();
                $order['customer_name'] = $name;
                $order['customer_phone'] = $phone;
                $order['customer_address'] = $address;
                $order['customer_email'] = $email;
                $order['list_products'] = getCart();

                if (!empty($order['list_products'])) {
                    if ($conn) {
                        $query = "INSERT INTO `customer_order` (`orderID`, `date`, `customer_name`, `customer_phone`, `customer_address`, `customer_email`, `state`) VALUES ('', CURRENT_TIMESTAMP, '" . $order['customer_name'] . "', '" . $order['customer_phone'] . "', '" . $order['customer_address'] . "', '" . $order['customer_email'] . "', '0')";
                        $result = $conn->query($query);
                        echo "<br>";


                        foreach ($order['list_products'] as $item) {
//        var_dump($item);
                            $query = "INSERT INTO `order_product` (`orderID`, `productID`, `amount`, `size`) VALUES ((SELECT MAX(`orderID`) FROM `customer_order`), '" . $item['id'] . "', '" . $item['quantity'] . "', '" . $item['size'] . "')";
                            $result = $conn->query($query);
                        }
                        echo "<p>Successfully Ordered!</p>";
                        @mysqli_close($conn);
                    }
                } else {
                    echo "<p>Cart is empty!</p>";
                }
                destroy();
                
            } else {
                echo 'Thieu du lieu';
            }
            
            echo "<a href = \"index.php\">Continue Shopping</a>";
            ?>

        </div>
    </body>
</html>