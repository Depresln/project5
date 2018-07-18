<?php

namespace App\Controller;
use App\Repository\CommentRepository;

/**
 * Class CommentController
 * @package App\Controller
 */
class CommentController
{
    /**
     *
     */
    public function addCommentView()
    {
        require "../src/View/Comment/comment_add.php";
    }

    /**
     * @param $id
     */
    public function checkCommentCreation($id)
    {
        $content = $_POST['content'];
        $idSession = $_POST['id'];

        $postCreation = new CommentRepository();
        $postCreation->addComment($content, $id, $idSession);
        header("Location: ?page=post.show&id=" . $id);
    }

    public function deleteCommentView()
    {
        require "../src/View/Comment/comment_delete.php";
    }

    /**
     * @param $id
     */
    public function commentDelete($id)
    {
        session_start();
        if(isset($_SESSION['pseudo'])) {
            $postDeletion = new CommentRepository();
            $postDeletion->deleteComment($id);
            header("Location: ?page=post.show&id=" . $_SESSION['previous']);
        }
    }

    public function commentValidate($id)
    {
        $commentRepository = new CommentRepository();
        $commentRepository->validateComment($id);
        header("Location: ?page=post.administration");
    }
}