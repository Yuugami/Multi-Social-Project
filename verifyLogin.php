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

		// if the username doesn't exist
		$statement = $conn->prepare("SELECT COUNT(*) AS count FROM members WHERE (username = :username)");
		$statement->bindValue(":username", $_POST['username']);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach ($result as $row) 
		{
		// if the username is already taken
			if ($row['count'] == 0) {
				// close our connection and return to register page
				$conn = null;
				header("Location: login.php");
			} 
		}

		// // prepare statement
		$statement = $conn->prepare("SELECT * FROM members WHERE username = :username");
		$statement->bindValue(":username", $_POST['username']);
		$statement->execute();
		$result = $statement->fetchAll();

		foreach ($result as $row) 
		{
			if (password_verify ($_POST['password'], $row['password'])) 
			{
				// TODO successful login code here
			}
		}

		// Close the Connection
		$conn = null; 

		header("Location: index.php");
	} 
	catch(PDOException $e) 
	{  
		echo "Connection failed: " . $e->getMessage();  
	}
?>