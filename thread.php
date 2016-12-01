<?php
    include_once "connect.php";
    $threadID = mysql_real_escape_string($_GET["tid"]);
    $categoryID = mysql_real_escape_string($_GET["cid"]);
    $query = "SELECT threadTitle, threadContent FROM Threads WHERE threadID=$threadID";
    $result = mysql_query($query) or die(mysql_error());
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Thread</title>
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    </head>
    <body>
        <a href="threads.php?id=<?php echo $categoryID; ?>">&laquo; Back to threads</a>
        <?php
            $row = mysql_fetch_assoc($result);
            $title = $row["threadTitle"];
            $content = $row["threadContent"];
            echo "<h2>$title</h2>";
            echo "<p>$content</p><hr><h2>Comments</h2>";

            mysql_close($db_access);
        ?>
    </body>
</html>