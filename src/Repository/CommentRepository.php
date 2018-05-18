<?php

namespace App\Repository;
use PDO;
use App\Model\DefaultRepository;
use App\Entity\Comment;

class CommentRepository extends DefaultRepository
{
    public function getByDate()
    {
        $select = 'SELECT comment.id, comment.content, DATE_FORMAT(comment.created_at, "%d/%m/%Y %Hh%im%ss") AS date, comment.post_id, comment.post_user_id';
        $from = 'FROM comment';
        $join = 'JOIN post ON post.id = comment.post_id';
        $order = 'ORDER BY date DESC';
        $requestString = $select . ' ' . $from . ' ' . $join . ' ' . $order;

        $req = $this->getDB()->prepare($requestString);
        $req->execute();

        $commentList = [];

        while ($dataRow = $req->fetch()) {
            $newComment = new Comment($dataRow);
            $commentList[] = $newComment;
        }

        return $commentList;
    }
}
