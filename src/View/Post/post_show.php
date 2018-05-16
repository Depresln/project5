<?php
    $title  = 'Nicolas Depresles';
    ob_start();

    /** @var \App\Entity\Post $post */
    foreach ($postById as $post) {
        echo "<h2>" . $post->getTitle() . "</h2><br />Je suis un post d'id " . $post->getId() . " créé le " . $post->getDate() . "<br /><br />" . $post->getContent();
    }

    $content = ob_get_clean();

include('..\src\View\template.php');
