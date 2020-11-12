<?php

    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $db = "amdp3";

    $conn = mysqli_connect($host, $dbUsername, $dbPassword, $db);

    if (!$conn) {
        die('Something wnet wrong. Cannot connect to MySQL');
    }
?>