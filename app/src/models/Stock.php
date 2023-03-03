<?php
require_once "../src/utils/Database.php";
class Stock
{
    public static function isInStock(string $shoeId) {
        $sql = "select * from stocks where shoeId = '{$shoeId}' and quantity > 0";
        $db = Database::getInstance();
        $result = $db->prepare($sql);
        $result->execute();
        return count($result->fetchAll(PDO::FETCH_ASSOC)) > 0;
    }

    public static function getShoeSizes(string $shoeId) {
        $sql = "select shoeSize from stocks where shoeId = '{$shoeId}' and quantity > 0";
        $db = Database::getInstance();
        $result = $db->prepare($sql);
        $result->execute();
        return json_encode($result->fetchAll(PDO::FETCH_ASSOC));
    }

    // destock shoe
}