<?php

namespace App\Repository;
use PDO;
use App\Model\DefaultRepository;
use App\Entity\Comment;

class CommentRepository extends DefaultRepository
{
    public function getByDate($id)
    {
        $select = 'SELECT c.content, DATE_FORMAT(c.created_at, "%d/%m/%Y %Hh%im%ss") AS date, c.post_id';
        $from = 'FROM comment AS c';
        $join = 'JOIN post ON post.id = c.post_id';
        $where = 'WHERE c.post_id = :id';
        $order = 'ORDER BY date DESC';
        $requestString = $select . ' ' . $from . ' ' . $join . ' ' . $where . ' ' . $order;

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
}
