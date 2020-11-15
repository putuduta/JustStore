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

        $result = mysqli_query($conn, "SELECT * FROM slider ORDER BY `sequence` ASC");
            if(mysqli_num_rows($result) > 0) {
    ?>

    <!-- Content  -->
    <div class="container">
        <!-- Image  -->
        <div id="carouselExampleControls" class="carousel slide mr-lg-5 ml-lg-5  mb-lg-5 mt-2"  data-ride="carousel">
            <div class="carousel-inner">
                <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result)) {
                ?>
                <div class="carousel-item
                <?php if ($i == 0) {
                    echo "active";
                }
                ?> justify-content-center">
                    <img class="rounded mx-auto d-block" width="600px" height="400px" src="<?php echo $row["image"]; ?>" alt="First slide">
                </div>
                <?php
                        $i++;
                    }
                ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <?php
                }
        ?>

        <?php
            $category = mysqli_query($conn, "SELECT * FROM categories");
                if(mysqli_num_rows($category) > 0) {
        ?>
        <div class="d-flex justify-content-md-center">
            <?php
                $i=0;
                while($row = mysqli_fetch_array($category)) {

            ?>
                <button class="btn btn-outline-primary " type="submit"><a href=""><?php echo $row['name'] ?></a></button>
            <?php
                    $i++;
                }
            ?>
        </div>
        <?php
            }
        ?>

        <?php
            $check = mysqli_query($conn, "SELECT * FROM product");
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