<?php
session_start();
$title  = 'Nicolas Depresles';
ob_start();

    // Navbar
    require '../src/View/navbar.php';

    echo "<p class='text-center margin-top'>Vous êtes sur le point de supprimer définitivement un post.</p><br />";

    if(isset($_SESSION['pseudo'])){
        if($_SESSION['is_admin'] == TRUE){
            echo "<div class='text-center'>Supprimer le post ?</div><br />";
            echo "<div class='text-center'><a href='?page=post.deletion&id=" . $_GET['id'] . "'>Oui</a></div>";
            echo "<div class='text-center'><a href='?page=post.index'>Non</a></div><br />";
        }
    }

    ?>
    <div class='margin-bot'></div>
    <?php

    // Footer
    require '../src/View/footer.php';

$content = ob_get_clean();
include('..\src\View\template.php');