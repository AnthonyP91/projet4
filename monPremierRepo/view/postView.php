<?php $tag = utf8_encode($post->tag()); ?>

<?php ob_start(); ?>

<div class="container">
    <?php
    if(isset($contentOptionAdmin))
    {
    ?>
        <?= $contentOptionAdmin ?>
    <?php
    }
    ?>
    <section id="post" class="row" style="width:100%;margin:0%;">
        <div class="col-sm-12 sectionPost">
            <h2><?= utf8_encode($post->title()) ?></h2>
            <div class="text">
                <p>
                    <?= utf8_encode($post->text()) ?>
                </p>
            </div>
            <p class="datePost">Posté le <?= $post->date() ?>.</p>
        </div>
    </section>
    <section id="comments" class="row" style="width:100%;margin:0%;">
        <div class="col-sm-12 sectionComments">
            
        </div>
    </section>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('partials/template.php'); ?>