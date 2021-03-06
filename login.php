<?php
    include('session.php');

    $cookieUsername = ' ';
    $cookiePassword = ' ';
    if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
        $cookieUsername = $_COOKIE['email'];
        $cookiePassword = $_COOKIE['password'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>


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

    <!-- Title -->
    <div class="d-flex justify-content-center mt-lg-5 text-primary">
        <h2>JustStore</h2>
    </div>

    <!-- Login Form  -->
    <div class="mx-auto mt-lg-3 mb-lg-5 shadow p-3 mb-5 bg-white rounded" style="width: 600px;">
        <div class="card-header bg-light">
            <h3>Login</h3>
            <h8>Don't have JustStore account? <a href="register.php">Register</a></h8>
        </div>
        <div class="card-body">
            <form id="login" name="login" method="POST" action="loginAction.php" enctype="multipart/form-data">

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="email">Email </label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" id="email" placeholder="example@gmail.com" value="<?php echo $cookieUsername ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="password">Password </label>
                    <div class="col-sm-10">

                       <input type="password" class="form-control" name="password" id="password" placeholder="Password" <?php
                            if($cookiePassword != ' ') {
                            ?> value="<?php echo $cookiePassword ?> <?php } ?>">
                    </div>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="rememberme" name="rememberme" value="true">
                    <label class="form-check-label" for="rememberme">Remember Me</label>
                </div>
                <button type="submit" class="btn btn-primary  btn-block mt-2">Login</button>
            </form>
            <h6 class="text-center mt-3"><a href="" data-toggle="modal" data-target="#forgetPassword">
                Forget Passoword ?
            </a></h6>
        </div>
    </div>

       <!-- Modal Forget Password -->
        <div class="modal fade" id="forgetPassword" tabindex="-1" role="dialog" aria-labelledby="forgetPassword" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Forget Password</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="forgetPassword.php" enctype="multipart/form-data">
                            <h6>Please enter your registration email id</h6>
                            <p>We will send a new password to your registration email</p>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="email">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="email">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary  btn-block">Reset Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <script>
        $(document).ready(function() {
            $('#login').validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password : {
                        required: true,
                        minlength: 6
                    }
                },
                messages : {
                    username: {
                        minlength: "Name should be at least 3 characters"
                    },
                    password: {
                        minlength: "password should be at least 6 characters"
                    }
                }
            });
        });
    </script>

</body>
</html>