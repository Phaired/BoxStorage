<?php
require_once ('../src/utils/Database.php');
class Users
{
    //Predefine Here
    public int $id;
    public string $username;
    public string $email;
    public string $hash;
    public string $firstName;
    public string $lastName;
    public string $zipcode;
    public string $city;
    public string $address;

    public function getUserByUsername(string $username): Users
    {
        $usrObj = new Users();
        $data = [
            'username' => $username
        ];
        $sql = "SELECT * from users where username = :username";
        $db = Database::getInstance();
        $result = $db->prepare($sql);
        $result->execute($data);
        $result = $result->fetch();

        $usrObj->id = $result['id'];
        $usrObj->username = $result['username'];
        $usrObj->email = $result['email'];
        $usrObj->hash = $result['password'];
        $usrObj->firstName = $result['firstName'];
        $usrObj->lastName = $result['lastName'];
        $usrObj->zipcode = $result['zipcode'];
        $usrObj->city = $result['city'];
        $usrObj->zipcode = $result['zipcode'];
        $usrObj->address = $result['address'];
        return $usrObj;
    }
}





