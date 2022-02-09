SELECT *
FROM Comments
         INNER JOIN Authors ON Authors_id = Authors.id
WHERE Articles_id = :id;