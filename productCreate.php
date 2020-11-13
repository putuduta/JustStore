<?php
    include('session.php');
    include('db.php');

    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $category = $_POST['category'];
    $file = $_FILES['image'];

    $fileName = $name;
    $temporaryPath = $file['tmp_name'];
    $info = new SplFileInfo($file['name']);

    $extension = pathinfo($info->getFilename(), PATHINFO_EXTENSION);
    $filePath = "assets/product/".$fileName.".".$extension;
    $storeTo = $filePath;

    move_uploaded_file($temporaryPath, $storeTo);
    $query = "INSERT INTO product (`name`, `description`, price, stock , category, `image`)
              VALUES ('$name', '$description', '$price', '$stock', '$category', '$storeTo')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        header('location:product.php');
    }
    else echo mysqli_error($conn);

?>