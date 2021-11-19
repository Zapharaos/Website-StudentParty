<?php
    try {
        $db = new PDO("sqlite:database.db");
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //error_reporting(E_ALL);
    } catch(PDOException $e) {
        echo 'Impossible de se connecter à la base de donnée';
        echo $e->getMessage();
        die();
    }
?>
