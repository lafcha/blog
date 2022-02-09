DELETE FROM Articles_has_Categories
WHERE Articles_id = :id;
DELETE FROM Comments
WHERE Articles_id = :id;
DELETE FROM Articles
WHERE id = :id;