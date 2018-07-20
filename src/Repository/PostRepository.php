<?php

namespace App\Repository;

use App\Model\DefaultRepository;
use PDO;
use App\Service\ValidatorService;
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
        $req->bindParam(':start', $start, PDO::PARAM_INT);
        $req->bindParam(':end', $end, PDO::PARAM_INT);
        $req->execute();

        $postList = [];

        while ($dataRow = $req->fetch()) {
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
//        $mysqli = new ValidatorService();
//        $mysqli->checkContent($req);

        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $success = $req->execute();
        $row = $req->fetch();

        $req->closeCursor();

        return $row ? new Post($row) : false;
    }

    /**
     * @param $title
     * @param $chapo
     * @param $content
     * @param $id
     */
    public function addPost($title, $chapo, $content, $id)
    {
        $select = 'SELECT *';
        $from = 'FROM post';
        $where = 'WHERE title = :title';
        $requestString = $select . ' ' . $from . ' ' . $where;

        $req = $this->getDB()->prepare($requestString);
        $req->bindParam(':title',$title,PDO::PARAM_STR);
        $req->execute();

        if($data = $req->fetch(PDO::FETCH_ASSOC)){
            echo "Le titre de ce post existe déjà.<br /> <a href='?page=post.create'>Retour à la création de post</a>";
        } else {
            $insert = 'INSERT INTO post';
            $values = 'VALUES(NULL, NOW(), :title, :chapo, :content, :id)';
            $requestString = $insert . ' ' . $values;

            $req = $this->getDB()->prepare($requestString);
            $req->bindParam(':title',$title);
            $req->bindParam(':chapo',$chapo);
            $req->bindParam(':content',$content);
            $req->bindParam(':id',$id);
            $req->execute();

            session_start();
            $_SESSION['addSuccess'] = "true";
        }
    }

    /**
     * @param $id
     */
    public function deletePost($id)
    {
        $delete = 'DELETE';
        $from = 'FROM comment';
        $where = 'WHERE post_id = :id';
        $fromPost = 'FROM post';
        $wherePost = 'WHERE id = :id';
        $requestString = $delete . ' ' . $from . ' ' . $where . '; ' . $delete . ' ' . $fromPost . ' ' . $wherePost;

        $req = $this->getDB()->prepare($requestString);
        $req->bindParam(':id',$id,PDO::PARAM_STR);
        $req->execute();

        session_start();
        $_SESSION['deleteSuccess'] = "true";
    }

    /**
     * @param $id
     */
    public function editPost($id)
    {
        $select = 'SELECT id, title, chapo, content';
        $from = 'FROM post';
        $where = 'WHERE id = :id';
        $requestString = $select . ' ' . $from . ' ' . $where;

        $req = $this->getDB()->prepare($requestString);
        $req->bindParam(':id', $id, PDO::PARAM_STR);
        $req->execute();
    }

    /**
     * @param $id
     * @param $title
     * @param $chapo
     * @param $content
     */
    public function updatePost($id, $title, $chapo, $content)
    {
        $update = 'UPDATE post';
        $set = 'SET title = :title, chapo = :chapo, content = :content';
        $where = 'WHERE id = :id';
        $requestString = $update . ' ' . $set . ' ' . $where;

        $req = $this->getDB()->prepare($requestString);
        $req->bindParam(':id', $id, PDO::PARAM_STR);
        $req->bindParam(':title', $title, PDO::PARAM_STR);
        $req->bindParam(':chapo', $chapo, PDO::PARAM_STR);
        $req->bindParam(':content', $content, PDO::PARAM_STR);
        $req->execute();

        session_start();
        $_SESSION['editSuccess'] = "true";
    }
}
