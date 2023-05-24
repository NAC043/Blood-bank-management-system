<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit']))
{
    $fullname=$_POST['fullname'];
	$mobile=$_POST['mobileno'];
	$email=$_POST['emailid'];
	$age=$_POST['age'];
	$gender=$_POST['gender'];
	$blodgroup=$_POST['bloodgroup'];
	$address=$_POST['address'];
	$status=1;
    $password=md5($_POST['password']);
    $ret="select EmailId from tblblooddonars where EmailId=:email";
    $query= $dbh -> prepare($ret);
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
    $query-> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
	if($query -> rowCount() == 0)
	{
	$sql="INSERT INTO  tblblooddonars(FullName,MobileNumber,EmailId,Age,Gender,BloodGroup,Address,status,Password) VALUES(:fullname,:mobile,:email,:age,:gender,:blodgroup,:address,:status,:password)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':fullname',$fullname,PDO::PARAM_STR);
	$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
	$query->bindParam(':email',$email,PDO::PARAM_STR);
	$query->bindParam(':age',$age,PDO::PARAM_STR);
	$query->bindParam(':gender',$gender,PDO::PARAM_STR);
	$query->bindParam(':blodgroup',$blodgroup,PDO::PARAM_STR);
	$query->bindParam(':address',$address,PDO::PARAM_STR);
	$query->bindParam(':status',$status,PDO::PARAM_STR);
	$query->bindParam(':password',$password,PDO::PARAM_STR);
	$query->execute();
	$lastInsertId = $dbh->lastInsertId();
	if($lastInsertId)
	{
		echo "<script>alert('You have signed up Successfully');</script>";
	}
	else
	{
		echo "<script>alert('Something went wrong.Please try again');</script>";
	}
	}
	else
	{
		echo "<script>alert('Email-id already exists. Please try again');</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Blood Bank Donar Management System | About Us </title>

	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--// Meta tag Keywords -->

	<!-- Custom-Files -->
	<!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/fontawesome-all.css">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">

</head>

<body>
	<?php include('includes/header.php');?>

	<!-- banner 2 -->
	<div class="inner-banner-w3ls">
		<div class="container">

		</div>
		<!-- //banner 2 -->
	</div>
	<!-- page details -->
	<div class="breadcrumb-agile">
		<div aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="index.php">Home</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Signup</li>
			</ol>
		</div>
	</div>

	<section class="about py-5">
		<div class="container py-xl-5 py-lg-3">
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
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" id="password" required="">
                                </div>
                               
                                <button type="submit" class="btn btn-primary submit mb-4" name="submit">Register</button>
                              
                                 <p class="account-w3ls text-center pb-4" style="color:#000">
                                   Already Registered?
                                    <a href="login.php" >Signin now</a>
                                </p>
                            </form>
                        </div>
			
		</div>
	</section>

	<script>
		$(function () {
			$("#slider4").responsiveSlides({
				auto: true,
				pager: true,
				nav: true,
				speed: 1000,
				namespace: "callbacks",
				before: function () {
					$('.events').append("<li>before event fired.</li>");
				},
				after: function () {
					$('.events').append("<li>after event fired.</li>");
				}
			});
		});
	</script>
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>