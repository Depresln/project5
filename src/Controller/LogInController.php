<?php

namespace App\Controller;

use App\Repository\LogInRepository;

/**
 * Class LogInController
 * @package App\Controller
 */
class LogInController
{
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
        $pseudo = $_POST['pseudo'];
        $pass = $_POST['pass'];

        $checkLogs = new LogInRepository();
        $checkLogs->logIn($pseudo, $pass);
    }
}