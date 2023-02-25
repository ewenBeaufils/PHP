<?php

if (!isset($_SESSION["user"])){
    if (is_dir("../action/go-back.php")) {
        require_once "../action/go-back.php";
    } else {
        require_once "./action/go-back.php";
    }
} else if ($_SESSION["user"]["admin"] != 1) {
    if (is_dir("../action/go-back.php")) {
        require_once "../action/go-back.php";
    } else {
        require_once "./action/go-back.php";
    }
}

?>