<?php
require_once "../src/models/Article.php";
//require_once "../src/utils/Stock.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $content = trim(file_get_contents("php://input"));
    $data = json_decode($content, true);

    if(isset($data["admin"])){
        echo Article::getArticleAdmin($data["shoeId"]);
    } else {
        echo Article::getArticle($data["shoeId"]);

    }
}