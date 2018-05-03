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
        require "../src/View/Post/post_index.php";

        $postRepository = new PostRepository();
        $postList = $postRepository->getByLimit(0, 10);

        foreach ($postList as $post){
            echo $post;
            ?> <br /><br />
            <?php
        }
    }

    /**
     *
     */
    public function show($id)
    {
        require "../src/View/Post/post_show.php";

        $postRepository = new PostRepository();
        $postById = $postRepository->getById($id);
        foreach ($postList as $post){
            echo $post;
            ?> <br /><br />
            <?php
        }
    }
}
?>