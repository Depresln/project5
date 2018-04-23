<?php

namespace App\Repository;

/**
 * Class DefaultRepository
 * @package App\Repository
 */
abstract class DefaultRepository
{
    /**
     * @return \PDO
     */
    protected function DBConnect()
    {
        try
        {
            $db = new \PDO('mysql:host=localhost;dbname=projet5;charset=utf8', 'root', '');
            return $db;
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
}