<?php
require_once "../src/models/Article.php";
function getBrands() {
    return Article::getBrands();
}