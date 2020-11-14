<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JustStore</title>

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

        <?php
            include('db.php');
            $search = $_POST['search'];
            if ($search) {
               $check = mysqli_query($conn, "SELECT * FROM product WHERE `name` LIKE '%".$search."%'");
            } else {
                $check = mysqli_query($conn, "SELECT * FROM product ");
            }
                if(mysqli_num_rows($check) > 0) {
        ?>
        <div class="row justify-content-md-center">
        <?php
            $i=0;
            while($row = mysqli_fetch_array($check)) {

        ?>
            <div class="col-2  mt-3" style="margin-right: 20px;">
                <div class="card">
                    <a href="productDetail.php?id=<?php echo $row['id']; ?>" ><img class="card-img-top" width="300px" height="150px" src="<?php echo $row['image'] ?>" alt="Card image cap"></a>
                    <div class="card-body">
                        <a href="productDetail.php?id=<?php echo $row['id']; ?>" ><h5 class="text-dark card-title"><?php echo $row['name'] ?></h5></a>
                        <p class="card-text">Rp.<?php echo $row['price'] ?></p>
                    </div>
                </div>
            </div>
        <?php
                $i++;
            }
        ?>

        </div>
        <?php
            }
        ?>

    </div>
</body>

</html>