<?php
  session_start();
  include("db.php");
  include("inc/functions.php");

$id = "";
if (!empty($_GET['id'])){
    $id = $_GET['id'];
  }

  $numPerPage = 6;
  $page = 1;

  if (!empty($_GET['page'])){
        $page = $_GET['page'];
      }

  $offset = ($page-1)*$numPerPage;

  $direction = "ASC";
  if (!empty($_GET['dir'])){
    if ($_GET['dir'] === "desc"){
      $direction = "DESC";}
}

$sql="SELECT COUNT(answers.id) AS answCount, questions.id AS questId, questions.title, questions.contenu, questions.id_user AS userId, questions.dateCreated, questions.vues,
  questions.keyword1, questions.keyword2, questions.keyword3, questions.keyword4, questions.keyword5,
  users.id AS idUser, users.name, users.avatar, users.email, users.username, users.password, users.job, users.country, users.language, users.externallink
      FROM questions
      LEFT JOIN users on users.id=questions.id_user
      LEFT JOIN answers on questions.id=answers.id_question
          GROUP BY questions.id
          ORDER BY questions.dateCreated DESC
          LIMIT :offset, $numPerPage";

    $stmt=$dbh->prepare($sql);
    $stmt->bindValue(":offset", ($page-1)*$numPerPage, PDO::PARAM_INT);
    $stmt->execute();
    $questions=$stmt->fetchAll();


$sql = "SELECT COUNT(*) FROM questions";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $totalNumber = $stmt->fetchColumn();
    $totalPages = ceil($totalNumber / $numPerPage); //arrondi par le haut


?>

<?php include("inc/top.php"); ?>

<main class="mainContentQuestions">

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
              <a>postée par<span class="espace"></span></a>
              <?php
              if (empty ($question['name'])){
                echo "profil supprimé";

              }else

              {

               echo "<a href='profile.php?id=".$question['idUser']."'>".$question['name']."</a>";

                }?>

              </a>le <?php
              $unix = strtotime($question['dateCreated']);
                        echo date("d-m-Y à H:i", $unix); ?>


            </div>


          </div>

        </div>
        <?php endforeach; ?>


<div id="pagination">
                      <?php if($page >= 2){ ?>
                            <a href="questions.php?page=<?php echo strtolower($direction); ?>&page=<?php echo $page - 1 ?>">Page précédente</a>
                      <?php } ?>

                                    <a href="questions.php?dir=<?php echo strtolower($direction); ?>&page=1"><<</a>
                      <?php
                          for($i= ($page-5); $i < ($page+5); $i++){
                            if($i <1 || $i > $totalPages){continue;}
                          echo '<a href="questions.php?dir=' .strtolower($direction) . '&page=' . $i .'">' .$i . '</a>';

                        }
                        ?>
                            <a href="questions.php?dir=<?php echo strtolower($direction); ?>&page=<?php echo $totalPages; ?>">>></a>

                      <?php if($page < $totalPages){ ?>
                            <a href="questions.php?page=<?php echo strtolower($direction); ?>&page=<?php echo $page + 1 ?>">Page suivante</a>
                      <?php } ?>
</div>



</main>



      <?php include("inc/bottom.php"); ?>