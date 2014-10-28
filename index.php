
<?php

	session_start();
	include("db.php");
	include("inc/functions.php");

$search = "";
if (!empty($_GET['recherche'])){
    $search = $_GET['recherche'];

    $sql = "SELECT COUNT(answers.id) AS answCount, questions.id AS questId, questions.title, questions.contenu, questions.id_user AS userId, questions.dateCreated, questions.vues,
  questions.keyword1, questions.keyword2, questions.keyword3, questions.keyword4, questions.keyword5,
  users.id AS idUser, users.name, users.avatar, users.email, users.username, users.password, users.job, users.country, users.language, users.externallink
      FROM questions
      LEFT JOIN users on users.id=questions.id_user
      LEFT JOIN answers on questions.id=answers.id_question
        WHERE questions.contenu LIKE :recherche
            OR questions.title LIKE :recherche
        GROUP BY questions.id
        ORDER BY questions.dateCreated DESC";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(":recherche", "%" . $search . "%");
        $stmt->execute();
        $questions = $stmt -> fetchAll();
}

else {

	//notre requête sql
	$sql="SELECT COUNT(answers.id) AS answCount, questions.id AS questId, questions.title, questions.contenu, questions.id_user AS userId, questions.dateCreated, questions.vues,
  questions.keyword1, questions.keyword2, questions.keyword3, questions.keyword4, questions.keyword5,
  users.id AS idUser, users.name, users.avatar, users.email, users.username, users.password, users.job, users.country, users.language, users.externallink
      FROM questions
      LEFT JOIN users on users.id=questions.id_user
      LEFT JOIN answers on questions.id=answers.id_question
          GROUP BY questions.id
          ORDER BY questions.dateCreated DESC
		      LIMIT 3";

	$stmt=$dbh->prepare($sql);
	$stmt->execute();
	$questions=$stmt->fetchAll();
}

	// $sql="SELECT vote_type
	// 	  FROM votes
	// 	  LEFT JOIN users on users.id=votes.id_user";

	// $stmt=$dbh->prepare($sql);
	// $stmt->execute();
	// $votes=$stmt->fetchAll();
?>
<?php include("inc/top.php"); ?>



			<div class="topcontent">
     <?php if (userIsLogged()){ ?>


         <h1><i class="fa fa-stack-overflow"><span class="espace"></span></i>BIENVENUE SUR STAQUE !</h1>
<?php } 

          else { ?>
        <h1 style="font-weight:700; font-size:1.5em; margin-bottom:20px"> Pourquoi s'inscrire sur Staque.fr? </h1>
<ul>
    <li>"<span class="espace"></span><i class="fa fa-check-square-o"></i><span class="espace"></span>Devenir membre sur Staque, c'est la possibilité de pouvoir <span class="color">échanger</span> avec la communauté. De poser de nouvelles questions, de <span class="color">répondre</span> aux différents sujets et de <span class="color">commenter</span> les réponses déja données.</li>

    <li><i class="fa fa-check-square-o"></i><span class="espace"></span>La création d'un compte sur Staque est totalement gratuite! <span class="color">Rejoignez </span>dès maintenant la <span class="color">première plateforme francophone</span> dédiée au développement web! "</li>
</ul> 
          

          <?php } ?>

			</div>

			<main class="main_index_questions">

            <div>
			<main class="mainContentQuestions">


        <h1> Dernières questions postées...</h1>

				<?php
					foreach($questions as $question):

					?>
			 	<div class="vote">
        <p><?php echo rand(-5, 15);?></p>
        <p><?php echo "VOTES";?></p>
        </div>
        <div class="answer">
        <p><?php echo $question['answCount'];?></p>
        <p>REPONSES</p>
        </div>
        <div class="vue">
        <p><?php echo $question['vues'];?></p>
        <p>VUES</p>
        </div>

			 	<div class="questions">

				 	<a href="questionsDetail.php?id=<?php echo $question['questId']; ?>" id="titreQuest"> <?php echo $question['title']; ?>
				 	</a>
		           <div id="tag">
            <p class="keyword">
              <a href="questionsByKeyword.php?keyword=<?php echo $question['keyword1']; ?>" id="key1" title="Mot-clef 1"><?php echo $question['keyword1']; ?></a>
            </p>

                <?php if(!empty($question['keyword2'])){ ?>
              <p class="keyword">
              <a href="questionsByKeyword.php?keyword=<?php echo $question['keyword2']; ?>" id="key2" title="Mot-clef 2"><?php echo $question['keyword2']; ?>
                </a>
              </p>
              <?php }?>

                <?php if(!empty($question['keyword3'])){ ?>
              <p class="keyword">
                <a href="questionsByKeyword.php?keyword=<?php echo $question['keyword3']; ?>" id="key3" title="Mot-clef 3"><?php echo $question['keyword3']; ?>
                </a>
              </p>
                <?php }?>

                <?php if(!empty($question['keyword4'])){ ?>
              <p class="keyword">
                <a href="questionsByKeyword.php?keyword=<?php echo $question['keyword4']; ?>" id="key4" title="Mot-clef 4"><?php echo $question['keyword4']; ?>
                </a>
              </p>
                <?php }?>

                <?php if(!empty($question['keyword5'])){ ?>
              <p class="keyword">
                <a href="questionsByKeyword.php?keyword=<?php echo $question['keyword1']; ?>" id="key5" title="Mot-clef 5"><?php echo $question['keyword5']; ?>
                </a>
              </p>
                <?php }?>


				 		<div id="identification">
              <a>postée par</a>
              <?php
              if (empty($question['name'])){
                echo "profil supprimé";
              }else {
                echo "<a href='profile.php?id=".$question['idUser']."'>".$question['username']."</a>";
              }?>
              </a>le <?php
              $unix = strtotime($question['dateCreated']);
                        echo date("d-m-Y", $unix); ?>

            </div>
			 		</div>

			 	</div>
 				<?php endforeach; ?>
			</div>
		</main>
</div>


<?php include("inc/bottom.php"); ?>

