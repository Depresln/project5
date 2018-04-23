<?php

namespace App\Repository;

/**
 * Class PostRepository
 * @package App\Repository
 */
class PostRepository extends DefaultRepository
{
    /**
     * @return array
     */
    public function getAll()
    {
        return ['']; //acces db+recup
    }

    /**
     * @param $id
     */
    public function getOneById($id)
    {

    }
}