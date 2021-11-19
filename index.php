<?php
    include 'assets/PHP/include.php';
?>

<! DOCTYPE html>
<html lang="fr">
    
    <?php include('templates/head.php'); ?>

    <body>
        <div id="loader" class="center"></div>
        <?php
            include('templates/header.php');
            include('assets/PHP/success.php');
            include('templates/html_includes.php');
        ?>
        <span id="top_btn"> <i onclick="jumpheader()" class="fas fa-caret-square-up fa-3x"></i> </span>
    </body>
    
    <?php include('templates/js_includes.php'); ?>
    <?php include 'assets/PHP/sections.php'; ?>
</html>

<?php
    /* SI ASSEZ DE TEMPS : diagramme d'activité */
?>
