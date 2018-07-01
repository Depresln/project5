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
                $insert = 'INSERT INTO user';
                $values = 'VALUES(NULL, NOW(), :first_name, :last_name, :pseudo, :email, :password, 0)';
                $requestString = $insert . ' ' . $values;

                $req3 = $this->getDB()->prepare($requestString);
                $req3->bindParam(':first_name', $firstName);
                $req3->bindParam(':last_name', $lastName);
                $req3->bindParam(':pseudo', $pseudo);
                $req3->bindParam(':email', $email);
                $req3->bindParam(':password', $pass_hache);
                $req3->execute();
//                header('Location: ?page=authentication.login.php');
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

            if (password_verify($pass, $resultPass)) {
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
