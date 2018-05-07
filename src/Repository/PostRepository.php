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
        $select = 'SELECT idpost, title, chapo, DATE_FORMAT(created_at, "%d/%m/%Y %Hh%im%ss") AS date_fr';
        $from = 'FROM post';
        $order = 'ORDER BY idpost DESC';
        $limit = 'LIMIT :start, :end';
        $requestString = $select . ' ' . $from . ' ' . $order . ' ' . $limit;

        $validatorService = new ValidatorService();
        $start = $validatorService->bindParamValidate($start);
        $end = $validatorService->bindParamValidate($end);

        $req = $this->getDB()->prepare($requestString);
        // TODO : controle des parametres, validation des parametres (controle des mots clés ex: drop select insert etc)

        $req->bindParam(':start',$start, PDO::PARAM_INT);
        $req->bindParam(':end',$end, PDO::PARAM_INT);
        $req->execute();

        $postList = [];

        while ($dataRow = $req->fetch())
        {
//            $idpost = $post['idpost'];
//            $title = $post['title'];
//            $chapo = $post['chapo'];
//            $date = $post['date_fr'];

            $newPost = new Post($dataRow);
//            $newPost->setId($idpost);
//            $newPost->setTitle($title);
//            $newPost->setChapo($chapo);
//            $newPost->setDate($date);

            $postList[] = $newPost;
        }

        $req->closeCursor();

        return $postList;
    }

    /**
     * @param $id
     * @return array
     */
    public function getById($id)
    {
        $select = 'SELECT idpost, title, chapo, content, DATE_FORMAT(created_at, "%d/%m/%Y %Hh%im%ss") AS date_fr';
        $from = 'FROM post';
        $where = 'WHERE :idpost = idpost';
        $requestString = $select . ' ' . $from . ' ' . $where;

        $req = $this->getDB()->prepare($requestString);
        // TODO : controle des parametres, validation des parametres (controle des mots clés ex: drop select insert etc)

        $req->bindParam(':idpost',$id, PDO::PARAM_INT);
        $req->execute();

        $postById = [];

        while ($post = $req->fetch())
        {
            $idpost = $post['idpost'];
            $title = $post['title'];
            $chapo = $post['chapo'];
            $date = $post['date_fr'];
            $content = $post['content'];

            $newPost = new Post();
            $newPost->setId($idpost);
            $newPost->setTitle($title);
            $newPost->setChapo($chapo);
            $newPost->setDate($date);
            $newPost->setContent($content);

            $postById[] = $newPost;
        }

        $req->closeCursor();

        return $postById;
    }
}