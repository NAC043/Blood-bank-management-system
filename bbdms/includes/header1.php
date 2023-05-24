<?php session_start(); 
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
            <nav class="navbar navbar-expand-lg navbar-light fixed-navi">
                <div class="container">
                    <h1>
                        <a class="navbar-brand font-weight-bold font-italic" href="index.php">
                            <span>BB</span>DMS
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
                            </li>
                            <div class="dropdown">
                                <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    My account
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="profile.php">Profile</a>
                                    <a class="dropdown-item" href="change-password.php">Change Password</a>
                                    <a class="dropdown-item" href="request-received.php">Request Received</a>
                                    <a class="nav-link" href="test.php?id=<?php echo $_SESSION['bbdmsdid']?>">Get Certificate</a>
                                    <a class="dropdown-item" href="logout.php">Logout</a>
                                </div>
                            </div>
                            <!-- <li class="nav-item mx-lg-4 my-lg-0 my-3">
                                <a class="nav-link" href="about.php">Get Certificate</a>
                            </li> -->
                    </div>
                </div>
            </nav>
        </div>

        <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-2">
                    <div class="modal-header text-center">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="login px-4 mx-auto mw-100">
                            <h5 class="text-center mb-4">Register Now</h5>
                            <form action="#" method="post"  name="signup" onsubmit="return checkpass();">
                                <div class="form-group">
                                    <label>Full Name</label>
                                     <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Full Name">
                                </div>
                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <input type="text" class="form-control" name="mobileno" id="mobileno" required="true" placeholder="Mobile Number" maxlength="10" pattern="[0-9]+">
                                </div>
                                
                                <div class="form-group">
                                    <label class="mb-2">Email Id</label>
                                    <input type="email" name="emailid" class="form-control" placeholder="Email Id">
                                </div>
                                <div class="form-group">
                                    <label class="mb-2">Age</label>
                                    <input type="text" class="form-control" name="age" id="age" placeholder="Age" required="">
                                </div>
                                <div class="form-group">
                                    <label class="mb-2">Gender</label>
                                    <select name="gender" class="form-control" required>
<option value="">Select</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
                                </div>
                                <div class="form-group">
                                    <label class="mb-2">Blood Group</label>
                                    <select name="bloodgroup" class="form-control" required>
<?php $sql = "SELECT * from  tblbloodgroup ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
<option value="<?php echo htmlentities($result->BloodGroup);?>"><?php echo htmlentities($result->BloodGroup);?></option>
<?php }} ?>
</select>
                                </div>
                               
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="address" id="address" required="true" placeholder="Address">
                                </div>
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea class="form-control" name="message" required> </textarea>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" id="password" required="">
                                </div>
                               
                                <button type="submit" class="btn btn-primary submit mb-4" name="submit">Register</button>
                              
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
