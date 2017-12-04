<?php include_once "db_connection.php" ?>
<?php		
		
		$invoice = $_POST['invoiceid'];
		$mobile = $_POST['mobile'];
		$exp_starting = $_POST['expiryS'];
		$exp_ending = $_POST['expiryE'];
		$purchase_price = $_POST['purchaseP'];	
		$sale_price = $_POST['saleP'];
		$imei = $_POST['imeiNo'];
		  
		       
		   

		//count function count the length of the array
		$length = count($mobile);
				
		//insert query
		
        for($i=0; $i< $length; $i++)
		{
		$query = "INSERT INTO shop_management_system VALUES(null,'$invoice','$mobile[$i]','$exp_starting[$i]','$exp_ending[$i]','$purchase_price[$i]','$sale_price[$i]','$imei[$i]')";
		$result = mysqli_query($con,$query);
		}
		if(!$result)
			{
				echo "<br>";
				echo "something wrong!";	
			}else{echo "data inserted";}
		
    		
?>
