<?php

namespace App\Controller;

use App\Repository\AuthenticationRepository;

/**
 * Class AuthenticationController
 * @package App\Controller
 */
class AuthenticationController
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
        if(empty($_POST['first_name']) OR empty($_POST['last_name']) OR empty($_POST['pseudo']) OR empty($_POST['pass']) OR empty($_POST['pass2']) OR empty($_POST['email'])) {
            echo "Champ(s) non rempli(s) !";
        } else {
            $firstName = htmlspecialchars($_POST['first_name']);
            $lastName = htmlspecialchars($_POST['last_name']);
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $pass = htmlspecialchars($_POST['pass']);
            $pass2 = htmlspecialchars($_POST['pass2']);
            $email = htmlspecialchars($_POST['email']);

            if ($pass == $pass2) {
                $pass_hache = password_hash($pass, PASSWORD_DEFAULT);
                $checkLogs = new AuthenticationRepository();
                $checkLogs->setLogs($firstName, $lastName, $pseudo, $pass_hache, $email);
            } else {
                echo 'Les mots de passe saisis doivent être identiques.';
            }
        }
    }

    /**
     * Return View
     */
    public function getLogInView()
    {
        require "../src/View/Authentication/log_in.php";
    }

    /**
     *
     */
    public function checkLogs()
    {
        if(empty($_POST['pseudo']) OR empty($_POST['pass'])) {
            echo "Champ(s) non rempli(s) !";
        } else {
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $pass = htmlspecialchars($_POST['pass']);

            $checkLogs = new AuthenticationRepository();
            $checkLogs->logIn($pseudo, $pass);
        }
    }

    public function logOut()
    {
        require "../src/View/Authentication/log_out.php";
    }
}