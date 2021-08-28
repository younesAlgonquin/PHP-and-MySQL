<?php

session_start();
ob_start();
?>



<html>
	<head>
		<title>SelectAccount.php</title>
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

    if(isset($_SESSION['adminLogged']) && $_SESSION['adminLogged'] == true){
        
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
                for($i=0; $i<$rowCount; ++$i){
                    
                    $row = $result->fetch();
                    
                    echo "<table><tr><td>";
                    echo "<br />";
                    
                    echo "<form action=\"UpdateAccount.php\" method=\"post\">";
                    
                    echo "<input type=\"hidden\" name=\"EmployeeId\" value=\"".$row[0]."\" />";
                    echo "<input type=\"hidden\" name=\"FirstName\" value=\"".$row[1]."\" />";
                    echo "<input type=\"hidden\" name=\"LastName\" value=\"".$row[2]."\" />";
                    echo "<input type=\"hidden\" name=\"EmailAddress\" value=\"".$row[3]."\" />";
                    echo "<input type=\"hidden\" name=\"TelephoneNumber\" value=\"".$row[4]."\" />";
                    echo "<input type=\"hidden\" name=\"SocialInsuranceNumber\" value=\"".$row[5]."\" />";
                    echo "<input type=\"hidden\" name=\"Pass\" value=\"".$row[6]."\" />";
                    echo "<input type=\"hidden\" name=\"Designation\" value=\"".$row[7]."\" />";
                    echo "<input type=\"hidden\" name=\"AdminCode\" value=\"".$row[8]."\" />";
                    echo "<input type=\"submit\" name=\"editButton\" value=\"Edit Employee\" style=\"width:100px\"><br />";
                    echo "<br />   ".$row["EmployeeId"];
                    echo "  ".$row['FirstName'];
                    echo "  ".$row['LastName'];
                    echo "</form>";
                    echo "</td>";
                }
                
                echo"</table>";
                
            }
            $pdo = null;
            unset($_SESSION['adminLogged']);
            
    }
    
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    
    }
    else{
        header('location:Admin.php');
        die;
    }
?>
		<br />
		<br />
		
		</div>	
	</body>
</html>


