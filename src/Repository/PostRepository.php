<?php

namespace App\Repository;
use App\Service\ValidatorService;
use PDO;
use App\Entity\Post;

/**
 * Class PostRepository
 * @package App\Repository
 */
class PostRepository extends DefaultRepository
{
    /**
     * @param $id
     */
    public function getByLimit($start, $end)
    {
        $select = 'SELECT id, title, chapo, DATE_FORMAT(created_at, "%d/%m/%Y %Hh%im%ss") AS date';
        $from = 'FROM post';
        $order = 'ORDER BY id DESC';
        $limit = 'LIMIT :start, :end';
        $requestString = $select . ' ' . $from . ' ' . $order . ' ' . $limit;

        $validatorService = new ValidatorService();
        $start = $validatorService->bindParamValidate($start);
        $end = $validatorService->bindParamValidate($end);

        $req = $this->getDB()->prepare($requestString);
        $req->bindParam(':start',$start, PDO::PARAM_INT);
        $req->bindParam(':end',$end, PDO::PARAM_INT);
        $req->execute();

        $postList = [];

        while ($dataRow = $req->fetch())
        {
            $newPost = new Post($dataRow);
            $postList[] = $newPost;
        }

        return $postList;
    }

    /**
     * @param $id
     * @return array
     */
    public function getById($id)
    {
        $select = 'SELECT id, title, chapo, content, DATE_FORMAT(created_at, "%d/%m/%Y %Hh%im%ss") AS date';
        $from = 'FROM post';
        $where = 'WHERE :id = id';
        $requestString = $select . ' ' . $from . ' ' . $where;

        $req = $this->getDB()->prepare($requestString);
        // TODO : controle des parametres, validation des parametres (controle des mots clés ex: drop select insert etc)

        $req->bindParam(':id',$id, PDO::PARAM_INT);
        $req->execute();

        $postById = [];

        while ($post = $req->fetch())
        {
            $newPost = new Post($post);
            $postById[] = $newPost;
        }

        $req->closeCursor();

        return $postById;
    }
}