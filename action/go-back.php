<?php

if (!isset($_SERVER['HTTP_REFERER']) || $_SESSION['HTTP_REFERER'] == $_SERVER['HTTP_REFERER']){
    header("Location: index.php");
}else {
    $_SESSION['HTTP_REFERER'] = $_SERVER['HTTP_REFERER'];
    header("Location: ".$_SERVER['HTTP_REFERER']);
}

exit();
?>