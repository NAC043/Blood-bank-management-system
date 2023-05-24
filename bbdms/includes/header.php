<?php session_start(); 
$_SESSION['bbdmsdid'];
?>
<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/fontawesome-all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div id="home">
        <div class="main-top py-1">
            <nav class="navbar navbar-expand-lg navbar-light fixed-navi" style="background-color: #333333;">
                <div class="container">
                    <h1>
                        <a class="navbar-brand font-weight-bold font-italic" href="index.php">
                            <!-- <span>BB</span>DMS -->
                            <span>BOM</span>
                            <i class="fas fa-syringe"></i>
                        </a>
                    </h1>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-lg-auto">
                            <li class="nav-item active mt-lg-0 mt-3">
                                <a class="nav-link" href="index.php">Home
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item mx-lg-4 my-lg-0 my-3">
                                <a class="nav-link" href="about.php">About Us</a>
                            </li>
                            <li class="nav-item mx-lg-4 my-lg-0 my-3">
                                <a class="nav-link" href="contact.php">Contact Us</a>
                            </li>
                            <li class="nav-item mx-lg-4 my-lg-0 my-3">
                                <a class="nav-link" href="donor-list.php">Donor List</a>
                            </li>
                            <li class="nav-item mx-lg-4 my-lg-0 my-3">
                                <a class="nav-link" href="search-donor.php">Search Donor</a>
                            </li>
                            <?php if (strlen($_SESSION['bbdmsdid']!=0)) {?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    My Account
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="profile.php">Profile</a>
                                    <a class="dropdown-item" href="change-password.php">Change Password</a>
                                    <a class="dropdown-item" href="request-received.php">Request Received</a>
                                    <a class="dropdown-item" href="cert.php?id=<?php echo $_SESSION['bbdmsdid']?>">Get Certificate</a>
                                    <a class="dropdown-item" href="logout.php">Logout</a>
                                </div>
                            </li>
                            <?php } ?>
                            <?php if (strlen($_SESSION['bbdmsdid']==0)) {?>
                            <li class="nav-item mx-lg-4 my-lg-0 my-3">
                                <a class="nav-link" href="admin/index.php">Admin</a>
                            </li>
                        </ul>
                        <a href="login.php" class="login-button ml-lg-5 mt-lg-0 mt-4 mb-lg-0 mb-3" >
                            <i class="fas fa-sign-in-alt mr-2"></i>Login
                        </a><?php } ?>
                    </div>
                </div>
            </nav>
        </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function() {
        $('.dropdown-toggle').dropdown();
    });
</script>

</body>
</html>
