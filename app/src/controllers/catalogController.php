<?php
require_once "../src/models/Article.php";


/*
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['USER_PASSWORD']) && isset($_POST['USER_NAME'])) {
        echo json_encode(array("test => azeret", "lala => aze"));
    }

}*/


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $content = trim(file_get_contents("php://input"));
    $data = json_decode($content, true);

    switch ($data["request"]) {
        case "brands":
            echo Article::getBrands();
            break;
        case "products":
            echo json_encode(
                array(
                    "test3" => "3",
                    "test4" => "4"
                )
            );
            break;
    }
}