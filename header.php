<!-- NavBar -->
<nav class="navbar navbar-expand-xl  bg-dark">
	<a href="#" class="navbar-brand">JustStore</b></a>
	<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
		<span class="navbar-toggler-icon"></span>
	</button>
	<!-- Collection of nav links, forms, and other content for toggling -->
	<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
		<form class="navbar-form form-inline">
			<div class="input-group search-box">
				<input type="text" id="search" class="form-control" placeholder="Search here...">
				<span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
			</div>
		</form>
		<div class="navbar-nav ml-auto">
			<div class="nav-item dropdown">
                <?php  if(!$_SESSION['email']) {?>
                    <button class="btn btn-outline-primary " type="submit"><a href="login.php">Login</a></button>
                    <button class="btn btn-outline-primary " type="submit"><a href="register.php">Register</a></button>
                <?php } else { ?>
                        <?php

                        $email = $_SESSION['email'];
                        include('db.php');
                        $result = mysqli_query($conn, "SELECT * FROM user  WHERE email = '$email'");
                            if(mysqli_num_rows($result) > 0) {
                                $data = mysqli_fetch_array($result);
                        ?>
                        <a href="#" data-toggle="dropdown" class="nav-item nav-link dropdown-toggle user-action"><img src="<?php echo $data['profilePicture'];?>" class="avatar" alt="Avatar">
                        <?php echo $data['name'];?><b class="caret"></b></a>
                    <?php
                        if ($data['role'] == "User") {
                    ?>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item"><i class="fa fa-user-o"></i> Shopping History</a>
                        <a href="profile.php?id=<?php echo $data['id']; ?>" class="dropdown-item"><i class="fa fa-calendar-o"></i> My Profile</a>
                        <a href="logoutAction.php" class="dropdown-item"><i class="fa fa-sliders"></i> Logout</a>
                    </div>
                    <?php
                        }
                    ?>
                    <?php
                        if ($data['role'] == "Admin") {
                    ?>
                    <div class="dropdown-menu">
                        <a href="staffAdmin.php" class="dropdown-item">Manage Staff/Admin</a>
                        <a href="slider.php" class="dropdown-item">Manage Slider</a>
                        <div class="divider dropdown-divider"></div>
                        <a href="courier.php" class="dropdown-item">Manage Courier</a>
                        <a href="category.php" class="dropdown-item">Manage Categories</a>
                        <a href="product.php" class="dropdown-item">Manage Products</a>
                        <a href="logoutAction.php" class="dropdown-item"><i class="fa fa-sliders"></i> Logout</a>
                    </div>
                    <?php
                        }
                    ?>
                    <?php
                        if ($data['role'] == "Staff") {
                    ?>
                    <div class="dropdown-menu">
                        <a href="courier.php" class="dropdown-item"><i class="fa fa-user-o"></i> Manage Courier</a>
                        <a href="category.php" class="dropdown-item"><i class="fa fa-calendar-o"></i>Manage Categories</a>
                        <a href="product.php" class="dropdown-item"><i class="fa fa-calendar-o"></i>Manage Products</a>
                        <a href="logoutAction.php" class="dropdown-item"><i class="fa fa-sliders"></i> Logout</a>
                    </div>
                    <?php
                        }
                    ?>
                <?php
                            }
                     }
                ?>
			</div>
		</div>
	</div>
</nav>