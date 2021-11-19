<?php
    // only making this request if the user clicked on the button linked to this if request
    if(isset($_REQUEST['reset_btn'])) {
        
        // picking the varaibles from the url and from the fields
        $selector = $_GET['selector'];
        $validator = $_GET['validator'];
        $reset_password = $db->quote($_POST['reset_password']);
        $reset_confirmer = $db->quote($_POST['reset_confirmer']);
        $date = date("U");
        
        // if not empty and digits
        if (!empty($selector) && ctype_xdigit($selector) && !empty($validator) && ctype_xdigit($validator)){
            
            // counting the number of rows for this email adress
            $query = 'SELECT COUNT(pwdResetExpires) FROM pwdReset WHERE pwdResetExpires>=:date';
            $prep = $db->prepare($query);
            $prep->bindValue(':date', $date);
            $prep->execute();
            $rows = $prep->fetchColumn();
            
            if($rows[0] == 0) { // if there is no results
                $reset_error = "Temps écoulé. Il faut reformuler une requête";
            } else { // else
                
                $query = 'SELECT pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires FROM pwdReset WHERE pwdResetExpires>=:date';
                $prep = $db->prepare($query);
                $prep->bindValue(':date', $date);
                $prep->execute();
                $reset_result = $prep->fetch();
                
                $tokenBin = hex2bin($validator);
                $tokenCheck = password_verify($tokenBin, $result['pwdResetToken']);
                
                if (password_verify($tokenBin, $reset_result['pwdResetToken'])){ // if token corresponds
                    if (isset($reset_password) && isset($reset_confirmer)) {

                        $reset_email = $reset_result['pwdResetEmail'];
                        
                        // TEST MDP : length between 8 and 255 characters, at least 1 lowercase et 1 uppercase
                        if (strlen($_POST['reset_password']) < 8){
                            $reset_error = "Le mot de passe doit être composé d'au moins 8 caractères";
                        } else if (strlen($_POST['reset_password']) > 255){
                            $reset_error = "Le mot de passe doit être composé de moins de 255 caractères";
                        } else if (ctype_upper($_POST['reset_password'])){
                            $reset_error = "Le mot de passe doit être composé d'au moins 1 minuscule";
                        } else if (ctype_lower($_POST['reset_password'])){
                            $reset_error = "Le mot de passe doit être composé d'au moins 1 majuscule";
                        // TEST PWD CONFIRMATION :
                        } else if ($_POST['reset_password'] != $_POST['reset_confirmer']) {
                            $reset_error = "La confirmation est fausse";
                        } else {
                            // hashing the password
                            $reset_hash = password_hash($reset_password, PASSWORD_DEFAULT);
                            
                            $query = 'UPDATE users SET password=:pwd WHERE email=:mail';
                            $prep = $db->prepare($query);
                            $prep->bindValue(':pwd', $reset_hash);
                            $prep->bindValue(':mail', $reset_email);
                            
                            if(!$prep->execute()) {
                                die("Impossible de modifier le mot de passe.");
                            } else { // edited correctly => redirection to the login page
                                $reset_success = "Le mot de passe a bien été réinitialisé.";
                                echo "<script>document.location.href = 'index.php?lang=".$lang_url."&show=login'</script>";
                            }
                        }
                    } else { // if at least one field is empty
                        $reset_error = "Il faut remplir tout les champs";
                    }
                } else { // else
                    $reset_error = "Erreur. Il faut reformuler une requête";
                }
            }
        } else { // else
            $reset_error = "Erreur. Il faut reformuler une requête";
        }
    }
?>
