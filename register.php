<?php
    include('session.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

</head>

<body>
    <!-- NavBar -->
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand">JustStore</a>
        <form class="form-inline">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
        </form>
        <div>
            <button class="btn btn-outline-primary " type="submit"><a href="login.php">Login</a></button>
            <button class="btn btn-outline-primary " type="submit"><a href="register.php">Register</a></button>
        </div>
    </nav>

    <!-- Title -->
    <div class="d-flex justify-content-center mt-lg-5 text-primary">
        <h2>JustStore</h2>
    </div>

    <!-- Register Form  -->
    <div class="mx-auto mt-lg-3 mb-lg-5 shadow p-3 mb-5 bg-white rounded" style="width: 800px;">
        <div class="card-header bg-light">
            <h3>Register</h3>
            <h8>Already have JustStore account? <a href="login.php">Login</a></h8>
        </div>
        <div class="card-body">
            <form id="registration" name="registration" method="POST" action="registerAction.php" enctype="multipart/form-data">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="username">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="username" id="username" placeholder="e.g. John Doe">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="Gender">Gender  </label>
                    <div class="col-sm-10">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="Male">
                            <label class="form-check-label" for="gender">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="Female">
                            <label class="form-check-label" for="gender">Female</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="address">Address </label>
                    <textarea class="form-control mr-3 ml-3" name="address" id="address" cols="8" rows="4" placeholder="Address"></textarea>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="phone">Phone </label>
                    <div class="col-sm-10">
                       <input type="numeric" class="form-control" name="phone" id="phone" placeholder="e.g. 085716343xxx">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="email">Email </label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" id="email" placeholder="example@gmail.com">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="password">Password </label>
                    <div class="col-sm-10">
                       <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="repassword">Re-Password </label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="repassword" id="repassword" placeholder="Confirm Password">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="avatar">Profile Picture </label>
                    <div class="col-sm-10">
                       <input type="file" class="form-control" name="avatar" id="avatar" placeholder="No file chosen">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary  btn-block">Register</button>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#registration').validate({
                rules: {
                    username : {
                        required: true,
                        minlength: 3
                    },
                    gender : {
                        required: true,
                    },
                    address : {
                        required: true,
                        minlength: 10
                    },
                    phone : {
                        required: true,
                        number: true,
                        minlength: 10
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password : {
                        required: true,
                        minlength: 6
                    },
                    repassword : {
                        required : true,
                        minlength: 6,
                        equalTo: "#password"
                    }
                },
                messages : {
                    username: {
                        minlength: "Name should be at least 3 characters"
                    },
                    gender: {
                        minlength: "gender should be at least 3 characters"
                    },
                    address: {
                        minlength: "address should be at least 3 characters"
                    },
                    phone: {
                        required: "Please enter your phone",
                        number: "Please enter your age as a numerical value",
                        min: "it must be 10 numeric vales"
                    },
                    email: {
                        email: "The email should be in the format: abc@domain.tld"
                    },
                    password: {
                        minlength: "password should be at least 3 characters"
                    }
                }
            });
        });
    </script>
</body>

</html>