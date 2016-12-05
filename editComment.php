<?php
    require_once "createSession.php";
    $userID = $_SESSION["userID"];

    require_once "connect.php";
    $commentID = mysql_real_escape_string(htmlspecialchars($_GET["tcid"]));
    $threadID = mysql_real_escape_string(htmlspecialchars($_GET["tid"]));
    $categoryID = mysql_real_escape_string(htmlspecialchars($_GET["cid"]));
    $query = "SELECT commentContent FROM Comments WHERE commentID = $commentID";
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_assoc($result);
    $content = $row["commentContent"];

    $pageTitle = "Edit Comment";
    require_once "header.php";
?>
<a href='<?php echo "thread.php?tid=$threadID&cid=$categoryID"; ?>'>&laquo; Back to Thread</a>
<h2>Edit Comment</h2>
<form action="editComment_p.php" method="post" name="editComment">
    <input type="hidden" value="<?php echo $userID; ?>" name="userID">
    <input type="hidden" value="<?php echo $commentID; ?>" name="commentID">
    <input type="hidden" value="<?php echo $threadID; ?>" name="threadID">
    <input type="hidden" value="<?php echo $categoryID; ?>" name="categoryID">
    <textarea name="commentContent" cols="60" rows="5"><?php echo $content; ?></textarea><br>
    <input type="submit" name="submit" value="Edit">
</form>
<?php require_once "footer.php"; ?>