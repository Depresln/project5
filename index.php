<?php

require_once "vendor/autoload.php";

use App\Controller\DefaultController;
use App\Controller\PostController;
use App\Controller\CommentController;
use App\Controller\AuthenticationController;
use App\Controller\ErrorController;

try{
    if (isset($_GET["page"])) {
        // Core navigation
        if ($_GET["page"] === "default.home") {
            $controller = new DefaultController();
            $controller->home();
        } elseif ($_GET["page"] === "post.index") {
            $controller = new PostController();
            $controller->index();
        } elseif ($_GET["page"] === "post.show") {
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                $controller = new PostController();
                $controller->show($id);
            } else {
                $controller = new ErrorController();
                $controller->error404();
            }
        }

        // Administration
        elseif ($_GET["page"] === "post.administration") {
            $controller = new PostController();
            $controller->adminSpaceView();
        } elseif ($_GET["page"] === "comment.validate") {
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                $controller = new CommentController();
                $controller->commentValidate($id);
            } else {
                $controller = new ErrorController();
                $controller->error404();
            }
        }

        // Posts
        elseif ($_GET["page"] === "post.create") {
            $controller = new PostController();
            $controller->createPostView();
        } elseif ($_GET["page"] === "post.checkcreation") {
            $controller = new PostController();
            $controller->checkCreation();
        } elseif ($_GET["page"] === "post.edit") {
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                $controller = new PostController();
                $controller->editPostView();
            } else {
                $controller = new ErrorController();
                $controller->error404();
            }
        } elseif ($_GET["page"] === "post.checkedit") {
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                $controller = new PostController();
                $controller->checkEdit($id);
            } else {
                $controller = new ErrorController();
                $controller->error404();
            }
        } elseif ($_GET["page"] === "post.delete") {
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                $controller = new PostController();
                $controller->deletePostView();
            } else {
                $controller = new ErrorController();
                $controller->error404();
            }
        } elseif ($_GET["page"] === "post.deletion") {
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                $controller = new PostController();
                $controller->postDelete($id);
            } else {
                $controller = new ErrorController();
                $controller->error404();
            }
        }

        //Comments
        elseif ($_GET["page"] === "comment.add") {
            $controller = new CommentController();
            $controller->addCommentView();
        } elseif ($_GET["page"] === "comment.checkcreation") {
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                $controller = new CommentController();
                $controller->checkCommentCreation($id);
            }
        } elseif ($_GET["page"] === "comment.delete") {
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                $controller = new CommentController();
                $controller->deleteCommentView();
            } else {
                $controller = new ErrorController();
                $controller->error404();
            }
        } elseif ($_GET["page"] === "comment.deletion") {
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                $controller = new CommentController();
                $controller->commentDelete($id);
            } else {
                $controller = new ErrorController();
                $controller->error404();
            }
        }

        //Authentication
        elseif ($_GET["page"] === "authentication.register") {
            $controller = new AuthenticationController();
            $controller->getRegisterView();
        } elseif ($_GET["page"] === "authentication.checkregister") {
            $controller = new AuthenticationController();
            $controller->checkCredentials();
        } elseif ($_GET["page"] === "authentication.login") {
            $controller = new AuthenticationController();
            $controller->getLogInView();
        } elseif ($_GET["page"] === "authentication.checklogin") {
            $controller = new AuthenticationController();
            $controller->checkLogs();
        } elseif ($_GET["page"] === "authentication.logout") {
            $controller = new AuthenticationController();
            $controller->logOut();
        } else {
            $controller = new ErrorController();
            $controller->error404();
        }
    } else {
        $controller = new ErrorController();
        $controller->error404();
    }
} catch(\Exception $exception) {
    $controller = new ErrorController();
    $controller->error500($exception);
}