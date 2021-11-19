<?php
    // picking up the users informations
    $id = $_SESSION['Auth']['id'];
    $_POST['profil_n'] = $_SESSION['Auth']['name'];
    $_POST['profil_p'] = $_SESSION['Auth']['firstname'];
    $_POST['profil_m'] = $_SESSION['Auth']['email'];

    // only making this request if the user clicked on the button linked to this if request
    if(isset($_REQUEST['profil_info_btn'])) {
        // if every fields are filled (or at least, not empty)
        if (isset($_POST['profil_name']) && isset($_POST['profil_prenom']) && isset($_POST['profil_mail'])) {
            
            // special chars
            $profil_name = htmlspecialchars($_POST['profil_name'],ENT_QUOTES);
            $profil_prenom = htmlspecialchars($_POST['profil_prenom'],ENT_QUOTES);
            $profil_mail = htmlspecialchars($_POST['profil_mail'],ENT_QUOTES);
            
             // TEST NOM  : only letters and less than 50 characters
            if ( !ctype_alpha($_POST['profil_name']) || (strlen($_POST['$profil_name']) > 50)) {
                $profil_error = "Le nom doit être composé uniquement de lettres et de moins de 50 caractères";
            }
            // TEST PRENOM : only letters and less than 50 characters
            else if ( !ctype_alpha($_POST['profil_prenom']) || (strlen($_POST['$profil_prenom']) > 50)) {
               $profil_error = "Le prénom doit être composé uniquement de lettres et de moins de 50 caractères";
            }
            // TEST EMAIL : less than 50 characters, 1 "@" et 1 "."
            else if (!filter_var($_POST['profil_mail'], FILTER_VALIDATE_EMAIL) || strlen($_POST['$profil_mail']) > 50) {
               $profil_error = "L'email doit être composé de moins de 50 caractères, un '@' et un '.'";
            } else { // else
                
                // counting the number of rows for this email adress
                $query = 'SELECT COUNT(id) FROM users WHERE email=:mail';
                $prep = $db->prepare($query);
                $prep->bindValue(':mail', $profil_mail);
                $prep->execute();
                $rows = $prep->fetchColumn();
                
                // selecting the id
                $query = 'SELECT id FROM users WHERE email=:mail';
                $prep = $db->prepare($query);
                $prep->bindValue(':mail', $profil_mail);
                $prep->execute();
                $result = $prep->fetch();

                if($rows[0] == 0 || ($rows[0] == 1 && $id==$result['id'])){
                    
                    $query = 'UPDATE users SET name=:name, firstname=:fname, email=:mail WHERE id=:id';
                    $prep = $db->prepare($query);
                    $prep->bindValue(':name', $profil_name);
                    $prep->bindValue(':fname', $profil_prenom);
                    $prep->bindValue(':mail', $profil_mail);
                    $prep->bindValue(':id', $id);
                    
                    if($prep->execute()) { //update succeeded
                        $profil_success = "Mot de passe modfié avec succes.";
                        
                        $query = 'SELECT id, email, name, firstname, password, gender, dobday, dobmonth, dobyear, age, langue FROM users WHERE id=:id';
                        $prep = $db->prepare($query);
                        $prep->bindValue(':id', $id);
                        $prep->execute();
                        $_SESSION['Auth'] = $prep->fetch();
                        
                        // reloading the page
                        //echo "<script> location.reload(true);</script>";
                        echo "<script>document.location.href = 'index.php?lang=".$lang_user."&show=profil&profil=".$id."'</script>";
                    } else { // failed
                        die("Impossible d'éditer le compte.");
                    }
                } else { // else
                    $profil_error = "Email déjà utilisé";
                }
            }
            
        } else { // if at least one field is empty
            $profil_error = "Il faut remplir tout les champs";
        }
        
        $profil_info_error = $profil_error;
    }
    
    // only making this request if the user clicked on the button linked to this if request
    if(isset($_REQUEST['profil_pwd_btn'])) {
        // if every fields are filled (or at least, not empty)
        if (isset($_POST['profil_current']) && isset($_POST['profil_password']) && isset($_POST['profil_confirm'])) {
            
            // users informations and variables
            $password = $_SESSION['Auth']['password'];
            $profil_current = $db->quote($_POST['profil_current']);
            $profil_password = $db->quote($_POST['profil_password']);
            $profil_confirm = $db->quote($_POST['profil_confirm']);
            $profil_c_hash = password_hash($profil_current, PASSWORD_DEFAULT);
            
            // TEST MDP : length between 8 and 255 characters, at least 1 lowercase et 1 uppercase
            if (!password_verify($profil_current, $password)) {
                $profil_error = "Mot de passe incorrect";
            } else if (strlen($_POST['profil_password']) < 8){
                $profil_error = "Le mot de passe doit être composé d'au moins 8 caractères";
            } else if (strlen($_POST['profil_password']) > 255){
                $profil_error = "Le mot de passe doit être composé de moins de 255 caractères";
            } else if (ctype_upper($_POST['profil_password'])){
                $profil_error = "Le mot de passe doit être composé d'au moins 1 minuscule";
            } else if (ctype_lower($_POST['profil_password'])){
                $profil_error = "Le mot de passe doit être composé d'au moins 1 majuscule";
            } else if ($_POST['profil_password'] != $_POST['profil_confirm']) {
                $profil_error = "La confirmation est fausse";
            } else { // else
                
                // hashing the password
                $profil_password = password_hash($profil_password, PASSWORD_DEFAULT);
                
                $query = 'UPDATE users SET password=:pwd WHERE id=:id';
                $prep = $db->prepare($query);
                $prep->bindValue(':pwd', $profil_password);
                $prep->bindValue(':id', $id);
                
                if($prep->execute()) { //update succeeded
                    $profil_success = "Mot de passe modfié avec succes.";

                    $query = 'SELECT id, email, name, firstname, password, gender, dobday, dobmonth, dobyear, age, langue FROM users WHERE id=:id';
                    $prep = $db->prepare($query);
                    $prep->bindValue(':id', $id);
                    $prep->execute();
                    $_SESSION['Auth'] = $prep->fetch();
                    
                    // reloading the page
                    //echo "<script> location.reload(true);</script>";
                    echo "<script>document.location.href = 'index.php?lang=".$lang_user."&show=profil&profil=".$id."'</script>";
                } else { // failed
                    die("Impossible d'éditer le compte.");
                }
            }
        } else {
            $profil_error = "Il faut remplir tout les champs";
        }
        
        $profil_pwd_error = $profil_error;
    }
    
?>
