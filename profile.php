<?php
    session_start();
    if(!$_SESSION['email']) {
        header("location:home.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>

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
        <h2>My Profile</h2>
    </div>

    <?php
        include('db.php');

        $id = $_GET['id'];
        $result = mysqli_query($conn, "SELECT * FROM user  WHERE id = '$id'");
            if(mysqli_num_rows($result) > 0) {
                $data = mysqli_fetch_array($result);
    ?>

    <!-- Edit Form  -->
    <div class="mx-auto mt-lg-3 mb-lg-5 shadow p-3 mb-5 bg-white rounded" style="width: 800px;">
        <div class="d-flex justify-content-center">
            <img src="<?php echo $data["profilePicture"]; ?>" width="200px" height="200px" class="rounded-circle" alt="Cinque Terre" data-holder-rendered="true">
        </div>
        <div class="d-flex justify-content-center mt-2">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#changePicture">
                change
            </button>
        </div>
        <div class="divider dropdown-divider"></div>

        <!-- Modal Change Pciture -->
        <div class="modal fade" id="changePicture" tabindex="-1" role="dialog" aria-labelledby="changePicture" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Change Picture</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="pictureUpdate.php?id=<?php echo $data['id']; ?>" enctype="multipart/form-data">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="avatar">Profile Picture </label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="image" id="image" placeholder="No file chosen">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary  btn-block">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form id="editProfile" name="editProfile" method="POST" action="profileUpdate.php?id=<?php echo $data['id']; ?>" enctype="multipart/form-data">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="username">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="username" id="username" value="<?php echo $data["name"]; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="Gender">Gender  </label>
                    <div class="col-sm-10">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="Male"
                            <?php
                                if ($data['gender'] == "Male") {
                                    echo "checked=''";
                                }
                            ?>>
                            <label class="form-check-label
                            <?php
                                if ($data['gender'] == "Male") {
                                    echo "active=''";
                                }
                            ?>
                            " for="gender">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="Female"
                            <?php
                                if ($data['gender'] == "Female") {
                                    echo "checked=''";
                                }
                            ?>>
                            <label class="form-check-label
                            <?php
                                if ($data['gender'] == "Female") {
                                    echo "active";
                                }
                            ?>
                            " for="gender" >Female</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="address">Address </label>
                    <textarea class="form-control mr-3 ml-3" name="address" id="address" cols="8" rows="4" placeholder="Address"><?php echo $data["address"]; ?></textarea>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="phone">Phone </label>
                    <div class="col-sm-10">
                       <input type="numeric" class="form-control" name="phone" id="phone" value="<?php echo $data["phone"]; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="email">Email </label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" id="email" value="<?php echo $data["email"]; ?>">
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                </div>
            </form>
        </div>
        <div class="d-flex justify-content-center mt-2">
            <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#changePassword">
                change password
            </button>
        </div>

        <!-- Modal Change Password -->
        <div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="changePassword" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="passwordUpdate.php?id=<?php echo $data['id']; ?>" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="currpassword">Current Password </label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="currpassword" id="currpassword" placeholder="Current Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="newpassword">New Password </label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="New Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="repassword">Re-Password </label>
                                <div class="col-sm-10">
                                <input type="password" class="form-control" name="repassword" id="repassword" placeholder="Confirm Password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary  btn-block">Change Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    <?php
            }
    ?>
    </div>

    <script>
        $(document).ready(function() {
            $('#editProfile').validate({
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
                    }
                }
            });
        });
    </script>
</body>

</html>