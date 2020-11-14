<?php
    include('db.php');

    $email = $_POST['email'];
    $password = $_POST['password'];
    $rememberme = $_POST['rememberme'];

    $query = "SELECT * FROM user WHERE
              email = '$email'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['email'] = $email;
            if ($rememberme == 'true') {
                setcookie('email', $email, time()+3600);
            }
            header("location:home.php");
        } else {
            echo 'Password incorrect';
        }
    } else {
        echo 'Email tidak ditemukan';
    }
    mysqli_error($conn);
?>