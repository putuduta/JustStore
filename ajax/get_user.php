<?php

    header('Content-type: application/json');
    $first = $_POST['first_name'];
    $last = $_POST['last_name'];

    $response = new stdClass();
    $response->name = $first.' '.$last;

    echo json_encode($response);
?>