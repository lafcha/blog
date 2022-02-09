<?php

/**
 * @param object $pdo connection to database
 * @returns array table with the last 10 articles
 */
function lastBlogPosts($pdo)
{

    return $pdo->query(
        file_get_contents('database/lastBlogPosts.sql')
    );
}

/**
 * @param object $pdo connection to database
 * @param int $id id of the article do be displayed
 * @returns array with title, content, dates, and author name of the article
 */

function blogPostById($pdo, $id)
{

    $statement = $pdo->query(
        file_get_contents('database/blogPostById.sql') . $id
    );

    return $statement->fetch();
}

/**
 * @param object $pdo connection to database
 * @param int $postId id of the article of which we want the comments
 * @returns array with comment content, date, author
 */

function commentsByBlogPost($pdo, $postId)
{
    $statement = $pdo->prepare(file_get_contents('database/commentsByBlogPost.sql'));
    $statement->bindValue(':id', $postId);
    $statement->execute();

    return $statement->fetchAll();
}

/**
 * @param $pdo object connection to db
 * @param $filteredAllInputs array containing all the filtered inputs to insert in db
 * @return bool true if post was created in db
 */

function blogPostCreate($pdo, $filteredAllInputs)
{
    $values = [
        ":title" =>$filteredAllInputs['title'],
        ":content" =>$filteredAllInputs['content'],
        ":date_start" => $filteredAllInputs['start date'],
        ":date_end" => $filteredAllInputs['end date'],
        ":importance" => $filteredAllInputs['importance'],
        ":Authors_id" =>  $filteredAllInputs['author'],

    ];

    $statement = $pdo->prepare(file_get_contents('database/blogPostCreate.sql'));
    $execute = $statement->execute($values);

    if ($execute) {
        return true;
    } else {
        return false;
    }

}

/**
 * @param $pdo object connection to db
 * @return array all authors' pseudo & id ordered by pseudo asc
 */

function getAuthorsByPseudo($pdo)
{
    $statement = $pdo->prepare(file_get_contents('database/getAuthors.sql'));
    $statement->execute();
    return $statement->fetchAll();
}