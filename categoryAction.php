<?php
    include('session.php');

    include('db.php');

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

    $query = "INSERT INTO categories (`name`, icon, updatedAt)
              VALUES ('$name', '$storeTo', '$date')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        header('location:category.php');
    }
    else echo mysqli_error($conn);
?>