<?php
require_once "../src/controllers/catalogController.php";

include_once ("header.php");

$brands = getBrands();
?>

<div id="filter">
    <label for="keyword">Keyword </label>
    <input type="text" id="keyword" name="keyword"/>
    <input type="button" id="search" name="search" value="Search"/>

    <label for="brand">Brand </label>
    <select name="brand" id="brand">
        <option value="">-- Please choose a brand --</option>

        <?php

        foreach ($brands as $key => $value) {
            $value;
            echo "<option value='" . $value["brand"] . "'>" . $value["brand"] . "</option>";
        }

        ?>

    </select>

    <label>Min price</label>
    <input type="text" id="min-price" name="min-price" />
    <label>Max price</label>
    <input type="text" id="max-price" name="max-price" />
</div>
<div id="products"></div>

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