<?php
    require_once "connect.php";
    $threadID = mysql_real_escape_string($_GET["tid"]);
    $categoryID = mysql_real_escape_string($_GET["cid"]);
    $query = "SELECT Threads.threadTitle AS threadTitle, Threads.threadContent AS threadContent, Account.AccountName AS username FROM Threads, Account ";
    $query = $query . "WHERE Threads.threadID=$threadID AND Account.AccountID = Threads.AccountID";
    $result = mysql_query($query) or die(mysql_error());

    require_once "createSession.php";
    $userID = $_SESSION["userID"];

    $pageTitle = "Thread";
    require_once "header.php";
?>
<a href="threads.php?id=<?php echo $categoryID; ?>">&laquo; Back to threads</a>
<?php
    $row = mysql_fetch_assoc($result);
    $username = $row["username"];
    $title = $row["threadTitle"];
    $content = $row["threadContent"];
    echo "<h2>$title</h2><h3>Posted by: $username</h3>";
    echo "<p>$content</p><hr><h2>Comments</h2>";

    $query = "SELECT Comments.commentID AS commentID, Comments.commentContent AS commentContent, Account.AccountName AS username, Account.AccountID AS userID FROM Comments, Account ";
    $query = $query . "WHERE Comments.threadID=$threadID AND Account.AccountID = Comments.AccountID";
    $result = mysql_query($query) or die(mysql_error());
    $numRows = mysql_num_rows($result);

    if($numRows > 0){
        $link = "";
        while($row = mysql_fetch_assoc($result)){
            $link = "";
            $commentID = $row["commentID"];
            $userID_c = $row["userID"];
            $username_c = $row["username"];
            $comment = $row["commentContent"];
            if($userID_c == $userID){ $link = "| <a href='editComment.php?tcid=$commentID&tid=$threadID&cid=$categoryID'>edit</a>"; }

            echo "<p>$username_c: $comment $link</p>";
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