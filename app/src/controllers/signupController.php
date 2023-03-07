<?php
session_start();
include_once ('../src/models/Users.php');

$admin = 1; // Le role est 1 pour l'admin
$user = 0; // Le role est 0 pour un user lambda

if(isset($_POST['username']) &&
    isset($_POST['firstname']) &&
    isset($_POST['lastname']) &&
    isset($_POST['email']) &&
    isset($_POST['password']) &&
    isset($_POST['confirmpassword']) &&
    isset($_POST['zipcode']) &&
    isset($_POST['city']) &&
    isset($_POST['address'])
) {
    $users = new Users();
    if($users->getUserByUsername($_POST['username']) != null){
        header("Location: /signup?erreur=Username already used");
    }
    else
    {
        if($_POST['password'] != $_POST['confirmpassword']){
            header("Location: /signup?erreur=please confirm with the same password");
        }else{
            $users->username = $_POST['username'];
            $users->firstName = $_POST['firstname'];
            $users->lastName = $_POST['lastname'];
            $users->email = $_POST['email'];
            $users->hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $users->zipcode = $_POST['zipcode'];
            $users->city = $_POST['city'];
            $users->address = $_POST['address'];
            $users->role = 0;
            $result = $users->addUser($users);
            if($result){
                header("Location: /login?information=Your profil had been registered");
            }
        }
    }




}