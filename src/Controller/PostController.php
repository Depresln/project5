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
        require "src/View/Post/post_index.php";
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
            require "src/View/Post/post_show.php";
        } else {
            $controller = new ErrorController();
            $controller->error404();
        }
    }

    /**
     * Return post creation view
     */
    public function createPostView()
    {
        require "src/View/Post/post_create.php";
    }

    /**
     * Post creation
     */
    public function checkCreation()
    {
        if(empty($_POST['title']) OR empty($_POST['chapo']) OR empty($_POST['content'])) {
            echo "Champ(s) non rempli(s) !";
        } else {
            $title = htmlspecialchars($_POST['title']);
            $chapo = htmlspecialchars($_POST['chapo']);
            $content = htmlspecialchars($_POST['content']);
            $id = $_POST['id'];

            $postCreation = new PostRepository();
            $postCreation->addPost($title, $chapo, $content, $id);
            header("Location: ?page=post.index");
        }
    }

    /**
     * Return delete post view
     */
    public function deletePostView()
    {
        require "src/View/Post/post_delete.php";
    }

    /**
     * @param $id
     */
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

    /**
     * Return post edit view
     */
    public function editPostView()
    {
        $id = $_GET['id'];
        $fieldValues = new PostRepository();
        $post = $fieldValues->getById($id);
        $selectAuthors = $fieldValues->getAuthors();

        require "src/View/Post/post_edit.php";
    }

    /**
     * @param $id
     */
    public function checkEdit($id)
    {
        if(empty($_POST['title']) OR empty($_POST['chapo']) OR empty($_POST['content'])) {
            echo "Champ(s) non rempli(s) !";
        } else {
            $title = htmlspecialchars($_POST['title']);
            $chapo = htmlspecialchars($_POST['chapo']);
            $content = htmlspecialchars($_POST['content']);
            $author = $_POST['pseudo'];
            $editPost = new PostRepository();
            $editPost->updatePost($id, $title, $chapo, $content, $author);
            header("Location: ?page=post.index");
        }
    }

    /**
     * Return admin space view
     */
    public function adminSpaceView()
    {
        $commentRepository = new CommentRepository();
        $commentList = $commentRepository->getByValidation();
        if ($commentList) {
            require "src/View/Administration/admin_space.php";
        }
    }
}
