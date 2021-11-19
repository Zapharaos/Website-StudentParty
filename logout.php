<?php
        include 'assets/PHP/db.php';
        include 'assets/PHP/session.php';
    
        if ($_GET['lang'] === "en") {
            $query = 'UPDATE users SET langue="en" WHERE id="'.$_SESSION['Auth']['id'].'";';
        } else {
            $query = 'UPDATE users SET langue="fr" WHERE id="'.$_SESSION['Auth']['id'].'";';
        }
        $db->query($query);
        unset($_SESSION['Auth']);
        session_destroy();
        echo "<script>document.location.href = 'index.php?lang=".$_GET['lang']."&show=base'</script>";
?>

