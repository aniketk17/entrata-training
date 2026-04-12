<?php
$pageTitle = 'Dashboard';
require __DIR__ . '/layout_top.php';
?>

<div class="card card-wide">
    <h1>Hello, <?= htmlspecialchars($username) ?></h1>
    <p class="subtitle">You are successfully logged in. Here's your live session &amp; cookie state.</p>

    <?php if ($flash): ?>
        <div class="alert alert-success"><?= htmlspecialchars($flash) ?></div>
    <?php endif; ?>

    <div class="alert alert-info" style="margin-top:1rem">
        <strong>SESSION</strong> — stored on the <em>server</em>, identified by a cookie named
        <code style="background:rgba(0,0,0,.3);padding:.1rem .35rem;border-radius:4px">PHPSESSID</code>
        that PHP sets automatically.
    </div>

    <div class="info-grid">
        <div class="info-box">
            <div class="label">Session ID</div>
            <div class="value" style="font-size:.75rem"><?= htmlspecialchars($session_id) ?></div>
        </div>
        <div class="info-box">
            <div class="label">$_SESSION['user']</div>
            <div class="value"><?= htmlspecialchars($username) ?></div>
        </div>
        <div class="info-box">
            <div class="label">$_SESSION['email']</div>
            <div class="value"><?= htmlspecialchars($email) ?></div>
        </div>
        <div class="info-box">
            <div class="label">$_SESSION['login_time']</div>
            <div class="value" style="font-size:.85rem"><?= htmlspecialchars($login_time) ?></div>
        </div>
    </div>

    <div class="alert alert-info">
        <strong>COOKIE</strong> — stored in the <em>browser</em>. Survives across browser restarts.
        Set via <code style="background:rgba(0,0,0,.3);padding:.1rem .35rem;border-radius:4px">setcookie()</code>
        with httpOnly flag so JS can't steal it.
    </div>

    <div class="info-grid">
        <div class="info-box">
            <div class="label">$_COOKIE['remember_me']</div>
            <div class="value">
                <?php if ($remember_cookie): ?>
                    <span style="color:#86efac">✅ <?= htmlspecialchars($remember_cookie) ?></span>
                <?php else: ?>
                    <span style="color:#94a3b8">Not set (you didn't check "remember me")</span>
                <?php endif; ?>
            </div>
        </div>
        <div class="info-box">
            <div class="label">$_COOKIE['PHPSESSID']</div>
            <div class="value" style="font-size:.75rem"><?= htmlspecialchars($_COOKIE['PHPSESSID'] ?? '—') ?></div>
        </div>
    </div>

    <div style="margin-top:1.8rem;text-align:right">
        <a href="logout.php"
           style="display:inline-block;padding:.6rem 1.4rem;background:#ef4444;color:#fff;border-radius:9px;text-decoration:none;font-weight:600;font-size:.9rem">
            Logout &rarr;
        </a>
    </div>
</div>

<?php require __DIR__ . '/layout_bottom.php'; ?>
