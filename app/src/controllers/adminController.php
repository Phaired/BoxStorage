<?php
require_once ('../src/utils/Database.php');

class adminController {

    private $db;
    public function __construct(){
        $this->db = Database::getInstance();
    }
    public function delete(int $id) {
        $sqls = ["delete from articles where shoeId = :id",
            "delete from stocks where shoeId = :id"];

        foreach ($sqls as $sql){
            $req = $this->db->prepare($sql);
            $req->execute();
        }

    }
}