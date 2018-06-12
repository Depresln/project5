<?php

namespace App\Controller;

use App\Repository\AuthenticationRepository;

class AuthenticationController
{
    public function getRegisterView()
    {
        require "../src/View/Authentication/register.php";
    }

    public function checkCredentials()
    {

    }

    public function logOut()
    {

    }
}