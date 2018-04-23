<?php

namespace App\Controller;

/**
 * Class DefaultController
 * @package App\Controller
 */
class DefaultController
{
    /**
     *
     */
    public function home()
    {
        require "../src/View/home.php";
    }
}