<?php $title  = 'Nicolas Depresles';
    ob_start(); ?>
        <h2>Post List</h2>
        <?php
            /** @var \App\Entity\Post $post */
            foreach ($postList as $post){
                echo $post->getChapo();
                echo $post->getTitle();
                echo $post->getIdpost();
                ?> <br /><br />
                <?php
            }
        $content = ob_get_clean();

    include('D:\Bureau\Mes Documents\Dev\project5\src\View\template.php');
?>