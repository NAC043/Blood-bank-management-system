<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['send']))
  {
    $cid=$_GET['cid'];
$name=$_POST['fullname'];
$email=$_POST['email'];
$contactno=$_POST['contactno'];
$brf=$_POST['brf'];
$message=$_POST['message'];
$sql="INSERT INTO  tblbloodrequirer(BloodDonarID,name,EmailId,ContactNumber,BloodRequirefor,Message) VALUES(:cid,:name,:email,:contactno,:brf,:message)";
$query = $dbh->prepare($sql);
$query->bindParam(':cid',$cid,PDO::PARAM_STR);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':contactno',$contactno,PDO::PARAM_STR);
$query->bindParam(':brf',$brf,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{

echo '<script>alert("Request has been sent. We will contact you shortly.")</script>';
}
else 
{
echo "<script>alert('Something went wrong. Please try again.');</script>";  
}

}
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Blood Bank Donar Management System | Blood Requerer </title>
    
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
                <li class="breadcrumb-item active" aria-current="page">Blood Needed Person</li>
            </ol>
        </div>
    </div>

    <div class="agileits-contact py-5">
        <div class="py-xl-5 py-lg-3">
            <div class="w3ls-titles text-center mb-5">
                <h3 class="title">Contact For Blood</h3>
                <span>
                    <i class="fas fa-user-md"></i>
                </span>
            </div>
            <div class="d-flex">
                <div class="col-lg-5 w3_agileits-contact-left">
                </div>
                <div class="col-lg-7 contact-right-w3l">
                    <h5 class="title-w3 text-center mb-5"><h5 class="title-w3 text-center mb-5">Fill following form for blood</h5></h5>
                    <form action="#" method="post">
                        <div class="d-flex space-d-flex">
                            <div class="form-group grid-inputs">
                                <label for="recipient-name" class="col-form-label">Your Name</label>
                                 <input type="text" class="form-control" id="name" name="fullname" placeholder="Please enter your name.">
                            </div>
                            <div class="form-group grid-inputs">
                                <label for="recipient-name" class="col-form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="contactno"  placeholder="Please enter your phone number.">
                            </div>
                        </div>
                        
                        <div class="d-flex space-d-flex">
                            <div class="form-group grid-inputs">
                                <label for="recipient-name" class="col-form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" required placeholder="Please enter your email address.">
                            </div>
                            <div class="form-group grid-inputs">
                                <label for="recipient-name" class="col-form-label">Blood Require For</label>
                                <select  class="form-control" id="phone" name="brf">
                                    <option value="">Blood Require For</option>
                                    <option value="Father">Father</option>
                                    <option value="Mother">Mother</option>
                                    <option value="Brother">Brother</option>
                                    <option value="Sister">Sister</option>
                                    <option value="Others">Others</option>
                                    </select>
                            </div>
                        </div>

                        <div class="form-group">
                             <label for="recipient-name" class="col-form-label">Message</label>
                            <textarea rows="10" cols="100" class="form-control" id="message" name="message" placeholder="Please enter your message" maxlength="999" style="resize:none"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send Message" name="send">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
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