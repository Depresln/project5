<?php

namespace App\Repository;

/**
 * Class PostRepository
 * @package App\Repository
 */
class PostRepository
{
    /**
     * @return array
     */
    public function getAll()
    {
        return ['toto', 'tata']; //acces db+recup
    }

    /**
     * @param $id
     */
    public function getOneById($id)
    {

    }
}