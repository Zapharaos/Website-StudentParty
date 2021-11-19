<section id="profil">
    <!-- Si l'utilisateur est connecté et que c'est son profil -->

    <?php 
        if ($_GET['profil'] != $_SESSION['Auth']['id']) {
            echo "<!--";
        }
    ?>

    <div id="edit">
        <div>        
            <h3 data-mlr-text>Modifier les informations</h3>
            <span id="edit_info_open"> <i class="fas fa-caret-square-down fa-3x" onclick="edit('#info', '#pwd', '#edit_info_close', '#edit_info_open', '#edit_pwd_open', '#edit_pwd_close')" ></i> </span>
            <span id="edit_info_close"> <i class="fas fa-caret-square-up fa-3x" onclick="edit('#pwd', '#info', '#edit_info_open', '#edit_info_close', '#edit_pwd_close', '#edit_pwd_open')"></i> </span>
        </div>
        <div> 
            <h3 data-mlr-text>Modifier le mot de passe</h3>
            <span id="edit_pwd_open"> <i class="fas fa-caret-square-down fa-3x" onclick="edit('#pwd', '#info', '#edit_pwd_close', '#edit_pwd_open', '#edit_info_open', '#edit_info_close')"></i> </span>
            <span id="edit_pwd_close"> <i class="fas fa-caret-square-up fa-3x" onclick="edit('#info', '#pwd', '#edit_pwd_open', '#edit_pwd_close', '#edit_info_close', '#edit_info_open')"></i> </span>
        </div>
    </div>

    <form id="info" action="" method="POST">
        <div>
            <div>
                <label data-mlr-text>Nom :</label>
                <input type="text" name="profil_name" value="<?php echo $_POST['profil_n']?>" required>
            </div>
            <div>
                <label data-mlr-text>Prénom :</label>
                <input type="text" name="profil_prenom" value="<?php echo $_POST['profil_p']?>" required>
            </div>
            <div>
                <label for="mail">Email :</label>
                <input type="email" name="profil_mail" value="<?php echo $_POST['profil_m']?>" required>
            </div>
            
            <?php
                if (isset($profil_info_error)){
                    echo "<p data-mlr-text class=error>" . $profil_info_error . "</p>";
                }
            ?>

            <button class="bouton" name="profil_info_btn" data-mlr-text>Modifier les informations</button>

        </div>
    </form>
    <form id="pwd" action="" method="POST">
        <div>
            <div>
                <label data-mlr-text>Mot de passe actuel :</label>
                <input type="password" name="profil_current" required>
            </div>
            <div>
                <label data-mlr-text>Mot de passe :</label>
                <input type="password" name="profil_password" required>
            </div>
            <div>
                <label data-mlr-text>Confirmer :</label>
                <input type="password" name="profil_confirm" required>
            </div>
        </div>

        <?php
            if (isset($profil_pwd_error)){
                echo "<p data-mlr-text class=error>" . $profil_pwd_error . "</p>";
            }
        ?>

        <button class="bouton" name="profil_pwd_btn" data-mlr-text>Modifier le mot de passe</button>
    </form>

    <?php 
        if ($_GET['profil'] != $_SESSION['Auth']['id']) {
            echo "-->";
        }
    ?>

    <!-- Sinon que ça -->
    <?php
        if ($_GET['show'] === 'profil') {
            $profil = $db->query("SELECT * FROM users WHERE id = ".$_GET['profil']);
            $_PROFIL = $profil->fetch();

            if (!$_PROFIL) { echo "<p data-mlr-text class=error>ERREUR : Ce profil n'existe pas</p>";}
        }

        echo "<h2>" . $_PROFIL['name'] . " " . $_PROFIL['firstname'] . "</h2>"
    ?>

    <div id="diagramme">
        <p data-mlr-text>Diagramme de l'activité</p>
    </div>
    <div id="soirees">
        <div>
            <h3 data-mlr-text>Participation :</h3>
            <a onclick="window.open('index.php?lang=<?php echo $lang_url ?>&show=base&histo=<?php echo $_GET['profil'] ?>&part')" title="Lien qui emmène vers la page de l'historique des soirées du profil visité" data-mlr-text>Voir la liste</a>
        </div>
        <div>
            <h3 data-mlr-text>Organisation :</h3>
            <a onclick="window.open('index.php?lang=<?php echo $lang_url ?>&show=base&histo=<?php echo $_GET['profil'] ?>&org')" title="Lien qui emmène vers la page de l'historique des soirées qu'à organisé le profil visité" data-mlr-text>Voir la liste</a>
        </div>
    </div>

</section>
