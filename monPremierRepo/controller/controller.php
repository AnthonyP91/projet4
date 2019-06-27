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

    require('/view/adminCreatePostView.php');
}

function post($postManager, $commentManager)
{
    $post = $postManager->getPost($_GET['postId']);

    $listComments = $commentManager->getComments($_GET['postId']);

    require('/view/adminOptionView.php');
}
