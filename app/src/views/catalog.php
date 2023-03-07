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


include "footer.php";