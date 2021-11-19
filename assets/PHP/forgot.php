<?php
    // only making this request if the user clicked on the button linked to this if request
    if(isset($_REQUEST['forgot_btn'])) {
        
        if (isset($_POST['forgot_email'])) {
        
            // email in a variable
            $forgot_email = $_POST['forgot_email'];
            
            // if email isnt valid and length is more than 50 characters
            if (!filter_var($_POST['forgot_email'], FILTER_VALIDATE_EMAIL) || strlen($_POST['$forgot_email']) > 50) {
               $forgot_error = "L'email doit être composé de moins de 50 caractères, un '@' et un '.'";
            } else { // preparing the mail
                
                // token created
                $selector = bin2hex(random_bytes(8));
                $token = random_bytes(32);
                $hashtoken = password_hash($token, PASSWORD_DEFAULT);
                $expires = date("U") + 1800 ;
                
                $url = "localhost/index.php?lang=". $_GET['lang'] ."&show=reset_pwd&selector=" . $selector . "&validator=" . bin2hex($token);
                
                // delete the previous request that had already been made (for this email adress)
                $query = 'DELETE FROM pwdReset WHERE pwdResetEmail=:mail';
                $prep = $db->prepare($query);
                $prep->bindValue(':mail', $forgot_email);
                $prep->execute();
                
                // insert the new token
                $query = 'INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (:mail, :selec, :tok, :exp)';
                $prep = $db->prepare($query);
                $prep->execute(array(':mail' => $forgot_email, ':selec' => $selector, ':tok' => $hashtoken, ':exp' => $expires ));
                
                // email language depending on the current websites language
                if ($lang_url == 'fr') {
                    $forgot_sujet = "Réinitialisation de votre mot de passe";
                    $forgot_text = "<h3 style='text-decoration: underline'>".$forgot_sujet ."</h3>
                        <p>Nous avons reçu une demande de réinitialisation de votre mot de passe. Si vous n'avez pas effectué de demande, ignorez ce message.</p>
                        <p>Voici le lien pour réinitialiser votre mot de passe :";
                } else {
                    $forgot_sujet = "Reset your password";
                    $forgot_text = "<h3 style='text-decoration: underline'>".$forgot_sujet."</h3>
                        <p>We've received a request to reset your password. If you didn't make this request please ignore this email.</p>
                        <p>Here is the link to reset : ";
                }
                
                $link = " <a style='text-decoration: underline' href=".$url.">".$forgot_sujet."</a></p>";
                $forgot_message = "".$forgot_text . $link;
                
                require("sendgrid-php/sendgrid-php.php");

                // sending the mail to email adress given in the field
                $forgot_mail = new \SendGrid\Mail\Mail();
                $forgot_mail->setFrom("noreply@studentsparty.com", "noreply@studentsparty.com");
                $forgot_mail->setSubject($forgot_sujet);
                $forgot_mail->addTo($_POST['forgot_email'], $_POST['forgot_email']);
                $forgot_mail->addContent("text/html", "". $forgot_message);
                $forgot_sendgrid = new \SendGrid('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');
                
                try { // trying to send the mail
                    $response = $forgot_sendgrid->send($forgot_mail);
                    $forgot_success = "Nous vous avons envoyé un mail pour réinitialiser votre mot de passe.";
                } catch (Exception $e) {
                    echo 'Caught exception: '. $e->getMessage() ."\n";
                }
                
                // showing the url juste while developping to make it easyer.
                echo $url;
            }
        } else { // if at least one field is empty
            $forgot_error = "Il faut remplir tout les champs";
        }
    }
?>
