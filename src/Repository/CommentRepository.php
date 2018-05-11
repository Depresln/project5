<?php

namespace App\Repository;
use PDO;
use App\Entity\Comment;

class CommentRepository extends DefaultRepository
{
    public function getByDate()
    {
        $select = '';
        $from = '';
        $order = '';
        $requestString = $select . ' ' . $from . ' ' . $order;
    }
}
