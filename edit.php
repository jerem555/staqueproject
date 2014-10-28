
<?php

 session_start();




 include("inc/functions.php");
 include("db.php");
 include("inc/top.php");

 $id=$_SESSION['user']['id'];

 // requete pour definir $users

$sql="SELECT *
      FROM users
      WHERE id= :id";


$stmt=$dbh->prepare($sql);

    //exécute la requête 4 execute

    $stmt ->bindValue(":id", $id);
    $stmt->execute();

    //récupère les résultats
    $users=$stmt->fetch();


    //déclaration des variables du formulaire

if (userIsLogged()){
    $email = $_SESSION['user']['email'];
    $username =$_SESSION['user']['username'];
    $country = $_SESSION['user']['country'];
    $name = $_SESSION['user']['name'];
    $job = $_SESSION['user']['job'];
    $language =$_SESSION['user']['language'];
    $externallink = "";

}
else{
 $email = $_GET['email'];
    $username =$_GET['username'];
    $country = $_GET['country'];
    $name = $_GET['name'];
    $job = $_GET['job'];
    $language =$_GET['language'];
    $externallink =$_GET['externallink'];

}








    //formulaire soumis ?
    if (!empty($_POST)){
        //on écrase les valeurs définies ci-dessus, tout en se protegeant
        //pas de strip tags sur la password par contre (si la personne veut mettre des balises dans son pw, c'est son affaire, et on le hache anyway)

        $email          = strip_tags($_POST['email']);
        $username       = strip_tags($_POST['username']);
        $name           = strip_tags($_POST['name']);
        $country        = $_POST['country'];
        $job            = $_POST['job'];
        $language       = $_POST['language'];
        $externallink   = $_POST['externallink'];
        $id             =$_SESSION['user']['id'];



        $errors = array();
        //validation

        //email
        if (empty($email)){
            $errors[] = "Merci d'inscrire un Email valide! !";
        }


        //username
        if (empty($username)){
            $errors[] = "Vous n'avez pas saisi de pseudo!";
        }

        // Nom

        if(empty($name)){
            $errors[]="vous n'avez pas saisi de nom!";
        }




        //form valide ?
        if (empty($errors)){
            //prépare les données pour l'insertion en base

            //génère un salt unique pour cet user
            $salt = randomString();

            //fonction déclarée dans functions.php
            $hashedPassword = hashPassword($password, $salt);

            //utilisée pour l'oubli du mdp, le remember me...
            $token = randomString();

            //sql d'insertion de l'user
            $sql = "UPDATE users
                    SET name=:name,email= :email,username= :username,dateModified= NOW(),job= :job,country= :country,language= :language,externallink= :externallink
                    WHERE id=:id";

                    $stmt = $dbh->prepare($sql);
                    $stmt->bindValue(":name", $name);
                    $stmt->bindValue(":email", $email);
                    $stmt->bindValue(":username", $username);
                    $stmt->bindValue(":job", $job);
                    $stmt->bindValue(":country", $country);
                    $stmt->bindValue(":language", $language);
                    $stmt->bindValue(":externallink", $externallink);
                    $stmt->bindValue(":id",$id);

                    $stmt->execute();
                    header("Location: index.php");


        }

    }






      ;?>

<div class="mainContent">

<form action="edit.php" method="POST" id="register_form" enctype="multipart/form-data">

                <h3>MODIFICATION DU COMPTE UTILISATEUR</h3>

                <div id="colGauche">
                <div class="field_container">
                        <label for="name">Votre nom</label>
                        <input type="text" name="name" id="name" value="<?php echo $name; ?>" />
                </div>
                <div class="field_container">
                        <label for="username">Votre pseudo</label>
                        <input type="text" name="username" id="username" value="<?php echo $username; ?>" />
                </div>
                <div class="field_container">
                        <label for="email">Votre email</label>
                        <input type="email" name="email" id="email" value="<?php echo $email; ?>" />
                </div>



                <div id="colDroite">
                <div class="field_container">
                        <label for="country">Pays</label>
                        <input type="text" name="country" id="country" value="<?php echo $country; ?>" />
                </div>
                <div class="field_container">
                        <label for="job">Metier</label>
                        <input type="text" name="job" id="job" value="<?php echo $job; ?>" />
                </div>

                <div class="field_container">
                        <label for="language">Langues</label>
                        <input type="text" name="language" id="language" value="<?php echo $language; ?>" />
                </div>
                <div class="field_container">
                        <label for="externallink">Liens Externes</label>
                        <input type="text" name="externallink" id="externallink" value="<?php echo $externallink; ?>" />
                </div>

                <div id= "edit-image">

                <?php
                
                 if(empty ($users['avatar'])){ ?>
                    <img src="uploads/avatar/1.jpg"/><?php
                }
                else{
                 ?>
                    <img src="uploads/avatar/<?php echo $users['avatar'];?>" />
        <?php } ?>
                    <a href="editimage.php">Importer une nouvelle image</a>

             </div></br>

             


    <?php
        if (!empty($errors)){
            echo '<ul class="errors">';
            foreach($errors as $error){
                echo '<li>'.$error.'</li>';
            }
            echo '</ul>';
        }

       /*else{
            echo "modifications effectuées";
        }*/


    ?>
    <div class="field_container">
        <label for="sauvegarde"></label>
        <input type="submit" value="SAUVEGARDER !" class="submit" id="sauvegarde"/>
    </div>





</div>

</form>
</div>

</main>

<?php include("inc/bottom.php"); ?>
