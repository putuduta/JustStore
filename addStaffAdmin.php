<?php
    include('session.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Staff/Admin</title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
</head>

<body>
    <!-- NavBar -->
    <nav class="navbar navbar-light bg-light justify-content-between">
        <a class="navbar-brand">JustStore</a>
        <form class="form-inline">
            <input class="form-control searchbar" type="search" placeholder="Search" aria-label="Search">
        </form>
        <div class="float-right">
            <button class="btn btn-outline-primary " type="submit"><a href="login.php">Login</a></button>
            <button class="btn btn-outline-primary " type="submit"><a href="register.php">Register</a></button>
        </div>
    </nav>

    <!-- Collapse Content  -->
    <div class="mx-auto mt-lg-3 mb-lg-5 shadow p-3 mb-5 bg-white rounded" style="width: 1000px;">
        <div id="accordion">
            <div class="card">
                <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link text-dark" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    New Account
                    </button>
                </h5>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    <form id="registration" name="registration" method="POST" action="staffAdminAction.php" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="role">Role </label>
                            <div class="col-sm-10">
                                <select class="form-control" id="role" name="role">
                                    <option>Choose...</option>
                                    <option name="category" value="Admin">Admin</option>
                                    <option name="category" value="Staff">Staff</option>
                                </select>
                            </div>
                        </div>
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

                        <button type="submit" class="btn btn-primary  btn-block">Add New Account</button>
                    </form>
                </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed text-dark" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Update Role
                    </button>
                </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                    <form id="login" name="login" method="POST" action="StaffAdminUpdate.php" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="role">Role </label>
                            <div class="col-sm-10">
                                <select class="form-control" id="role" name="role">
                                    <option>Choose...</option>
                                    <option name="category" value="Admin">Admin</option>
                                    <option name="category" value="Staff">Staff</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="email">Email </label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" id="email" placeholder="example@gmail.com">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary  btn-block">Update User Role</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>