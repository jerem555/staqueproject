<div class="mainContent">

    <form action="login.php" method="POST" id="login_form">

                    <h3>CONNECTEZ-VOUS !</h3>

                    <div class="input_field">

                        <div class="field_container">
                                <label for="username"><i class="icon-user"></i><span class="espace"></span>Pseudo</label>
                                <input type="text" value="<?php echo $username; ?>" name="username" id="username" />
                        </div>

                        <div class="field_container">
                                <label for="password"><i class="icon-lock"></i><span class="espace"></span>Mot de passe</label>
                                <input type="password" value="<?php echo $password; ?>" name="password" id="password" />
                        </div>
                    </div>


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
            <label for="connex"></label>
            <input type="submit" value="CONNEXION !" class="submit" id="connex"/>
        </div>
                <?php echo "<br>"; ?>
                <?php echo "<br>"; ?>

    
    <a href="password_reset_1.php" title="oubli du mot de passe" id="mdp"><i class="icon-question-sign"></i> MOT DE PASSE OUBLIE?</a>
    </form>

</div>


<!-- <div class="right-content">


<h1> Nouveautés sur Staque.fr</h1>

<img src="img/staque.png"/>

<ul>

    <li> Chaque membre peut <span style="em">poster</span> de nouvelles questions, <span style="em">proposer</span> une réponse aux questions existantes et <span style="em">commenter</span> à leur tour les réponses déjà données!</li>

    <li> Désormais les membres enregistrés peuvent <span style="em">voter</span> pour les réponses postées!</li>




</div> -->

<?php include("inc/bottom.php"); ?>
