<section id="coming">
    <?php
        // only if the users wants to see the party members list
        if ($_GET['show'] === 'coming') {
            // if party isnt empty in the url
            if(!empty($_GET['party'])) {
            
                // counting every user_id for this party_id
                $query = 'SELECT user_id FROM coming WHERE party_id=:pid';
                $prep = $db->prepare($query);
                $prep->bindValue(':pid', $_GET['party']);
                $prep->execute();
                $coming = $prep->fetchAll();
                
                // counting the number of rows for this party
                $query = 'SELECT COUNT(*) FROM coming WHERE party_id=:pid';
                $prep = $db->prepare($query);
                $prep->bindValue(':pid', $_GET['party']);
                $prep->execute();
                $rows = $prep->fetchColumn();
                
                if($rows[0] > 0) { // at least one
                    
                    // selecting for this id
                    $query = 'SELECT name, firstname FROM users JOIN coming ON coming.user_id=users.id WHERE coming.party_id=:pid';
                    $prep = $db->prepare($query);
                    $prep->bindValue(':pid', $_GET['party']);
                    $prep->execute();
                    $members = $prep->fetchAll();
                    
                    // select party name
                    $query = 'SELECT nom FROM party WHERE id=:id';
                    $prep = $db->prepare($query);
                    $prep->bindValue(':id', $_GET['party']);
                    $prep->execute();
                    $nameparty = $prep->fetch();
                    
                    echo "<h2>" . $nameparty['nom'] . "</h2>";
                    
                    echo "<ul>";
                    // show party members
                    foreach ($members as $row) {
                        echo "<li>" . $row['firstname'] . " " . $row['name'] . "</li>";
                    }
                    echo "</ul>";
                } else { // redirection home
                    echo "<script>document.location.href='index.php?lang=".$lang_url."&show=base';</script>";
                }
            } else { // redirection home
                echo "<script>document.location.href='index.php?lang=".$lang_url."&show=base';</script>";
            }
        }
    ?>
</section>
