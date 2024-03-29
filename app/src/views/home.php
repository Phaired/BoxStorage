<?php
session_start();
echo '<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="shortcut icon" href="./img/logo_simple.png" />
    <title>Home</title>
</head>
<body>
    <div id="background"></div>
    <div id="content">
        <img id="logo" src="./img/logo.png" alt="logo boxstorage">
        <div id="media">
            <img id="insta" src="./img/insta.svg" alt="instagram">
            <img id="twitter" src="./img/twitter.svg" alt="twitter">';
if (isset($_SESSION['username'])) {
    if ($_SESSION['role'] === true) {
        echo("<a href='/admin'><img src='./img/admin.svg'></a>");
    }
}

if(isset($_SESSION['username']))
{
    echo '<a href="./logout"><img class="profil" src="./img/logout.svg" alt="logout"></a>';
}
else{
    echo '<a href="./login"><img class="profil" src="./img/profil.svg" alt="profil"></a>';
};
echo        '</div>';
if(isset($_SESSION['username']))
{
    echo "<h1>Welcome back ".$_SESSION['username']."</h1>";
}
else{
    echo '<h1>boxStorage,</h1><h1>to serve you </h1>';
}
        echo '<div id="introduction"><br>
            <h2>
                We offer thousands of sneaker-related items for sale. Authenticity is our priority, that\'s why every item is 100% authentic and brand new. Come and discover our universe and perhaps find your rare pearl through our catalog updated every day.</h2>
        </div><br>
        <a href="/catalog" id="login">Access to the catalog</a>
    </div>
</body>
</html>';
