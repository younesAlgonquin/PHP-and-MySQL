<?php

session_start();
ob_start();
?>



<html>
	<head>
		<title>ViewAllEmployees.php</title>
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
        
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully" . "</br>";
        
        $sqlQuery = "SELECT * FROM employee";
        
        $result = $pdo->query( $sqlQuery );
        
        $rowCount = $result->rowCount();
        
        if($rowCount == 0)
            echo "There are no employees in database";
            
            else{
                echo "<br>DATABASE<br><br>";
                echo"Currently logged in as: ".$_SESSION["user"]."   ";
                echo"<br><a href='logout.php'>LOGOUT</a>";
                echo"<br><br>";
                
                echo "<table>";
                echo "<tr>";
                echo "<th>First Name</th>";
                echo "<th>Last Name</th>";
                echo "<th>Email Address</th>";
                echo "<th>Phone Number</th>";
                echo "<th>Social Insurance Number</th>";
                echo "<th>Designation</th>";
                
                for($i=0; $i<$rowCount; ++$i){
                    $row = $result->fetch();
                    echo"<tr><td>" . $row['FirstName'] . "</td><td>" . $row['LastName'] . "</td><td>". $row['EmailAddress'] . "</td><td>". $row['TelephoneNumber'] . "</td><td>". $row['SocialInsuranceNumber'] . "</td><td>". $row['Designation'] . "</td><td>";
                }
                echo"</table>";
                
            }
    }
    
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    
}

else{
    header('location:Login.php');
    die;
}
?>
		<br />
		<br />
		
		</div>	
	</body>
</html>


