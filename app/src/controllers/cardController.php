<?php

class cardController {
    public static function addToCard($id, $size) {
        if (!isset($_SESSION["card"])) {
            session_start();
        }
        if (!isset($_SESSION["card"])) {
            $_SESSION["card"] = [];
        }

        $_SESSION["card"][] = array(
            "shoeId" => $id,
            "shoeSize" => $size,
        );

    }

}