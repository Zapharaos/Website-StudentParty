<?php
    // if the php request succeeded or didnt :
    if (isset($contact_success)){ // contact form
        echo "<p data-mlr-text class=success>" . $contact_success . "</p>";
    } else if (isset($forgot_success)){ // forgot your password form
        echo "<p data-mlr-text class=success>" . $forgot_success . "</p>";
    } else if (isset($reset_success)){ // reset your password form
        echo "<p data-mlr-text class=success>" . $reset_success . "</p>";
    } else if (isset($profil_success)){ // profil edit succeeded
        echo "<p data-mlr-text class=success>" . $profil_success . "</p>";
    } else if (isset($profil_error)){ // profil edit didnt worked
        echo "<p data-mlr-text class=error>" . $profil_error . "</p>";
    } else if (isset($coming_success)){ // signup to the party
           echo "<p data-mlr-text class=success>" . $coming_success . "</p>";
    }
?>
