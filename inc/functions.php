<?php

	//hache le mot de passe, d'une manière lente
	//utilise un salt unique par utilisateur, et un pepper fixe
	function hashPassword($password, $salt){
		$pepper = "zDO3Byl7rsYAgz6fGAjf4*Ej23dvlAvvmOzFXG3E2m4FTXb4l5o";
		$hashedPassword = hash("sha512", $password);
		for($i=0;$i<5000;$i++){
			$hashedPassword = hash("sha512", $pepper . $hashedPassword . $salt);
		}
		return $hashedPassword;
	}

//retourne une chaîne aléatoire, d'une longueur $length
	function randomString($length = 50){
		$chars = "ABCDEFGHIJKLMNOPQRSTRUVWYXZabcdefghijklmnopqrstruvwyxz0123456789";
		$string = "";
		for($i=0;$i<$length;$i++){
			$num = mt_rand(0, strlen($chars)-1);
			$string .= $chars[$num];
		}
		return $string;
	}
//retourne un booléen, en fonction de si le nom d'utilisateur
	//est présent en bdd
	function usernameExists($username){

		global $dbh;

		$sql = "SELECT COUNT(*) FROM users 
				WHERE username = :username";
		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":username", $username);
		$stmt->execute();

		$usernameFound = $stmt->fetchColumn(); //usernameFound vaut 1 ou 0
		return $usernameFound;

	}


	//retourne un booléen, en fonction de si l'email
	//est présent en bdd
	function emailExists($email){

		global $dbh;

		$sql = "SELECT COUNT(*) FROM users 
				WHERE email = :email";
		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":email", $email);
		$stmt->execute();

		$emailFound = $stmt->fetchColumn(); //emailFound vaut 1 ou 0
		return $emailFound;

	}

	function userIsLogged(){
		if (!empty($_SESSION['user'])){
			return true;
		}
		return false;
	}


	function insertKeyword(){
		global $dbh;

		$sql = "SELECT * 
		  FROM questions
		  LEFT JOIN tags on tags.keyword=questions.keyword1
		  LEFT JOIN tags on tags.keyword=questions.keyword2
		  LEFT JOIN tags on tags.keyword=questions.keyword3
		  LEFT JOIN tags on tags.keyword=questions.keyword4
		  LEFT JOIN tags on tags.keyword=questions.keyword1
		  ";

		$stmt = $dbh->prepare($sql);

		$keywords=$stmt->fetchAll();
		echo '<pre>';
 		print_r($keywords);
 		echo '</pre>';
		return $keywords;


	}


?>