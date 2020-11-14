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
    <title>Product</title>


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
    <div class="mx-auto d-flex mt-lg-5 text-primary justify-content-between" style="width: 1000px;">
        <h2>Product</h2>
        <div class="float-right">
            <button type="button" class="btn btn-primary btn-block pr-lg-3 pl-lg-3"><a href="productAction.php"  style="color: white;">Add</a></button>
        </div>
    </div>

    <?php
        include('db.php');
        $result = mysqli_query($conn, "SELECT * FROM product");
    ?>
    <!-- Table -->
    <?php
        if(mysqli_num_rows($result) > 0) {
    ?>
    <div class="mx-auto mt-lg-3 mb-lg-5 shadow p-3 mb-5 bg-white rounded" style="width: 1000px;">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th scope="col" class="align-left text-left">Name</th>
                        <th scope="col" class="align-left text-left">Cost</th>
                        <th scope="col" class="align-left text-left">Stock</th>
                        <th scope="col" class="align-right text-right" colspan="2">Action</th>
                    </thead>
                    <tbody>
                        <?php
                            $i=0;
                            while($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td class="align-left text-left"><?php echo $row["name"]; ?></td>
                            <td class="align-left text-left">Rp.<?php echo $row["price"]; ?></td>
                            <td class="align-left text-left"><?php echo $row["stock"]; ?></td>
                            <td class="align-right text-right">
                                <a class="btn btn-sm btn-primary text-white" href="productUpdate.php?id=<?php echo $row['id']; ?>">U</a>
                                <a class="btn btn-sm  btn-warning text-white" href="productDelete.php?id=<?php echo $row['id']; ?>">D</a>
                            </td>
                        </tr>

                        <?php
                                $i++;
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php
        }
    ?>

</body>
</html>