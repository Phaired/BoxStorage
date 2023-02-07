<?php
class Database
{
    public $db;

    public function __construct()
    {
        $dsn="mysql:dbname=projet;host=database";
        try
        {
            $this->db=new PDO($dsn,"root","password");
        }
        catch(PDOException $e)
        {
            printf("Echec connexion : %s\n",
                $e->getMessage());
            exit();
        }

    }

}