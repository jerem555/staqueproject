

<div class="mainContent">

<form action="register.php" method="POST" id="register_form" enctype="multipart/form-data">

                <h3>CREATION DU COMPTE UTILISATEUR</h3>

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
                <div class="field_container">
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" id="password" value="<?php echo $password; ?>" />
                </div>
                <div class="field_container">
                        <label for="password_bis">Retaper le mot de passe</label>
                        <input type="password" name="password_bis" id="password_bis" value="<?php echo $password_bis; ?>" />
                </div>
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
                        <label for="avatar">Photo</label>
                        <input type="file" name="image" id="image" value="<?php echo $avatar; ?>" />
                </div>
                <div class="field_container">
                        <label for="language">Langues</label>
                        <input type="text" name="language" id="language" value="<?php echo $language; ?>" />
                </div>
                <div class="field_container">
                        <label for="externallink">Liens Externes</label>
                        <input type="text" name="externallink" id="externallink" value="<?php echo $externallink; ?>" />
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
        <label for="sauvegarde"></label>
        <input type="submit" value="SAUVEGARDER !" class="submit" id="sauvegarde"/>
    </div>


</form>


</div>









