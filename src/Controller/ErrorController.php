<?php

namespace App\Controller;

class ErrorController
{
    public function error404()
    {
        require "../src/View/Error/404.php";
    }

    public function error500(\Exception $exception)
    {
        $messageException = $exception->getMessage();
        require "../src/View/Error/500.php";
    }
}