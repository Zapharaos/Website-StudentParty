<section id="base">
    <div>
        <?php
            // if the user wants to see histo, we hide the select menu
            if (!empty($_GET['histo'])) {
                echo '<!--';
            }
        ?>
        <div>
            <label for="order" data-mlr-text>Trier par :</label>
            <select name="order" id="order">
                <option value="come" data-mlr-text>Soirées à venir</option>
                <option value="old" data-mlr-text>Soirées passées</option>
                <option value="all" data-mlr-text>Toutes</option>
                <?php
                    if (isset($_SESSION['Auth'])){
                        echo "<option value='me' data-mlr-text>Mes soirées</option>
                        <option value='fav' data-mlr-text>Mes favoris</option>";
                    }
                ?>
            </select>
        </div>
        <?php
            if (!empty($_GET['histo'])) {
                echo '-->';
            }

            echo "<script> $('#order').val(\"".$_GET['order']."\");</script>";
            // end if
        ?> 

        <form id="search" method="POST">
            <label for="search" data-mlr-text>Rechercher une annonce :</label>
            <input type="search" name="search" aria-label="Rechercher une annonce">
            <button name="search_btn" data-mlr-text>Rechercher</button>
        </form>
    </div>

    <ul>
        <?php
            $id = $_SESSION['Auth']['id'];
            $current_date = date('Y-m-d H:i:s');

            if(isset($_REQUEST['search_btn'])) { // selecting party for this search
                
                $search = htmlspecialchars($_POST['search']);
                
                // counting the number of rows
                $query = 'SELECT COUNT(id) FROM party WHERE nom LIKE :search OR city LIKE :search OR adress LIKE :search OR org LIKE :search';
                $prep = $db->prepare($query);
                $prep->bindValue(':search', $search);
                $prep->execute();
                $rows = $prep->fetchColumn();
                
                // selecting party for this search
                $query = 'SELECT id, nom, city, adress, price, slots, rest, male, female, other, org, user, description, date FROM party WHERE nom LIKE :search OR city LIKE :search OR adress LIKE :search OR org LIKE :search';
                $prep = $db->prepare($query);
                $prep->bindValue(':search', $search);
                $prep->execute();
                
            } else if ($_GET['order'] === "me") { // selecting party for this id

                // counting the number of rows
                $query = 'SELECT COUNT(id) FROM party WHERE user=:uid';
                $prep = $db->prepare($query);
                $prep->bindValue(':uid', $id);
                $prep->execute();
                $rows = $prep->fetchColumn();
                
                // selecting party for this id
                $query = 'SELECT id, nom, city, adress, price, slots, rest, male, female, other, org, user, description, date FROM party WHERE user=:uid';
                $prep = $db->prepare($query);
                $prep->bindValue(':uid', $id);
                $prep->execute();
                
            } else if ($_GET['order'] === "fav") { // selecting party in fav for this id
                
                // counting the number of rows
                $query = 'SELECT COUNT(id) FROM party JOIN fav ON fav.party_id=party.id WHERE fav.user_id=:uid';
                $prep = $db->prepare($query);
                $prep->bindValue(':uid', $id);
                $prep->execute();
                $rows = $prep->fetchColumn();
                
                // selecting party in fav for this id
                $query = 'SELECT id, nom, city, adress, price, slots, rest, male, female, other, org, user, description, date FROM party JOIN fav ON fav.party_id=party.id WHERE fav.user_id=:uid';
                $prep = $db->prepare($query);
                $prep->bindValue(':uid', $id);
                $prep->execute();

            } else if ($_GET['order'] === "old") { // selecting party for this date (older)
                
                // counting the number of rows
                $query = 'SELECT COUNT(id) FROM party WHERE date<=:date';
                $prep = $db->prepare($query);
                $prep->bindValue(':date', $current_date);
                $prep->execute();
                $rows = $prep->fetchColumn();
                
                // selecting party for this date (older)
                $query = 'SELECT id, nom, city, adress, price, slots, rest, male, female, other, org, user, description, date FROM party WHERE date<=:date';
                $prep = $db->prepare($query);
                $prep->bindValue(':date', $current_date);
                $prep->execute();
                
            } else if (!empty($_GET['histo'])) {
                if (isset($_GET['org'])) { // selecting party for this org
                    
                    // counting the number of rows
                    $query = 'SELECT COUNT(id) FROM party WHERE user=:uid';
                    $prep = $db->prepare($query);
                    $prep->bindValue(':uid', $_GET['histo']);
                    $prep->execute();
                    $rows = $prep->fetchColumn();
                    
                    $query = 'SELECT id, nom, city, adress, price, slots, rest, male, female, other, org, user, description, date FROM party WHERE user=:uid';
                    $prep = $db->prepare($query);
                    $prep->bindValue(':uid', $_GET['histo']);
                    $prep->execute();
                    
                } else if (isset($_GET['part'])) {
                    
                    // counting the number of rows
                    $query = 'SELECT COUNT(id) FROM party JOIN coming ON coming.party_id=party.id WHERE coming.user_id=:uid';
                    $prep = $db->prepare($query);
                    $prep->bindValue(':uid', $id);
                    $prep->execute();
                    $rows = $prep->fetchColumn();
                    
                    // selecting party in coming for this id
                    $query = 'SELECT id, nom, city, adress, price, slots, rest, male, female, other, org, user, description, date FROM party JOIN coming ON coming.party_id=party.id WHERE coming.user_id=:uid';
                    $prep = $db->prepare($query);
                    $prep->bindValue(':uid', $id);
                    $prep->execute();
                }
            } else if ($_GET['order'] === "all") { // selecting party for all
                
                // counting the number of rows
                $query = 'SELECT COUNT(id) FROM party';
                $prep = $db->prepare($query);
                $prep->execute();
                $rows = $prep->fetchColumn();
                
                // selecting party for all
                $query = 'SELECT id, nom, city, adress, price, slots, rest, male, female, other, org, user, description, date FROM party';
                $prep = $db->prepare($query);
                $prep->execute();
                
            } else { // selecting party for this date (newer)
                
                // counting the number of rows
                $query = 'SELECT COUNT(id) FROM party WHERE date>:date';
                $prep = $db->prepare($query);
                $prep->bindValue(':date', $current_date);
                $prep->execute();
                $rows = $prep->fetchColumn();
                
                // selecting party for this date (newer)
                $query = 'SELECT id, nom, city, adress, price, slots, rest, male, female, other, org, user, description, date FROM party WHERE date>:date';
                $prep = $db->prepare($query);
                $prep->bindValue(':date', $current_date);
                $prep->execute();
                
            }

            if ($rows[0] == 0) { // no rows -> no result
                echo "<p data-mlr-text class=error>Aucun résultat</p>";
            }
            
            else { // else
                foreach ($prep->fetchAll() as $row) {
                    echo "
                        <li onmouseenter='show_details(this)' onmouseleave='close_details(this)'>
                            <div>
                                <div>
                                    <h3>" . $row['nom'] .  "</h3>
                                </div>
                                <div>
                                    <p>" . $row['date'] . "</p>";

                    if ($lang_url == 'fr') {
                        echo        "
                                    <p>Entrée : " . $row['price'] . " €</p>
                                    <p id='slots'>Places : " . $row['slots'] ;

                    } else {
                        echo        "
                                    <p>Entry : " . $row['price'] . " €</p>
                                    <p id='slots'>Slots : " . $row['slots'] ;
                    }

                    echo "
                                </div>
                            </div>
                            <div class='about'>
                                <a onclick=\"window.open('index.php?lang=".$lang_url."&show=profil&profil=".$row['user']."')\"
                                    title=\"Lien qui emmène vers le profil de l'organisateur\" >
                                    " . $row['org'] . "</a>
                                <p>" . $row['description'] . "</p>";
                    if (isset($_SESSION['Auth'])){
                        echo " <a onclick=\"window.open('index.php?lang=".$lang_url."&show=details&party=".$row['id']."')\" title=\"Lien qui emmène vers la page de la soirée\">";
                                    
                        if ($lang_url == 'fr') {
                            echo        "Plus de détails</a>";

                        } else {
                            echo        "More details</a>";
                        }
                    }
                    
                    echo "
                            </div>
                        </li>
                    ";
                }
            }

        ?>
    </ul>
</section>
