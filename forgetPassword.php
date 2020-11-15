<?php
    include('db.php');

    $email = $_POST['email'];

    $query = "SELECT * FROM user WHERE
              email = '$email'";

    $result = mysqli_query($conn, $query);


    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $to = $email;
        $subject = "HTML email";

        function password_generate($chars)
        {
        $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($data), 0, $chars);
        }

        $id = $row['id'];
        $newpassword = password_generate(7);
        $message = "
        <html>
        <head>
        <title>JustStore</title>
        </head>
        <body>
        <h3>Hi ".$row['name']."</h3>
        <p>Here is new password: ".$newpassword." </p>
        <p>Please log in again and immeadiately change your password</p>
        <h3>Do not share your password!</h3>
        <a href='http://localhost/AMDP3-2020-2301922676/login.php'><button>Log in & change my password</button></a>
        <p>Regards, <br> JustStore Team </p>
        </body>
        </html>
        ";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <juststore@team.com>' . "\r\n";
        mail($to,$subject,$message,$headers);

        $hash = password_hash($newpassword, PASSWORD_DEFAULT);
        $query = "UPDATE user
                  SET `password` = '$hash'
                  WHERE id = '$id'";

        $result = mysqli_query($conn, $query);
        if ($result) {
            header('login.php');
        }
        else echo mysqli_error($conn);
    } else {
        echo 'Email tidak ditemukan';
    }
    mysqli_error($conn);
?>