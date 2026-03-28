-- ============================================
-- Description: Schema for user-order system
-- ============================================

-- Create Database
CREATE DATABASE entrata_db;

-- Connect to database (PostgreSQL CLI)
\c entrata_db;

-- ============================================
-- USERS TABLE
-- Stores application users
-- ============================================
CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- ============================================
-- ORDERS TABLE
-- Stores user orders
-- ============================================
CREATE TABLE orders (
    id SERIAL PRIMARY KEY,
    user_id INT NOT NULL,
    amount DECIMAL(10,2) CHECK (amount >= 0),
    status VARCHAR(20) DEFAULT 'PENDING',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    -- Foreign Key Constraint
    CONSTRAINT fk_user
        FOREIGN KEY(user_id)
        REFERENCES users(id)
        ON DELETE CASCADE
);


-- ============================================
-- ORDER LOGS TABLE (AUDIT TABLE)
-- Stores trigger-based logs
-- ============================================
CREATE TABLE order_logs (
    log_id SERIAL PRIMARY KEY,
    order_id INT,
    action TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ============================================
-- SAMPLE DATA (FOR TESTING)
-- ============================================

-- Insert Users
INSERT INTO users (name, email) VALUES
('Aniket', 'aniket@mail.com'),
('Rahul', 'rahul@mail.com'),
('Priya', 'priya@mail.com');

-- Insert Orders
INSERT INTO orders (user_id, amount, status) VALUES
(1, 500.00, 'COMPLETED'),
(1, 200.00, 'PENDING'),
(2, 1000.00, 'COMPLETED');
