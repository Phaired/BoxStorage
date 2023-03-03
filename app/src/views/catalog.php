<?php
include_once ("header.php");
?>
<link rel="stylesheet" href="css/catalog.css">
<link rel="stylesheet" href="css/item_catalog.css">
<link rel="shortcut icon" href="./img/logo_simple.png" />
<div id="filter">
    <form id="form">
        <label for="keyword">KEYWORD</label>
        <input type="text" id="keyword" name="keyword"/>
        <label for="brand">BRAND</label>
        <select name="brand" id="brand">
        </select>
        <label>MIN PRICE</label>
        <input type="text" id="min-price" name="min-price" />
        <label>MAX PRICE</label>
        <input type="text" id="max-price" name="max-price" />
        <input type="submit" name="search" value="Search">
    </form>
</div>
<div id="products"></div>
<script type="module" src="../js/catalog.js"></script>
<?php
// appeler controller pour avoir données

// nécessaire de faire du js pour écouter events
// si maj alors get new data pour valoriser


/*

$articles = new Article();
$articles->brand = "Nike";
$articles->gender = "men";
//var_dump($articles->getArticles("", 10, 0));
Article::getBrands();*/
//require_once "../src/models/Article.php";


//echo Article::getArticle("0042f5c5-8be4-4a40-982b-1b31dacec04b");

include "footer.php";