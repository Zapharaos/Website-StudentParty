<section id="reset_pwd">
    <form action="" method="POST">
        <div>
            <h2 data-mlr-text>Réinitialiser le mot de passe</h2>
            <div>
                <label data-mlr-text>Mot de passe :</label>
                <input type="password" name="reset_password" required>
            </div>
            <div>
                <label data-mlr-text>Confirmer :</label>
                <input type="password" name="reset_confirmer" required>
            </div>
        </div>

        <?php
            if (isset($reset_error)){
                echo "<p data-mlr-text class=error>" . $reset_error . "</p>";
            }
        ?>

        <button class="bouton" name="reset_btn" data-mlr-text>Réinitialiser</button>
    </form>
</section>

<section id="forgot">
    <form action="" method="POST">
        <div>
            <h2 data-mlr-text>Oubli du mot de passe</h2>
            <div>
                <label> Email : </label>
                <input id="forgot_input" type="text"/*"email"*/ name="forgot_email" class="text" value="<?php echo $_POST['forgot_email']?>" required>
            </div>
        </div>

        <?php
            if (isset($forgot_error)){
                echo "<p data-mlr-text class=error>" . $forgot_error . "</p>";
            }
        ?>

        <?php
            if(isset($_REQUEST['forgot_btn'])) {
                echo "<p id='test_tp'></p>";
            }
        ?>

        <button class="bouton" onclick="test_email_forgotbutton()" name="forgot_btn" data-mlr-text>Envoyer</button>
    </form>
</section>
