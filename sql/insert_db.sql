-- Insert some sample data into the categories table
INSERT INTO categories (category_name) VALUES
    ('General Discussion'),
    ('Programming Languages'),
    ('Development');

-- Insert sample data into the topics table with icons and descriptions for each category
INSERT INTO topics (topic_name, topic_icon, topic_description, category_id) VALUES
    ('Introductions', 'bi bi-person', 'Get to know other forum members', 1),
    ('Off-Topic', 'bi bi-chat', 'Discuss non-related topics here', 1),
    ('Site Feedback and Suggestions', 'bi bi-pencil', 'Share your feedback and ideas about the site', 1),
    ('PHP', 'devicon-php-plain', 'Discuss PHP programming language', 2),
    ('C, C# & C++', 'devicon-c-plain', 'Discuss C, C#, and C++ programming languages', 2),
    ('Python', 'devicon-python-plain', 'Discuss Python programming language', 2),
    ('Java', 'devicon-java-plain', 'Discuss Java programming language', 2),
    ('JavaScript', 'devicon-javascript-plain', 'Discuss JavaScript programming language', 2),
    ('Web Development', 'bi bi-globe', 'Discuss web development topics', 3),
    ('Mobile Development', 'bi bi-phone', 'Discuss mobile app development topics', 3),
    ('Database', 'bi bi-database', 'Discuss database-related topics', 3),
    ('UI & UX', 'bi bi-easel2', 'Discuss user interface and user experience design', 3);

-- Generate more sample data for users
INSERT INTO users (username, email, password)
SELECT
    CONCAT('user', u.n) AS username,
    CONCAT('user', u.n, '@example.com') AS email,
    'hashed_password' AS password
FROM
    (SELECT 1 AS n UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5
    UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9 UNION SELECT 10
    UNION SELECT 11 UNION SELECT 12 UNION SELECT 13 UNION SELECT 14 UNION SELECT 15
    UNION SELECT 16 UNION SELECT 17 UNION SELECT 18 UNION SELECT 19 UNION SELECT 20
    UNION SELECT 21 UNION SELECT 22 UNION SELECT 23 UNION SELECT 24 UNION SELECT 25
    UNION SELECT 26 UNION SELECT 27 UNION SELECT 28 UNION SELECT 29 UNION SELECT 30
    UNION SELECT 31 UNION SELECT 32 UNION SELECT 33 UNION SELECT 34 UNION SELECT 35
    UNION SELECT 36 UNION SELECT 37 UNION SELECT 38 UNION SELECT 39 UNION SELECT 40
    UNION SELECT 41 UNION SELECT 42 UNION SELECT 43 UNION SELECT 44 UNION SELECT 45
    UNION SELECT 46 UNION SELECT 47 UNION SELECT 48 UNION SELECT 49 UNION SELECT 50) u;

-- Insert more sample data into the threads table
INSERT INTO threads (thread_name, user_id, topic_id, creation_date)
SELECT
    CONCAT('Thread ', t.n, ' for Topic 2') AS thread_name,
    FLOOR(1 + RAND() * 50) AS user_id, -- Random user_id between 1 and 50
    2 AS topic_id,
    NOW() - INTERVAL FLOOR(1 + RAND() * 365) DAY AS creation_date -- Random creation_date within the last year
FROM
    (SELECT 1 AS n UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5
    UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9 UNION SELECT 10
    UNION SELECT 11 UNION SELECT 12 UNION SELECT 13 UNION SELECT 14 UNION SELECT 15
    UNION SELECT 16 UNION SELECT 17 UNION SELECT 18 UNION SELECT 19 UNION SELECT 20
    UNION SELECT 21 UNION SELECT 22 UNION SELECT 23 UNION SELECT 24 UNION SELECT 25
    UNION SELECT 26 UNION SELECT 27 UNION SELECT 28 UNION SELECT 29 UNION SELECT 30
    UNION SELECT 31 UNION SELECT 32 UNION SELECT 33 UNION SELECT 34 UNION SELECT 35
    UNION SELECT 36 UNION SELECT 37 UNION SELECT 38 UNION SELECT 39 UNION SELECT 40
    UNION SELECT 41 UNION SELECT 42 UNION SELECT 43 UNION SELECT 44 UNION SELECT 45
    UNION SELECT 46 UNION SELECT 47 UNION SELECT 48 UNION SELECT 49 UNION SELECT 50) t;

-- Insert more sample data into the posts table
INSERT INTO posts (post_content, user_id, thread_id, creation_date)
SELECT
    CONCAT('Post ', p.n, ' for Thread ', t.thread_id) AS post_content,
    FLOOR(1 + RAND() * 50) AS user_id, -- Random user_id between 1 and 50
    t.thread_id,
    NOW() - INTERVAL FLOOR(1 + RAND() * 365) DAY AS creation_date -- Random creation_date within the last year
FROM
    threads t
CROSS JOIN
    (SELECT 1 AS n UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5) p;

-- Generate random likes for posts
INSERT INTO post_likes (user_id, post_id)
SELECT
    FLOOR(1 + RAND() * 50) AS user_id, -- Random user_id between 1 and 50
    post_id -- Random post_id from the posts table
FROM
    posts
ORDER BY
    RAND() -- Randomize the order
LIMIT
    20; -- Number of likes to generate
