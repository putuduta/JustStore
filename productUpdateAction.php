<?php
    include('session.php');

    include('db.php');

    $id = $_POST['id'];
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

    $query = "UPDATE product
              SET `name` = '$name', `description` = '$description', price = '$price', stock = '$stock', category = '$category', `image` = '$storeTo'
              WHERE id = $id";

    $result = mysqli_query($conn, $query);

    if ($result) {
        header('location:product.php');
    }
    else echo mysqli_error($conn);
?>