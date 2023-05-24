<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['bbdmsdid'])==0) {
  header('location:logout.php');
  } 
  else{


    if (isset($_GET['id']) && !empty($_GET['id'])) {
        // if (isset($_GET['id'])) {
            $id = $_GET['id'];
            
            // Retrieve values from the database based on the provided $uid
            // $query = "SELECT donorId, FullName FROM tblbloodonars WHERE id = '$id'";
            // $result = mysqli_query($connection, $query);
        
            // if ($result && mysqli_num_rows($result) > 0) {
            //     $row = mysqli_fetch_assoc($result);
            //     $donorId = $row['donorId'];
            //     $name = $row['FullName'];
            // }
            $query = "SELECT donorId, FullName FROM tblblooddonars WHERE id = :id";
            $stmt = $dbh->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $donorId = $row['donorId'];
                $name = $row['FullName'];
            }

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
    <h2 style="text-align:center;color:rgb(18, 142, 142);">Blood Organisation of Mangalore</h2>
    <h4 style="text-align:center;">Get your certificate</h4>
    <iframe style="position:relative;left:30%;" id="mypdf" height="500px" width="600px"></iframe>
 



    <script src="https://unpkg.com/pdf-lib/dist/pdf-lib.min.js"></script>
    <script src="https://unpkg.com/@pdf-lib/fontkit/dist/fontkit.umd.min.js"></script>
    
    <script>
        const generatePDF=async(name,id)=>{
        const{PDFDocument,rgb}=PDFLib;

        const exBytes=await fetch("./blood_cert.pdf").then((res)=>{
            return res.arrayBuffer();
        });

        const exFont=await fetch("./AlexBrush-Regular.ttf").then((res)=>{
            return res.arrayBuffer();
        })

        const pdfDoc=await PDFDocument.load(exBytes);
        
        pdfDoc.registerFontkit(fontkit);
        const myFont=await pdfDoc.embedFont(exFont);

        const pages=pdfDoc.getPages();
        const firstPg=pages[0];

        firstPg.drawText(name,{
            x: 250,
            y: 280,
            size:50,
            font:myFont,
            color:rgb(0,0,0)
        })

        firstPg.drawText(id,{
            x:60,
            y:558,
            size:20,
            // font:myFont,
            color:rgb(0,0,0)
        })

        const uri=await pdfDoc.saveAsBase64({dataUri:true});
        window.open(uri);
        document.querySelector("#mypdf").src=uri;
    }
    </script>
    <script>
        var name='<?=$name?>';
        var id='<?=$donorId?>';
        console.log(name);
        generatePDF(name,id);
        // Create a JavaScript object with the data you want to send
var data = {
  name: name,
  id:id
};

// Convert the JavaScript object to JSON
var jsonData = JSON.stringify(data);

// Create an XMLHttpRequest object
var xhr = new XMLHttpRequest();

// Specify the PHP file and request method
xhr.open('POST', 'hi.php', true);

// Set the request header for sending JSON data
xhr.setRequestHeader('Content-type', 'application/json');

// Set up the callback function to handle the AJAX response
xhr.onreadystatechange = function() {
  if (xhr.readyState === 4 && xhr.status === 200) {
    // Process the response from PHP
    var response = xhr.responseText;
    console.log(response);
  }
};

// Send the AJAX request with the JSON data
xhr.send(jsonData);

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</body>

</html>
<?php }?>