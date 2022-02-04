<h1>Bienvenue sur mon blog !</h1>
<?php

if (isset($lastPosts)) {
foreach ($lastPosts as $article){ ?>


<div class="container col-12">


    <div class="card col-12 py-2 my-4">
        <div class="card-body">
            <h5 class="card-title"><?= $article['title'] ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?= $article['name'] ?></h6>
            <p class="card-text"><?= $article['content'] ?></p>
        </div>
    </div>
</div>
<?php
}
} else {
echo "Il n'y a pas d'articles";
}; ?>