<?php

namespace App\Repository;
use App\Service\ValidatorService;
use PDO;
use App\Model\DefaultRepository;
use App\Entity\Comment;

/**
 * Class CommentRepository
 * @package App\Repository
 */
class CommentRepository extends DefaultRepository
{
    /**
     * @param $id
     * @return array
     */
    public function getByDate($id)
    {
        $select = 'SELECT c.id, c.post_user_id AS author, c.content, DATE_FORMAT(c.created_at, "%d/%m/%Y %Hh%im%ss") AS date, c.post_id';
        $from = 'FROM comment AS c';
        $join = 'JOIN post ON post.id = c.post_id';
        $where = 'WHERE c.post_id = :id';
        $order = 'ORDER BY date DESC';
        $requestString = $select . ' ' . $from . ' ' . $join . ' ' . $where . ' ' . $order;

        $validatorService = new ValidatorService();
        $id = $validatorService->commentIdValidate($id);

        $req = $this->getDB()->prepare($requestString);
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();

        $commentList = [];

        while ($dataRow = $req->fetch()) {
            $newComment = new Comment($dataRow);
            $commentList[] = $newComment;
        }

        return $commentList;
    }

    /**
     * @param $content
     * @param $id
     * @param $idSession
     */
    public function addComment($content, $id, $idSession)
    {
        $insert = 'INSERT INTO comment';
        $values = 'VALUES(NULL, NOW(), :content, :post_id, :post_user_id)';
        $requestString = $insert . ' ' . $values;

        $req = $this->getDB()->prepare($requestString);
        $req->bindParam(':content',$content);
        $req->bindParam(':post_id',$id);
        $req->bindParam(':post_user_id',$idSession);
        $req->execute();

        session_start();
        $_SESSION['addSuccess'] = "true";
    }

    public function deleteComment($id)
    {
        $delete = 'DELETE';
        $from = 'FROM comment';
        $where = 'WHERE id = :id';
        $requestString = $delete . ' ' . $from . ' ' . $where;

        $req = $this->getDB()->prepare($requestString);
        $req->bindParam(':id',$id,PDO::PARAM_STR);
        $req->execute();

        session_start();
        $_SESSION['deleteSuccess'] = "true";
    }
}
