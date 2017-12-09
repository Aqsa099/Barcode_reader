<!DOCTYPE html>
<html>
<head>
        <title> JavaScript page </title> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	IMEI:<input type="text" id="imei">
		        
				<div id="txtHint"></div>
    <script>
			$("#imei").change(function(){
				//get all input value in variable 
				var imeiNo = $("#imei").val();
				$.ajax({
				  method: "POST",
				  url: "sale.php",
				  //take a imei number from user and send this data through ajax request
				  data: {imei:imeiNo}
				})
				//after success 
				  .done(function( data ) {
					  //parseJSON convert the string data into javascript object
					  //"data" include all the data that we recieve  
					  data=$.parseJSON(data);
					  //we get the invoice id from the object(data)
					  invoice_id = data.invoice_id;
					  model = data.Mobile_phone;
					  expS  =data.expiry_starting;
					  expE  =data.expiry_ending;
					  pPrice=data.purchase_price;
					  sPrice=data.sale_price;
					  imei = data.imei;
					  //append method use to increament in row and print the data in div that have an id "txtHint"
					$("#txtHint").append(invoice_id, model, model, expS, expE, pPrice, sPrice, imei);
				  });
			});
			
	</script> 
		
			
</body>
</html>