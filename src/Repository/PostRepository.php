<?php

namespace App\Repository;

/**
 * Class PostRepository
 * @package App\Repository
 */
class PostRepository extends DefaultRepository
{
    /**
     * @var \PDO
     */
    private $dataBase;

    /**
     * PostRepository constructor.
     */
    public function __construct()
    {
        $this->dataBase = parent::DBConnect();
    }

    /**
     * @return array
     */
    public function getAll()
    {
        $answer = $this->dataBase->prepare("SELECT FROM WHERE");
        $answer->bindParam('pseudo', $pseudo);

        $answer->closeCursor();
    }

    /**
     * @param $id
     */
    public function getOneById($id)
    {

    }
}