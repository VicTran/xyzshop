<?php

if (isset($_GET['username']) && isset($_GET['password'])) {

    $username = $_GET['username'];
    $password = $_GET['password'];

    include_once 'conn.php';

    if ($conn) {
        $query = "SELECT name FROM category";
        $result = $conn->query($query);

        while ($row = mysqli_fetch_assoc($result)) {
            $result_array[] = array("name" => $row['name']);
        }

        $json = $result_array;

        header('content-type: application/json');
        echo json_encode($json);

        mysqli_close($conn);
    }
} else {
    echo "Cannot access service!";
}

