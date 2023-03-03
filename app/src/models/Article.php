<?php
require_once "../src/utils/Database.php";

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
        //$queryArgs = Article::buildQueryArgs();
        $sql = "select * from articles ";//where brand = " . $search->brand;
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
        //var_dump($sql);
        $result = $db->prepare($sql);
        //$result->execute($data);
        $result->execute();
        //var_dump($result);
        //$articles = $result->fetchAll();
        return json_encode($result->fetchAll(PDO::FETCH_ASSOC));
/*
        $sql = !empty($category) ? $sql . " where category = " . $category : $sql;
        $sql = $sql . " limit " . $limit . ", " . $offset ;
        $db = Database::getInstance();
        $result = $db->prepare($sql);
        //$result->execute($data);
        $result->execute();
        var_dump($result);
        $articles = $result->fetchAll();
        var_dump($articles);*/
        /*
        $->id = $result['id'];
        $usrObj->username = $result['username'];
        $usrObj->email = $result['email'];
        $usrObj->password = $result['password'];
        $usrObj->firstName = $result['firstName'];
        $usrObj->lastName = $result['lastName'];
        $usrObj->zipcode = $result['zipcode'];
        $usrObj->city = $result['city'];
        $usrObj->zipcode = $result['zipcode'];
        $usrObj->address = $result['address'];
        return $usrObj;
        */
    }

    /*
    private static function _buildQueryArgs() {
        //$array = get_object_vars($this);
        foreach($array as $key => $value) {
            echo $key . ": " . $value . "<br>";
        }

        $str = "1";
        // for each if != null concat and key = value
    }*/

    public static function getBrands() {
        $sql = "select distinct brand from articles";
        $db = Database::getInstance();
        $result = $db->prepare($sql);
        $result->execute();
        return json_encode($result->fetchAll(PDO::FETCH_ASSOC));
    }
}