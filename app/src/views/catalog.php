<?php
require_once "../src/models/Article.php";

include "header.php";
// appeler controller pour avoir données

// nécessaire de faire du js pour écouter events
// si maj alors get new data pour valoriser

echo    "<div id='filter'>Filtrage</div>" .
        "<div id='search-bar'>Barre de recherche</div>" .
        "<div id='products'>Liste des produits</div>";

$articles = new Article();
$articles->brand = "Nike";
$articles->gender = "men";
var_dump($articles->getArticles("", 10, 0));

include "footer.php";