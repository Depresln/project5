<?php
session_start();
session_destroy();
$title  = 'Nicolas Depresles';
ob_start();
?>

    <div id="page-top" class="index">
        <?php require '../src/View/navbar.php'; ?>

        <br /> <br /><br /><br /><br /><br /><br /><p>Vous vous êtes bien déconnecté.</p><br />

        <a href="?page=default.home">Retour à l'accueil.</a><br /><br />

        <?php require '../src/View/footer.php'; ?>
    </div>

<?php
$content = ob_get_clean();
include('..\src\View\template.php');
?>