<?php

namespace App\Controller;

/**
 * Class ErrorController
 * @package App\Controller
 */
class ErrorController
{
    /**
     * Return error 404
     */
    public function error404()
    {
        require "src/View/Error/404.php";
    }

    /**
     * @param \Exception $exception
     */
    public function error500(\Exception $exception)
    {
        $messageException = $exception->getMessage();
        require "src/View/Error/500.php";
    }
}
