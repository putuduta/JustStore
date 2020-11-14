<?php
    include('db.php');

    $id = $_GET['id'];;
    $currpassword = $_POST['currpassword'];
    $newpassword = password_hash($_POST['newpassword'], PASSWORD_DEFAULT);

    $query = "SELECT * FROM user WHERE
              id = '$id'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($currpassword, $row['password'])) {

            $query = "UPDATE user
                      SET `password` = '$newpassword'
                      WHERE id = '$id'";

            $result = mysqli_query($conn, $query);

            if ($result) {
                header('profileUpdate.php?id='.$row['id']);
            }
            else echo mysqli_error($conn);
        } else {
            echo 'Password incorrect';
        }
    }
    mysqli_error($conn);
?>