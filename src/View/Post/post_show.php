<?php
    $title  = 'Nicolas Depresles';
    ob_start();

    /** @var \App\Entity\Post $post */
    foreach ($postById as $post) {
        echo "Je suis un post d'id " . $post->getIdPost() . " créé le " . $post->getDate() . "<br /><br />" . $post->getContent();
    }

    $content = ob_get_clean();

include('D:\Bureau\Mes Documents\Dev\project5\src\View\template.php');