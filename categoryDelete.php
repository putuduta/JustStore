<?php
    include('session.php');
    include('db.php');

    $id = $_GET['id'];
    $query = "DELETE FROM categories WHERE id='$id'";


    $result = mysqli_query($conn, $query);

    if ($result) {
        header('location:category.php');
    }
    else echo mysqli_error($conn);
?>
