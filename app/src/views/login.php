<?php
session_start();
if(isset($_SESSION['username']))
{
    header("Location: /");
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Log in</title>
</head>
<body>
<form action="../controllers/loginController.php" method="post">
    <img src="./img/logo.png">
    <?php
    if (isset($_GET['erreur'])) {
        echo "<p class='erreur'>".htmlspecialchars($_GET['erreur'])."</p>";
    } ?>
    <input type="text" name="USER_NAME" id="USER_NAME" placeholder="login"><br>
    <input type="password" name="USER_PASSWORD" id="USER_PASSWORD" placeholder="password">
    <input type="submit" name="login" value="Log in">
    <a href="/signup"><input type="button" id="signin" name="signin" value="Sign up"></a>
</form>
</body>
</html>