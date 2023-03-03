<?php
session_start();
include "head.php";

echo '<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="shortcut icon" href="../img/logo_simple.png" />
    <title>Home</title>
</head>
<body>'
;
echo
'<div id="content">
        <img id="logo" src="../img/logo.png" alt="logo boxstorage">
        <div id="icones">'
;

if(isset($_SESSION['username']))
{
    echo '<a href="./logout"><img class="profil" src="../img/logout.svg" alt="logout"></a>';
}
else{
    echo '<a href="./login"><img class="profil" src="../img/profil.svg" alt="profil"></a>';
}
echo
"    </div>
</body>";