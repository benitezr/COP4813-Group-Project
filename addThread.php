<?php
    $categoryID = $_GET["cid"];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Add Thread</title>
    </head>
    <body>
        <a href="threads.php?id=<?php echo $categoryID; ?>">&laquo; Back to threads</a>
        <h2>Create Thread</h2>
        <form action="addThread_p.php" method="post" name="addThread">
            <input type="hidden" value="<?php echo $categoryID; ?>" name="categoryID">
            Title:
            <input type="text" name="threadTitle"><br><br>
            Content:<br>
            <textarea name="threadContent" cols="30" rows="10"></textarea><br>
            <input type="submit" value="submit" name="submit">
        </form>
    </body>
</html>