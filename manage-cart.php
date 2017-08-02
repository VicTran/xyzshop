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
        <?php
        include_once 'services/db_user.php';
        include_once 'services/consume_curl.php';
        include_once 'shared_html/_header.php';
        ?>

        <div class="container">

            <?php
            include_once 'functions/cart-function.php';

            if (!empty($_POST['id']) && !empty($_POST['name']) && !empty($_POST['size'])) {
                $result = addCart($_POST['id'], $_POST['size'], $_POST['name']);
                if ($result == 1) {
                    echo "<p>Item added to cart!</p>";
                } else
                    echo "<p>Item already added to cart! Please change quantity in cart!</p>";
            }
            if (isset($_GET['index'])) {
                remove($_GET['index']);
                header("location: cart.php");
            }
            if (isset($_POST['order'])) {
                $cart = getCart();
                foreach ($cart as $key => $item) {
                    if (!empty($_POST['quantity' . $key]))
                        $item['quantity'] = $_POST['quantity' . $key];
                    else {
                        $item['quantity'] = 1;
                    }
                }
                $_SESSION['cart'] = $cart;
                header("location:http://localhost/xyzshop/order-form.php");
            }
            ?>

            <a href="http://localhost/xyzshop/">Continue shopping</a> |
            <a href="http://localhost/xyzshop/cart.php">View cart</a>
        </div>
    </body>
</html>
