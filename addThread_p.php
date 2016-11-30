<?php
    include_once "connect.php";
    $threadID = mysql_real_escape_string($_POST["threadID"]);
    $threadTitle = mysql_real_escape_string(htmlspecialchars($_POST["threadTitle"]));
    $threadContent = mysql_real_escape_string(htmlspecialchars($_POST["threadContent"]));

    
?>