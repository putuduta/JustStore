<?php
    include('session.php');

    include('db.php');

    $id = $_POST['id'];
    $name = $_POST['name'];
    $file = $_FILES['icon'];
    $date = date("Y-m-d H:i:s");

    $fileName = $name;
    $temporaryPath = $file['tmp_name'];
    $info = new SplFileInfo($file['name']);
    $extension = pathinfo($info->getFilename(), PATHINFO_EXTENSION);

    $filePath = "assets/categories/".$fileName.".".$extension;
    $storeTo = $filePath;
    move_uploaded_file($temporaryPath, $storeTo);

    $query = "UPDATE categories
              SET `name` = '$name', icon = '$storeTo', updatedAt = '$date'
              WHERE id = $id";

    $result = mysqli_query($conn, $query);

    if ($result) {
        header('location:category.php');
    }
    else echo mysqli_error($conn);
?>