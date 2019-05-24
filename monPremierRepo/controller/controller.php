<?php
require_once('/model/PostManager.class.php');
require_once('/model/Post.class.php');
require_once('/model/CommentManager.class.php');
require_once('/model/Comment.class.php');

function listPosts($postManager)
{
    $listPosts = $postManager->getPosts();

    require('/view/indexView.php');
}

function postWithComments($postManager, $commentManager)
{
    $post = $postManager->getPost($_GET['postId']);

    $listComments = $commentManager->getComments($_GET['postId']);

    require('/view/postView.php');
}
