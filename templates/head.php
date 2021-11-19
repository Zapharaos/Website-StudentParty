<head>

<?php 
    $show = $_GET['show'];

    switch($show) {
        case 'add':
            $title = "Créer une soirée";
            break;
        case 'login':
            $title = "Connexion";
            break;
        case 'signin':
            $title = "Créer mon compte";
            break;
        case 'reset_pwd':
            $title = "Réinitialiser le mot de passe";
            break;
        case 'forgot':
            $title = "Oubli du mot de passe";
            break;
        default:
            $title = "Student Party";
            break;
    }
?>

    <title data-mlr-text><?php echo $title;?></title>
    <meta charset="utf-8">
    <meta name="author" content="Matthieu Freitag">
    <meta name="description" content="Student Party">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- INCLUDE CSS -->
    <link rel="stylesheet" type="text/css" href="assets/CSS/sections.css">
    <link rel="stylesheet" type="text/css" href="assets/CSS/form.css">
    <link rel="stylesheet" type="text/css" href="assets/CSS/header.css">
    <link rel="stylesheet" type="text/css" href="assets/CSS/footer.css">
    <link rel="stylesheet" type="text/css" href="assets/CSS/base.css">
    <link rel="stylesheet" type="text/css" href="assets/CSS/details.css">
    <link rel="stylesheet" type="text/css" href="assets/CSS/profil.css">
    <link rel="stylesheet" href="awesomplete-gh-pages/awesomplete.css" />

    <!-- INCLUDE FONT_AWESOME -->
    <script src="https://kit.fontawesome.com/439e85da3f.js" crossorigin="anonymous"></script>

    <!-- INCLUDE BOOTSTRAP -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="awesomplete-gh-pages/awesomplete.js" async></script>

</head>
