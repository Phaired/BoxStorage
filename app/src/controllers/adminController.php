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
                "id" => $id
            ]);
        }
        header('Location: /admin');
        echo "<a href='/admin'>Bien supprimer, retour</a>";
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
                    where shoeId=:shoeId;";

        $req = $db->prepare($sql);

        $req->execute($data);

        for($i = 35; $i<=45;$i++ ){
            $sql = "update stocks set quantity=:quantity where shoeId=:shoeId and shoeSize=:shoeSize;";
            $req = $db->prepare($sql);
            $data = [
                "shoeId" => $item["shoeId"],
                "quantity" => $item[$i],
                "shoeSize" => $i
            ];
            $req->execute($data);
        }

        header('Location: /admin');

    }


    public static function insert(string $item) {
        $db = Database::getInstance();
        $item = json_decode($item, true);

        $shoeId = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex(random_bytes(16)), 4));

        $data = [
            "shoeId" => $shoeId,
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

        for($i = 35; $i<=45;$i++ ){
            $sql = "insert into stocks (quantity, shoeId, shoeSize) values(:quantity, :shoeId, :shoeSize);";
            $req = $db->prepare($sql);
            $data = [
                "shoeId" => $shoeId,
                "quantity" => $item[$i],
                "shoeSize" => $i
            ];
            $req->execute($data);
        }
    }

}

