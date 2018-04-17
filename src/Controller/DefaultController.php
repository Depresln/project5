<?php

namespace App\Controller;

class DefaultController
{
    public function home()
    {
        require "../src/View/home.php";
    }
}