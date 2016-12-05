<?php
    session_name("n00783340-login");
    if(session_status() == PHP_SESSION_NONE){ session_start(); }
    $_SESSION = array();
    session_destroy();
?>