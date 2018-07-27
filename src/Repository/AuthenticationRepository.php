<?php

namespace App\Repository;

use App\Model\DefaultRepository;

/**
 * Class AuthenticationRepository
 * @package App\Repository
 */
class AuthenticationRepository extends DefaultRepository
{
    /**
     * @param $firstName
     * @param $lastName
     * @param $pseudo
     * @param $pass_hache
     * @param $email
     */
    public function setLogs($firstName, $lastName, $pseudo, $pass_hache, $email)
    {
        $select = 'SELECT pseudo';
        $from = 'FROM user';
        $requestString = $select . ' ' . $from;

        $req = $this->getDB()->query($requestString);
        $result = $req->fetch();

        $resultPseudo = $result['pseudo'];

        if (strtolower($pseudo) == strtolower($resultPseudo)) {
            echo 'Ce nom d\'utilisateur est déjà utilisé.';
            $req->closeCursor();
        } else {
            $select = 'SELECT email';
            $from = 'FROM user';
            $requestString = $select . ' ' . $from;

            $req2 = $this->getDB()->query($requestString);
            $result2 = $req2->fetch();

            $resultEmail = $result2['email'];

            if (strtolower($email) == strtolower($resultEmail)) {
                echo 'Cette adresse mail est déjà utilisée.';
                $req2->closeCursor();
            } else {
                $insert = 'INSERT INTO user (id, registered_at, first_name, last_name, pseudo, email, password, is_admin)';
                $values = 'VALUES(NULL, NOW(), "test", "test", "abc", "mail@t", "lol", 0)';
                $requestString = $insert . ' ' . $values;

                $req3 = $this->getDB()->prepare($requestString);
//                $req3->bindValue('first_name', $firstName);
//                $req3->bindValue('last_name', $lastName);
//                $req3->bindValue('pseudo', $pseudo);
//                $req3->bindValue('email', $email);
//                $req3->bindValue('password', $pass_hache);
                $req3->execute();
//                header('Location: ?page=authentication.login.php');
                var_dump($req3);
                echo "Insertion faite";
                $req3->closeCursor();
            }
        }
    }

    public function logIn($pseudo, $pass)
    {
        $select = 'SELECT *';
        $from = 'FROM user';
        $where = 'WHERE pseudo = :pseudo';
        $requestString = $select . ' ' . $from . ' ' . $where;

        $req = $this->getDB()->prepare($requestString);
        $req->bindParam('pseudo', $pseudo);
        $req->execute();

        $result = $req->fetch();

        if ($result) {
            $resultPass = $result['password'];

//            if (password_verify($pass, $resultPass)) {
            if ($pass == $resultPass) {
                $resultId = $result['id'];
                $resultAdmin = $result['is_admin'];
                session_start();
                $_SESSION['id'] = $resultId;
                $_SESSION['pseudo'] = $pseudo;
                $_SESSION['is_admin'] = $resultAdmin;
                header('Location: ?page=default.home');
            } else {
                echo 'Mauvais identifiant ou mot de passe1 !'; ?>
                <br /><a href="?page=authentication.login">Retour à la connexion</a>
                <?php
            }
        } else {
            echo 'Mauvais identifiant ou mot de passe2 !'; ?>
            <br /><a href="?page=authentication.login">Retour à la connexion</a>
            <?php
        }
    }
}
