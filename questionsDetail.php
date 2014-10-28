
<?php
    session_start();
    //connexion
    include("db.php");
    include("inc/functions.php");
    include("inc/top.php");

$id = "";
if (!empty($_GET['id'])){
    $id = $_GET['id'];
  }

$sql = "UPDATE questions
       SET vues=vues+1
       WHERE id= :id";
    $stmt = $dbh->prepare($sql);
    $stmt ->bindValue(":id", $id);
    $stmt->execute();


$sql="SELECT questions.id AS questId, questions.title, questions.contenu, questions.id_user AS userId, questions.dateCreated,
  questions.keyword1, questions.keyword2, questions.keyword3, questions.keyword4, questions.keyword5, questions.dateCreated,
  users.id AS idUser, users.name, users.avatar, users.email, users.username, users.password, users.job, users.country, users.language, users.externallink, users.score
      FROM questions
      LEFT JOIN users on users.id=questions.id_user
      WHERE questions.id= :id";

    $stmt=$dbh->prepare($sql);
    $stmt ->bindValue(":id", $id);
    $stmt->execute();
    $question=$stmt->fetch();


$sql="SELECT answers.id AS answId, answers.id_question, answers.contenu, answers.id_user, answers.dateCreated, users.id, users.username
      FROM answers
      LEFT JOIN users on users.id=answers.id_user";

    $stmt=$dbh->prepare($sql);
    $stmt->execute();
    $answers=$stmt->fetchAll();


$sql="SELECT questions.id AS questId,
            comments.id AS commId, comments.id_question, comments.contenu AS commContent, comments.id_user AS commIdUser, comments.id_answer AS commAnswId, comments.dateCreated,
            answers.id AS answId, answers.id_question, answers.contenu AS answContent, answers.id_user AS answIdUser, users.id AS idUser, users.username
      FROM comments
      LEFT JOIN questions on questions.id = comments.id_question
      LEFT JOIN answers on answers.id=comments.id_answer
      LEFT JOIN users on users.id=comments.id_user";

    $stmt=$dbh->prepare($sql);
    $stmt->execute();
    $comments=$stmt->fetchAll();

?>
<main class="mainContentQuestions">

<div class="questionDetail">
            <h3><?php echo $question['title']; ?></h3> 
              
            <h3>postée par  <?php echo $question['username']; ?> 
              </a>le <?php $unix = strtotime($question['dateCreated']);
                        echo date("d-m-Y", $unix); ?></h3>

              <div class="score">
              <p>SCORE</p>
              <?php echo $question['score'] ?>
              </div>

            <div class="contenu">
            <pre><?php echo $question['contenu']; ?></pre>
            <div>
        <div id="tag">
            <p class="keyword">
              <?php echo $question['keyword1']; ?>
            </p>

                <?php if(!empty($question['keyword2'])){ ?>
              <p class="keyword">
              <?php echo $question['keyword2']; ?>
                </a>
              </p>
              <?php }?>

                <?php if(!empty($question['keyword3'])){ ?>
              <p class="keyword">
                <?php echo $question['keyword3']; ?>
                </a>
              </p>
                <?php }?>

                <?php if(!empty($question['keyword4'])){ ?>
              <p class="keyword">
                <?php echo $question['keyword4']; ?>
                </a>
              </p>
                <?php }?>

                <?php if(!empty($question['keyword5'])){ ?>
              <p class="keyword">
                <?php echo $question['keyword1']; ?>
                </a>
              </p>
            <?php }?>

          </div>
</div>
<div class="reponseDetail">
<?php


foreach ($answers as $answer) {

      if ($_GET['id'] == $answer['id_question']) { ?>


            <div class="contenu">
            <h2 style="font-weight: 700">Réponse postée par  <?php echo $answer['username']; ?> le </a>le <?php
              $unix = strtotime($question['dateCreated']);
                        echo date("d-m-Y", $unix); ?></h2>
            <pre><?php echo $answer['contenu']; ?></pre>
            </div>

<?php

          if (userIsLogged()){ ?>

            <form method="POST" action="voter.php" id="voter">
            VOTER FAVORABLEMENT POUR CETTE REPONSE 
            <input type="submit" name="oui" value="OUI">
            <input type="submit" name="non" value="NON">
            </form>
         <?php } ?>

</div>
<div class="commentaireDetail">

<?php


      foreach ($comments as $comment) {

            if ($answer['answId'] == $comment['answId'] ) {

?>
            <div class="contenu">
            <h2 style="font-weight: 700">Commentaire posté par  <?php echo $comment['username']; ?> le </a>le <?php
              $unix = strtotime($question['dateCreated']);
                        echo date("d-m-Y", $unix); ?></h2>
            <pre><?php echo $comment['commContent']; ?></pre>
           <?php } ?>
            </div>


      <?php  }

 include("commenter.php");

      }

}?></div>

  <?php include("repondre.php") ?>


</main>

<?php include("inc/bottom.php"); ?>