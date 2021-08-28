
<html>
	<head>
		<title>UpdateComplete.php</title>
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
    
    $error = "";
    
    if(isset($_POST["updateEmployeeId"])){
        
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
            
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully" . "</br>";
            
            $sqlQuery = "UPDATE employee SET FirstName = '".$_POST["updatefirstName"]."', LastName = '".$_POST["updatelastName"]."', EmailAddress = '".$_POST["updateemail"]."', TelephoneNumber = '".$_POST["updatephone"]."', SocialInsuranceNumber = '".$_POST["updatesin"]."', Password = '".$_POST["updatepassword"]."', Designation = '".$_POST["updatedesignation"]."', AdminCode = '".$_POST["updateadmin"]."' WHERE EmployeeId = '".$_POST['updateEmployeeId']."'";
            
            try {
                $result = $pdo->query( $sqlQuery );
                echo "Employee Successfully Updated". "<br>";
            }
            catch(PDOException $e) {
                echo "Employee Could not be Updated:  " . $e->getMessage();
            }
            
            $pdo = null;
        }
        catch(PDOException $e) {
            echo "Connection failed:  " . $e->getMessage();
        }
    }
    
    ?>
    
   	</div>


	</body>
</html>


