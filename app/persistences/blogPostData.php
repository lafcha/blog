<?php

/**
 * @param object $pdo connection to database
 *
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
 *
 * @returns table with title, content, dates, and author name of the article
 *
 */

function blogPostById($pdo, $id)
{

    $statement = $pdo->query(
        file_get_contents('database/blogPostById.sql') .$id
    );
    return $statement->fetch();
}

/**
 * @param object $pdo connection to database
 * @param int $id id of the article of which we want the comments
 *
 * @returns table with comment content, date, author
 *
 */

function commentsByBlogPost ($pdo, $id){

    $statement = $pdo->prepare ( file_get_contents('database/commentsByBlogPost.sql') .$id);
    $statement->execute();

    return $statement->fetchAll();
}

