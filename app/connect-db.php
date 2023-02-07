<?php

$dsn="mysql:dbname=projet;host=database";
try
{
    $db=new PDO($dsn,"root","password");
}
catch(PDOException $e)
{
    printf("Echec connexion : %s\n",
        $e->getMessage());
    exit();
}