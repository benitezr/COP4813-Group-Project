<?php
    require_once "connect.php";
    $query = "SELECT * FROM Categories";
    $result = mysql_query($query) or die(mysql_error());
    $numRows = mysql_num_rows($result);

    require_once "createSession.php";
    $username = $_SESSION["username"];

    $pageTitle = "Home Page";
    require_once "header.php";
?>
<h2>Forum Home Page | <?php if(isset($username)){ echo "Welcome, $username | <a href='logout.php'>Logout</a>"; }else{ echo "<a href='login.php'>Login</a>"; } ?></h2>
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
<?php require_once "footer.php"; ?>