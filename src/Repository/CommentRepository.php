<?php

namespace App\Repository;
use PDO;
use App\Entity\Comment;

class CommentRepository extends DefaultRepository
{
    public function getByDate()
    {
        $select = 'SELECT id, content, DATE_FORMAT(created_at, "%d/%m/%Y %Hh%im%ss") AS date, ';
        $from = '';
        $join = '';
        $order = '';
        $requestString = $select . ' ' . $from . ' ' . $join . ' ' . $order;
    }
}
