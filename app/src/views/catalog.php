<?php
require_once "../src/controllers/catalogController.php";

include "header.php";

$brands = getBrands();
?>

<div id="filter">
    <label for="keyword">Keyword </label>
    <input type="text" id="keyword" name="keyword"/>

    <label for="brand">Brands </label>
    <select name="brand" id="brand">
        <option value="">--Please choose a brand--</option>

        <?php

        foreach ($brands as $key => $value) {
            $value;
            //echo "<option value='" . $value . "'>" . $value . "</option>";
        }

        var_dump($brands);
        ?>

        <option value="dog">Dog</option>
        <option value="cat">Cat</option>
        <option value="hamster">Hamster</option>
        <option value="parrot">Parrot</option>
        <option value="spider">Spider</option>
        <option value="goldfish">Goldfish</option>
    </select>
</div>
<div id="products"></div>

<?php
// appeler controller pour avoir données

// nécessaire de faire du js pour écouter events
// si maj alors get new data pour valoriser



$articles = new Article();
$articles->brand = "Nike";
$articles->gender = "men";
var_dump($articles->getArticles("", 10, 0));
Article::getBrands();

include "footer.php";