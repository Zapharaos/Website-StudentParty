<?php
    // only making this request if the user clicked on the button linked to this if request
    if(isset($_REQUEST['login_btn'])) {

        // if every fields are filled (or at least, not empty)
        if (isset($_POST['login_email'])
            && isset($_POST['login_password']) ){
            
            // email in a variable AND password is quoted
            $login_email = $_POST['login_email'];
            $login_password = $db->quote($_POST['login_password']);
            
            // counting the number of rows for this email adress
            $query = 'SELECT COUNT(id) FROM users WHERE email=:mail';
            $prep = $db->prepare($query);
            $prep->bindValue(':mail', $login_email);
            $prep->execute();
            $rows = $prep->fetchColumn();
            
            if($rows[0] == 1){ // if this email exists
                
                // selecting the password to verify
                $query = 'SELECT password FROM users WHERE email=:mail';
                $prep = $db->prepare($query);
                $prep->bindValue(':mail', $login_email);
                $prep->execute();
                $log_data = $prep->fetch();
                
                if(password_verify($login_password, $log_data['password'])){ // if pwd correspond
                    
                    $query = 'SELECT id, email, name, firstname, password, gender, dobday, dobmonth, dobyear, age, langue FROM users WHERE email=:mail';
                    $prep = $db->prepare($query);
                    $prep->bindValue(':mail', $login_email);
                    $prep->execute();
                    $_SESSION['Auth'] = $prep->fetch();
                    
                    $lang_user = $_SESSION['Auth']['langue'];
                    $login_day = $_SESSION['Auth']['dobday'];
                    $login_month = $_SESSION['Auth']['dobmonth'];
                    $login_year = $_SESSION['Auth']['dobyear'];
                    
                    // set the user's age depending on the current date :
                    $CD = date("j");
                    $CM = date("n");
                    $CY = date("Y");
                    
                    $login_age = $CY - $login_year;
                    if ($login_month == $CM)
                        if ($CD < $login_day)
                            $login_age = $login_age - 1;
                    else if ($CM < $login_month)
                        $login_age = $login_age - 1;
                    
                    // updating age in the database
                    $query = 'UPDATE users SET age=:log_age WHERE dobday=:log_day;';
                    $prep = $db->prepare($query);
                    $prep->bindValue(':log_age', $login_age);
                    $prep->bindValue(':log_day', $login_day);
                    $prep->execute();
                    
                    // loged correctly => redirection to the login page
                    echo "<script>document.location.href = 'index.php?lang=".$lang_user."&show=base'</script>";
                } else { // else
                    $login_error = "Mot de passe incorrect";
                }
            } else { // else
                $login_error = "Email inconnu";
            }
        } else { // if at least one field is empty
            $login_error = "Il faut remplir tout les champs";
        }
    }
?>


