<?php
    require_once "connect.php";
    $userID = $_POST["userID"];
    $categoryID = mysql_real_escape_string($_POST["categoryID"]);
    $threadTitle = mysql_real_escape_string(htmlspecialchars($_POST["threadTitle"]));
    $threadContent = mysql_real_escape_string(htmlspecialchars($_POST["threadContent"]));

    $query = "INSERT INTO Threads (categoryID, AccountID, threadTitle, threadContent) ";
    $query = $query . "VALUES ('$categoryID','$userID','$threadTitle','$threadContent')";

    $result = mysql_query($query) or die(mysql_error());
    $newID = mysql_insert_id();
    mysql_close($db_access);

    header("Location: thread.php?tid=$newID&cid=$categoryID");
?>