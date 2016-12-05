<?php
    require_once "createSession.php";
    if(!isset($_SESSION["username"])){ 
        header("Location: login.php");
        die();
    }else{
        $userID = $_SESSION["userID"];
    }

    require_once "connect.php";    
    $threadID = $_POST["threadID"];
    $categoryID = $_POST["categoryID"];
    $content = mysql_real_escape_string(htmlspecialchars($_POST["commentContent"]));

    if(empty($content)){ 
        header("Location: thread.php?tid=$threadID&cid=$categoryID"); 
        die();
    }

    $query = "INSERT INTO Comments (threadID, AccountID, commentContent) ";
    $query = $query . "VALUES ('$threadID','$userID','$content')";
    $result = mysql_query($query) or die(mysql_error());
    mysql_close($db_access);

    header("Location: thread.php?tid=$threadID&cid=$categoryID");
?>