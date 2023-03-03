<?php
require_once "../src/utils/Database.php";
require_once "../src/models/Stock.php";

class Article
{
    public $shoeId;
    public $brand;
    public $category;
    public $colorway;
    public $countryOfManufacture;
    public $description;
    public $gender;
    public $imageUrl;
    public $name;
    public $productCategory;
    public $releaseDate;
    public $retailPrice;
    public $shoe;
    public $shortDescription;
    public $title;
    public $tags;

    public static function getArticles(array|null $search, int $limit, int $offset) {
        $sql = "select * from articles ";
        if ($search != null) {
            $sqlBrand = $search["brand"] != null ? "brand = '{$search["brand"]}'" : "";
            $sqlMin = $search["min_price"] != null ? "retailPrice >=  {$search["min_price"]}" : "";
            $sqlMax = $search["max_price"] != null ? "retailPrice <=  {$search["max_price"]}" : "";
            $sqlKeyword = $search["keyword"] != null ? "(LOCATE('{$search["keyword"]}', description) > 0 or " .
                "LOCATE('{$search["keyword"]}', name) > 0 or " .
                "LOCATE('{$search["keyword"]}', shortDescription) > 0 or " .
                "LOCATE('{$search["keyword"]}', tags) > 0)" : "";
            $sql = $sql . "where 1=1" .
                (!empty($sqlBrand) ? " and {$sqlBrand}" : "") .
                (!empty($sqlMin) ? " and {$sqlMin}" : "") .
                (!empty($sqlMax) ? " and {$sqlMax}" : "") .
                (!empty($sqlKeyword) ? " and {$sqlKeyword}" : "");
        }
        if ($limit != -1 && $offset != -1) {
            $sql = $sql . " limit " . $limit . ", " . $offset;
        }
        $db = Database::getInstance();
        $result = $db->prepare($sql);
        $result->execute();
        return json_encode($result->fetchAll(PDO::FETCH_ASSOC));
    }

    public static function getArticle(string $shoeId) {
        $sql = "select * from articles where shoeId = '{$shoeId}'";
        $db = Database::getInstance();
        $result = $db->prepare($sql);
        $result->execute();
        //$result->fetch(PDO::FETCH_ASSOC));
        $arr = $result->fetch(PDO::FETCH_ASSOC);
        $arr["stock"] = Stock::isInStock($shoeId);
        return json_encode($arr);
    }

    public static function getBrands() {
        $sql = "select distinct brand from articles";
        $db = Database::getInstance();
        $result = $db->prepare($sql);
        $result->execute();
        return json_encode($result->fetchAll(PDO::FETCH_ASSOC));
    }
}