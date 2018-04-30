<?php

namespace App\Repository;
use PDO;

/**
 * Class PostRepository
 * @package App\Repository
 */
class PostRepository extends DefaultRepository
{
    /**
     * @return array
     */
    public function validator()
    {
        ;
    }

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

        $req = $this->getDB()->prepare($requestString);
        // TODO : controle des parametres, validation des parametres (controle des mots clés ex: drop select insert etc)
        //
        $req->bindParam(':start',$start, PDO::PARAM_INT);
        $req->bindParam(':end',$end, PDO::PARAM_INT);
        $req->execute();

        $postList = [];

        while ($post = $req->fetch())
        {
            $newPost = new \App\Entity\Post();

            $title = $post['title'];
            $chapo = $post['chapo'];
            $date = $post['date_fr'];

            $newPost->setTitle($title);
            $newPost->setChapo($chapo);
            $newPost->setDate($date);

            $postList[] = $newPost;
            $postList = array(
                'title' => $title,
                'date' => $date,
                'chapo' => $chapo
            );
        }

        $req->closeCursor();

        return $postList;
    }
}