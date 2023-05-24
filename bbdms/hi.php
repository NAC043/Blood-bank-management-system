<?php

session_start();
error_reporting(0);
include('includes/config.php');

$jsonData = file_get_contents('php://input');

$data = json_decode($jsonData);

$name = $data->name;
$donorId = $data->id;
$response = "Received data: Name = $name, Id = $donorId";
echo $response;

$sql="INSERT INTO  certificate(donorId,FullName) VALUES(:donorId,:fullname)";
	$query = $dbh->prepare($sql);
    $query->bindParam(':donorId',$donorId,PDO::PARAM_STR);
	$query->bindParam(':fullname',$name,PDO::PARAM_STR);
	$query->execute();
	$lastInsertId = $dbh->lastInsertId();


?>