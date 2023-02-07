<?php
/**
 * @var PDO $db
 */
session_start();
include_once ('../src/models/Users.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if (isset($_POST['USER_PASSWORD']) && isset($_POST['USER_NAME'])) # Validation des champs necessaire
        {
            function validate($data)
            {
                # fonction permettant d'enlever les caracteres speciaux/espaces
                $data = trim($data);# Enleve les espaces vides
                return $data;
            }

            $username = validate($_POST['USER_NAME']);
            $password = validate($_POST['USER_PASSWORD']);

            if (empty($username)) {
                header("Location: /public/index.php?erreur=Le nom d'utilisateur est nécessaire");
                exit();
            } else if (empty($password)) {
                header("Location: /public/index.php?erreur=Le mot de passe est nécessaire");
                exit();
            } else {
                $usrObj = new Users();
                $user = $usrObj->getUserByUsername($username);
                    if (password_verify($password, $user->hash)) {
                        $_SESSION['username'] = $user->username;
                        header('Location: /');
                        exit();
                    } else {
                        echo 'error password or username';
                        exit();
                    }

                }
        }


}

