<?php
    if(!isset($_SESSION)){
        session_start();
    }


    $reponse = "";
    if (!empty($_POST['reponse'])){
    $reponse = $_POST['reponse'];
	}

    $user_id 	= "";
    if (!empty($_SESSION['user']['id'])){
    $user_id = $_SESSION['user']['id'];
	}

    $quest_id = "";
    if (!empty($_GET['id'])){
    $quest_id = $_GET['id'];
	}


    if(!empty($_POST)){

        $quest_id = $_POST['quest_id'];

        include("db.php");


    	$sql = "INSERT INTO answers(contenu, id_user, id_question, dateCreated, dateModified)
	                    VALUES ( :contenu, :id_user, :id_question, NOW(), NOW())";

	                    $stmt = $dbh->prepare($sql);
	                    $stmt->bindValue(":contenu", $reponse);
	                    $stmt->bindValue(":id_user", $user_id);
	                    $stmt->bindValue(":id_question", $quest_id);
	                    $stmt->execute();

        $sql = "UPDATE users
                       SET score=score+4
                       WHERE id= :id";
                        $stmt = $dbh->prepare($sql);
                        $stmt ->bindValue(":id", $user_id);
                        $stmt->execute();


	                  	header("Location: questionsDetail.php?id=$quest_id");
						die();
    

       
}


?>
<div class="reponseDetail">

<?php if (userIslogged()){ ?>

<h3>Répondre à ce post</h3>

<form action="repondre.php" method="POST">

  
        	<input type="hidden" name="quest_id" value="<?php echo $quest_id; ?>">

            <div class="field_container">

            <textarea class="reponse" name="reponse"><?php echo $reponse; ?>
            </textarea>
            <div>
<?php
                if (!empty($errors)){
                    echo '<ul class="errors">';
                    foreach($errors as $error){
                        echo '<li>'.$error.'</li>';
                    }
                    echo '</ul>';
                }
        ?>
        <div class="field_container">
            <label for="quest"></label>
            <input type="submit" value="POSTER LA REPONSE !" id="quest">
        </div>
</form>

</div>
<?php }

else { ?>
	<p class="horsConnect"> MERCI DE VOUS CONNECTER OU DE VOUS INSCRIRE POUR REPONDRE A CE POST !</p>
	<!-- <a class="login" href="login.php">CONNEXION</a>
    <a class="signup" href="register.php">INSCRIPTION</a> -->
	<?php }
?>