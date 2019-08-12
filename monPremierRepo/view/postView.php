<?php 
session_start();

if(!isset($_SESSION['admin']))
{
    $_SESSION['admin'] = false;
}

$tag = $post->tag(); 
?>

<?php ob_start(); ?>

<div class="container">
    <?php if($_SESSION['admin'] == true){ ?>
        <div id="encartOption">
            <div>
                <i class="fas fa-edit"></i><a href="/index.php?action=editPost&postId=<?= $post->id() ?>">Modifier</a>
            </div>
            <div>
                <i class="far fa-trash-alt"></i><a href="/index.php?action=deletePost&postId=<?= $post->id() ?>">Supprimer</a>
            </div>
        </div>
    <?php } ?>
    <section id="post" class="row" style="width:100%;margin:0%;">
        <div class="col-sm-12 sectionPost">
            <h2><?= $post->title() ?></h2>
            <div class="text">
                <p>
                    <?= $post->text() ?>
                </p>
            </div>
            <p class="datePost">Posté le <?= $post->date() ?>.</p>
        </div>
        <div class="row switchPost">
            <div class="col-sm-6 previousPost">
                <?php foreach($listTags as $value)
                {   
                    if($value[0] == $post->tag() - 1)
                    {
                    ?>
                        <a href="/index.php?action=previousPost&postTag=<?= $post->tag() - 1 ?>">Chapitre précédent</a>
                    <?php
                    }
                }
                ?>
            </div>
            <div class="col-sm-6 nextPost">
                <?php foreach($listTags as $value)
                {   
                    if($value[0] == $post->tag() + 1)
                    {
                    ?>
                        <a href="/index.php?action=nextPost&postTag=<?= $post->tag() + 1 ?>">Chapitre suivant</a>
                    <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <section id="comments" class="row" style="width:100%;margin:0%;">
        <div class="col-sm-12 sectionComments">
            <div class="row commentsOption">
                <div class="col-md-4">
                    <h4>Les commentaires</h4>
                </div>
                <div class="col-md-8 display">
                    <h4 class=" writeCommentJs">Laissez votre commentaire</h4>
                    <i class="far fa-comment"></i>
                </div>
            </div>
            <div id="commentForm" class="row">
                <form method="post" action="/index.php?action=addComment&postId=<?= $post->id() ?>">
                    <p>
                        <label for="pseudo">Votre pseudo : </label></br>
                        <input type="text" name="pseudo" id="pseudoUser" class="inputStyle">
                    </p>
                    <p>
                        <label for="commentUser">Votre commentaire :</label></br>
                        <textarea name="commentUser" id="commentUser" class="inputStyle" rows="4"></textarea>
                    </p>
                    <p>
                        <input type="submit" value="Envoyer" class="submitForm">
                    </p>
                </form>
            </div>
            <?php 
            if(empty($listComments))
            {
            ?>
                <div style="text-align:center;margin-top:40px;font-size:1.2em">
                    <p>Aucun commentaire</p>
                </div>
            <?php
            }else{
                foreach($listComments as $value)
                {
                ?>
                    <div class="comment <?php $status = $value->status(); $status = (int) $status; if($status == 0){ ?>reported<?php } ?>">
                        <div class="commentContent" style="padding: 10px 20px;">
                            <h5><?= htmlspecialchars($value->author()) ?></h5>
                            <p><?= htmlspecialchars($value->text()) ?></p>
                        </div>
                        <div class="row commentFooter">
                            <div class="col-md-6">
                                <p>Ecrit le <?= $value->date() ?>.</p>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-sm-6" style="text-align:center">
                                        <a href="/index.php?action=reportingComment&id=<?= $value->id() ?>&postId=<?= $value->postId() ?>"><h6>Signaler</h6></a>
                                    </div>
                                    <div class="col-sm-6 display" style="justify-content:center">
                                        <?php if($_SESSION['admin'] == true){ ?>
                                            <i class="far fa-trash-alt"></i><a href="/index.php?action=deleteComment&commentId=<?= $value->id() ?>&postId=<?= $value->postId() ?>"><h6>Supprimer</h6></a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
            }
            ?>
        </div>
    </section>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('partials/template.php'); ?>