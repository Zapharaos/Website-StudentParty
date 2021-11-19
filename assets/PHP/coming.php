<?php
    // only making this request if the user clicked on the button linked to this if request
    if(isset($_REQUEST['coming_btn'])) {
        // only if the user is loged
        if (isset($_SESSION['Auth'])) {
            // if every fields are filled (or at least, not empty) and numeric
            if (!empty($_GET['party']) && is_numeric($_GET['party'])) {
                
                // counting the number of rows for this party and this id
                $query = 'SELECT COUNT(user_id) FROM coming WHERE user_id=:uid AND party_id=:pid';
                $prep = $db->prepare($query);
                $prep->bindValue(':uid', $_SESSION['Auth']['id']);
                $prep->bindValue(':pid', $_GET['party']);
                $prep->execute();
                $rows = $prep->fetchColumn();
                
                if ($rows[0] == 0) { // if user hasnt signup for this yet
                    
                    // add user to party list
                    $query = 'INSERT INTO coming (user_id, party_id) VALUES (:uid,:pid)';
                    $prep = $db->prepare($query);
                    $prep->bindValue(':uid', $_SESSION['Auth']['id']);
                    $prep->bindValue(':pid', $_GET['party']);
                    $prep->execute();
                    
                    // update party slots
                    $query = 'UPDATE party SET rest=rest-1 WHERE id=:pid';
                    $prep = $db->prepare($query);
                    $prep->bindValue(':pid', $_GET['party']);
                    $prep->execute();
                    
                    // update party gender
                    if ($_SESSION['Auth']['gender'] == "male") { // if male
                        $query = 'UPDATE party SET male=male+1 WHERE id=:pid';
                    } else if ($_SESSION['Auth']['gender'] == "female") { // if female
                        $query = 'UPDATE party SET female=female+1 WHERE id=:pid';
                    } else { // if other
                        $query = 'UPDATE party SET other=other+1 WHERE id=:pid';
                    }

                    $prep = $db->prepare($query);
                    $prep->bindValue(':pid', $_GET['party']);
                    $prep->execute();

                // QR CODE
                    /*require("phpqrcode/qrlib.php");
                    $nom = 'user_'.$_SESSION['Auth']['id'].'-party_'.$_GET['party'];
                    $path = "assets/QR/".$nom;
                    QRcode::png($nom,$path.".png", $level = QR_ECLEVEL_L, 17);*/

                // PDF
                    /*require('fpdf17/fpdf.php');
                    $pdf = new FPDF('P', 'mm', 'a5');
                    $pdf->AddPage();
                    $pdf->Image($path.".png");
                    $pdf->Output($path.".pdf", "F");*/

                    // select party name
                    $query = 'SELECT nom FROM party WHERE id=:pid';
                    $prep = $db->prepare($query);
                    $prep->bindValue(':pid', $_GET['party']);
                    $prep->execute();
                    $partysql = $prep->fetch();

                    // email language depending on the current websites language
                    if ($lang_url == 'fr') {
                        $coming_sujet = "Inscription à : ";
                        $comingtxt = "Voici la confirmation de votre inscription. Veuillez vous munir de cette confirmation afin de pouvoir y entrer.";
                    } else {
                        $coming_sujet = "Signup to : ";
                        $comingtxt = "Here is the confirmation of your registration. Please have this confirmation in order to be able to come in.";
                    }

                    $coming_text = "<h3 style='text-decoration: underline'>".$coming_sujet.$partysql['nom']."</h3>
                                    <p>" . $comingtxt ."</p><img src='cid:qrcode'></div>";

                    require("sendgrid-php/sendgrid-php.php");

                    // sending the mail to email adress given in the field
                    $coming_mail = new \SendGrid\Mail\Mail();
                    $coming_mail->setFrom("noreply@studentsparty.com", "noreply@studentsparty.com");
                    $coming_mail->setSubject($coming_sujet . $partysql['nom']);
                    // à remplacer par une adresse mail accessible par l'utilisateur :
                    $coming_mail->addTo($_SESSION['Auth']['email'], $_SESSION['Auth']['email']);
                    $coming_mail->addContent("text/html", $coming_text);
                    //$file_encoded = base64_encode(file_get_contents($path.".pdf"));
                   // $coming_mail->addAttachment( $file_encoded, "application/pdf", "my_qrcode.pdf", "attachment");

                    $coming_sendgrid = new \SendGrid('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');
                    
                    try { // trying to send the mail
                        $response = $coming_sendgrid->send($coming_mail);
                        // if succeeded
                        $coming_success = "Nous avons enregistré votre inscription. Votre place vous a été envoyé par email.";
                    } catch (Exception $e) {
                        echo 'Caught exception: '. $e->getMessage() ."\n";
                    }
                }
            } else { // else
                $coming_error = "'party' doit être un nombre";
            }
        } else { // else
            $coming_error = "Vous devez être connecté";
        }
    }

    // only making this request if the user clicked on the button linked to this if request
    if(isset($_REQUEST['not_coming_btn'])) {
        // only if the user is loged
        if (isset($_SESSION['Auth'])) {
            // if every fields are filled (or at least, not empty) and numeric
            if (!empty($_GET['party']) && is_numeric($_GET['party'])) {
                
                // counting the number of rows for this party and this id
                $query = 'SELECT COUNT(user_id) FROM coming WHERE user_id=:uid AND party_id=:pid';
                $prep = $db->prepare($query);
                $prep->bindValue(':uid', $_SESSION['Auth']['id']);
                $prep->bindValue(':pid', $_GET['party']);
                $prep->execute();
                $rows = $prep->fetchColumn();
                
                if ($rows[0] == 1) {
                    
                    // delete user from party list
                    $query = 'DELETE FROM coming WHERE user_id=:uid AND party_id=:pid';
                    $prep = $db->prepare($query);
                    $prep->bindValue(':uid', $_SESSION['Auth']['id']);
                    $prep->bindValue(':pid', $_GET['party']);
                    $prep->execute();
                    
                    // update party slots
                    $query = 'UPDATE party SET rest=rest+1 WHERE id=:pid';
                    $prep = $db->prepare($query);
                    $prep->bindValue(':pid', $_GET['party']);
                    $prep->execute();
                    
                    // update party gender
                    if ($_SESSION['Auth']['gender'] == "male") { // if male
                        $query = 'UPDATE party SET male=male-1 WHERE id=:pid';
                    } else if ($_SESSION['Auth']['gender'] == "female") { // if female
                        $query = 'UPDATE party SET female=female-1 WHERE id=:pid';
                    } else { // if other
                        $query = 'UPDATE party SET other=other-1 WHERE id=:pid';
                    }

                    $prep = $db->prepare($query);
                    $prep->bindValue(':pid', $_GET['party']);
                    $prep->execute();
                    
                } // if succeeded
                $coming_success = "Vous avez annulé votre inscription.";
            } else { // else
                $coming_error = "'party' doit être un nombre";
            }
        } else { // else
            $coming_error = "Vous devez être connecté";
        }
    }
?>
