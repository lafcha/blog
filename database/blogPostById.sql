SELECT Articles.id, Articles.title, Articles.content, Articles.date_start, Articles.date_end, Articles.importance, Authors.name, Authors.pseudo, Authors.firstName
FROM Articles
INNER JOIN Authors ON Articles.Authors_id = Authors.id
WHERE Articles.id =