<?php
require_once "../src/utils/Database.php";
class Stock
{
    public static function isInStock(string $shoeId) {
        $sql = "select count(*) from stocks where shoeId = '{$shoeId}' and quantity > 0";
        $db = Database::getInstance();
        $result = $db->prepare($sql);
        $result->execute();
        return $result->fetch()[0] > 0;
    }

    public static function getShoeSizes(string $shoeId) {
        $sql = "select shoeSize from stocks where shoeId = '{$shoeId}' and quantity > 0";
        $db = Database::getInstance();
        $result = $db->prepare($sql);
        $result->execute();
        return json_encode($result->fetchAll(PDO::FETCH_ASSOC));
    }

    public static function getShoeSizesAdmin(string $shoeId) {
        $sql = "select shoeSize, quantity from stocks where shoeId = '{$shoeId}'";
        $db = Database::getInstance();
        $result = $db->prepare($sql);
        $result->execute();
        return json_encode($result->fetchAll(PDO::FETCH_ASSOC));
    }

    // destock shoe
}