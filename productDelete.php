<?php
    include('session.php');
    include('db.php');

    $id = $_GET['id'];
    $query = "DELETE FROM product
              WHERE id='$id'";


    $result = mysqli_query($conn, $query);

    if ($result) {
        header('location:product.php');
    }
    else echo mysqli_error($conn);
?>
