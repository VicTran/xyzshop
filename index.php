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
        include_once "shared_html/_header.php";
        ?>
        <div class="container-fluid">
            <div id="slider" class="row">
                <img id="background-image" src="resources/img/background.jpg">
            </div>
            <div id="products">
                <div class="row">
                    <?php
                    if (!empty($_GET['category'])) {
                        $select_product_list_url = "http://localhost/xyzshop/services/select_product_list.php?username=" . $username . "&password=" . $password . "&category=" . $_GET['category'];
                    } else {
                        $select_product_list_url = "http://localhost/xyzshop/services/select_product_list.php?username=" . $username . "&password=" . $password;
                    }
                    if (!empty($_GET['search'])) {
                        $searched_name = $_GET['search'];
                        $select_product_list_url = "http://localhost/xyzshop/services/select_product_list.php?username=" . $username . "&password=" . $password . "&searched_name=" . $searched_name;
                    }
                    $listProducts = consume($select_product_list_url);

                    $count = 0;
                    if (!empty($listProducts)) {
                        foreach ($listProducts as $item) {
                            $count++;
                            echo '<a href="product.php?id=' . $item['productID'] . '"><div class="col-md-2"><img src="' . $item['imagelink'] . '" alt="???" class="img-responsive img-thumbnail"/><center><p>' . $item['name'] . '</p></center><p class="price">$ ' . $item['price'] . '</p></div></a>';
                        }
                    } else {
                        echo "<center><p>No result found</p></center>";
                    }
                    ?>
                </div>
            </div>
        </div>

    </body>

</html>

