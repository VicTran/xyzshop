<?php

$servername = "localhost";
$database = "xyzdb";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}

