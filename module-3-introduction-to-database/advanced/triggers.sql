-- ============================================
-- Description: Trigger-based audit system
-- ============================================

-- ============================================
-- 1. INSERT TRIGGER (ORDER CREATED)
-- ============================================

CREATE OR REPLACE FUNCTION log_order_insert()
RETURNS TRIGGER AS $$
BEGIN
    INSERT INTO order_logs(order_id, action)
    VALUES (NEW.id, 'ORDER_CREATED');

    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER after_order_insert
AFTER INSERT ON orders
FOR EACH ROW
EXECUTE FUNCTION log_order_insert();

-- ============================================
-- 2. UPDATE TRIGGER (ORDER UPDATED)
-- ============================================

CREATE OR REPLACE FUNCTION log_order_update()
RETURNS TRIGGER AS $$
BEGIN
    INSERT INTO order_logs(order_id, action)
    VALUES (NEW.id, 'ORDER_UPDATED');

    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER after_order_update
AFTER UPDATE ON orders
FOR EACH ROW
EXECUTE FUNCTION log_order_update();

-- ============================================
-- 3. DELETE TRIGGER (ORDER DELETED)
-- ============================================

CREATE OR REPLACE FUNCTION log_order_delete()
RETURNS TRIGGER AS $$
BEGIN
    INSERT INTO order_logs(order_id, action)
    VALUES (OLD.id, 'ORDER_DELETED');

    RETURN OLD;
END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER after_order_delete
AFTER DELETE ON orders
FOR EACH ROW
EXECUTE FUNCTION log_order_delete();
