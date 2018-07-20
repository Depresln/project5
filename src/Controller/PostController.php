<?php

namespace App\Controller;

use App\Repository\PostRepository;
use App\Repository\CommentRepository;

/**
 * Class PostController
 * @package App\Controller
 */
class PostController
{
    /**
     * Return list of posts' view
     */
    public function index()
    {
        $postRepository = new PostRepository();
        $postList = $postRepository->getByLimit(0, 10);
        require "../src/View/Post/post_index.php";
    }

    /**
     * Return associated posts and comments
     */
    public function show($id)
    {
        $postRepository = new PostRepository();
        $post = $postRepository->getById($id);
        if ($post){
            $commentRepository = new CommentRepository();
            $commentByDate = $commentRepository->getByDate($id);
            require "../src/View/Post/post_show.php";
        } else {
            $controller = new ErrorController();
            $controller->error404();
        }
    }

    public function createPostView()
    {
        require "../src/View/Post/post_create.php";
    }

    public function checkCreation()
    {
        $title = $_POST['title'];
        $chapo = $_POST['chapo'];
        $content = $_POST['content'];
        $id = $_POST['id'];

        $postCreation = new PostRepository();
        $postCreation->addPost($title, $chapo, $content, $id);
        header("Location: ?page=post.index");
    }

    public function deletePostView()
    {
        require "../src/View/Post/post_delete.php";
    }

    public function postDelete($id)
    {
        session_start();
        if(isset($_SESSION['pseudo'])) {
            if ($_SESSION['is_admin'] == TRUE) {
                $postDeletion = new PostRepository();
                $postDeletion->deletePost($id);
                header("Location: ?page=post.index");
            }
        }
    }

    public function editPostView()
    {
        $id = $_GET['id'];
        $fieldValues = new PostRepository();
        $post = $fieldValues->getById($id);
        require "../src/View/Post/post_edit.php";
    }

    public function checkEdit($id)
    {
        $title = $_POST['title'];
        $chapo = $_POST['chapo'];
        $content = $_POST['content'];
        $editPost = new PostRepository();
        $editPost->updatePost($id, $title, $chapo, $content);
        header("Location: ?page=post.index");
    }

    public function adminSpaceView()
    {
        $commentRepository = new CommentRepository();
        $commentList = $commentRepository->getByValidation();
        if ($commentList) {
            require "../src/View/Administration/admin_space.php";
        }
    }
}
