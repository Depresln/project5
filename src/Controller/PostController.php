<?php

namespace App\Controller;

use App\Repository\PostRepository;
use App\Repository\CommentRepository;
use App\Controller\ErrorController;

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
}
