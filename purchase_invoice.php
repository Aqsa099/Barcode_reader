<!DOCTYPE html>
<html>
<head>
        <title> JavaScript page </title> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>		
</head>
<body>
    <script>
	        let  invoiceId;
	        //Arrays are declare
			let mobileArr = new Array();
			let expStartingArr = new Array();
			let expEndingArr = new Array();
			let purchasePriceArr = new Array();
			let salePriceArr = new Array();
			let imeiArr = new Array();
			
		    var invoice, model , expS, expE, pPrice, sPrice, imeiNo;
			
		   function getImeiValue(value)
			{    
			  let imeiValue = document.getElementById("imei").value;
			  return imeiValue;
			}
			
			let val;
			function imeiFunction(val)
			{  
					val = getImeiValue();
					imeiArr.push(val);  
					document.getElementById("imei").value = "";
					
			}
				
						//this insert function work behind the onclick event
			function array(){
			    for(var i=0; i<imeiArr.length; i++)
				{
				    document.getElementById('array').innerHTML= imeiArr;
				}
			}
			
			function insert()
			{
				let  mobilePhone, expS, expE,pPrice, sPrice, imei ;

				//get the value from the "form" through specific id that are define in form fields then store in variable
				invoiceId   = document.getElementById("invoice").value;
				mobilePhone = document.getElementById("mobile").value;
				expS        = document.getElementById("exp_s").value;
				expE        = document.getElementById("exp_e").value;
				pPrice      = document.getElementById("p_price").value;
				sPrice      = document.getElementById("s_price").value;
                imei        = document.getElementById("imei").value;
				
				// push is the method of array in javascript ,..and this method push the new value in array 
			    mobileArr.push(mobilePhone);
				expStartingArr.push(expS);
				expEndingArr.push(expE);
				purchasePriceArr.push(pPrice); 
				salePriceArr.push(sPrice);
               
				table = document.getElementById("myTableData");
				
				//count the table row
				let rowCount = table.rows.length;
				
				//insert the new row
				let row = table.insertRow(rowCount);
				
				//insert the coulmn against the row
				row.insertCell(0).innerHTML= rowCount;
				row.insertCell(1).innerHTML= invoiceId;
				row.insertCell(2).innerHTML= mobilePhone;
				row.insertCell(3).innerHTML= expS;
				row.insertCell(4).innerHTML= expE;	 
				row.insertCell(5).innerHTML= pPrice;	 
				row.insertCell(6).innerHTML= sPrice;
                row.insertCell(7).innerHTML= imeiArr;							    				       				
			  
			
			}
			function objVariables(){
			            invoice = invoiceId;
			            model = mobileArr;
						expS = expStartingArr;
						expE = expEndingArr;
						pPrice = purchasePriceArr;
						sPrice = salePriceArr;
						imei = imeiArr;			
			}	
		
			//let model = JSON.stringify(mobileArr);		
				$(document).ready(function(){
					$('#submit').click(function(){
					        $.ajax({
							url: "purchase.php",
							method: "POST",
							data: { invoiceid:invoice,mobile:model,expiryS:expS,expiryE:expE, purchaseP:pPrice, saleP:sPrice, imeiNo:imei},
                            success:function(message){
								$('#displayData').html(message)
							}
							}); 						
				        }); // click event
				});// ready 

			function incrementValue()
				{
					var value = parseInt(document.getElementById('invoice').value, 10);
					value = isNaN(value) ? 0 : value;
					value++;
					document.getElementById('invoice').value = value;
				}				
                
	</script>   
    <div id="displayData"></div>
		    
			<!-- form fields that contains a specific id -->
		    
			<b> Invoice_ID:</b>
			<input type="text" name="invoice" id="invoice"/>
			
			<b> Mobile_phone:</b>
			<input type="text" name="model" id="mobile" />
			
			<b>Expiry_starting: </b>
			<input type="text"name="expiryS"  id="exp_s" />
			
			<b>Expiry_ending: </b>
			<input type="text" name="expiryE"id="exp_e" / ><br><br>
			
			<b>Purchase_price: </b>
			<input type="text" name="purchaseP" id="p_price" / >
			
			<b>Selling_price: </b>
			<input type="text" name="saleP" id="s_price" />
			 <b> IMEI: </b> 
			<input type="text" id="imei" name="imeiNo" value= "" onchange="imeiFunction(this.value); array();" ><br><br>

			<!-- this button convert the javascript array into php and also send all the array data in database -->
			<br><button  onclick="insert(); " > Store Array </button><br><br>
	    			   
	        <input type='submit' name="submit" id="submit" value='submit' onclick="objVariables();incrementValue();">

			
			<!-- table start tha print the headings and the remaining part of table are defined in the end of this page -->
	<div id="mydata"  style="margin-left : 100px;">
	    <table  border="1"  id="myTableData" cellpadding="2" >
		    <tr>
			    <th> Index_No              </th>
			    <th> Invoice_ID              </th>
			    <th> Mobile_phone          </th>
				<th> Expiry_starting       </th>
				<th> Expiry_ending         </th>
				<th> Purchase_price        </th>
				<th> Selling_price         </th>
				<th> IMEI                  </th>
			</tr>
		</table>
		<br/>
    </div>
	<!-- javascript start -->
	<p id="array"></p>
	
</body>
</html>