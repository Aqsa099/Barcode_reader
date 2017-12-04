<!-- database connection -->
<?php 
       $con = mysqli_connect('localhost','root','','msms');
		if (!$con) {
		die('Could not connect: ' . mysqli_error($con));
}
?>