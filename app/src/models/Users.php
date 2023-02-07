<?php

class Users
{
    private Database $db;
    //Predefine Here
    public int $id;
    public string $username;
    public string $email;
    public string $password;
    public string $firstName;
    public string $lastName;
    public string $zipcode;
    public string $city;
    public string $address;

    public function __construct(){
        include_once ('../src/utils/Database.php');
        $this->db = new Database();
    }

    public function getUserByUsername(string $username): Users
    {
        $usrObj = new Users();
        $data = [
            'username' => $username
        ];
        $sql = "SELECT * from users where username = :username;";
        $result = $this->db->db->prepare($sql);
        var_dump($result);
        $result->execute($data);
        var_dump($result);
        $usrObj->id = $result['id'];
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
    }
}





