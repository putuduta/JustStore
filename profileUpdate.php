<?php
    include('session.php');

    include('db.php');

    $id = $_GET['id'];
    $name = $_POST['username'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $query = "SELECT * FROM user WHERE
              id = '$id'";

    $result = mysqli_query($conn, $query);

    $query = "UPDATE user
              SET `name` = '$name', gender = '$gender', `address` = '$address', phone = '$phone', email = '$email'
              WHERE id = '$id'";

     $result = mysqli_query($conn, $query);
     if ($result) {
        header('profileUpdate.php?id='.$row['id']);
     }
     else echo mysqli_error($conn);

?>