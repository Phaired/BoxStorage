<?php
session_start();

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
    $Users = new Users();
    if($Users->getUserByUsername($_POST['username']) === null){
        echo "déjà inscrit";
    };




}