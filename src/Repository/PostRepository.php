<?php

namespace App\Repository;

/**
 * Class PostRepository
 * @package App\Repository
 */
class PostRepository extends DefaultRepository
{

    /**
     * PostRepository constructor.
     */
    public function __construct()
    {

    }

    /**
     * @return array
     */
    public function getAll()
    {
        $this->getDB()->prepare("SELECT idpost, created_at, title, chapo, content, user_iduser FROM post");
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
        $req->bindParam(':start',$start, PDO::PARAM_INT);
        $req->bindParam(':end',$end, PDO::PARAM_INT);
        $req->execute();

        $postList = [];

        while ($post = $req->fetch())
        {
            $newPost = new Post();
            $newPost->setTitle($post['title']);

            $postList[] = $newPost;

            // echo $dateFr . "&nbsp; <strong>" . $title . "</strong> : " . $chapo . "<br /><br />";
        }

        $req->closeCursor();

        return $postList;
    }
}