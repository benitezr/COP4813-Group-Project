<?php
    include_once "connect.php";
    $categoryID = mysql_real_escape_string($_GET["id"]);
    $query = "SELECT Threads.threadID AS threadID, Threads.threadTitle AS threadTitle, Categories.categoryName AS categoryName FROM Threads, Categories ";
    $query = $query . "WHERE Categories.categoryID = Threads.categoryID AND Threads.categoryID=$categoryID";
    $result = mysql_query($query) or die(mysql_error());
    $numRows = mysql_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Threads</title>
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    </head>
    <body>
        <a href="index.php">&laquo; Back to Home Page</a>
        <?php
            if($numRows > 0){
                $threads = "";
                $categoryName = "";
                while($row = mysql_fetch_assoc($result)){
                    if(empty($categoryName)){ $categoryName = $row["categoryName"]; }
                    $threadID = $row["threadID"];
                    $title = $row["threadTitle"];
                    $threads .= "<a href='thread.php?tid=$threadID&cid=$categoryID' class='thread-title'>$title</a>";
                }
                echo "<h2>$categoryName Threads | <a href='addThread.php?cid=$categoryID'>Create Thread</a></h2>";
                echo $threads;
            }else{
                echo "<p>There are no threads to display.</p>";
            }
            mysql_close($db_access);
        ?>
    </body>
</html>