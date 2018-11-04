<?php
	// takes in a username
	// returns 0 if it is not unique in Users table, or the username is not given
	// returns 1 if it is unique in Users table

	header("Content-Type: text/plain");

	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$dbname = 'Web-Dev-Project';
	$retval = "1"; // assume it's unique
	
	try {
		if ($_GET['username'] !== null) {
			$username = $_GET['username'];

			// MySQL with PDO_MYSQL  
			$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass); 

			// check if the username is already taken
			$statement = $conn->prepare("SELECT COUNT(*) AS count FROM `Users` WHERE (username = :username)");
			$statement->bindValue(":username", $username);
			$statement->execute();
			$result = $statement->fetchAll();

			foreach ($result as $row) {
				// if the username is already taken
				if ($row['count'] > 0) {
					$retval = "0";
				}  
			}

		// close our connection
		$conn = null;
	} else {
		$retval = "0";
	}

	echo $retval;

	} catch(PDOException $e) {  
		echo $e->getMessage();  
	}
?>