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

    public function getUserByUsername(string $username): ?Users
    {
        $usrObj = new Users();
        $db = Database::getInstance();

        $data = [
            'username' => $username
        ];

        $sql = "SELECT * from users where username = :username";
        $result = $db->prepare($sql);
        $result->execute($data);
        $result = $result->fetch();
        if($result){
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
        else{
            return null;
        }
    }


    public function addUser(Users $users)
    {
        $sql = "INSERT INTO projet.users (username, email, password, firstName, lastName, zipcode, city, address) 
                           values (:username, :email, :password, :firstName, :lastName, :zipcode, :city, :address)";

        $db = Database::getInstance();

        $data = [
            "username" => $users->username,
            "email" => $users->email,
            "password" => $users->hash,
            "firstName" => $users->firstName,
            "lastName" => $users->lastName,
            "zipcode" => $users->zipcode,
            "city" => $users->city,
            "address" => $users->address,
        ];
        $result = $db->prepare($sql);
        $result->execute($data);
        return true;
    }
}





