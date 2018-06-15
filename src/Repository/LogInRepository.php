<?php

namespace App\Repository;

use App\Model\DefaultRepository;

/**
 * Class LogInRepository
 * @package App\Repository
 */
class LogInRepository extends DefaultRepository
{
    /**
     * @param $pseudo
     * @param $pass
     */
    public function logIn($pseudo, $pass)
    {
        $select = 'SELECT *';
        $from = 'FROM user';
        $where = 'WHERE pseudo = :pseudo';
        $requestString = $select . ' ' . $from . ' ' . $where;

        $req = $this->getDB()->prepare($requestString);
        $req->bindParam('pseudo', $pseudo);
        $req->execute();

        $resultat = $req->fetch();

        if ($resultat) {
            $resultPass = $resultat['password'];
            $resultId = $resultat['id'];

            if (password_verify($pass, $resultPass)) {
                session_start();
                $_SESSION['id'] = $resultId;
                $_SESSION['pseudo'] = $pseudo;
//                header('Location: ?page=default.home.php');
                echo "Vous êtes connecté !";
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