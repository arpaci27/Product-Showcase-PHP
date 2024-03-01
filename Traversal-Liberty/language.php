<?php
    session_start();
    $language = strip_tags($_GET['language']);
    if($language == "tr" || $language == "en" || $language == 'de'){
        $_SESSION['language'] = $language;
        $url=$_SERVER['HTTP_REFERER'];
        header("Location: $url"); // Removed space after "Location:"
    } else {
        header("Location: index.php"); // Removed space after "Location:"
    }
?>