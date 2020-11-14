<?php
    include('db.php');

    $email = $_POST['email'];
    $role = $_POST['role'];

    $query = "SELECT * FROM user WHERE
              email = '$email'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $query = "UPDATE user
                  SET `role` = '$role'
                  WHERE email = '$email'";

        $result = mysqli_query($conn, $query);

        if ($result) {
            header('location:addStaffAdmin.php');
        }
        else echo mysqli_error($conn);
    } else {
        echo 'Email tidak ditemukan';
    }
    mysqli_error($conn);
?>