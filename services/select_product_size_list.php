<?php

if (isset($_GET['username']) && isset($_GET['password'])) {

    $username = $_GET['username'];
    $password = $_GET['password'];

    include_once 'conn.php';

    if ($conn) {
        $query = "SELECT product_instock.size, product.productID FROM product JOIN product_instock ON product.productID = product_instock.productID WHERE product_instock.instock > 0 AND product.productID =" . $_GET['productID'];
        $result = $conn->query($query);

        while ($row = mysqli_fetch_assoc($result)) {
            $result_array[] = array("size" => $row['size'], "productID" => $row["productID"]);
        }

        $json = $result_array;

        header('content-type: application/json');
        echo json_encode($json);

        mysqli_close($conn);
    }
} else {
    echo "Cannot access service!";
}

