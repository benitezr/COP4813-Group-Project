<?php
    require_once "connect.php";
    $username = mysql_real_escape_string(htmlspecialchars($_POST["AccountName"]));
    $password = mysql_real_escape_string(htmlspecialchars($_POST["AccountPassword"]));

    $query = "SELECT AccountID, AccountName FROM Account WHERE AccountName LIKE '$username' AND BINARY AccountPassword = '$password'";
    $result = mysql_query($query) or die(mysql_error());
    $numRows = mysql_num_rows($result);

    if($numRows > 0){
        $row = mysql_fetch_assoc($result);
        require_once "createSession.php";
        $_SESSION["username"] = $row["AccountName"];
        $_SESSION["userID"] = $row["AccountID"];
        header("Location: index.php");
    }else{
        header("Location: login.php?error_L=Wrong username or password.");
    }
?>