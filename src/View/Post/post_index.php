<?php $title  = 'Nicolas Depresles' ?>

<?php ob_start(); ?>
<?php
    $postList = new \App\Controller\PostController();
    $postList->index();
?>
<?php $content = ob_get_clean(); ?>

<?php include('D:\Bureau\Mes Documents\Dev\project5\src\View\template.php'); ?>