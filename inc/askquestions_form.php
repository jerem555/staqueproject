
<form action="askquestions.php" id="askQuestions_form" method="POST" >

            <h3>POSEZ VOTRE QUESTION</h3>


        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
        <input type="hidden" name="score" value="<?php echo $score; ?>">


        <div class="field_container">
        <label for="title">TITRE</label>
        	<input type="text" value="<?php echo $title; ?>" placeholder="Entrez le titre de la question" name="title" id="title">

        </div>

        <div class="field_container">
        <label for="contenu">VOTRE CONTENU</label>
        	<textarea value="<?php echo $contenu; ?>" id="contenu" cols="100" rows="10" name="contenu">
         	</textarea>

        </div>


            <div class="field_container" class="keywords">
                <label for="keyword1">MOT-CLEF 1</label>
                    <input type="text" id="keyword1" name="keyword1" value="<?php echo $keyword1; ?>">
                    <!-- <select id="keyword1" name="keyword1">
                              <option value="">Mot-clef 1</option>
                              <option value=""><?php  $keyword1; ?></option>
                    </select> -->
            </div>

            <div class="field_container" class="keywords">
            <label for="keyword2">MOT-CLEF 2</label>
            <input type="text" id="keyword2" name="keyword2" value="<?php echo $keyword2; ?>">
                
            </div>

            <div class="field_container" class="keywords">
            <label for="keyword3">MOT-CLEF 3</label>
            <input type="text" id="keyword3" name="keyword3" value="<?php echo $keyword3; ?>">
                
            </div>

            <div class="field_container" class="keywords">
            <label for="keyword4">MOT-CLEF 4</label>
            <input type="text" id="keyword4" name="keyword4" value="<?php echo $keyword4; ?>">
                
            </div>

            <div class="field_container" class="keywords">
            <label for="keyword5">MOT-CLEF 5</label>
            <input type="text" id="keyword5" name="keyword5" value="<?php echo $keyword5; ?>">
                
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
            <label for="quest"></label>
            <input type="submit" value="POSTER LA QUESTION !" id="quest">
        </div>


</form>


