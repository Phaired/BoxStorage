<?php
/**
 * @var PDO $db
 */
session_start();
include_once ('../src/models/Users.php');


if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['USER_PASSWORD']) && isset($_POST['USER_NAME'])) # Validation des champs necessaire
        {

            $username = $_POST['USER_NAME'];
            $password = $_POST['USER_PASSWORD'];

            if (empty($username)) {
                header("Location: /login?erreur=incorrect login or password");
                exit();
            } else if (empty($password)) {
                header("Location: /login?erreur=incorrect login or password");
                exit();
            } else {
                $usrObj = new Users();
                $user = $usrObj->getUserByUsername($username);
                    if($user!=null){
                        if (password_verify($password, $user->hash)) {
                            $_SESSION['username'] = $user->username;
                            header('Location: /');
                            exit();
                        } else {
                            header("Location: /login?erreur=incorrect login or password");
                            exit();
                        }
                    }
                    else{
                        header("Location: /login?erreur=incorrect login or password");
                        exit();
                    }
                }
        }

}




