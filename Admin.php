<?php
session_start();
ob_start();
?>



<html>
	<head>
		<title>Admin.php</title>
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

    if(isset($_POST["EmailAddress"]) && isset($_POST["Password"]) && isset($_POST["AdminCode"]) && $_POST["AdminCode"]==999){
        
        try{
            $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully" . "</br>";
            
            $sqlQuery = "SELECT EmailAddress, Password, AdminCode FROM employee WHERE EmailAddress ='".$_POST["EmailAddress"]."' AND Password = '".$_POST["Password"]."' AND AdminCode = '".$_POST["AdminCode"]."'";
            
            $result =$pdo->query($sqlQuery);
            
            $rowCount = $result->rowCount();
            
            if($rowCount >= 1){
                
                $_SESSION["adminLogged"] = true;
                $_SESSION["admin"] = $_POST["EmailAddress"];
                header('location:SelectAccount.php');
                die;
            }
            
            else{
                echo "User login not accepted";
            }
            
            $pdo = null;
            
        }//end try
        
        catch(PDOException $e) {
            echo "connection failed: " . $e->getMessage();
        }
    }
    
    else{
        echo "You need to be a manager to login";
    }
    ?>

		
			<br>ADMIN PANEL<br><br>
				<form action="Admin.php" method ="post">
					Email Address: <input type = "email" name = "EmailAddress"><br>
					Password: <input type ="password" name = "Password"><br>
					Admin Code: <input type ="number" name ="AdminCode"><br>
					<input type = "submit" value ="login">
				</form>
			
		</div>	

	</body>
</html>


