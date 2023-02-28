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

    public function getArticles(string $search, int $limit, int $offset) {
        $queryArgs = $this->buildQueryArgs();

/*
        $sql = "select * from articles";
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

    private function buildQueryArgs() {
        $array = get_object_vars($this);
        foreach($array as $key => $value) {
            echo $key . ": " . $value . "<br>";
        }

        $str = "1";
        // for each if != null concat and key = value
    }

    public static function getBrands() {
        $sql = "select distinct brand from articles";
        $db = Database::getInstance();
        $result = $db->prepare($sql);
        //$result->execute($data);
        $result->execute();
        //var_dump($result);
        //var_dump($articles);
        return $result->fetchAll();
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
        return $usrObj;*/
    }
}