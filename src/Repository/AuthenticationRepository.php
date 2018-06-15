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
                $req3->bindValue(':first_name', $firstName);
                $req3->bindValue(':last_name', $lastName);
                $req3->bindValue(':pseudo', $pseudo);
                $req3->bindValue(':email', $email);
                $req3->bindValue(':password', $pass_hache);
                $req3->execute();

                echo "Insertion faite";
            }
        }
    }

    /**
     *
     */
    public function logIn()
    {

    }

    /**
     *
     */
    public function logOut()
    {

    }
}
