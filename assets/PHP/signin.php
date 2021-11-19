<?php
    // only making this request if the user clicked on the button linked to this if request
    if(isset($_REQUEST['signin_btn'])) {
        
        // if every fields are filled (or at least, not empty)
        if (isset($_POST['signin_name'])
            && isset($_POST['signin_prenom'])
            && isset($_POST['signin_mail'])
            && isset($_POST['signin_gender'])
            && isset($_POST['signin_password'])
            && isset($_POST['signin_confirm'])
            && isset($_POST['signin_day'])
            && isset($_POST['signin_month'])
            && isset($_POST['signin_year'])
            ){
            
            // special chars for the name, first name, email and gender
            $signin_name = htmlspecialchars($_POST['signin_name'],ENT_QUOTES);
            $signin_prenom = htmlspecialchars($_POST['signin_prenom'],ENT_QUOTES);
            $signin_mail = htmlspecialchars($_POST['signin_mail'],ENT_QUOTES);
            $signin_gender = htmlspecialchars($_POST['signin_gender'],ENT_QUOTES);
            
            // password is quoted
            $signin_password = $db->quote($_POST['signin_password']);
            $signin_confirm = $db->quote($_POST['signin_confirm']);
            
            // no tests for the birth date because we arent showing it for now, maybe in the future (update)
            $signin_day = $_POST['signin_day'];
            $signin_month = $_POST['signin_month'];
            $signin_year = $_POST['signin_year'];
            
            // set the user's age depending on the current date :
            $CD = date("j");
            $CM = date("n");
            $CY = date("Y");
            
            $signin_age = $CY - $signin_year;
            
            if ($signin_month == $CM)
                if ($CD < $signin_day)
                    $signin_age = $signin_age - 1;
            else if ($CM < $signin_month)
                $signin_age = $signin_age - 1;
            
            // TEST NOM : only letters and less than 50 characters
            if ( !ctype_alpha($_POST['signin_name']) || (strlen($_POST['$signin_name']) > 50)) {
                $signin_error = "Le nom doit être composé uniquement de lettres et de moins de 50 caractères";
            }
            // TEST PRENOM : only letters and less than 50 characters
            else if ( !ctype_alpha($_POST['signin_prenom']) || (strlen($_POST['$signin_prenom']) > 50)) {
               $signin_error = "Le prénom doit être composé uniquement de lettres et de moins de 50 caractères";
            }
            // TEST DATE DE NAISSANCE : classic calendar values
            else if (!ctype_digit($_POST['signin_day']) || $_POST['signin_day'] < 1 || $_POST['signin_day'] > 31 ){
               $signin_error = "Le jour de naissance doit être entre 1 et 31";
            } else if (!ctype_digit($_POST['signin_month']) || $_POST['signin_month'] < 1 || $_POST['signin_month'] > 12 ){
               $signin_error = "Le mois de naissance doit être entre 1 et 12";
            } else if (!ctype_digit($_POST['signin_year']) || $_POST['signin_year'] < 1950 || $_POST['signin_year'] > 2020 ){
               $signin_error = "L'année de naissance doit être entre 1950 et 2020";
            } else if ($_POST['signin_month'] == 2 && $_POST['signin_day'] > 29 ){
               $signin_error = "Fevrier ne comporte que 28 ou 29 jours";
            }
            // TEST AGE : age cannot be null
            else if ($signin_age < 1){
               $signin_error = "L'age ne peut pas etre nul";
            }
            // TEST SEXE : it can only be a male, female, or other
            else if ( !ctype_alpha($_POST['signin_gender']) || ($_POST['signin_gender']!='male' && $_POST['signin_gender']!='female' && $_POST['signin_gender']!='other')){
               $signin_error = "Le sexe doit être 'homme', 'femme' ou 'autre' et composé uniquement de lettres";
            }
            // TEST EMAIL : less than 50 characters, 1 "@" et 1 "."
            else if (!filter_var($_POST['signin_mail'], FILTER_VALIDATE_EMAIL) || strlen($_POST['$signin_mail']) > 50) {
               $signin_error = "L'email doit être composé de moins de 50 caractères, un '@' et un '.'";
            }
            // TEST MDP : length between 8 and 255 characters, at least 1 lowercase et 1 uppercase
            else if (strlen($_POST['signin_password']) < 8){
                $signin_error = "Le mot de passe doit être composé d'au moins 8 caractères";
            } else if (strlen($_POST['signin_password']) > 255){
                $signin_error = "Le mot de passe doit être composé de moins de 255 caractères";
            } else if (ctype_upper($_POST['signin_password'])){
                $signin_error = "Le mot de passe doit être composé d'au moins 1 minuscule";
            } else if (ctype_lower($_POST['signin_password'])){
                $signin_error = "Le mot de passe doit être composé d'au moins 1 majuscule";
            // TEST PWD CONFIRMATION :
            } else if ($_POST['signin_password'] != $_POST['signin_confirm']) {
                $signin_error = "La confirmation est fausse";
            } else {
            
                // hashing the password
                $signin_hash = password_hash($signin_password, PASSWORD_DEFAULT);
                
                // looking into the users table
                $query = 'SELECT COUNT(id) FROM users WHERE email=:mail';
                $prep = $db->prepare($query);
                $prep->bindValue(':mail', $signin_mail);
                $prep->execute();
                $rows = $prep->fetchColumn();

                // if this email adress isnt already used
                if ($rows[0] == 0) {
                    $prep_add_user = $db->prepare('INSERT INTO users (email, name, firstname, password, gender, dobday, dobmonth, dobyear, age, langue) VALUES (:mail, :nam, :fnam, :pwd, :gen, :day, :month, :year, :yo, :lg)');
                    // executing the query
                    if (!$prep_add_user->execute(array(
                       ':mail' => $signin_mail,
                       ':nam' => $signin_name,
                       ':fnam' => $signin_prenom,
                       ':pwd' => $signin_hash,
                       ':gen' => $signin_gender,
                       ':day' => $signin_day,
                       ':month' => $signin_month,
                       ':year' => $signin_year,
                       ':yo' => $signin_age,
                       ':lg' => $_GET['lang']
                        ))) { // if an error occured => die
                        die("Impossible d'enregister le compte.");
                    } else { // if we created the account correctly => redirection to the login page
                        echo "<script>document.location.href = 'index.php?lang=".$lang_url."&show=login'</script>";
                    }
                } else { // else
                    $signin_error = "Email déjà utilisé";
                }
            }
        } else { // if at least one field is empty
            $signin_error = "Il faut remplir tout les champs";
        }
    }
?>
