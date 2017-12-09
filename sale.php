<?php 
	//connection
        $con = mysqli_connect('localhost','root','','msms');
		if (!$con) {
		die('Could not connect: ' . mysqli_error($con));
		}
	//php variable that get the imei value from sale_invoice.php
	$userAnswer = $_POST['imei']; 
	
	//select query 
	$sql="SELECT * FROM shop_management_system where imei='".$userAnswer."'" ;
	
	$result=mysqli_query($con, $sql);
	$row=mysqli_fetch_array($result);
	
	
  // for first row only and suppose table having data
   echo json_encode($row);  // pass array in json_encode

  
?>