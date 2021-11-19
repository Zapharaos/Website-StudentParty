<section id="details">
    <?php
        // only if the users wants to see the details
        if ($_GET['show'] === 'details') {
            // if the user isnt loged -> home page
            if (!isset($_SESSION['Auth'])) {
                
                echo "<script>document.location.href = '/../../index.php?lang=".$lang_url."&show=base'</script>";
            }
            // if party is empty
            if(!empty($_GET['party'])) {
                
                // counting the number of rows for this party
                $query = 'SELECT COUNT(id) FROM party WHERE id=:id';
                $prep = $db->prepare($query);
                $prep->bindValue(':id', $_GET['party']);
                $prep->execute();
                $rows = $prep->fetchColumn();
                
                if($rows[0] > 0) {
                    
                    // selecting the party
                    $query = 'SELECT id, nom, date, slots, price, rest, city, adress, user, org, description FROM party WHERE id=:id';
                    $prep = $db->prepare($query);
                    $prep->bindValue(':id', $_GET['party']);
                    $prep->execute();
                    $_PARTY = $prep->fetch();
                    
                } else { // redirect -> home
                    echo "<script>document.location.href='index.php?lang=".$lang_url."&show=base';</script>";
                }
            } else { // redirect -> home
                echo "<script>document.location.href='index.php?lang=".$lang_url."&show=base';</script>";
            }
        }
    ?>

    <?php
        if (isset($coming_error)){ // if error
            echo "<p data-mlr-text class=error>" . $coming_error . "</p>";
        }
    ?>

    <div>
        <?php
            echo "<h3><p>" . $_PARTY['nom'] ."</p>";
            
            if ($_GET['show'] === 'details') { // only if the users wants to see the details
                
                echo "<script> function fav(lang, id, type) { document.location.href='index.php?lang=' + lang + '&show=details&party=' + id + '&' + type; } </script>";

                if (isset($_GET['add'])) { // only if the users wants to add to his favourites
                    
                    echo "<span id='testfav' onclick='fav(\"" .$lang_url. "\", " .$_PARTY['id'].", \"del\")'> <i style='color:#c94c4c;' class='fas fa-star'></i> </span>";
                    
                    // delete the previous fav for this party
                    $query = 'DELETE FROM fav WHERE user_id=:uid AND party_id=:pid';
                    $prep = $db->prepare($query);
                    $prep->bindValue(':uid', $_SESSION['Auth']['id']);
                    $prep->bindValue(':pid', $_GET['party']);
                    $prep->execute();
                    
                    // insert the new fav
                    $query = 'INSERT INTO fav (user_id, party_id) VALUES (:uid, :pid)';
                    $prep = $db->prepare($query);
                    $prep->bindValue(':uid', $_SESSION['Auth']['id']);
                    $prep->bindValue(':pid', $_GET['party']);
                    $prep->execute();
                    
                } else if (isset($_GET['del'])) { // only if the users wants to delete from his favourites
                    
                    echo "<span id='testfav' onclick='fav(\"" .$lang_url. "\", " .$_PARTY['id'].", \"add\")'> <i style='color:white;' class='fas fa-star'></i> </span>";
                    
                    // delete the fav for this party
                    $query = 'DELETE FROM fav WHERE user_id=:uid AND party_id=:pid';
                    $prep = $db->prepare($query);
                    $prep->bindValue(':uid', $_SESSION['Auth']['id']);
                    $prep->bindValue(':pid', $_GET['party']);
                    $prep->execute();
                    
                } else { // else : show
                    
                    // counting the number of rows for this party
                    $query = 'SELECT COUNT(user_id) FROM fav WHERE user_id=:uid AND party_id=:pid';
                    $prep = $db->prepare($query);
                    $prep->bindValue(':uid', $_SESSION['Auth']['id']);
                    $prep->bindValue(':pid', $_GET['party']);
                    $prep->execute();
                    $rows = $prep->fetchColumn();
                    
                    if($rows[0] > 0) { // different color for the star
                        echo "<span id='testfav' onclick='fav(\"" .$lang_url. "\", " .$_PARTY['id'].", \"del\")'> <i style='color:#c94c4c;' class='fas fa-star'></i> </span>";
                    } else {
                        echo "<span id='testfav' onclick='fav(\"" .$lang_url. "\", " .$_PARTY['id'].", \"add\")'> <i style='color:white;' class='fas fa-star'></i> </span>";
                    }
                }
        ?>
    </div>
    <div>
        <?php
            echo "</h3><div id='infodetails'><div><p>" . $_PARTY['date'] . "</p>";
            if ($lang_url == 'fr') {
                echo "<p>Places : " . $_PARTY['slots'] . "</p></div>
                    <div><p>Entrée : " . $_PARTY['price'] . " €</p>
                    <p>Reste : " . $_PARTY['rest'] . "</p></div></div>";

            } else {
                echo "<p>Slots : " . $_PARTY['slots'] . "</p></div>
                    <div><p>Entry : " . $_PARTY['price'] . " €</p>
                    <p>Left : " . $_PARTY['rest'] . "</p></div></div>";
            }
        ?>
    </div>
    <div id="adresse">
        <p><?php echo $_PARTY['city'] ?></p>
        <p><?php echo $_PARTY['adress'] ?></p>
        <?php
            echo "<a onclick=\"window.open('index.php?lang=".$lang_url."&show=profil&profil=".$_PARTY['user']."')\"
            title=\"Lien qui emmène vers le profil de l'organisateur\" >
            " . $_PARTY['org'] . "</a>";
        }
        ?>
    </div>
    <?php
        // only if the users wants to see the details and the party isnt empty
        if ($_GET['show'] === 'details' && !empty($_GET['party'])) {
            
            // select for the party informations of the members for a graphic
            $query = 'SELECT male, female, other, slots, rest FROM party WHERE id=:id';
            $prep = $db->prepare($query);
            $prep->bindValue(':id', $_GET['party']);
            $prep->execute();
            $partysql = $prep->fetch();
            
            $partymale = (int)$partysql['male'];
            $partyfemale = (int)$partysql['female'];
            $partyother = (int)$partysql['other'];
            $slots = ((int)$partysql['slots'] - (int)$partysql['rest']);

            if ($partymale == 0 && $partyfemale == 0 && $partyother == 0) {
                $partymale = 33;
                $partyfemale = 33;
                $partyother = 33;
            } else {
                $partymale = $partymale / $slots * 100;
                $partyfemale = $partyfemale / $slots * 100;
                $partyother = $partyother / $slots * 100;
            }

            echo "<div class=\"perc\">
                    <div style=\"width:". $partymale ."%\" class=\"man\"></div>
                    <div style=\"width:". $partyfemale ."%\" class=\"others\"></div>
                    <div style=\"width:". $partyother ."%\" class=\"woman\"></div>
                </div>";
    ?>

    <section>
        <p style="width: 32%" id="man" data-mlr-text>Homme</p>
        <p style="width: 32%" id="others" data-mlr-text>Autre</p>
        <p style="width: 32%" id="woman" data-mlr-text>Femme</p>
    </section>

    <p><?php echo $_PARTY['description'] ?></p>

    <?php
        
        $current_date = date('Y-m-d H:i:s');
        
        if ($current_date < $_PARTY['date']){ // if party hasnt happened yet
            
            // counting the number of rows for this party
            $query = 'SELECT COUNT(user_id) FROM coming WHERE user_id=:uid AND party_id=:pid';
            $prep = $db->prepare($query);
            $prep->bindValue(':uid', $_SESSION['Auth']['id']);
            $prep->bindValue(':pid', $_GET['party']);
            $prep->execute();
            $rows = $prep->fetchColumn();
            
            if ($rows[0] == 0) { // if user hasnt signed up
                if ($lang_url == "fr" ){
                    echo "<form method='POST'><button class='bouton' name='coming_btn' data-mlr-text>Inscription</button></form>";
                } else {
                    echo "<form method='POST'><button class='bouton' name='coming_btn' data-mlr-text>Registration</button></form>";
                }
            } else { // if user has already signed up
                if ($lang_url == "fr" ){
                    echo "<form method='POST'><button class='bouton' name='not_coming_btn' data-mlr-text>Désinscription</button></form>";
                } else {
                    echo "<form method='POST'><button class='bouton' name='not_coming_btn' data-mlr-text>Unregister</button></form>";
                }
            }
            
            if ($lang_url == "fr" ){ // link to the party members list
                echo "<a href=\"index.php?lang=" .$lang_url."&show=coming&party=".$_GET['party']."\" title=\"Lien qui emmène vers la liste des participants\" data-mlr-text>Voir les participants ?</a>";
            } else {
                echo "<a href=\"index.php?lang=" .$lang_url."&show=coming&party=".$_GET['party']."\" title=\"Lien qui emmène vers la liste des participants\" data-mlr-text>See the participants?</a>";
            }
        }
    }
    ?>
</section>
