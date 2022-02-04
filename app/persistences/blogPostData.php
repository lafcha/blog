<?php

/**
 * @param object $pdo connection to database
 *
 * @returns array table with the last 10 articles
 */
function lastBlogPosts($pdo)
{

    return $pdo->query(
        'SELECT Articles.id, Articles.title, Articles.content, Articles.date_start, Articles.date_end, Articles.importance, Authors.name, Authors.pseudo, Authors.firstName
        FROM Articles
        INNER JOIN Authors ON Articles.Authors_id = Authors.id
        ORDER BY Articles.id DESC
        LIMIT 10'
    );
}

/**
 * @param object $pdo
 * @param int $id id of the article do be displayed
 *
 * @returns table with title, content, dates, and author name of the article
 *
 */

function blogPostById($pdo, $id)
{
    $statement = $pdo->query(
        'SELECT Articles.id, Articles.title, Articles.content, Articles.date_start, Articles.date_end, Articles.importance, Authors.name, Authors.pseudo, Authors.firstName
        FROM Articles
        INNER JOIN Authors ON Articles.Authors_id = Authors.id
         WHERE Articles.id =' . $id

    );
    return $statement->fetch();
}

/**
 * @param object $pdo
 * @param int $id id of the article of which we want the comments
 *
 * @returns table with comment content, date, author
 *
 */



