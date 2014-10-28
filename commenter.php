<?php
    if(!isset($_SESSION)){
        session_start();
    }

    $commentaire = "";
    if (!empty($_POST['commentaire'])){
    $commentaire = $_POST['commentaire'];
    }

    $user_id    = "";
    if (!empty($_SESSION['user']['id'])){
    $user_id = $_SESSION['user']['id'];
    }

    $quest_id = "";
    if (!empty($_GET['id'])){
    $quest_id = $_GET['id'];
    }

    $answer_id = "";
    if (!empty($_POST['answer_id'])){
    $answer_id = $_POST['answer_id'];
    }


    if(!empty($_POST)){

        $quest_id = $_POST['quest_id'];

         include("db.php");


        $sql = "INSERT INTO comments(contenu, id_user, id_question, id_answer, dateCreated, dateModified)
                        VALUES (:contenu, :id_user, :id_question, :id_answer, NOW(), NOW())";

                        $stmt = $dbh->prepare($sql);
                        $stmt->bindValue(":contenu", $commentaire);
                        $stmt->bindValue(":id_user", $user_id);
                        $stmt->bindValue(":id_question", $quest_id);
                        $stmt->bindValue(":id_answer", $answer_id);
                        $stmt->execute();

                        header("Location: questionsDetail.php?id=$quest_id");
                        die();
    }

?>
<?php if (userIslogged()){ ?>

<div class="commentaireDetail">

<h4>Commenter la réponse</h4>


<form action="commenter.php" method="POST">


       


            <input type="hidden" name="answer_id" value="<?php echo $answer['answId']; ?>">
            <input type="hidden" name="quest_id" value="<?php echo $quest_id; ?>">
            <input type="hidden" name="comment_id" value="<?php echo $comment['commId']; ?>">

             <div class="field_container">

            <textarea class="commentaire" cols="150" rows="5" name="commentaire"><?php echo $commentaire; ?>
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
            <input type="submit" value="POSTER LE COMMENTAIRE !">
            </div>

        

</form>

</div>

<?php }


?>