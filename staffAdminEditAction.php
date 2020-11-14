<?php
    include('session.php');

    include('db.php');

    $name = $_POST['name'];
    $gender = $_POST['description'];
    $gender = $_POST['price'];
    $address = $_POST['stock'];
    $phone = $_POST['category'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE
              email = '$email'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        if ($password == " ") {
            $query = "UPDATE user
                      SET `name` = $name, gender = $gender, `address` = $address, phone = $phone, email = $email
                      WHERE email = '$email'";

        } else {
            $query = "UPDATE user
                      SET `name` = $name, gender = $gender, `address` = $address, phone = $phone, email = $email, `password` = $password
                      WHERE email = '$email'";

        }
        $result = mysqli_query($conn, $query);

        if ($result) {
            header('location:addStaffAdmin.php');
        }
        else echo mysqli_error($conn);
    } else {
        echo 'Email tidak ditemukan';
    }
?>