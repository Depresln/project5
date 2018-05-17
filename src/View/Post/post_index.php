<?php
    $title  = 'Nicolas Depresles';
    ob_start();
?>

<h2>Post List</h2>

<?php
    /** @var \App\Entity\Post $post */
    foreach ($postList as $post) {
        echo "<a href='?page=post.show&id=" . $post->getId() . "'>" . $post->getTitle() . "</a> ";
        echo $post->getDate() . "<br />";
        echo $post->getChapo() . "<br /><br />";
    }

    $content = ob_get_clean();

    include('..\src\View\template.php');
?>