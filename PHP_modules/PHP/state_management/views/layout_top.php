<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'Auth Demo') ?> | PHP Auth</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { margin:0; padding:0; box-sizing:border-box; }

        :root {
            --bg:        #0f172a;
            --surface:   #1e293b;
            --border:    #334155;
            --primary:   #6366f1;
            --primary-h: #818cf8;
            --danger:    #ef4444;
            --success:   #22c55e;
            --text:      #f1f5f9;
            --muted:     #94a3b8;
            --radius:    14px;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        nav {
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            padding: .85rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .nav-logo { font-weight: 700; font-size: 1.1rem; color: var(--primary); }
        .nav-links a {
            color: var(--muted);
            text-decoration: none;
            margin-left: 1.5rem;
            font-size: .88rem;
            transition: color .2s;
        }
        .nav-links a:hover { color: var(--text); }
        .nav-links a.btn-nav {
            background: var(--primary);
            color: #fff;
            padding: .4rem .9rem;
            border-radius: 8px;
        }
        .nav-links a.btn-nav:hover { background: var(--primary-h); }

        main { flex: 1; display: flex; justify-content: center; align-items: center; padding: 2rem; }

        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 2.5rem 2.8rem;
            width: 100%;
            max-width: 440px;
            box-shadow: 0 20px 50px rgba(0,0,0,.4);
        }
        .card-wide { max-width: 780px; }

        .card h1 { font-size: 1.5rem; margin-bottom: .3rem; }
        .card .subtitle { color: var(--muted); font-size: .88rem; margin-bottom: 1.8rem; }

        label { display: block; font-size: .83rem; font-weight: 500; color: var(--muted); margin-bottom: .35rem; }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: .65rem .9rem;
            background: var(--bg);
            border: 1px solid var(--border);
            border-radius: 9px;
            color: var(--text);
            font-size: .93rem;
            outline: none;
            transition: border-color .2s;
        }
        input:focus { border-color: var(--primary); }

        .form-group { margin-bottom: 1.1rem; }

        .checkbox-row {
            display: flex;
            align-items: center;
            gap: .5rem;
            margin-bottom: 1.4rem;
            font-size: .88rem;
            color: var(--muted);
        }
        .checkbox-row input { width: auto; }

        .btn {
            display: block;
            width: 100%;
            padding: .72rem;
            background: var(--primary);
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: .95rem;
            font-weight: 600;
            cursor: pointer;
            transition: background .2s;
        }
        .btn:hover { background: var(--primary-h); }

        .alert {
            padding: .7rem 1rem;
            border-radius: 9px;
            font-size: .88rem;
            margin-bottom: 1.2rem;
        }
        .alert-error   { background: rgba(239,68,68,.12);  border: 1px solid rgba(239,68,68,.4);  color: #fca5a5; }
        .alert-success { background: rgba(34,197,94,.12);  border: 1px solid rgba(34,197,94,.4);  color: #86efac; }
        .alert-info    { background: rgba(99,102,241,.12); border: 1px solid rgba(99,102,241,.4); color: #c7d2fe; }

        .card-footer { text-align: center; margin-top: 1.4rem; font-size: .86rem; color: var(--muted); }
        .card-footer a { color: var(--primary); text-decoration: none; }
        .card-footer a:hover { text-decoration: underline; }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin: 1.5rem 0;
        }
        .info-box {
            background: var(--bg);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 1rem 1.2rem;
        }
        .info-box .label { font-size: .75rem; color: var(--muted); text-transform: uppercase; letter-spacing: .05em; }
        .info-box .value { font-size: 1rem; font-weight: 600; margin-top: .3rem; word-break: break-all; }

        .concept-box {
            background: var(--bg);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 1.3rem 1.5rem;
            margin-top: 1.5rem;
        }
        .concept-box h3 { font-size: .9rem; margin-bottom: .8rem; color: var(--primary); }
        .concept-box code {
            display: block;
            background: #0a0f1e;
            border-radius: 7px;
            padding: .7rem 1rem;
            font-size: .8rem;
            color: #a5f3fc;
            white-space: pre-wrap;
            line-height: 1.6;
            font-family: 'Fira Code','Courier New', monospace;
        }

        footer { text-align: center; padding: 1.5rem; color: var(--muted); font-size: .8rem; border-top: 1px solid var(--border); }
    </style>
</head>
<body>

<nav>
    <span class="nav-logo"> PHP Auth</span>
    <div class="nav-links">
        <?php if (!empty($_SESSION['logged_in'])): ?>
            <a href="dashboard.php">Dashboard</a>
            <a href="logout.php" class="btn-nav">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
            <a href="register.php" class="btn-nav">Register</a>
        <?php endif; ?>
    </div>
</nav>

<main>
