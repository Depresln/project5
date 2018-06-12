<?php
    $title  = 'Nicolas Depresles';
    ob_start();

    /** @var \App\Entity\Post $post */
    echo "<h2>" . $post->getTitle() . "</h2><br />Je suis un post d'id " . $post->getId() . " créé le " . $post->getDate() . "<br /><br />" . $post->getContent();

    /** @var \App\Entity\Comment $comment */
    foreach ($commentByDate as $comment) {
        echo "<br /><br />" . $comment->getContent();
    }

    $content = ob_get_clean();

include('..\src\View\template.php');
