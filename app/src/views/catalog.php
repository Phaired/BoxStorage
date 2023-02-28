<?php
require_once "../src/controllers/catalogController.php";

include_once ("header.php");

$brands = getBrands();
?>
<link rel="stylesheet" href="css/catalog.css">
<link rel="shortcut icon" href="./img/logo_simple.png" />
<div id="filter">
    <form id="form" action="../src/controllers/catalogController.php" method="post">
        <label for="keyword">KEYWORD</label>
        <input type="text" id="keyword" name="keyword"/>
        <label for="brand">BRAND</label>
        <select name="brand" id="brand">
            <option value="">-- Please choose a brand --</option>

            <?php

            foreach ($brands as $key => $value) {
                $value;
                echo "<option value='" . $value["brand"] . "'>" . $value["brand"] . "</option>";
            }

            ?>

        </select>
        <label>MIN PRICE</label>
        <input type="text" id="min-price" name="min-price" />
        <label>MAX PRICE</label>
        <input type="text" id="max-price" name="max-price" />
        <input type="submit" name="search" value="Search">
    </form>
</div>
<div id="products"></div>
<script src="../public/js/catalog.js"></script>
<?php
// appeler controller pour avoir données

// nécessaire de faire du js pour écouter events
// si maj alors get new data pour valoriser



$articles = new Article();
$articles->brand = "Nike";
$articles->gender = "men";
//var_dump($articles->getArticles("", 10, 0));
Article::getBrands();

include "footer.php";