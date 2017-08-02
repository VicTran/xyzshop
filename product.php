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
        include_once './services/db_user.php';
        include_once './services/consume_curl.php';
        include_once './shared_html/_header.php';
        $searched_productID = $_GET['id'];
        $select_product_details_url = "http://localhost/xyzshop/services/select_product_details.php?username=" .
                $username . "&password=" . $password . "&productID=" . $searched_productID;
        $result = consume($select_product_details_url);
        if (!empty($result)) {
            ?>
            <div class="container">
                <div class="row" id="product-image">
                    <div class="col-md-8">
                        <div id="carousel-example" class="carousel slide carousel-fade" data-ride="carousel"> 
                            <div class="carousel-inner" role="listbox">
                                <?php
                                $select_product_images_url = "http://localhost/xyzshop/services/select_product_images.php"
                                        . "?username=" . $username . "&password=" . $password . "&productID=" . $searched_productID;
                                $resultImage = consume($select_product_images_url);
                                $i = 0;
                                foreach ($resultImage as $item) {
                                    echo '<div class="item ';
                                    if ($i == 0) {
                                        echo 'active';
                                    }
                                    echo '"><center><img src="' . $item['imagelink'] . '" alt="First slide"></center></div>';
                                    $i++;
                                }
                                ?>
                            </div>
                            <a class="left carousel-control" href="#carousel-example" role="button" data-slide="prev">
                                <span class="icon-prev" aria-hidden="true"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example" role="button" data-slide="next">
                                <span class="icon-next" aria-hidden="true"></span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <p class="name"><?php echo $result[0]['name'] ?></p>

                        <p class="price">$ <?php echo $result[0]['price'] ?></p>
                        <p>Color: <span style="border: solid black 1px; color: <?php echo $result[0]['color'] ?>; background-color: <?php echo $result[0]['color'] ?>">***</span> <?php echo $result[0]['color'] ?></p>
                        <p><?php echo $result[0]['description'] ?></p>
                        <form class="form-group" method="post" action="manage-cart.php">
                            <div>
                                <?php
                                $select_product_size_list_url = "http://localhost/xyzshop/services/select_product_size_list.php?"
                                        . "username=" . $username . "&password=" . $password .
                                        "&productID=" . $searched_productID;
                                $resultSize = consume($select_product_size_list_url);
                                ?>
                                <input type="hidden" name="id" id="id" value="<?php echo $searched_productID ?>" />
                                <input type="hidden" name="name" id="name" value="<?php echo $result[0]['name'] ?>" />
                                <select id="size" name="size" class="form-control" required="true">
                                    <option value="">Size</option>
                                    <?php
                                    foreach ($resultSize as $item) {
                                        ?>
                                        <option value="<?php echo $item['size'] ?>"><?php echo $item['size'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div>
                                <input id="general-button" type="submit" class="btn btn-primary col-md-9" value="Add to cart"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </body>

</html>

