
CREATE DATABASE IF NOT EXISTS url_shortener
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE url_shortener;

CREATE TABLE IF NOT EXISTS urls (
    id           INT UNSIGNED    AUTO_INCREMENT PRIMARY KEY,
    original_url TEXT            NOT NULL,
    short_code   VARCHAR(10)     NOT NULL UNIQUE,
    clicks       INT UNSIGNED    NOT NULL DEFAULT 0,
    created_at   TIMESTAMP       NOT NULL DEFAULT CURRENT_TIMESTAMP
);

