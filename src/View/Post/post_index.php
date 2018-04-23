<?php $title  = 'Nicolas Depresles' ?>

<?php ob_start(); ?>
<?php
require_once "../vendor/autoload.php";

echo "Je suis la bloglist";
?>
<?php $content = ob_get_clean(); ?>

<?php include('D:\Bureau\Mes Documents\Dev\project5\src\View\template.php'); ?>