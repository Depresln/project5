<?php

namespace App\Model;

/**
 * Class DefaultRepository
 * @package App\Repository
 */
abstract class DefaultRepository
{
    private $dataBase;

    /**
     * @return \PDO
     */
    protected function getDB()
    {
        if ($this->dataBase === null) {
            try {
//                $this->dataBase = new \PDO('mysql:host=localhost;dbname=projet5;charset=utf8', 'root', '');
                $this->dataBase = new \PDO('mysql:host=nicolasdhtexal.mysql.db;dbname=nicolasdhtexal;charset=utf8', 'nicolasdhtexal', 'Ultramastw001');
            } catch (Exception $e) {
                die('Erreur : '.$e->getMessage());
            }
        }
        return $this->dataBase;
    }
}
