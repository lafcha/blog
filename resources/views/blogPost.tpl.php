<h1><?= $post['title'] ?></h1>
<p>Un article écrit par : <?= $post['pseudo'] ?></p>
<p><?= $post['content'] ?></p>
<h2>Commentaires</h2>


<?php

if (empty($comments)) {
    foreach ($comments as $comment) {
        foreach ($comment as $input) ?>
            <h4><?= $comment['Content'] ?></h4>
        <p> Ecrit par : <?= $comment['name'] ?></li></p>

        <?php
    }
} else {
    echo "Il n'y a pas de commentaires";
}; ?>
<a href="/">Retourner à la page d'accueil</a>
