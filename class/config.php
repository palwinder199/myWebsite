<?php
session_start();

$con = mysqli_connect("localhost","root","","pali");
//$con = mysqli_connect("localhost","u934246200_pali","hello@hi.com","u934246200_pali");

// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
function con()
{
	
	$con = mysqli_connect("localhost","root","","pali");
	//$con = mysqli_connect("localhost","u934246200_pali","hello@hi.com","u934246200_pali");

	// Check connection
	if (mysqli_connect_errno())
	{
		return "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	return $con;
}


//date_default_timezone_set("Europe/Brussels");
date_default_timezone_set("Asia/Kolkata");
?>