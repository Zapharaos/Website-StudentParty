<section id="signin">
    <form action="" method="POST">
        <div>
            <h2 data-mlr-text>Créer mon compte</h2>
            <div>
                <label data-mlr-text>Nom :</label>
                <input type="text" name="signin_name" value="<?php echo $_POST['signin_name']?>" required>
            </div>
            <div>
                <label data-mlr-text>Prénom :</label>
                <input type="text" name="signin_prenom" value="<?php echo $_POST['signin_prenom']?>" required>
            </div>
            <div>
                <label for="dob" data-mlr-text>Date de naissance :</label>
                <?php include('signin_dob.php'); ?>
            </div>
            <div>
                <label for="gender" data-mlr-text>Sexe :</label>
                <div name="signin_gender" id="gender">
                    <div>
                        <input class="gender_check" type="radio" name="signin_gender" value="male">
                        <p data-mlr-text>Homme</p>
                    </div>
                    <div>
                        <input class="gender_check" type="radio" name="signin_gender" value="female">
                        <p data-mlr-text>Femme</p>
                    </div>
                    <div>
                        <input class="gender_check" type="radio" name="signin_gender" value="other">
                        <p data-mlr-text>Autre</p>
                    </div>
                </div>
            </div>
            <div>
                <label for="mail">Email :</label>
                <input type="email" name="signin_mail" value="<?php echo $_POST['signin_mail']?>" required>
            </div>
            <div>
                <label data-mlr-text>Mot de passe :</label>
                <input type="password" name="signin_password" required>
            </div>
            <div>
                <label data-mlr-text>Confirmer :</label>
                <input type="password" name="signin_confirm" required>
            </div>
        </div>

        <?php
            if (isset($signin_error)){
                echo "<p data-mlr-text class=error>" . $signin_error . "</p>";
            }
        ?>

        <button class="bouton" name="signin_btn" data-mlr-text>Créer mon compte</button>
    
        <ul>
            <li> <a href="index.php?lang=<?php echo $lang_url ?>&show=login" title="Lien qui emmène vers la page de connexion" data-mlr-text>Vous avez déjà un compte ?</a> </li>
        </ul>
    </form>
</section>
