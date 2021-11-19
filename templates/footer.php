<footer>
    <form action="" method="POST">
        <h1>Contact</h1>
        <span id="contact_open"> <i onclick="contact_open()" class="fas fa-caret-square-down fa-3x"></i> </span>
        <div id="contact">
            <span id="contact_close"> <i onclick="contact_close()" class="fas fa-caret-square-up fa-3x"></i> </span>
            <div>
                <label data-mlr-text>Nom et prénom :</label>
                <input type="text" name="contact_name" value="<?php echo $_POST['contact_name']?>" required>
            </div>
            <div>
                <label>Email :</label>
                <input type="mail" name="contact_email" value="<?php echo $_POST['contact_email']?>" required>
            </div>
            <div>
                <label data-mlr-text>Sujet :</label>
                <input type="text" name="contact_sujet" value="<?php echo $_POST['contact_sujet']?>" required>
            </div>
            <div>
                <label>Message :</label>
                <textarea name="contact_message" value="<?php echo $_POST['contact_message']?>" required> </textarea>
            </div>

            <?php
                if (isset($contact_error)){
                    echo "<p data-mlr-text class=error>" . $contact_error . "</p>";
                }
            ?>

            <button class="bouton" name="contact_btn" data-mlr-text>Envoyer</button>
        </div>
    </form>

    <div>
        <h1 data-mlr-text>Mentions légales</h1>
        <ul id="legal">
            <li> <a href="" title="Lien qui emmène vers la page du site du particulier" data-mlr-text>Site du particulier</a></li>
            <li> <a href="" title="Lien qui emmène vers la page d'utilisation des cookies" data-mlr-text>Utilisation de cookies</a></li>
            <li> <a href="" title="Lien qui emmène vers la page d'utilisation des données personelles" data-mlr-text>Utilisation de données personelles</a></li>
            <li> <a onclick="window.open('https://www.gnu.org/licenses/gpl-3.0.en.html')" title="Lien qui emmène vers la page de la licence">Licence GPLv3</a></i>
            <li> <a onclick="window.open('https://github.com/Zapharaos/MF-Undergraduate')" title="Lien qui emmène vers le github">GitHub</a></i>
        </ul>
        
        <div id="under">
            <div>
                <h3 data-mlr-text>Réseaux sociaux</h3>
                <div id="socialmedia">
                    <span> <a href="" title="Lien qui emmène vers la page facebook"><i class="fab fa-facebook-square fa-3x"></i></a> </span>
                    <span> <a href="" title="Lien qui emmène vers la page twitter"><i class="fab fa-twitter-square fa-3x"></i></a> </span>
                    <span> <a href="" title="Lien qui emmène vers la page instagram"><i class="fab fa-instagram fa-3x"></i></a> </span>
                </div>
            </div>
            <div>
                <h3 data-mlr-text>Changer la langue</h3>
                <select id="mbPOCControlsLangDrop"></select>
            </div>
        </div>
    </div>
</footer>

