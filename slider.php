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
    <title>Slider</title>


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
        <h2>Home Slider</h2>
        <div class="float-right">
            <button type="button" class="btn btn-primary btn-block pr-lg-3 pl-lg-3" data-toggle="modal" data-target="#exampleModal">+Add</button>
        </div>
    </div>

    <!-- Modal Add -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Slider</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addSlider" name="addSlider" method="POST" action="slideAction.php" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="name">Name </label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" name="name" id="name" placeholder="Slider Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="sequence">Sequence </label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="sequence" id="sequence" placeholder="1">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="startAt" class="col-2 col-form-label">Start At </label>
                            <div class="col-10">
                                <input class="form-control" type="datetime-local"  id="startAt" name="startAt" placeholder="dd/mm/yyyy --:--">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="endAt" class="col-2 col-form-label">End At</label>
                            <div class="col-10">
                                <input class="form-control" type="datetime-local"  id="endAt" name="endAt" placeholder="dd/mm/yyyy --:--">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="hyperlink">Hyperlink </label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" name="hyperlink" id="hyperlink" cols="8" rows="4" placeholder="https://juststore.com"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="image">Image </label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="image" id="image" placeholder="No file chosen">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary  btn-block">Add Slider</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
        include('db.php');
        $result = mysqli_query($conn, "SELECT * FROM slider");
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
                        <th scope="col" class="align-left text-left">Sequence</th>
                        <th scope="col" class="align-left text-left">Name</th>
                        <th scope="col" class="align-left text-left">Image</th>
                        <th scope="col" class="align-left text-left">Hyperlink</th>
                        <th scope="col" class="align-left text-left">Start At</th>
                        <th scope="col" class="align-left text-left">End At</th>
                        <th scope="col" class="align-right text-right" colspan="2">Action</th>
                    </thead>
                    <tbody>
                        <?php
                            $i=0;
                            while($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td class="align-left text-left"><?php echo $row["sequence"]; ?></td>
                            <td class="align-left text-left"><?php echo $row["name"]; ?></td>
                            <td class="align-left text-left">
                                <img src="<?php echo $row["image"]; ?>" alt="" height=100 width=100>
                            </td>
                            <td class="align-left text-left"><?php echo $row["hyperlink"]; ?></td>
                            <td class="align-left text-left"><?php echo $row["startAt"]; ?></td>
                            <td class="align-left text-left"><?php
                                if ( $row["endAt"] != 0) {
                                    echo $row["endAt"];
                                }
                            ?></td>
                            <td class="align-right text-right">
                                <a class="btn btn-sm btn-primary text-white" data-toggle="modal" data-target="#updateModal<?php echo $row["id"]; ?>">U</a>
                                <a class="btn btn-sm  btn-warning text-white" href="sliderDelete.php?id=<?php echo $row['id']; ?>">D</a>
                            </td>

                            <!-- Modal Update -->
                            <div class="modal fade" id="updateModal<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="updateModalLabel">Edit Category</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?php
                                                include('db.php');
                                                $id = $row['id'];
                                                $resultModal = mysqli_query($conn, "SELECT * FROM slider WHERE id = '$id'");
                                                if(mysqli_num_rows($result) > 0) {
                                                    $data = mysqli_fetch_array($resultModal);
                                            ?>
                                            <form id="editSlider" name="editSlider" method="POST" action="sliderUpdate.php" enctype="multipart/form-data">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label" for="id">ID </label>
                                                    <div class="col-sm-10 mt-2">
                                                        <?php echo $data["id"]; ?>
                                                       <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $data["id"]; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label" for="name">Name </label>
                                                    <div class="col-sm-10">
                                                        <input type="name" class="form-control" name="name" id="name" placeholder="Slider Name"  value="<?php echo $data["name"]; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label" for="sequence">Sequence </label>
                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control" name="sequence" id="sequence" placeholder="1" value="<?php echo $data["sequence"]; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="startAt" class="col-2 col-form-label">Start At </label>
                                                    <div class="col-10">
                                                        <input class="form-control" type="datetime"  id="startAt" name="startAt"  value="<?php echo $data["startAt"]; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="endAt" class="col-2 col-form-label">End At</label>
                                                    <div class="col-10">
                                                        <input class="form-control" type="datetime"  id="endAt" name="endAt"
                                                        <?php
                                                            if ( $row["endAt"] != 0) {
                                                                echo "value"."=".$data["endAt"].">";
                                                            } else {
                                                                 echo "placeholder='dd/mm/yyyy --:--'>";
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label" for="hyperlink">Hyperlink </label>
                                                    <div class="col-sm-10">
                                                        <textarea type="url" class="form-control" name="hyperlink" id="hyperlink" cols="8" rows="4"><?php echo $data["hyperlink"]; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label" for="image">Image </label>
                                                    <div class="col-sm-10">
                                                        <input type="file" class="form-control" name="image" id="image" placeholder="No filechosen">
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary  btn-block">Save Changes</button>
                                            </form>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

    <script>
        $(document).ready(function() {
            $('#addSlider').validate({
                rules: {
                    sequence : {
                        required: true,
                        number: true,
                        min: 1
                    },
                    name : {
                        required: true,
                        minlength: 5
                    },
                    hyperlink : {
                        required: false,
                        url: true
                    },
                    startAt : {
                        required: true
                    },
                    endAt : {
                        required: false,
                        min: "#startAt"
                    }
                },
                messages : {
                    sequence : {
                        min: "Minimal Sequence is 1"
                    },
                    name : {
                        minlength: "Minimal name length is 5"
                    },
                    hyperlink : {
                        url: "Must be “http” / “https” / “localhost” / “127.0.0.1”"
                    },
                    endAt : {
                        min: "Must be greater than Start At"
                    }
                }
            });
        });

        $(document).ready(function() {
            $('#editSlider').validate({
                rules: {
                    sequence : {
                        required: true,
                        number: true,
                        min: 1
                    },
                    name : {
                        required: true,
                        minlength: 5
                    },
                    hyperlink : {
                        required: false,
                        url: true
                    },
                    startAt : {
                        required: true
                    },
                    endAt : {
                        required: false,
                        min: "#startAt"
                    }
                },
                messages : {
                    sequence : {
                        min: "Minimal Sequence is 1"
                    },
                    name : {
                        minlength: "Minimal name length is 5"
                    },
                    hyperlink : {
                        url: "Must be “http” / “https” / “localhost” / “127.0.0.1”"
                    },
                    startAt : {
                        dateISO: "Must be datetime"
                    },
                    endAt : {
                        min: "Must be greater than Start At"
                    }
                }
            });
        });
    </script>


</body>
</html>