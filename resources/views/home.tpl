
<h1>Voici les 10 derniers articles :</h1>
<?php
if (isset($lastPosts)) {
foreach ($lastPosts as $article){ ?>
<li><?= $article['title'] ?> - <?= $article['name'] ?></li>
<?php
}
} else {
echo "Il n'y a pas d'articles";
}; ?>