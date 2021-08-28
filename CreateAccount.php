<?php
session_start();
ob_start();
require "MySQLConnectionInfo.php";

$error = "";
$error1="";

if(!isset($_POST["FirstName"])||!isset($_POST["LastName"]) || !isset($_POST["EmailAddress"])||!isset($_POST["TelephoneNumber"]) || !isset($_POST["SocialInsuranceNumber"])||!isset($_POST["Password"]) || !isset($_POST["Designation"])||!isset($_POST["AdminCode"]))
{
    $error = "Please enter all requiered information.";
}
else
{
    if($_POST["FirstName"] != "" && $_POST["LastName"] != "" && $_POST["EmailAddress"] != "" && $_POST["TelephoneNumber"] != "" && $_POST["SocialInsuranceNumber"] != "" && $_POST["Password"] != "" && $_POST["Designation"] != "" && $_POST["AdminCode"] != "")
    {
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
            // set the PDO error mode to exception
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $error1 = "Connected successfully" . "</br>";
            
            $sqlQuery = "INSERT INTO employee (FirstName, LastName, EmailAddress, TelephoneNumber, SocialInsuranceNumber, Password, Designation, AdminCode) VALUES('".$_POST["FirstName"]."', '".$_POST["LastName"]."', '".$_POST["EmailAddress"]."', '".$_POST["TelephoneNumber"]."', '".$_POST["SocialInsuranceNumber"]."', '".$_POST["Password"]."', '".$_POST["Designation"]."', '".$_POST["AdminCode"]."')";
            
            try {
                $result = $pdo->query( $sqlQuery );
                $error = "Employee Successfully Added". "<br>";
                header('Refresh: 1; URL= ViewAllEmployees.php'); 
            }
            catch(PDOException $e) {
                echo "Employee Could not be added:  " . $e->getMessage();
            }
            
            $pdo = null;
        }
        
        catch(PDOException $e) {
            echo "Connection failed:  " . $e->getMessage();
        }
        
    }
    else
        $error = "Please enter all requiered information******.";
}

?>

<html>
	<head>
		<title>CreateAccount.php</title>
		<link type= "text/css" href="StyleSheet.css" rel="StyleSheet">
	</head>
	<body>
		<?php 
		include "Header.php";
		include "Footer.php";
		include "Menu.php";
		?>	
		
		<div id="content">
				
		<form action="CreateAccount.php" method="post">
		
			First Name: <input type="text" name="FirstName" />
			<br />
			Last Name: <input type="text" name="LastName" />
			<br />
			EmailAddress: <input type="text" name="EmailAddress" />
			<br />
			TelephoneNumber: <input type="text" name="TelephoneNumber" />
			<br />
			SocialInsuranceNumber: <input type="text" name="SocialInsuranceNumber" />
			<br />
			Password: <input type="text" name="Password" />
			<br />
			Designation:
			<select name="Designation" id="Designation">
                <option value="ITDeveloper">ITDeveloper</option>
                <option value="Manager">Manager</option>
            </select>
			<br />
			AdminCode: <input type="number" name="AdminCode" />
			<br />
			<br />
			<input type="submit" value="Submit to Database" />
		</form>
		<br />
		<br />
		<?php 
			echo $error1;
			echo $error;
		?>	
		
		</div>	
	</body>
</html>

