<?php
    // picking the wanted page from the url
    $show = $_GET['show'];
    // picking the users id
    $id = $_SESSION['Auth']['id'];
    
    if (empty($show)){ // if empty, default is home
        echo "<script> section('base')</script>";
        echo "<script>document.location.href = '/../../index.php?lang=".$lang_url."&show=base'</script>";
    } else if (isset($id) && ($show=="login" || $show=="signin" || $show=="reset_pwd" || $show=="forgot")){ // if session is set you cannot login, signup or reset your pwd
        echo "<script> section('base')</script>";
        echo "<script>document.location.href = '/../../index.php?lang=".$lang_url."&show=base'</script>";
    } else if (!isset($id) && ($show=="add" || $show=="details" || $show=="profil" || $show=="coming")){ // if session not set, you cannot add a party, see the details, signup to the party, go to your profil
        echo "<script> section('base')</script>";
        echo "<script>document.location.href = '/../../index.php?lang=".$lang_url."&show=base'</script>";
    } else if ($show=="add" || $show=="profil" || $show=="login" || $show=="signin" || $show=="base" || $show=="details" || $show=="reset_pwd" || $show=="forgot" || $show=="coming") { // else if show is known : OK
        echo "<script> section('".$show."')</script>";
        echo "<script>document.location.href = '/../../index.php?lang=".$lang_url."&show=".$show."</script>";
    } else { // else if show isnt known : default is home
        echo "<script> section('base')</script>";
        echo "<script>document.location.href = '/../../index.php?lang=".$lang_url."&show=base'</script>";
    } 
?>
