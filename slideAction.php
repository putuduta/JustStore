<?php
    include('session.php');

    include('db.php');

    $sequence = $_POST['sequence'];
    $name = $_POST['name'];
    $hyperlink = $_POST['hyperlink'];
    $startAt = $_POST['startAt'];
    $endAt = $_POST['endAt'];
    $file = $_FILES['image'];


    $fileName = $name;
    $temporaryPath = $file['tmp_name'];
    $info = new SplFileInfo($file['name']);
    $extension = pathinfo($info->getFilename(), PATHINFO_EXTENSION);

    $filePath = "assets/slider/".$fileName.".".$extension;
    $storeTo = $filePath;
    move_uploaded_file($temporaryPath, $storeTo);

    $query = "INSERT INTO slider (`sequence`, `name`, hyperlink, startAt, endAt, `image`)
              VALUES ('$sequence', '$name', '$hyperlink', '$startAt', '$endAt', '$storeTo')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        header('location:slider.php');
    }
    else echo mysqli_error($conn);
?>