<?php
    require_once "createSession.php";
    if(!isset($_SESSION["username"])){ 
        header("Location: login.php"); 
        die();
    }else{
        $userID = $_SESSION["userID"];
    }

    $categoryID = $_GET["cid"];

    $pageTitle = "Add Thread";
    require_once "header.php";
?>
<a href="threads.php?id=<?php echo $categoryID; ?>">&laquo; Back to threads</a>
<h2>Create Thread</h2>
<form action="addThread_p.php" method="post" name="addThread">
    <input type="hidden" value="<?php echo $userID; ?>" name="userID">
    <input type="hidden" value="<?php echo $categoryID; ?>" name="categoryID">
    Title:
    <input type="text" name="threadTitle"><br><br>
    Content:<br>
    <textarea name="threadContent" cols="30" rows="10"></textarea><br>
    <input type="submit" value="submit" name="submit">
</form>
<?php require_once "footer.php"; ?>