-- Obsolete Aesthetics — database schema
-- Reconstructed from the queries in dbh.inc.php, login.inc.php, signup.inc.php,
-- action.php, server.php and admin_users.php (no schema file shipped with the
-- original project). Create a database named `project`, then run this file
-- against it before starting the app.
--
--   mysql -u root -p project < schema.sql

CREATE DATABASE IF NOT EXISTS project;
USE project;

-- Registered users (used for login/signup and the admin "Users" panel)
CREATE TABLE IF NOT EXISTS users (
    idUsers    INT AUTO_INCREMENT PRIMARY KEY,
    uidUsers   VARCHAR(255) NOT NULL UNIQUE,      -- username
    pwdUsers   VARCHAR(255) NOT NULL,              -- password_hash() output
    emailUsers VARCHAR(255) NOT NULL
);

-- Music tracks (used by the main player and the admin "Music" panel)
CREATE TABLE IF NOT EXISTS music (
    mid        INT AUTO_INCREMENT PRIMARY KEY,
    music_name VARCHAR(255) NOT NULL,
    artist     VARCHAR(255) NOT NULL,
    photo      VARCHAR(255) NOT NULL,   -- path to cover image under uploads/images
    music      VARCHAR(255) NOT NULL    -- path to audio file under uploads/music
);

-- Like/dislike votes per user, per track
CREATE TABLE IF NOT EXISTS rating_info (
    id            INT AUTO_INCREMENT PRIMARY KEY,
    music_id      INT NOT NULL,
    user_id       INT NOT NULL,
    rating_action ENUM('like', 'dislike') NOT NULL,
    UNIQUE KEY unique_vote (music_id, user_id),
    FOREIGN KEY (music_id) REFERENCES music(mid) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(idUsers) ON DELETE CASCADE
);
