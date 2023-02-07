<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page d'authentification</title>
</head>
<body>
<form action="../controllers/loginController.php" method="post">
    <?php
    if (isset($_GET['erreur'])) {
        echo "<p class=\"erreur\">".htmlspecialchars($_GET['erreur'])."</p>";
    } ?>
    <input type="text" name="USER_NAME" id="USER_NAME" placeholder="entrer votre login"><br>
    <input type="password" name="USER_PASSWORD" id="USER_PASSWORD" placeholder="entrer votre mot de passe">
    <input type="submit" name="valider" value="valider">
    <input type="reset" name="login" value="annuler">
</form>
</body>
</html>