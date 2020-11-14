<?php
    include('session.php');

    include('db.php');

    $id = $_GET['id'];
    $name = $_POST['username'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE
              id = '$id'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        if ($password == NULL) {
            $query = "UPDATE user
                      SET `name` = '$name', gender = '$gender', `address` = '$address', phone = '$phone', email = '$email'
                      WHERE id = '$id'";

        } else {
            $query = "UPDATE user
                      SET `name` = '$name', gender = '$gender', `address` = '$address', phone = '$phone', email = '$email', `password` = '$password'
                      WHERE id = '$id'";

        }
        $result = mysqli_query($conn, $query);

        if ($result) {
            header('location:staffAdmin.php');
        }
        else echo mysqli_error($conn);
    }
?>