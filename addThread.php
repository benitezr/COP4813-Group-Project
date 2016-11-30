<?php
    $threadID = $_GET["id"];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Add Thread</title>
    </head>
    <body>
        <h2>Create Thread</h2>
        <form action="addThread_p.php" method="post" name="addThread">
            <input type="hidden" value="<?php echo $threadID; ?>" name="threadID">
            Title:
            <input type="text" name="threadTitle"><br><br>
            Content:<br>
            <textarea name="threadContent" cols="30" rows="10"></textarea><br>
            <input type="submit" value="submit" name="submit">
        </form>
    </body>
</html>