<?php
require_once('/model/PostManager.class.php');
require_once('/model/Post.class.php');
require_once('/model/CommentManager.class.php');
require_once('/model/Comment.class.php');

function lastPosts($postManager)
{
    $nbPosts = $postManager->countPosts();
    $lastPosts = $postManager->getLastPosts($nbPosts);

    require('/view/homeView.php');
}

function listPosts($postManager)
{
    $listPosts = $postManager->getPosts();

    $nbPosts = $postManager->countPosts();
    $nbPosts = $nbPosts / 6; // for the pagination

    require('/view/listPostsView.php');
}

function post($postManager, $commentManager)
{
    $post = $postManager->getPost($_GET['postId']);

    $listTags = $postManager->listTags();

    $listComments = $commentManager->getComments($_GET['postId']);

    require('/view/postView.php');
}

function postByTag($postManager, $commentManager)
{
    $post = $postManager->getPostByTag($_GET['postTag']);

    $listTags = $postManager->listTags();

    $listComments = $commentManager->getComments($post->id());

    require('/view/postView.php');
}

function editPost($postManager)
{
    $post = $postManager->getPost($_GET['postId']);

    require('/view/editorView.php');
}

function deletePost($postManager)
{
    $post = $postManager->deletePost($_GET['postId']);
}

function getCommentsreported($commentManager)
{
    $listComments = $commentManager->getCommentsReported();

    require('/view/listCommentsView.php');
}

function reportingComment($commentManager)
{
    $commentManager->reportingComment($_GET['id']);
}

function addComment($commentManager)
{
    $commentManager->addComment($_POST['pseudo'], $_POST['commentUser'], $_GET['postId']);
}

function deleteComment($commentManager)
{
    $commentManager->deleteComment($_GET['commentId']);
}