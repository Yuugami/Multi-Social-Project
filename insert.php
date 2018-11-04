<?php
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$dbname = 'web_members';

	try 
	{
		// MySQL with PDO_MYSQL  
		$conn = new PDO("mysql:host=$host; dbname=$dbname", $user, $pass);
		// Set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "Connected successfully! <br><br>";

		// SQL Command to Create Table
		$sql = "CREATE TABLE IF NOT EXISTS members (
			userID varchar(9) NOT NULL,
			username varchar(100) NOT NULL,
			emailAddress varchar(100) NOT NULL,
			password varchar(100) NOT NULL,
			PRIMARY KEY (userID), UNIQUE (emailAddress)
			)";

		$conn->exec($sql);
		echo "Table members created successfully!"; 

		// if the username is already taken, go back to the register page
		$statement = $conn->prepare("SELECT COUNT(*) AS count FROM members WHERE (username = :username)");
		$statement->bindValue(":username", $_POST['username']);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach ($result as $row) {
			// if the username is already taken
			if ($row['count'] > 0) {
				// close our connection and return to register page
				$conn = null;
				header("Location: register.php");
			} 
		}

		// if the email address is already taken, go back to the register page
		$statement = $conn->prepare("SELECT COUNT(*) AS count FROM members WHERE (emailAddress = :emailAddress)");
		$statement->bindValue(":emailAddress", $_POST['emailAddress']);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach ($result as $row) {
			// if the emailAddress is already taken
			if ($row['count'] > 0) {
				// close our connection and return to register page
				$conn = null;
				header("Location: register.php");
			} 
		}

		// prepare insert statement
		$statement = $conn->prepare("INSERT INTO members (emailAddress, username, password) VALUES (:emailAddress, :username, :password)");
		$statement->bindValue(":emailAddress", $_POST['emailAddress']);
		$statement->bindValue(":username", $_POST['username']);
		$password = $_POST['password'];
		$salt = mcrypt_create_iv(16, MCRYPT_DEV_URANDOM);
		$hash = crypt($password, $salt);

		$statement->bindValue(":password", $hash);
		$statement->execute();
		$numRowsAffected = $statement->rowCount();
		$insertedPrimaryKey = $conn->lastInsertId();

		// close our connection
		$conn = null; 

		header("Location: index.php");
	} 
	catch(PDOException $e) 
	{  
		echo $e->getMessage();  
	}
?>