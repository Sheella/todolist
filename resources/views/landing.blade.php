<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4e1c1;
            background-image: url('https://www.transparenttextures.com/patterns/old-wall.png'); /* Motif retro */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
            overflow: hidden;
            position: relative;
            font-family: 'Courier New', Courier, monospace;
        }
        .landing-container {
            max-width: 600px;
            padding: 20px;
            background: #f8e4b5;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            position: relative;
            z-index: 10;
            border: 2px solid #a67c52;
        }
        h1 {
            color: #8b4513;
            font-weight: bold;
        }
        p {
            color: #704214;
        }
        .btn-primary {
            background-color: #d2a679;
            border-color: #a67c52;
        }
        .btn-primary:hover {
            background-color: #a67c52;
            border-color: #8b4513;
        }
        .btn-secondary {
            background-color: #c2b280;
            border-color: #8b4513;
        }
        .btn-secondary:hover {
            background-color: #8b7d6b;
            border-color: #5c4033;
        }
        /* Pita tambahan */
        .ribbon {
            position: absolute;
            top: -10px;
            left: -10px;
            width: 100%;
            height: 30px;
            background: linear-gradient(45deg, #a67c52, #d2a679);
            clip-path: polygon(0% 0%, 100% 0%, 85% 100%, 15% 100%);
            z-index: 5;
        }
        .ribbon::after {
            content: '';
            position: absolute;
            right: 0;
            top: 100%;
            width: 20px;
            height: 20px;
            background-color: #a67c52;
            transform: rotate(45deg);
        }
        /* Pita tambahan di sudut */
        .corner-ribbon {
            position: absolute;
            top: 10px;
            right: -20px;
            background: #a67c52;
            color: #fff;
            padding: 10px 30px;
            transform: rotate(45deg);
            font-weight: bold;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
        /* Sparkle berjatuhan */
        .sparkle {
            position: absolute;
            width: 7px;
            height: 7px;
            background: #e3caa1;
            border-radius: 50%;
            opacity: 0.8;
            animation: fall 4s linear infinite;
        }
        @keyframes fall {
            from { transform: translateY(-10vh); opacity: 1; }
            to { transform: translateY(100vh); opacity: 0; }
        }
        /* Diamond dekoratif */
        .decorative-diamond {
            position: absolute;
            width: 50px;
            height: 50px;
            background: rgba(165, 42, 42, 0.7);
            transform: rotate(45deg);
            opacity: 0.7;
        }
    </style>
</head>
<body>
    <div class="landing-container">
        <h1>To-Do List App</h1>
        <p>Kelola tugas harian Anda dengan mudah dan efisien.</p>
        <a href="{{ route('register') }}" class="btn btn-primary">Daftar Sekarang</a>
        <a href="{{ route('login') }}" class="btn btn-secondary">Login</a>
    </div>

    <!-- Pita utama -->
    <div class="ribbon"></div>
    
    <!-- Pita tambahan di sudut -->
    <div class="corner-ribbon">To-Do List</div>

    <script>
        function createSparkle() {
            const sparkle = document.createElement("div");
            sparkle.classList.add("sparkle");
            sparkle.style.left = Math.random() * 100 + "vw";
            sparkle.style.animationDuration = Math.random() * 3 + 2 + "s";
            document.body.appendChild(sparkle);
            setTimeout(() => { sparkle.remove(); }, 4000);
        }
        setInterval(createSparkle, 200);

        function createDiamond() {
            const diamond = document.createElement("div");
            diamond.classList.add("decorative-diamond");
            diamond.style.left = Math.random() * 100 + "vw";
            diamond.style.top = Math.random() * 100 + "vh";
            document.body.appendChild(diamond);
            setTimeout(() => { diamond.remove(); }, 7000);
        }
        setInterval(createDiamond, 1500);
    </script>
</body>
</html>
