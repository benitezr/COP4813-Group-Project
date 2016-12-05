<?php
    require_once "connect.php";
    $threadID = mysql_real_escape_string($_GET["tid"]);
    $categoryID = mysql_real_escape_string($_GET["cid"]);
    $query = "SELECT threadTitle, threadContent FROM Threads WHERE threadID=$threadID";
    $result = mysql_query($query) or die(mysql_error());

    $pageTitle = "Thread";
    require_once "header.php";
?>
<a href="threads.php?id=<?php echo $categoryID; ?>">&laquo; Back to threads</a>
<?php
    $row = mysql_fetch_assoc($result);
    $title = $row["threadTitle"];
    $content = $row["threadContent"];
    echo "<h2>$title</h2>";
    echo "<p>$content</p><hr><h2>Comments</h2>";

    $query = "SELECT commentContent FROM Comments WHERE threadID=$threadID";
    $result = mysql_query($query) or die(mysql_error());
    $numRows = mysql_num_rows($result);

    if($numRows > 0){
        while($row = mysql_fetch_assoc($result)){
            $comment = $row["commentContent"];
            echo "<p>guest: $comment</p>";
        }
    }else{
        echo "<p>No one has commented yet.</p>";
    }

    mysql_close($db_access);
?>
<hr>
<form action="addComment.php" method="post" name="addComment">
    <input type="hidden" value="<?php echo $threadID; ?>" name="threadID">
    <input type="hidden" value="<?php echo $categoryID; ?>" name="categoryID">
    <textarea name="commentContent" cols="60" rows="5"></textarea><br>
    <input type="submit" name="submit" value="submit">
</form>
<?php require_once "footer.php"; ?>