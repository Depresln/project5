<?php
session_start();
session_destroy();
$title  = 'Nicolas Depresles';
ob_start();

    require 'src/View/navbar.php';
?>

    <p class="margin-top text-center">Vous vous êtes bien déconnecté.</p><br />
    <div class="text-center"><a href="?page=default.home">Retour à l'accueil.</a></div>
    <div class="margin-bot"></div>

<?php
    require 'src/View/footer.php';

$content = ob_get_clean();
include('src\View\template.php');
?>

