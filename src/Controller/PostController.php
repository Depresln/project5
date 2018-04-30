<?php

namespace App\Controller;
use App\Entity\Post;
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
        $postList = $postRepository->getByLimit(0, 10);

        foreach ($postList as $test) {
            echo $test . '<br />';
        }

        $postList->closeCursor();



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