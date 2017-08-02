<?php

if (isset($_GET['username']) && isset($_GET['password'])) {

    $username = $_GET['username'];
    $password = $_GET['password'];

    include_once 'conn.php';

    if ($conn) {
        $query = "SELECT product_image.imagelink FROM product_image JOIN product ON product_image.productID = product.productID WHERE product.productID =" . $_GET['productID'];
        $result = $conn->query($query);

        while ($row = mysqli_fetch_assoc($result)) {
            $result_array[] = array("imagelink" => $row['imagelink']);
        }

        $json = $result_array;

        header('content-type: application/json');
        echo json_encode($json);

        mysqli_close($conn);
    }
} else {
    echo "Cannot access service!";
}

