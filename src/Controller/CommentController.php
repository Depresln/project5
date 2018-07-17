<?php

namespace App\Controller;
use App\Repository\CommentRepository;

class CommentController
{
    public function addCommentView()
    {
        require "../src/View/Comment/comment_add.php";
    }

    public function checkCommentCreation($id)
    {
        $content = $_POST['content'];
        $idSession = $_POST['id'];

        $postCreation = new CommentRepository();
        $postCreation->addComment($content, $id, $idSession);
        header("Location: ?page=post.show&id=" . $id);
    }

    public function commentDelete($id)
    {
        session_start();
        if(isset($_SESSION['pseudo'])) {
            if ($_SESSION['is_admin'] == TRUE) {
                $postDeletion = new CommentRepository();
                $postDeletion->deleteComment($id);
                header("Location: ?page=post.index");
            }
        }
    }
}