<?php
session_start();
$title  = 'Nicolas Depresles';
ob_start();

    // Navbar
    require 'src/View/navbar.php';

    // Message for post deletion successful
    if(isset($_SESSION['pseudo'])){
        if($_SESSION['is_admin'] == TRUE){
            if(isset($_SESSION['deleteSuccess']) && $_SESSION['deleteSuccess'] == "true"){
                echo "<div class='alert alert-success margin-top neg-margin'>Suppression effectuée avec succès !</div><br /><br />";
                $_SESSION['deleteSuccess'] = "false";
            }
        }
    }

    // Message for post addition successful
    if(isset($_SESSION['pseudo'])){
        if($_SESSION['is_admin'] == TRUE){
            if(isset($_SESSION['addSuccess']) && $_SESSION['addSuccess'] == "true"){
                echo "<div class='alert alert-success margin-top neg-margin'>Post ajouté avec succès !</div><br /><br />";
                $_SESSION['addSuccess'] = "false";
            }
        }
    }

    // Message for post edition successful
    if(isset($_SESSION['pseudo'])){
        if($_SESSION['is_admin'] == TRUE){
            if(isset($_SESSION['editSuccess']) && $_SESSION['editSuccess'] == "true"){
                echo "<div class='alert alert-success margin-top neg-margin'>Post edité avec succès !</div><br /><br />";
                $_SESSION['editSuccess'] = "false";
            }
        }
    }
?>
    <div class="container margin-top">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Liste des posts</h2>
                <hr class="star-primary -align-left">
            </div>
        </div>
    </div>

<?php
    // Post index
    /** @var \App\Entity\Post $post */
    foreach ($postList as $post) {
        ?>
        <div class="container fa-border">
            <div class="row">
                <div class="col-lg-11 col-lg-offset-1">
                    <h2><?php echo "<a href='?page=post.show&id=" . $post->getId() . "'>" . $post->getTitle() . "</a> "; ?></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-1">
                    <p>
                        <?php echo $post->getChapo(); ?>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-3">
                    <ul class="list-inline">
                        <li>
                            <?php echo "Le " . $post->getDate(); ?>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2">
                    <ul class="list-inline">
                        <li>
                            <?php
                            if(isset($_SESSION['pseudo'])) {
                                if ($_SESSION['is_admin'] == TRUE) {
                                    echo "<a href='?page=post.delete&id=" . $post->getId() . "'>Supprimer le post</a>";
                                }
                            }
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <br />
        <?php
    }

    // Add a post
    if(isset($_SESSION['pseudo'])){
        if($_SESSION['is_admin'] == TRUE){
            ?>
            <div class="container margin-bot">
                <div class="row text-center">
                    <div class="col-lg-12">
                        <?php echo "<a href='?page=post.create' class='btn btn-lg btn-success'>Ajouter un post</a>"; ?>
                        <?php echo "<a href='?page=post.administration' class='btn btn-lg btn-success'>Espace administrateur</a>"; ?>
                    </div>
                </div>
            </div>
            <?php
        }
    }

    // Footer
    require 'src/View/footer.php';

$content = ob_get_clean();
include('src\View\template.php');
?>