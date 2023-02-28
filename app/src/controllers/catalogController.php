<?php
require_once "../src/models/Article.php";
function getBrands() {
    var_dump(Article::getBrands());
    return Article::getBrands();
}