<?php
    require_once "connect.php";
    $accForm["username"] = mysql_real_escape_string(htmlspecialchars($_POST["AccountName"]));
    $accForm["password"] = mysql_real_escape_string(htmlspecialchars($_POST["AccountPassword"]));
    $accForm["password_v"] = mysql_real_escape_string(htmlspecialchars($_POST["AccountPassword_v"]));
    $accForm["email"] = mysql_real_escape_string(htmlspecialchars($_POST["Email"]));
    $accForm["email"] = filter_var($accForm["email"], FILTER_SANITIZE_EMAIL);

    //Check if any fields are empty
    foreach($accForm as $key => $val){
        if(empty($accForm[$key])){
            header("Location: login.php?error_C=Empty input field submitted.");
            die();
        }
    }
    //Check if email is valid
    if(!filter_var($accForm["email"], FILTER_VALIDATE_EMAIL)){
        header("Location: login.php?error_C=Invalid email address.");
        die();
    }
    //Check if both passwords match
    if($accForm["password"] != $accForm["password_v"]){
        header("Location: login.php?error_C=Passwords do not match.");
        die();
    }
    //Check if username exists already
    $query = "SELECT AccountName FROM ACCOUNT WHERE AccountName LIKE '" . $accForm["username"] . "'";
    $result = mysql_query($query) or die(mysql_error());

    if(mysql_num_rows($result) > 0){
        header("Location: login.php?error_C=Username already exists.");
        die();
    }
    //Add user to database
    $query = "INSERT INTO ACCOUNT (AccountName, AccountPassword, email) ";
    $query = $query . "VALUES ('".$accForm["username"]."','".$accForm["password"]."','".$accForm["email"]."')";
    $result = mysql_query($query) or die(mysql_error());
    mysql_close($db_access);

    require_once "createSession.php";
    $_SESSION["username"] = $accForm["username"];

    header("Location: index.php");
?>