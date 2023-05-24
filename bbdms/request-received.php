
<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['bbdmsdid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Blood Bank Donar Management System !! Request Received</title>
	
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<script type="text/javascript">
function checkpass()
{
	if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
	{
	alert('New Password and Confirm Password field does not match');
	document.changepassword.confirmpassword.focus();
	return false;
	}
	return true;
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
				<li class="breadcrumb-item active" aria-current="page">Request Received</li>
			</ol>
		</div>
	</div>

	<div class="appointment py-5">
		<div class="py-xl-5 py-lg-3">
			<div class="w3ls-titles text-center mb-5">
				<h3 class="title">Request Received</h3>
				<span>
					<i class="fas fa-user-md"></i>
				</span>
			</div>
			<div class="d-flex">
				
				<div class="contact-right-w3l appoint-form" style="width:100% !important;">
					<h5 class="title-w3 text-center mb-5">Below is the detail of Blood Requirer.</h5>
					<table border="1" class="table table-bordered">
                                    <thead>
                                         <tr>
                                         	<th>S.No</th>
                                          
                                            <th>Name</th>
                                            <th>Mobile Number</th>
                                            <th>Email</th>
                                            <th>Blood Required For</th>
                                            <th>Message</th>
                                            <th>Apply Date</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                       
                                        <tr><?php
                                          $uid=$_SESSION['bbdmsdid'];
$sql="SELECT tblbloodrequirer.BloodDonarID,tblbloodrequirer.name,tblbloodrequirer.EmailId,tblbloodrequirer.ContactNumber,tblbloodrequirer.BloodRequirefor,tblbloodrequirer.Message,tblbloodrequirer.ApplyDate,tblblooddonars.id as donid from  tblbloodrequirer join tblblooddonars on tblblooddonars.id=tblbloodrequirer.BloodDonarID where tblbloodrequirer.BloodDonarID=:uid";
$query = $dbh -> prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                            <td><?php echo htmlentities($cnt);?></td>
                                        <td><?php  echo htmlentities($row->name);?></td>
                                             <td><?php  echo htmlentities($row->ContactNumber);?></td>
                                             <td><?php  echo htmlentities($row->EmailId);?></td>
                                          <td><?php  echo htmlentities($row->BloodRequirefor);?></td>
                                          
                     
                 <td><?php  echo htmlentities($row->Message);?> 
                  </td>
                               
                                            <td>
                                              <?php  echo htmlentities($row->ApplyDate);?>  
                                            </td>
                                        </tr>
                                    <?php $cnt=$cnt+1;}} else {?>
                                        <tr>
                                            <th colspan="8" style="color:red;"> No Record found</th>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
				</div>
				<div class="clerafix"></div>
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