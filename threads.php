<?php
    require_once "connect.php";
    $categoryID = mysql_real_escape_string($_GET["id"]);
    $query = "SELECT categoryName FROM Categories WHERE categoryID=$categoryID";
    $result = mysql_query($query) or die(mysql_error());
    $row_c = mysql_fetch_assoc($result);
    $categoryName = $row_c["categoryName"];

    $query = "SELECT Threads.threadID AS threadID, Threads.threadTitle AS threadTitle, Account.AccountName AS username FROM Threads, Categories, Account ";
    $query = $query . "WHERE Categories.categoryID = Threads.categoryID AND Threads.categoryID=$categoryID AND Threads.AccountID = Account.AccountID";
    $result = mysql_query($query) or die(mysql_error());
    $numRows = mysql_num_rows($result);

    $pageTitle = "Threads";
    require_once "header.php";
?>
<a href="forums.php">&laquo; Back to Home Page</a>
<?php
    echo "<h2>$categoryName Threads | <a href='addThread.php?cid=$categoryID'>Create Thread</a></h2>";
    if($numRows > 0){
        $threads = "";
        $categoryName = "";
        while($row = mysql_fetch_assoc($result)){
            $username = $row["username"];
            $threadID = $row["threadID"];
            $title = $row["threadTitle"];
            $threads .= "<a href='thread.php?tid=$threadID&cid=$categoryID' class='thread-title'>$title</a><p>Posted by: $username</p>";
        }
        echo $threads;
    }else{
        echo "<p>There are no threads to display.</p>";
    }
    mysql_close($db_access);
?>
<?php require_once "footer.php"; ?>
