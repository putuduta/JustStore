<?php

include('db.php');

$username = $_POST['username'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];
$file = $_FILES['avatar'];

$fileName = $file['name'];
$temporaryPath = $file['tmp_name'];

$filePath = "assets/user/".$fileName;
$storeTo = $filePath;
move_uploaded_file($temporaryPath, $storeTo);

$query = "INSERT INTO user (`name`, gender, `address`, phone, email, `password`,  profilePicture)
VALUES ('$username', '$gender', '$address', '$phone', '$email', '$password', '$storeTo')";

$result = mysqli_query($conn, $query);

if ($result) {
    header('location:login.php');
}

?>