
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>


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

    <?php
        include('db.php');

        $id = $_GET['id'];
        $result = mysqli_query($conn, "SELECT * FROM product  WHERE id = '$id'");
            if(mysqli_num_rows($result) > 0) {
                $data = mysqli_fetch_array($result);
    ?>

    <!-- Product Form  -->
    <div class="mx-auto mt-lg-3 mb-lg-5 shadow p-3 mb-5 bg-white rounded" style="width: 800px;">
        <div class="card-header bg-light">
            <h3>Product Information</h3>
        </div>
        <div class="card-body">
            <form id="editProduct" name="editProduct" method="POST" action="productUpdateAction.php" enctype="multipart/form-data">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="id">ID</label>
                    <div class="col-sm-10 mt-2">
                        <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $data["id"]; ?>">
                        <?php echo $data["id"]; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="name">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="name" value="<?php echo $data["name"]; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="description">Description</label>
                    <div class="col-sm-10 mt-2">
                        <textarea name="description" id="description"  cols="82" rows="4" ><?php echo $data["description"]; ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="price">Price </label>
                    <div class="col-sm-10">
                       <input type="numeric" class="form-control" name="price" id="price" value="<?php echo $data["price"]; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="stock">Stock </label>
                    <div class="col-sm-10">
                       <input type="number" class="form-control" name="stock" id="stock" value="<?php echo $data["stock"]; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="category">Category </label>
                    <div class="col-sm-10">
                        <select class="form-control" id="category">
                            <option selected="selected"><?php echo $data["category"]; ?></option>
                            <?php
                                include('db.php');
                                $result = mysqli_query($conn, "SELECT * FROM categories");
                                if(mysqli_num_rows($result) > 0) {
                                    $i=0;
                                    while($row = mysqli_fetch_array($result)) {
                                            if ($data["category"] != $row["name"]) {
                            ?>
                            <option value="<?php echo $row["name"]; ?>"><?php echo $row["name"]; ?></option>
                            <?php
                                             }
                                        $i++;
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label" for="image"><h4>Product Photos</h4></label>
                    <hr>
                    <input type="file" class="form-control ml-3" name="image" id="image" placeholder="No file chosen">
                </div>

                <button type="submit" class="btn btn-primary  btn-block">Edit Product</button>
            </form>
        </div>
        <?php
            }
        ?>
    </div>

    <script>
        $(document).ready(function() {
            $('#editProduct').validate({
                rules: {
                    name : {
                        required: true,
                        minlength: 3
                    },
                    price : {
                        required: true,
                        min: 10000
                    },
                    desciption: {
                        required: true,
                        minlength: 10
                    },
                    stock: {
                        required: true,
                        min: 0
                    }
                },
                messages : {
                    name: {
                        minlength: "Name should be at least 3 characters"
                    },
                    price : {
                        min: "price minimum is 10000"
                    },
                    desciption: {
                        minlength: "descprition length minimum is 0"
                    },
                    stock: {
                        min: "stock minimum is 0"
                    }
                }
            });
        });
    </script>

</body>
</html>