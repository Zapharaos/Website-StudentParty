<section id="login">
    <form action="" method="POST">
        <div>
            <h2 data-mlr-text>Connexion</h2>
            <div>
                <label>Email :</label>
                <input type="email" name="login_email" value="<?php echo $_POST['login_email']?>" required>
            </div>
            <div>
                <label data-mlr-text>Mot de passe :</label>
                <input type="password" name="login_password" required>
            </div>
        </div>

        <?php
            if (isset($login_error)){
                echo "<p data-mlr-text class=error>" . $login_error . "</p>";
            }
        ?>

        <button class="bouton" name="login_btn" data-mlr-text>Connexion</button>

        <ul>
            <li><a href="index.php?lang=<?php echo $lang_url ?>&show=signin" title="Lien qui emmène vers la page de création d'un compte" data-mlr-text>Vous n'avez pas encore de compte ?</a></li>
            <li><a href="index.php?lang=<?php echo $lang_url ?>&show=forgot" title="Lien qui emmène vers la page d'oubli du mot de passe" data-mlr-text>Vous avez oublié votre mot de passe ?</a></li>
        </ul>
    </form>
</section>
