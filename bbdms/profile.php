
<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['bbdmsdid']==0)) {
  header('location:logout.php');
  } else{

 if(isset($_POST['update']))
  {
    $uid=$_SESSION['bbdmsdid'];
	$donorId=$_SESSION['donorId'];
    $name=$_POST['fullname'];
    $mno=$_POST['mobileno']; 
    $emailid=$_POST['emailid'];
    $age=$_POST['age']; 
    $gender=$_POST['gender'];
    $bloodgroup=$_POST['bloodgroup']; 
    $address=$_POST['address']; 
  	$sql="update tblblooddonars set donorId=:donorId,FullName=:name,MobileNumber=:mno, Age=:age,Gender=:gender,BloodGroup=:bloodgroup,Address=:address, where id=:uid";
     $query = $dbh->prepare($sql);
	 $query->bindParam(':donorId',$donorId,PDO::PARAM_STR);
     $query->bindParam(':name',$name,PDO::PARAM_STR);
     $query->bindParam(':mno',$mno,PDO::PARAM_STR);
     $query->bindParam(':age',$age,PDO::PARAM_STR);
     $query->bindParam(':gender',$gender,PDO::PARAM_STR);
     $query->bindParam(':bloodgroup',$bloodgroup,PDO::PARAM_STR);
     $query->bindParam(':address',$address,PDO::PARAM_STR);
     $query->bindParam(':uid',$uid,PDO::PARAM_STR);
     $query->execute();
        echo '<script>alert("Profile has been updated")</script>';
  }

  ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Blood Bank Donar Management System !! Donor Profile</title>
	
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>

	<link rel="stylesheet" href="css/bootstrap.css">

	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />

	<link rel="stylesheet" href="css/fontawesome-all.css">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">

</head>

<body>
	<?php include('includes/header.php');?>

	<div class="inner-banner-w3ls">
		<div class="container">

		</div>

	</div>

	<div class="breadcrumb-agile">
		<div aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="index.php">Home</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Donor Profile</li>
			</ol>
		</div>
	</div>
	<div class="appointment py-5">
		<div class="py-xl-5 py-lg-3">
			<div class="w3ls-titles text-center mb-5">
				<h3 class="title">Donor Profile</h3>
				<span>
					<i class="fas fa-user-md"></i>
				</span>
			</div>
			<div class="d-flex">
				<div class="appoint-img">

				</div>
				<div class="contact-right-w3l appoint-form">
					<h5 class="title-w3 text-center mb-5">Your profile</h5>
					<form action="#" method="post">
						<?php
$uid=$_SESSION['bbdmsdid'];
$sql="SELECT * from  tblblooddonars where id=:uid";
$query = $dbh -> prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Donor Id</label>
							<input type="text" class="form-control" name="donorId" id="donorId" value="<?php  echo $row->donorId;?>">
						</div>
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Full Name</label>
							<input type="text" class="form-control" name="fullname" id="fullname" value="<?php  echo $row->FullName;?>">
						</div>
						<div class="form-group">
							<label for="recipient-phone" class="col-form-label">Mobile Number</label>
							<input type="text" class="form-control" name="mobileno" id="mobileno" required="true" maxlength="10" pattern="[0-9]+" value="<?php  echo $row->MobileNumber;?>">
						</div>
						<div class="form-group">
							<label for="recipient-phone" class="col-form-label">Email Id <span style="color:red; font-size:10px;">(Can't be Changed)</span></label>
							<input type="email" name="emailid" class="form-control" value="<?php  echo $row->EmailId;?>" readonly>
						</div>
						<div class="form-group">
							<label for="recipient-phone" class="col-form-label">Age</label>
							<input type="text" class="form-control" name="age" id="age" required="" value="<?php  echo $row->Age;?>">
						</div>
						<div class="form-group">
							<label for="datepicker" class="col-form-label">Gender</label>
							<select required="" class="form-control" name="gender">
								<option value="<?php  echo $row->Gender;?>"><?php  echo $row->Gender;?></option>
<option value="Male">Male</option>
<option value="Female">Female</option>
							</select>
						</div>
						<div class="form-group">
							<label for="datepicker" class="col-form-label">Blood Group</label>
							<select name="bloodgroup" class="form-control" required>
								<option value="<?php  echo $row->BloodGroup;?>"><?php  echo $row->BloodGroup;?></option>
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
							<label for="datepicker" class="col-form-label">Address</label>
							<input type="text" class="form-control" name="address" id="address" required="true" value="<?php  echo $row->Address;?>">
						</div>

						<?php $cnt=$cnt+1;}} ?>
						<input type="submit" value="Update" name="update" class="btn_apt">
					</form>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>


	<?php include('includes/footer.php');?>

	<script src="js/jquery-2.2.3.min.js"></script>

	<link rel="stylesheet" href="css/jquery-ui.css" />
	<script src="js/jquery-ui.js"></script>
	<script>
		$(function () {
			$("#datepicker,#datepicker1").datepicker();
		});
	</script>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html><?php } ?>