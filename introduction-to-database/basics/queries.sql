-- ============================================
-- Description: Basic and Join Queries
-- ============================================

-- ============================================
-- 1. BASIC CRUD OPERATIONS
-- ============================================

-- INSERT: Add a new user
INSERT INTO users (name, email)
VALUES ('Aniket', 'aniket@mail.com');

-- SELECT: Fetch all users
SELECT * FROM users;

-- UPDATE: Modify user name
UPDATE users
SET name = 'Aniket K'
WHERE id = 1;

-- DELETE: Remove a user
DELETE FROM users
WHERE id = 1;

-- ============================================
-- 2. FILTERING & CONDITIONS
-- ============================================

-- Get users with specific email
SELECT * FROM users
WHERE email = 'aniket@mail.com';

-- Get users created recently
SELECT * FROM users
ORDER BY created_at DESC
LIMIT 5;

-- ============================================
-- 3. SQL JOIN QUERIES (RELATIONSHIP HANDLING)
-- ============================================

-- INNER JOIN
-- Only users who have orders
SELECT u.name, o.amount
FROM users u
INNER JOIN orders o
ON u.id = o.user_id;

-- LEFT JOIN
-- All users, including those without orders
SELECT u.name, o.amount
FROM users u
LEFT JOIN orders o
ON u.id = o.user_id;

-- RIGHT JOIN
-- All orders, even if user is missing (rare case)
SELECT u.name, o.amount
FROM users u
RIGHT JOIN orders o
ON u.id = o.user_id;

-- ============================================
-- 4. AGGREGATIONS (REAL-WORLD USE)
-- ============================================

-- Total orders per user
SELECT u.name, COUNT(o.id) AS total_orders
FROM users u
LEFT JOIN orders o ON u.id = o.user_id
GROUP BY u.name;

-- Total spending per user
SELECT u.name, SUM(o.amount) AS total_spent
FROM users u
JOIN orders o ON u.id = o.user_id
GROUP BY u.name;
