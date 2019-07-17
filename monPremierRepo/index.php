<?php

// chargement automatique de ma fonction 'loadClass' lors d'une instanciation d'un objet
function loadClass($class)
{
    require '/model/' . $class . '.class.php';
}

spl_autoload_register('loadClass');

// instanciation d'un objet de connexion à la base de donnée
$db = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué.

// instanciation des managers
$postManager = new PostManager($db);
$commentManager = new CommentManager($db);

require('/controller/controller.php');

if(isset($_GET['action']))
{

    if($_GET['action'] == 'post')
    {
        if(isset($_GET['postId']) && $_GET['postId'] > 0)
        {
            post($postManager, $commentManager);
        }
        else
        {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
    else if($_GET['action'] == 'previousPost' || $_GET['action'] == 'nextPost')
    {
        if(isset($_GET['postTag']) && $_GET['postTag'] > 0)
        {
            postByTag($postManager, $commentManager);
        }
        else
        {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
    else if($_GET['action'] == 'listPosts')
    {
        listPosts($postManager);
    }
    else if($_GET['action'] == 'biographie')
    {
        require('/view/biographieView.php');
    }
    else if($_GET['action'] == 'listBooks')
    {
        require('/view/listBooksView.php');
    }
    else if($_GET['action'] == 'addPost')
    {
        require('/view/editorView.php');
    }
    else if($_GET['action'] == 'editPost')
    {
        if(isset($_GET['postId']) && $_GET['postId'] > 0)
        {
            editPost($postManager);
        }
        else
        {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
    else if($_GET['action'] == 'deletePost')
    {
        if(isset($_GET['postId']) && $_GET['postId'] > 0)
        {
            deletePost($postManager);
            listPosts($postManager);
        }
        else
        {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
    else if($_GET['action'] == 'listCommentsReported')
    {
        getCommentsReported($commentManager);
    }
    else if($_GET['action'] == 'connexionAdmin')
    {
        require('/view/adminFormView.php');
    }
    else if($_GET['action'] == 'reportingComment')
    {
        if(isset($_GET['id']) && $_GET['id'] > 0)
        {
            reportingComment($commentManager);
        }
        else
        {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }

        if(isset($_GET['postId']) && $_GET['postId'] > 0)
        {
            post($postManager, $commentManager);
        }
        else
        {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
    else
    {
        echo 'Erreur : aucune action identifiée';
    }
}
else
{
    lastPosts($postManager);
}