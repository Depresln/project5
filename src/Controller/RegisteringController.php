<?php

namespace App\Controller;

use App\Repository\RegisteringRepository;

/**
 * Class RegisteringController
 * @package App\Controller
 */
class RegisteringController
{
    /**
     *  Return View
     */
    public function getRegisterView()
    {
        require "../src/View/Authentication/register.php";
    }

    /**
     *
     */
    public function checkCredentials()
    {
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $pseudo = $_POST['pseudo'];
        $pass = $_POST['pass'];
        $pass2 = $_POST['pass2'];
        $email = $_POST['email'];

        if ($pass == $pass2) {
            $pass_hache = password_hash($pass, PASSWORD_DEFAULT);
            $checkLogs = new RegisteringRepository();
            $checkLogs->setLogs($firstName, $lastName, $pseudo, $pass_hache, $email);
        } else {
            echo 'Les mots de passe saisis doivent être identiques.';
        }
    }
}