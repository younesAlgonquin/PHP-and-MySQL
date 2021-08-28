
<html>
	<head>
		<title>UpdateAccount.php</title>
		<link type= "text/css" href="StyleSheet.css" rel="StyleSheet">
	</head>
	<body>
		<?php 
		include "Header.php";
		include "Footer.php";
		include "Menu.php";
		?>	
		
		<div id="content">
				
	<?php
    require "MySQLConnectionInfo.php";
    
    ?>
    
    
    	<form action="UpdateComplete.php" method="post">

			<input type="hidden" name="updateEmployeeId" value="<?php echo  $_POST['EmployeeId']; ?>" />
			First Name: <input type="text" name="updatefirstName" value="<?php echo  $_POST['FirstName']; ?>" />
			<br />
			Last Name: <input type="text" name="updatelastName" value="<?php echo  $_POST['LastName']; ?>" />
			<br />
			Email Address: <input type="text" name="updateemail" value="<?php echo  $_POST['EmailAddress']; ?>" />
			<br />
			Telephone Number: <input type="text" name="updatephone" value="<?php echo  $_POST['TelephoneNumber']; ?>" />
			<br />
			Social Insurance Number: <input type="text" name="updatesin" value="<?php echo  $_POST['SocialInsuranceNumber']; ?>" />
			<br />
			Password: <input type="text" name="updatepassword" value="<?php echo  $_POST['Pass']; ?>" />
			<br />
			Designation: <input type="text" name="updatedesignation" value="<?php echo  $_POST['Designation']; ?>" />
			<br />
			AdminCode: <input type="text" name="updateadmin" value="<?php echo  $_POST['AdminCode']; ?>" />
			<br />
			<input type="submit" value="Update Record" />
		</form>
		</div>



	</body>
</html>


