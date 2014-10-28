
<?php
	session_start();
	//connexion

	include("inc/functions.php");
	include("inc/top.php");




//récupère nos données depuis la bdd
	$title 		= "";
	$contenu 	= "";
	$keyword1 	= "";
	$keyword2 	= "";
	$keyword3 	= "";
	$keyword4 	= "";
	$keyword5 	= "";
	$user_id 	= "";


	include("db.php");

	if(!empty($_POST)){

		$title 		= $_POST['title'];
		$contenu 	= $_POST['contenu'];
		$keyword1 	= $_POST['keyword1'];
		$keyword2 	= $_POST['keyword2'];
		$keyword3 	= $_POST['keyword3'];
		$keyword4 	= $_POST['keyword4'];
		$keyword5 	= $_POST['keyword5'];
		$user_id	= $_SESSION['user']['id'];



		$errors = array();

		if (empty($title)){
		    $errors[] = "Vous devez entrer un titre !";
		}

		if (empty($contenu)){
		    $errors[] = "Vous devez rentrer un contenu pour valider le formulaire !";
		}

		if (empty($keyword1)){
		    $errors[] = "Vous devez rentrer au moins 1 mot-clef !";
		}

			if (empty($errors)){


				$sql = "INSERT INTO questions(title, contenu, id_user, keyword1, keyword2, keyword3, keyword4, keyword5, dateCreated, dateModified)
	                    VALUES ( :title, :contenu, :id_user, :key1, :key2, :key3, :key4, :key5, NOW(), NOW())";

	                    $stmt = $dbh->prepare($sql);
	                    $stmt->bindValue(":title", $title);
	                    $stmt->bindValue(":contenu", $contenu);
	                    $stmt->bindValue(":id_user", $user_id);
	                    $stmt->bindValue(":key1", $keyword1);
	                    $stmt->bindValue(":key2", $keyword2);
	                    $stmt->bindValue(":key3", $keyword3);
	                    $stmt->bindValue(":key4", $keyword4);
	                    $stmt->bindValue(":key5", $keyword5);

	                    $stmt->execute();

				$sql = "UPDATE users
							       SET score=score+2
							       WHERE id= :id";
							    $stmt = $dbh->prepare($sql);
							    $stmt ->bindValue(":id", $user_id);
							    $stmt->execute();

						header("Location: index.php");
						die();

					}



				
}


include("inc/askquestions_form.php") ;?>
<?php include("inc/bottom.php"); ?>