<?php
session_start();
ob_start();

?>
<html>
	<head>
		<title>Login.php</title>
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
		
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
		    echo"<br>";
		    
		    echo"You are already logged in as ".$_SESSION["user"]."please log out in order to use another account";
		    echo"<br>";
		    echo"<br>";
		    echo"<a href='logout.php'>LOGOUT</a>";
		}
		else if(isset($_POST["EmailAddress"]) && isset($_POST["Password"])){
		    
		    try{
		        $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
		        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		        echo "Connected successfully" . "</br>";
		        
		        $sqlQuery = "SELECT EmailAddress, Password FROM employee WHERE EmailAddress ='".$_POST["EmailAddress"]."' AND Password = '".$_POST["Password"]."'";
		        
		        $result =$pdo->query($sqlQuery);
		        
		        $rowCount = $result->rowCount();
		        
		        
		        if($rowCount >= 1){
		            
		            $_SESSION["loggedin"] = true;
		            $_SESSION["user"] = $_POST["EmailAddress"];
		            header('location:ViewAllEmployees.php');
		            die;
		        }
		        
		        else{
		            echo "User login is not accepted";
		        }
		        
		        $pdo = null;
		        
		    }
		    catch(PDOException $e) {
		        echo "connection failed: ".$e->getMessage();
		    }
		}
		
		?>
		
	
				
		<form action="Login.php" method="post">
		
			EmailAddress: <input type="email" name="EmailAddress" />
			<br />
			Password: <input type="text" name="Password" />
			<br />
			
			<input type="submit" value="Login" />
		</form>	
		
		</div>	
	</body>
</html>