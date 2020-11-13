<?php
    include('session.php');

    include('db.php');

    $id = $_POST['id'];
    $sequence = $_POST['sequence'];
    $name = $_POST['name'];
    $hyperlink = $_POST['hyperlink'];
    $startAt = $_POST['startAt'];
    $endAt = $_POST['endAt'];
    $image = $_FILES['image'];

    $fileName = $name;
    $temporaryPath = $file['tmp_name'];
    $info = new SplFileInfo($file['name']);
    $extension = pathinfo($info->getFilename(), PATHINFO_EXTENSION);

    $filePath = "assets/slider/".$fileName.".".$extension;
    $storeTo = $filePath;
    move_uploaded_file($temporaryPath, $storeTo);

    $query = "UPDATE slider
              SET `sequence` = $sequence, `name` = '$name', hyperlink = '$hyperlink', `image` = '$storeTo', startAt = '$startAt', endAt = '$endAt'
              WHERE id = $id";

    $result = mysqli_query($conn, $query);

    if ($result) {
        header('location:slider.php');
    }
    else echo mysqli_error($conn);
?>