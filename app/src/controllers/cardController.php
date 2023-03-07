<?php
session_start();
require_once '../src/models/Article.php';
class cardController {
    public static function addToCard($id, $size) {
        if (!isset($_SESSION["card"])) {
            $_SESSION["card"] = [];
        }

        $_SESSION["card"][] = array(
            "shoeId" => $id,
            "shoeSize" => $size,
        );

        header("Location: /product/{$id}");
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //$content = trim(file_get_contents("php://input"));
    //$data = json_decode($content, true);
    $articles = [];
    foreach ($_SESSION["card"] as $item) {
        $articles[] = Article::getArticle($item["shoeId"]);
    }
    echo json_encode($articles);
}