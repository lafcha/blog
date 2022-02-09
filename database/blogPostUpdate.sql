UPDATE Articles
SET title = :title, content = :content, date_start =:date_start,
    date_end = :date_end, importance = :importance, Authors_id = :Authors_id
WHERE id = :articleId