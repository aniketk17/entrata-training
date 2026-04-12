<?php
$pageTitle = 'Login';
require __DIR__ . '/layout_top.php';
?>

<div class="card">
    <h1>Welcome back</h1>
    <p class="subtitle">Sign in to your account to continue.</p>

    <?php if (!empty($flash)): ?>
        <div class="alert alert-success"><?= htmlspecialchars($flash) ?></div>
    <?php endif; ?>

    <?php if ($error): ?>
        <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" action="login.php">

        <div class="form-group">
            <label for="username">Username</label>
            <input
                type="text"
                id="username"
                name="username"
                placeholder="your_username"
                value="<?= htmlspecialchars($remembered_username) ?>"
                required
            >
            <?php if ($remembered_username): ?>
                <small style="color:#94a3b8;font-size:.78rem;margin-top:.3rem;display:block">
                    ✅ Auto-filled from <code style="color:#818cf8">remember_me</code> cookie
                </small>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="••••••••" required>
        </div>

        <div class="checkbox-row">
            <input
                type="checkbox"
                id="remember_me"
                name="remember_me"
                <?= $remembered_username ? 'checked' : '' ?>
            >
            <label for="remember_me" style="margin:0">Remember me for 30 days</label>
        </div>

        <button type="submit" class="btn">Sign In</button>
    </form>

    <div class="card-footer">
        Don't have an account? <a href="register.php">Create one</a>
    </div>
</div>

<?php require __DIR__ . '/layout_bottom.php'; ?>
