<?php

if (isset($_GET['username']) && isset($_GET['password'])) {

    $username = $_GET['username'];
    $password = $_GET['password'];


    include_once 'conn.php';

    if ($conn) {
        $query = "SELECT product_series.seriesID, product_series.name, product_series.price, product_series.description, product.productID, product.color FROM product_series JOIN product ON product_series.seriesID = product.seriesID WHERE product.productID =" . $_GET['productID'];
        $result = $conn->query($query);

        while ($row = mysqli_fetch_assoc($result)) {
            $result_array[] = array("seriesID" => $row['seriesID'], "name" => $row['name'], "price" => $row['price'], "description" => $row['description'], "productID" => $row['productID'], "color" => $row['color']);
        }

        $json = $result_array;

        header('content-type: application/json');
        echo json_encode($json);

        mysqli_close($conn);
    }
} else {
    echo "Cannot access service!";
}

