<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>
    <!-- NavBar -->
    <nav class="navbar navbar-light bg-light justify-content-between">
        <a class="navbar-brand">JustStore</a>
        <form class="form-inline">
            <input class="form-control searchbar" type="search" placeholder="Search" aria-label="Search">
        </form>
        <div class="float-right">
            <button class="btn btn-outline-success" type="submit">Login</button>
            <button class="btn btn-outline-success" type="submit">Register</button>
        </div>
    </nav>

    <!-- Image  -->
    <div id="carouselExampleControls" class="carousel slide mr-lg-5 ml-lg-5  mb-lg-5"  data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active justify-content-center">
                <img class="rounded mx-auto d-block w-100" src="assets/images/Alphard.jpg" alt="First slide">
            </div>
                <div class="carousel-item justify-content-center">
                <img class="rounded mx-auto d-block w-100" src="assets/images/Alphard.jpg" alt="Second slide">
            </div>
                <div class="carousel-item justify-content-center">
                <img class="rounded mx-auto d-block w-100" src="assets/images/Alphard.jpg" alt="Third slide">
            </div>
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
</body>
</html>