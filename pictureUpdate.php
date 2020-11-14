<?php

    include('db.php');

    $id = $_GET['id'];
    $file = $_FILES['image'];


    $query = "SELECT * FROM user WHERE
              id = '$id'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $fileName = $row['name'];
        $temporaryPath = $file['tmp_name'];
        $info = new SplFileInfo($file['name']);
        $extension = pathinfo($info->getFilename(), PATHINFO_EXTENSION);

        $filePath = "assets/user/".$fileName.".".$extension;
        $storeTo = $filePath;
        move_uploaded_file($temporaryPath, $storeTo);

        $query = "UPDATE user
                SET profilePicture = '$storeTo'
                WHERE id = '$id'";

        $result = mysqli_query($conn, $query);

        if ($result) {
            header('profileUpdate.php?id='.$row['id']);
        }
        else echo mysqli_error($conn);
    }


?>