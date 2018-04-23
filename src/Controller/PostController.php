<?php

namespace App\Controller;
use App\Repository\PostRepository;

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
        $postList = $postRepository->getAll();
        require "../src/View/Post/post_index.php";
    }

    /**
     *
     */
    public function show()
    {
        require "../src/View/Post/post_show.php";
    }


}