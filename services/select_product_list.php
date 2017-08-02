<?php

if (isset($_GET['username']) && isset($_GET['password'])) {

    $username = $_GET['username'];
    $password = $_GET['password'];

    include_once 'conn.php';

    if ($conn) {
        if (isset($_GET['searched_name'])) {
            $query = "SELECT DISTINCT product.productID, product_image.imagelink, product_series.name, product_series.price FROM product_series JOIN product ON product_series.seriesID = product.seriesID JOIN product_image ON product_image.productID = product.productID WHERE product_series.name LIKE '%" . $_GET['searched_name'] . "%' GROUP BY product.productID";
        } else if (isset($_GET['category'])) {
            $query = "SELECT DISTINCT product.productID, product_image.imagelink, product_series.name, product_series.price FROM product_series JOIN product ON product_series.seriesID = product.seriesID JOIN product_image ON product_image.productID = product.productID JOIN series_category ON series_category.seriesID = product_series.seriesID JOIN category ON category.categoryID = series_category.categoryID WHERE category.name = \"" . $_GET['category'] . "\" GROUP BY product.productID";
        } else {
            $query = "SELECT DISTINCT product.productID, product_image.imagelink, product_series.name, product_series.price FROM product_series JOIN product ON product_series.seriesID = product.seriesID JOIN product_image ON product_image.productID = product.productID GROUP BY product.productID";
        }
        $result = $conn->query($query);

        while ($row = mysqli_fetch_assoc($result)) {
            $result_array[] = array("productID" => $row['productID'], "imagelink" => $row['imagelink'], "name" => $row['name'], "price" => $row['price']);
        }

        $json = $result_array;

        header('content-type: application/json');
        echo json_encode($json);

        mysqli_close($conn);
    }
} else {
    echo "Cannot access service!";
}

