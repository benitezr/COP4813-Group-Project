<?php
    require_once "createSession.php";
    if(isset($_SESSION["username"])){ header("Location: index.php"); }

    $error_L = (isset($_GET["error_L"])) ? "Error: " . $_GET["error_L"] : "";
    $error_C = (isset($_GET["error_C"])) ? "Error: " . $_GET["error_C"] : "";
    $pageTitle = "Login";
    require_once "header.php";
?>
<a href="index.php">&laquo; Back to Home Page</a>
<h2>Login</h2>
<?php echo "<p>$error_L</p>"; ?>
<form action="login_p.php" method="post" name="login">
    Username: <input type="text" name="AccountName">
    Password: <input type="password" name="AccountPassword">
    <input type="submit" name="submit" value="Login">
</form>
<h2>Create Account</h2>
<?php echo "<p>$error_C</p>"; ?>
<form action="createAccount.php" method="post" name="createAccount">
    Username: <input type="text" name="AccountName"><br><br>
    Password: <input type="password" name="AccountPassword"><br><br>
    Verify Password: <input type="password" name="AccountPassword_v"><br><br>
    Email: <input type="text" name="Email"><br><br>
    <input type="submit" name="submit" value="Create">
</form>
<?php require_once "footer.php"; ?>