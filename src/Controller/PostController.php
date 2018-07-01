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
    }

    public function deletePost()
    {
        $postDeletion = new PostRepository();

    }
}
