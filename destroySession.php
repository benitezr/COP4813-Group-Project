<?php
    session_name("group6-login");
    if(session_status() == PHP_SESSION_NONE){ session_start(); }
    $_SESSION = array();
    session_destroy();
?>