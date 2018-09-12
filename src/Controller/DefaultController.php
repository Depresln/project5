<?php

namespace App\Controller;

/**
 * Class DefaultController
 * @package App\Controller
 */
class DefaultController
{
    /**
     * Return home view
     */
    public function home()
    {
        require "src/View/home.php";
    }
}