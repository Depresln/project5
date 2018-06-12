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
//    /**
//     * @param $id
//     */
//    public function checkId($id)
//    {
//        $select = 'SELECT id';
//        $from = 'FROM post';
//        $requestString = $select . ' ' . $from;
//
//        $req = $this->getDB()->query($requestString);
//        $result = $req->fetch();
//
//        $resultId = $result['id'];
//
//        if($id === $resultId){
//            echo "ca marche";
//        } else {
//            echo "Le post recherché n'existe pas.";
//        }
//
//    }

    /**
     * @param $id
     * @return array
     */
    public function getByDate($id)
    {
        $select = 'SELECT c.content, DATE_FORMAT(c.created_at, "%d/%m/%Y %Hh%im%ss") AS date, c.post_id';
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
}
