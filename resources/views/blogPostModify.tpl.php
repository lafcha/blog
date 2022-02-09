<h1>Modifier un article</h1>
<a href="/">Retourner à la page d'accueil</a>

<?php xdebug_var_dump($dataToDisplay)?>
<form action="http://blog.local/?action=blogPostCreate" method="post">
    <div>
        <label for="title">Titre de l'article</label>
        <input type="text" name="title" id="title"
               value ="<?= $dataToDisplay['title'];?>"
        >
    </div>

    <div>
        <label for="content">Contenu de l'article</label>
        <textarea name="content" id="content" cols="30" rows="10"
                  placeholder="<?= $dataToDisplay['content'];?>"
        ></textarea>
    </div>
    <div>
        <label for="date_start">Date de publication</label>
        <input type="date" name="date_start" id="date_start"
               value="<?= $dataToDisplay['date_start'];?>">

    </div>

    <div>
        <label for="date_end">Date de dépublication</label>
        <input type="date" name="date_end" id="date_end"
               value="<?= $dataToDisplay['date end'];?>"
        >
    </div>

    <div>
        <label for="importance-select">Importance de l'article</label>
        <select name="importance" id="importance-select">
            <option value="">--Choisissez une importance--</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>

    </div>

    <div>
        <label for="author-select">Auteur</label>
        <select name="author" id="author-select">
            <?php foreach($authors as $index => $author):?>
                < <option value="<?php echo $author['id'] ?>"><?php echo $author['pseudo'] ?></option>
            <?php endforeach;?>
        </select>
    </div>

    <div>
        <label for="cat1-select">Catégorie</label>
        <select name="cat1" id="cat1-select">
            <option value="">--Choisissez une catégorie--</option>
            <?php foreach($categories as $index => $category):?>
                < <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
            <?php endforeach;?>
        </select>
        <label for="cat2-select">Catégorie</label>
        <select name="cat2" id="cat3-select">
            <option value="">--Choisissez une catégorie--</option>
            <?php foreach($categories as $index => $category):?>
                <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
            <?php endforeach;?>
        </select>
        <label for="cat3-select">Catégorie</label>
        <select name="cat3" id="cat3-select">
            <option value="">--Choisissez une catégorie--</option>
            <
            <?php foreach($categories as $index => $category):?>
                < <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
            <?php endforeach;?>
        </select>
    </div>
    <input type="submit" name="submit" value="Envoyer">

</form>