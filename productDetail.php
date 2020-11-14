<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/index.css">
</head>

<body>
    <?php @include 'header.php' ?>

    <div class="container">
        <?php
            include('db.php');

            $id = $_GET['id'];
            $result = mysqli_query($conn, "SELECT * FROM product  WHERE id = '$id'");
                if(mysqli_num_rows($result) > 0) {
                    $data = mysqli_fetch_array($result);
        ?>
        <div class="row">
            <div class="col-6 mt-3">
                <img class="card-img-top" width="600px" height="400px" src="<?php echo $data['image'] ?>" alt="Card image cap">
            </div>
            <div class="col-6 mt-3">
                <h3><?php echo $data['name'] ?></h3>
                <p><?php echo $data['description'] ?></p>
                <h3>Rp.<?php echo $data['price'] ?></h3>
            </div>
        </div>
        <?php
            }
        ?>

    </div>
</body>

</html>