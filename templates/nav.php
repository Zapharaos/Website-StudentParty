<ul>
    <li><a href="index.php?lang=<?php echo $lang_url ?>&show=base" title="Lien qui emmène vers la page d'accueil" data-mlr-text>Accueil</a></li>
    <?php
       if (isset($_SESSION['Auth'])){ /* Pas de session */
           echo "<li><a href='index.php?lang=".$lang_url."&show=add' title='Lien qui emmène vers la page de création dune soirée' data-mlr-text>Ajouter une soirée</a></li><li><a href='index.php?lang=".$lang_url."&show=profil&profil=".$_SESSION['Auth']['id']."' title='Lien qui emmène vers la page du profil de lutilisateur' data-mlr-text>Mon profil</a></li><li><a href='logout.php?lang=".$lang_url."' title='Lien qui permet la déconnexion' data-mlr-text>Déconnexion</a></li>";
       } else { /* Session */
           echo "<li><a href='index.php?lang=".$lang_url."&show=login' title='Lien qui emmène vers la page de connexion' data-mlr-text>Connexion</a></li><li><a href='index.php?lang=".$lang_url."&show=signin' title='Lien qui emmène vers la page de création dun compte' data-mlr-text>Créer un compte</a></li>";
       }
    ?>
</ul>
