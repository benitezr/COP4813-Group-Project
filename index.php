<?php
    include_once "connect.php";
    $query = "SELECT * FROM Categories";
    $result = mysql_query($query) or die(mysql_error());
    $numRows = mysql_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Home Page</title>
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    </head>
    <body>
        <h2>Forum Home Page</h2>
        <p>Here you can choose which thread category you wish to view.</p>
        <hr>
        <h2>Categories</h2>
        <?php
            if($numRows > 0){
                $categories = "";
                while($row = mysql_fetch_assoc($result)){
                    $name = $row["categoryName"];
                    $desc = $row["categoryDesc"];
                    $categoryID = $row["categoryID"];
                    $categories .= "<a href='threads.php?id=$categoryID' class='category'>$name</a><p>$desc</p>";
                }
                echo $categories;
            }else{
                echo "<p>There are no thread categories to display.</p>";
            }
            mysql_close($db_access);
        ?>
        <hr>
    </body>
</html>