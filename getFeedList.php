<?php
	// returns the feed list of the given user

	header("Content-Type: text/plain");

	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$dbname = 'Web-Dev-Project';

	try {
		if ($_GET['username'] !== null) {
			$username = $_GET['username'];

			// MySQL with PDO_MYSQL  
			$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass); 

			// check if the username is already taken
			$statement = $conn->prepare("SELECT rssURL FROM `RSSFeeds` WHERE userId = (SELECT userId FROM `Users` WHERE username = :username)");
			$statement->bindValue(":username", $username);
			$statement->execute();
			$result = $statement->fetchAll();

			echo json_encode($result);


			// close our connection
			$conn = null;
		} 
	} catch(PDOException $e) {  
		echo $e->getMessage();  
	}
?>