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
        $item = json_decode($item, true);



        $sql = "update articles set brand = :brand, category = :category, colorway = :colorway,
                    `condition` = :condition, countryOfManufacture = :countryOfManufacture,
                    description = :description, gender = :gender, 
                    ";
    }

}

