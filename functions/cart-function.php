<?php

include_once './services/db_user.php';
include_once './services/consume_curl.php';
?>
<?php

session_start();

//echo "Under construction!"
function findProductByIdAndSize($id, $size) {
    $cart = $_SESSION['cart'];
    if (empty($cart)) {
        return -1;
    } else {
        $count = 0;
        foreach ($cart as $item) {
            if ($item['id'] == $id && $item['size'] == $size)
                return $count;
            $count++;
        }
        return -1;
    }
}

function addCart($id, $size, $name) {//gán 1 biến với session cart
    $cart = getCart();
    if (empty($cart)) {
        $cart = array();
        $cart[0]['id'] = $id;
        $cart[0]['name'] = $name;
        $cart[0]['size'] = $size;
        $cart[0]['quantity'] = 1;
        setCart($cart);
        return 1; // da them
    } else {
        if (findProductByIdAndSize($id, $size) == -1) {
            $product = array("id" => $id, "name" => $name, "size" => $size, "quantity" => 1);
            $cart[] = $product;
            setCart($cart);
            return 1; //da them
        } else {
            return 0; //khong them duoc
        }
    }
}

function getCart() {
    if (!empty($_SESSION['cart']))
        return $_SESSION['cart'];
}

function setCart($cart) {
    $_SESSION['cart'] = $cart;
}

function remove($index) {
    $cart = getCart();
    unset($cart [$index]);
    setCart($cart);
}

function destroy() {
    unset($_SESSION['cart']);
}
?>

