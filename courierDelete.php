<?php
    include('session.php');
    include('db.php');

    $id = $_GET['id'];
    $query = "DELETE FROM courier
              WHERE id='$id'";


    $result = mysqli_query($conn, $query);

    if ($result) {
        header('location:courier.php');
    }
    else echo mysqli_error($conn);
?>
