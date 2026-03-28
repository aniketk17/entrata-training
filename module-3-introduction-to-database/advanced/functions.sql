-- ============================================
-- Description: Aggregate + Custom Functions
-- ============================================

-- ============================================
-- 1. AGGREGATE FUNCTIONS
-- ============================================

-- Total number of users
SELECT COUNT(*) AS total_users FROM users;

-- Total revenue
SELECT SUM(amount) AS total_revenue FROM orders;

-- Average order value
SELECT AVG(amount) AS avg_order_value FROM orders;

-- Maximum & Minimum order
SELECT MAX(amount) AS max_order,
       MIN(amount) AS min_order
FROM orders;

-- ============================================
-- 2. CUSTOM FUNCTION: TOTAL ORDERS PER USER
-- ============================================

CREATE OR REPLACE FUNCTION get_total_orders(userId INT)
RETURNS INT AS $$
DECLARE total INT;
BEGIN
    SELECT COUNT(*) INTO total
    FROM orders
    WHERE user_id = userId;

    RETURN total;
END;
$$ LANGUAGE plpgsql;

-- Usage
SELECT get_total_orders(1);

-- ============================================
-- 3. CUSTOM FUNCTION: TOTAL SPENDING PER USER
-- ============================================

CREATE OR REPLACE FUNCTION get_total_spent(userId INT)
RETURNS DECIMAL AS $$
DECLARE total_spent DECIMAL;
BEGIN
    SELECT COALESCE(SUM(amount), 0) INTO total_spent
    FROM orders
    WHERE user_id = userId;

    RETURN total_spent;
END;
$$ LANGUAGE plpgsql;

-- Usage
SELECT get_total_spent(1);


-- ============================================
-- 4. BOOLEAN FUNCTION (VALIDATION)
-- ============================================

-- Check if user has any orders
CREATE OR REPLACE FUNCTION has_orders(userId INT)
RETURNS BOOLEAN AS $$
DECLARE exists_flag BOOLEAN;
BEGIN
    SELECT EXISTS (
        SELECT 1 FROM orders WHERE user_id = userId
    ) INTO exists_flag;

    RETURN exists_flag;
END;
$$ LANGUAGE plpgsql;

-- Usage
SELECT has_orders(1);



-- ============================================
-- 5. FUNCTION WITH EXCEPTION HANDLING
-- ============================================

CREATE OR REPLACE FUNCTION safe_get_user(userId INT)
RETURNS TEXT AS $$
DECLARE username TEXT;
BEGIN
    SELECT name INTO username FROM users WHERE id = userId;

    IF username IS NULL THEN
        RETURN 'User not found';
    END IF;

    RETURN username;

EXCEPTION
    WHEN OTHERS THEN
        RETURN 'Error occurred';
END;
$$ LANGUAGE plpgsql;

-- Usage
SELECT safe_get_user(1);