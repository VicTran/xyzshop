<div class="navbar navbar-fixed-top" id="header">
    <div class="header-container">
        <div class="navbar-left">
            <a href="index.php"><img src="resources/img/xyz_logo.png" class="" height="100" alt="???"/></a>
        </div>
        <div class="navbar-collapse collapse ">

            <div class="navbar-form navbar-right">
                <a class="btn btn-fab"  id="cart" href="cart.php"><img src="resources/img/cart.png"></a>
            </div>
            <form class="navbar-form navbar-right" action="index.php">
                <div class="form-group">
                    <input type="text" class="form-control col-md-8" placeholder="Search" id="search" name="search">
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <?php
                $select_category_list_url = "http://localhost/xyzshop/services/select_category_list.php?username=" . $username . "&password=" . $password;
                $listCategories = consume($select_category_list_url);
                if (isset($_GET['category'])) {
                    $activetab = $_GET['category'];
                } else {
                    $activetab = "";
                }

                foreach ($listCategories as $item) {
                    echo '<li';
                    if ($activetab === $item['name']) {
                        echo ' class = "active" ';
                    }
                    echo '><a href = "index.php?category=' . $item['name'] . '">' . $item['name'] . '</a></li>';
                }
                ?>
            </ul>
        </div>
    </div>
</div>
