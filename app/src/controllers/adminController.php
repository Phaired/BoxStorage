<?php


require_once ('../src/utils/Database.php');

class adminController {
    public static function delete(string $id) {
        $db = Database::getInstance();
        $sqls = [
            "delete from stocks where shoeId = :id",
            "delete from articles where shoeId = :id"
        ];

        foreach ($sqls as $sql){
            $req = $db->prepare($sql);
            $req->execute([
                ":id" => $id
            ]);
        }

    }


    public static function update(string $item) {
        $db = Database::getInstance();
        $item = json_decode($item, true);

        $data = [
            "brand"=> $item["brand"],
            "category" => $item["category"],
            "colorway" => $item["colorway"],
            "condition" => $item["condition"],
            "countryOfManufacture" => $item["countryOfManufacture"],
            "description" => $item["description"],
            "gender" => $item["gender"],
            "name" => $item["name"],
            "retailPrice" => $item["retailPrice"],
            "shoe" => $item["shoe"],
            "shortDescription" => $item["shortDescription"],
            "title" => $item["title"],
            "tags" => $item["tags"],
            "shoeId" => $item["shoeId"]
        ];

        $sql = "update articles set brand=:brand, category=:category, colorway=:colorway,
                    `condition`=:condition, countryOfManufacture=:countryOfManufacture,
                    `description`=:description, gender=:gender, `name`=:name, retailPrice=:retailPrice,
                    shoe=:shoe, shortDescription=:shortDescription, title=:title, tags=:tags
                    where shoeId=:shoeId;
                    ";

        $req = $db->prepare($sql);

        $req->execute($data);
    }


    public static function insert(string $item) {
        $db = Database::getInstance();
        $item = json_decode($item, true);

        $data = [
            "shoeId" => vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex(random_bytes(16)), 4)),
            "brand"=> $item["brand"],
            "category" => $item["category"],
            "colorway" => $item["colorway"],
            "condition" => $item["condition"],
            "countryOfManufacture" => $item["countryOfManufacture"],
            "description" => $item["description"],
            "gender" => $item["gender"],
            "imageUrl" => $item["imageUrl"],
            "name" => $item["name"],
            "productCategory" => $item["productCategory"],
            "releaseDate" => $item["releaseDate"],
            "retailPrice" => $item["retailPrice"],
            "shoe" => $item["shoe"],
            "shortDescription" => $item["shortDescription"],
            "title" => $item["title"],
            "tags" => $item["tags"],
        ];

        $sql = "insert into articles values (:shoeId, :brand, :category, :colorway,
                    :condition, :countryOfManufacture, :description, :gender,
                    :imageUrl, :name, :productCategory,:releaseDate, :retailPrice,
                    :shoe, :shortDescription, :title, :tags
                    );
                    ";

        $req = $db->prepare($sql);

        $req->execute($data);
    }

}

