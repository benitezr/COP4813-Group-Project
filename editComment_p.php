<?php
    require_once "connect.php";
    
    $userID = $_POST["userID"];
    $commentID = $_POST["commentID"];
    $threadID = $_POST["threadID"];
    $categoryID = $_POST["categoryID"];
    $content = mysql_real_escape_string(htmlspecialchars($_POST["commentContent"]));

    if(empty($content)){
        header("Location: thread.php?tid=$threadID&cid=$categoryID");
        die();
    }

    $query = "UPDATE Comments SET commentContent='$content' WHERE commentID=$commentID";
    $result = mysql_query($query) or die(mysql_error());
    mysql_close($db_access);

    header("Location: thread.php?tid=$threadID&cid=$categoryID");
?>