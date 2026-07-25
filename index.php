<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Martins Schools</title>
    <style>
        body {
            margin: 0;
            font-family: system-ui, -apple-system, Segoe UI, sans-serif;
            background: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .wrap {
            background: white;
            border-radius: 16px;
            padding: 48px 40px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.08);
            max-width: 480px;
            width: 90%;
            text-align: center;
        }
        h1 {
            margin: 0 0 8px;
            font-size: 24px;
            color: #222;
        }
        p.sub {
            color: #666;
            margin-bottom: 32px;
            font-size: 15px;
        }
        .links {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }
        .links a {
            display: block;
            padding: 16px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
            transition: transform .15s;
        }
        .links a:hover { transform: translateY(-2px); }
        .crestview { background: #FFF3D6; color: #2B2B3A; }
        .horizon { background: #1A2B4C; color: white; }
        .portal { background: #212529; color: white; }
        .links span {
            display: block;
            font-weight: 400;
            font-size: 13px;
            opacity: 0.75;
            margin-top: 3px;
        }
    </style>
</head>
<body>
    <div class="wrap">
        <h1>Martins Schools</h1>
        <p class="sub">Choose where you'd like to go</p>
        <div class="links">
            <a class="crestview" href="/crestview/index.php">
                Crestview Primary School
                <span>Public website</span>
            </a>
            <a class="horizon" href="/horizon/index.php">
                Horizon Secondary School
                <span>Public website</span>
            </a>
            <a class="portal" href="/portal/login.php">
                School Management Portal
                <span>Admin &amp; teacher login</span>
            </a>
        </div>
    </div>
</body>
</html>
