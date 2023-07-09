-- Insert some sample data into the categories table
INSERT INTO categories (category_name) VALUES
    ('General Discussion'),
    ('Technology'),
    ('Science'),
    ('Sports');

-- Insert some sample data into the users table
INSERT INTO users (username, email, password) VALUES
    ('john_doe', 'john@example.com', 'hashed_password'),
    ('jane_smith', 'jane@example.com', 'hashed_password'),
    ('user3', 'user3@example.com', 'hashed_password');

-- Insert sample data into the topics table with icons for each category
INSERT INTO topics (topic_subject, topic_icon, user_id, category_id) VALUES
    ('Forum Rules and Guidelines', 'bi bi-shield', 1, 1),
    ('General Chat and Discussions', 'bi bi-chat', 2, 1),
    ('Site Feedback and Suggestions', 'bi bi-pencil', 3, 1),
    ('Getting Started with Web Development', 'bi bi-globe', 1, 2),
    ('Database Design and Management', 'bi bi-database', 2, 2),
    ('Front-end Frameworks Comparison', 'bi bi-palette', 3, 2),
    ('Physics and Astrophysics', 'bi bi-geo-alt', 1, 3),
    ('Biology and Genetics', 'bi bi-dna', 2, 3),
    ('Space Exploration', 'bi bi-space-bar', 3, 3);

-- Insert some sample data into the threads table
INSERT INTO threads (thread_subject, user_id, topic_id) VALUES
    ('Thread 1 for Topic 1', 1, 1),
    ('Thread 2 for Topic 1', 2, 1),
    ('Thread 1 for Topic 2', 1, 2),
    ('Thread 1 for Topic 3', 3, 3);

-- Insert some sample data into the posts table
INSERT INTO posts (post_content, user_id, thread_id) VALUES
    ('Post 1 for Thread 1', 1, 1),
    ('Post 2 for Thread 1', 2, 1),
    ('Post 1 for Thread 2', 2, 2),
    ('Post 1 for Thread 3', 3, 3),
    ('Post 2 for Thread 3', 1, 3),
    ('Post 3 for Thread 3', 2, 3);

-- You can add more sample data as needed for testing purposes.
-- Insert more sample data into the threads table
INSERT INTO threads (thread_subject, user_id, topic_id)
SELECT CONCAT('Thread ', t.n, ' for Topic 2'), 1, 2
FROM (SELECT 1 AS n UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5
      UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9 UNION SELECT 10
      UNION SELECT 11 UNION SELECT 12 UNION SELECT 13 UNION SELECT 14 UNION SELECT 15
      UNION SELECT 16 UNION SELECT 17 UNION SELECT 18 UNION SELECT 19 UNION SELECT 20
      UNION SELECT 21 UNION SELECT 22 UNION SELECT 23 UNION SELECT 24 UNION SELECT 25
      UNION SELECT 26 UNION SELECT 27 UNION SELECT 28 UNION SELECT 29 UNION SELECT 30) t;

-- Insert more sample data into the posts table
INSERT INTO posts (post_content, user_id, thread_id)
SELECT CONCAT('Post ', p.n, ' for Thread ', t.thread_id), 2, t.thread_id
FROM (SELECT thread_id FROM threads WHERE topic_id = 2) t
CROSS JOIN (SELECT 1 AS n UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5) p;