<?php
$pageTitle = 'Register';
require __DIR__ . '/layout_top.php';
?>

<div class="card">
    <h1>Create an account</h1>
    <p class="subtitle">Join us — it only takes a moment.</p>

    <?php if ($error): ?>
        <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" action="register.php">

        <div class="form-group">
            <label for="reg_username">Username</label>
            <input type="text" id="reg_username" name="username" placeholder="choose_a_username" required>
        </div>

        <div class="form-group">
            <label for="reg_email">Email</label>
            <input type="email" id="reg_email" name="email" placeholder="you@example.com" required>
        </div>

        <div class="form-group">
            <label for="reg_password">Password <small style="color:#64748b">(min 6 chars)</small></label>
            <input type="password" id="reg_password" name="password" placeholder="••••••••" required>
        </div>

        <div class="form-group">
            <label for="reg_confirm">Confirm Password</label>
            <input type="password" id="reg_confirm" name="confirm_password" placeholder="••••••••" required>
        </div>

        <button type="submit" class="btn">Create Account</button>
    </form>

    <div class="card-footer">
        Already have an account? <a href="login.php">Sign in</a>
    </div>
</div>

<?php require __DIR__ . '/layout_bottom.php'; ?>
