-- Drop the database if it exists
DROP DATABASE IF EXISTS discussion_forum;
-- Create the database
CREATE DATABASE discussion_forum;

-- Use the database
USE discussion_forum;

-- Create the table for users
CREATE TABLE IF NOT EXISTS users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    avatar VARCHAR(255),
    privilege ENUM('user', 'admin', 'moderator') DEFAULT 'user',
    reset_token VARCHAR(255),
    reset_token_expiry DATETIME
);

-- Create the table for categories
CREATE TABLE IF NOT EXISTS categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(100) NOT NULL
);

-- Create the table for topics
CREATE TABLE IF NOT EXISTS topics (
    topic_id INT AUTO_INCREMENT PRIMARY KEY,
    topic_subject VARCHAR(255) NOT NULL,
    topic_icon VARCHAR(100) NOT NULL,
    topic_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    user_id INT NOT NULL,
    category_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (category_id) REFERENCES categories(category_id)
);

-- Create the table for threads
CREATE TABLE IF NOT EXISTS threads (
    thread_id INT AUTO_INCREMENT PRIMARY KEY,
    thread_subject VARCHAR(255) NOT NULL,
    thread_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    user_id INT NOT NULL,
    topic_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (topic_id) REFERENCES topics(topic_id)
);

-- Create the table for posts
CREATE TABLE IF NOT EXISTS posts (
    post_id INT AUTO_INCREMENT PRIMARY KEY,
    post_content TEXT NOT NULL,
    post_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    user_id INT NOT NULL,
    thread_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (thread_id) REFERENCES threads(thread_id)
);