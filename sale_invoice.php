<!DOCTYPE html>
<html>
<head>
</head>
<body>

    <script>
	function showUser(str) {
		if (str == "") {
			document.getElementById("txtHint").innerHTML = "";
			return;
		} else { 
			if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else {
				// code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("txtHint").innerHTML = this.responseText;
				}
			};
			xmlhttp.open("GET","sale.php?val="+str,true);
			xmlhttp.send();
		}
	}
</script>
        
         Imei:  <input type="text" name="imei" id="imei" onchange="showUser(this.value)" />
		        <div id="txtHint"></div>
		
</body>
</html>