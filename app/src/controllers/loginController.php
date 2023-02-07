<?php
/**
 * @var PDO $db
 */
session_start();
require_once('../utils/connect-db.php');
//base pour vous connecter à la DB avec PDO

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    try {
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
                $sql = "SELECT * from users where username = :username;";
                $result = $db->prepare($sql);
                $data = [
                    'username' => $username
                ];
                $result->execute($data);
                if (!$result) {
                    header("Location: /public/index.php?erreur=Impossible d'acceder à la base de données");
                } else {
                    $result = $result->fetch(PDO::FETCH_ASSOC);

                    if (password_verify($password, $result['password'])) {
                        $_SESSION['username'] = $username;
                        header('Location: /pages/home.php');
                        exit();
                    } else {
                        header("Location: /public/index.php?erreur=Mot de passe ou utilisateur incorrect(s)");
                        exit();
                    }

                }
            }
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
}

