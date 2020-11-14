<?php

    include('db.php');

    $username = $_POST['username'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $file = $_FILES['avatar'];
    $role = "User";

    $fileName = $username;
    $temporaryPath = $file['tmp_name'];
    $info = new SplFileInfo($file['name']);
    $extension = pathinfo($info->getFilename(), PATHINFO_EXTENSION);

    $filePath = "assets/user/".$fileName.".".$extension;
    $storeTo = $filePath;
    move_uploaded_file($temporaryPath, $storeTo);

    $query = "INSERT INTO user (`name`, gender, `address`, phone, email, `password`,  profilePicture, `role`)
    VALUES ('$username', '$gender', '$address', '$phone', '$email', '$password', '$storeTo', '$role')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        header('location:login.php');
    }
    else echo mysqli_error($conn);
?>