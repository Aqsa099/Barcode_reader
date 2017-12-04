<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 60%;
    border-collapse: collapse;
	margin-left:300px;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: center;}
</style>
</head>
<body>
   
		<?php
		echo "<table>
					<tr>
					<th>Model</th>
					<th>Manufactured Date</th>
					<th>Expiry Date</th>
					<th>Purchase Price</th>
					<th>Sale price</th>
					<th>Imei No</th>
					</tr>";
			
			$model_array = array();
			$manufactured_array = array();
			$expiry_array = array();
			$purchase_array = array();
			$sale_array = array();
			$imei_array = array();
			
			
			$imei = intval($_GET['val']);

			$con = mysqli_connect('localhost','root','','msms');
			if (!$con) {
				die('Could not connect: ' . mysqli_error($con));
			}

			//mysqli_select_db($con,"msms");
			$sql="SELECT * FROM shop_management_system  WHERE imei= '".$imei."'";
			$result = mysqli_query($con,$sql);
			
			
			
			
			while($row = mysqli_fetch_array($result)) {
				$model                  = $row['Mobile_phone'];
				$manufactured_date      = $row['expiry_starting'];
				$expiry_date	        = $row['expiry_ending']; 
				$purchase_price         = $row['purchase_price'];
				$sale_price             = $row['sale_price']; 
				$imei_val               = $row['imei'];
				
				array_push($model_array, $model);
				array_push($manufactured_array, $manufactured_date);
				array_push($expiry_array, $expiry_date);
				array_push($purchase_array, $purchase_price);
				array_push($sale_array, $sale_price);
				array_push($imei_array, $imei_val);
				
				$length = count($model);
				for($i=0; $i<$length; $i++){
					echo $i;
				}
				echo "<tr>";
					echo "<td>" . $model    . "</td>";
					echo "<td>" . $manufactured_date  . "</td>";
					echo "<td>" . $expiry_date . "</td>";
					echo "<td>" . $purchase_price . "</td>";
					echo "<td>" . $sale_price . "</td>";
					echo "<td>" . $imei_val  . "</td>";
				echo "</tr>";
				
				?>
				
		<?php
		}
		echo "</table>";
			//echo "</table>";
			mysqli_close($con);
		?>
</body>
</html>