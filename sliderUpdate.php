<?php
    include('session.php');

    include('db.php');

    $id = $_POST['id'];
    $sequence = $_POST['sequence'];
    $name = $_POST['name'];
    $hyperlink = $_POST['hyperlink'];
    $startAt = $_POST['startAt'];
    $endAt = $_POST['endAt'];
    $file = $_FILES['image'];

    $unique = "false";
    $check = mysqli_query($conn, "SELECT * FROM slider");
    if(mysqli_num_rows($check) > 0) {
        $i=0;
        while($row = mysqli_fetch_array($check)) {
            if ($row['sequence'] === $sequence) {
                $unique = "true";
            }
            $i++;
        }
    }


    if ($unique == "false") {
        $fileName = $name;
        $temporaryPath = $file['tmp_name'];
        $info = new SplFileInfo($file['name']);
        $extension = pathinfo($info->getFilename(), PATHINFO_EXTENSION);

        $filePath = "assets/slider/".$fileName.".".$extension;
        $storeTo = $filePath;
        move_uploaded_file($temporaryPath, $storeTo);

        $query = "UPDATE slider
                SET `sequence` = $sequence, `name` = '$name', hyperlink = '$hyperlink', startAt = '$startAt', endAt = '$endAt', `image` = '$storeTo'
                WHERE id = $id";

        $result = mysqli_query($conn, $query);

        if ($result) {
            header('location:slider.php');
        }
        else echo mysqli_error($conn);
    } else {
        echo "Sequence must be unique";
    }
?>