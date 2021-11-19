<?php
    // if lang isnt set in the url, default is french
    if (!isset($_GET['lang'])){
        $lang_url = 'fr';
    }
    // else we pick it up from the url
    else {
        $lang_url = $_GET['lang'];
    }

    // if lang isnt french or english, default is french
    if ($lang_url != 'fr' && $lang_url != 'en') {
        $lang_url = 'fr';
    }

    // else : chosen language
    if ($lang_url == 'fr') {
        $lang_two = 'en';
    } else {
        $lang_two = 'fr';
    }

    // sending these PHP variables in JS variables
    echo "<script>var lang_name='" . $lang_url . "';</script>";
    echo "<script>var lang_two='" . $lang_two . "';</script>";

?>
