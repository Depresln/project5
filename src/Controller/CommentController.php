<?php

namespace App\Controller;
use App\Repository\CommentRepository;
use App\Service\ValidatorService;

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
        if(empty($_POST['content'])) {
            echo "Champ(s) non rempli(s) !";
        } else {
            $content = htmlspecialchars($_POST['content']);
            $idSession = $_POST['id'];

            $postCreation = new CommentRepository();
            $postCreation->addComment($content, $id, $idSession);
            header("Location: ?page=post.show&id=" . $id);
        }
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
        $author = $_SESSION['id'];
        $commentValidation = new CommentRepository();
        $commentValidation->checkCommentRights($id, $author);
        if(isset($_SESSION['pseudo']) AND $check === true) {
            $postDeletion = new CommentRepository();
            $postDeletion->deleteComment($id);
            header("Location: ?page=post.show&id=" . $_SESSION['previous']);
        } else {
            echo 'ERROR';
        }
    }

    public function commentValidate($id)
    {
        $commentRepository = new CommentRepository();
        $commentRepository->validateComment($id);
        header("Location: ?page=post.administration");
    }
}