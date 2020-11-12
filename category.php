<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>


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

    <!-- Title -->
    <div class="mx-auto d-flex mt-lg-5 text-primary justify-content-between" style="width: 1000px;">
        <h2>Category</h2>
        <div class="float-right">
            <button type="submit" class="btn btn-primary btn-block pr-lg-3 pl-lg-3">Add</button>
        </div>
    </div>

    <!-- Table -->
    <div class="mx-auto mt-lg-3 mb-lg-5 shadow p-3 mb-5 bg-white rounded" style="width: 1000px;">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th scope="col" class="align-left text-left">Name</th>
                        <th scope="col" class="align-middle text-center">Icon</th>
                        <th scope="col" class="align-right text-right">Action</th>
                    </thead>
                    <tbody>
                        <!-- {{-- @foreach($institution as $institutions)
                        <tr>
                        <td class="align-middle text-center">{{ $institutions->id }}</td>
                        <td class="align-middle text-center">{{ $institutions->institution_name }}</td>
                        <td class="align-middle text-center">{{ $institutions->institution_address }}</td>
                        <td class="align-middle text-center">{{ $institutions->institution_phonenumber }}</td>
                        <td class="align-middle text-center">
                            <a class="btn btn-sm btn-block btn-primary text-white" href="/storage/img/{{ $institutions->institution_logo }}">L</a>
                        </td>
                        <td class="align-middle text-center">
                            <a class="btn btn-sm btn-block btn-warning text-white" href="{{ route('institution_show_update', $institutions->institution_name ) }}">U</a>
                        </td>
                         <td class="align-middle text-center">
                             <form method="POST" action="{{ action('InstitutionController@delete', $institutions->id) }}">
                                @csrf
                                <input type="hidden" name="_method" value='DELETE'>
                                <button type="submit" class="btn btn-sm btn-block btn-danger text-white">D</button>
                             </form>
                        </td>
                        </tr>
                        @endforeach --}} -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</body>

</html>